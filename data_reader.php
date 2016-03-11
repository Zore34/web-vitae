<?php
/* In this file we define functions for reading and writing config parameters from storage.
 */

require_once 'default_params.php'

/**
 * Class used to define a namespace for the functions. The config files are in *.php format for performance.
 */
class DataReader {
  private static $CONFIG_FILE = "./data/config.json";
  private static $json;
  
  private static $CONTENT_FOLDER = "./data/content/";
  private static $USER_FILE = "./data/user_data.json";
  private static $contentsCache = new Array();
  // Time of validity of *.updating files in seconds.
  private static $CONTENT_TIMEOUT = 3;
  
  /**
   * Reads the config file and parses the JSON data.
   * @return An array with the JSON data of the config file.
   */
  public static function readConfigFile() {
    // This will prevent loading the config file multiple times
    if(!isset($json)){
      $json = json_decode(file_get_contents($CONFIG_FILE));
    }
    return $json;
  }
  
  /**
   * This function returns the styles configured in the site. It takes care of using the default style
   * if there's no one configured
   * @return The CSS file of the style configured.
   */
  public static function getStyles() {
    $config = readConfigFile();
    // If there's no style in the config file, we use the default one.
    $style = isset($config['style'])? $config['style']: defaultParam('style');
    
    return $config['styles'][$style];
  }
  
  /**
   * Get a content json file from the contents directory.
   * @param $contentID The content unique name.
   * @return A JSON document containing all the related data to the document requested.
   */
  public static function getContent($contentID) {
    if(!isset($contentsCache[$contentID])){
      $updatingFile = $CONTENT_FOLDER.$contentID.".updating";
      // Before reading the file, we check if there is a updating file.
      while(file_exists($updatingFile)){
        // Waiting the update to finish. We check if the file is timed out.
        $fileTime = filectime($updatingFile);
        // We check that the file is still there.
        if($fileTime){
          // If the file is older than the timeout, we delete it and log a warning message.
          if((time() - $fileTime) > $CONTENT_TIMEOUT){
            syslog(LOG_WARNING, "Updating file \"".$updatingFile."\" timed out.");
            unlink($updatingFile);
          }
        }
      }
      $contentsCache[$contentID] = json_decode(file_get_contents($CONTENT_FOLDER.$contentID.".json"))
    }
    return $contentsCache[$contentID];
  }
  
  /**
   * Saves a content to the disk checking if you are authorized for that operation.
   * @param $contentID The ID of the content you want to modify.
   * @param $content The new content of the json file. It must be an Array that can be converted to JSON.
   * @param $authID The auth ID used for check if you are an authorized user or not.
   */
  public static function saveContent($contentID, $content, $authID) {
    // We only save the data if we have a valid authID.
    if(checkAuth($authID)) {
      // Update cache, then save to file.
      $contentsCache[$contentID] = $content;
      // Create an updating file, save the contents and delete the updating file.
      fclose(fopen($CONTENT_FOLDER.$contentID.".updating", "w"));
      file_put_contents($CONTENT_FOLDER.$contentID.".json", json_encode($content));
      unlink($CONTENT_FOLDER.$contentID.".updating");
    }
  }
  
  /**
   * 
   */
  public static function getAuth($username, $password) {
    // FIXME: Not implemented yet.
  }
  
  /**
   * 
   */
  public static function checkAuth($authID) {
    // FIXME: Not implemented yet.
    return false;
  }
}
 
