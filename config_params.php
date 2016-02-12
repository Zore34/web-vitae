<?php
/* In this file we define functions for reading and writing config parameters from storage.
 */

require_once 'default_params.php'

/**
 * Class used to define a namespace for the functions. The config files are in *.php format for performance.
 */
class ConfigParams {
  private static $CONFIG_FILE = "./data/config.json";
  
  /**
   * Reads the config file and parses the JSON data.
   */
  private static function readConfigFile() {
    return json_decode(file_get_contents($CONFIG_FILE));
  }
  
  /**
   * This function returns the styles configured in the site. It takes care of using the default style
   * if there's no one configured
   */
  static function getStyles() {
    $config = readConfigFile();
    // If there's no style in the config file, we use the default one.
    $style = isset($config['style'])? $config['style']: defaultParam('style');
    
    return $config['styles'][$style];
  }
  
  
}
