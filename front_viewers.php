<?php
/* In this file we define viewers for the front page (page visible to anybody visiting the website).
 */

require_once "config_params.php";

/**
 * This class is used for definin a namespace for the functions related to front viewers
 */
class FrontViewers{
  /**
   * This function prints a HTML code with the view of the section we want to draw in the main area.
   * @param section The identifier of the section we want to draw.
   */
  static function getSectionViewer($section){
    // TODO: Isn't necessary any aditional checks?
    include "viewers/section_$section.php";
  }
  
  /**
   * This function retuns the CSS styles asociated with the front page and it's config.
   * @return An array of the configured CSS styles.
   */
  static function getCSSStyles() {
    return ConfigParams::getFrontCSS();
  }
  
  /**
   * Prints HTML representing the navigation bar.
   */
  static function getNavBarViewer() {
    include "viewers/navBarViewer.php";
  }
  
  /**
   * Prints HTML representing the top bar of the site.
   * TODO: If the top bar is static enough calling it could be simply including the HTML file.
   */
  static function getHeaderViewer() {
    include "viewers/top_viewer.php";
  }
  
  /**
   * Prints HTML representing the bottom bar fo the site.
   */
  static function getBottomViewer() {
    include "viewers/bottom_viewer.php";
  }
  
  /**
   * Prints HTML representing the login form. It only makes sense if the user isn't logged in.
   */
  static function getLoginForm() {
    include "viewers/loginForm.php";
  }
  
  /**
   * Prints HTML representing the name of the user and a link to logout. It only makes sense if the user is logged in.
   */
  static function getLoginIdentifier() {
    include "viewers/loginIdentifier.php";
  }
}
