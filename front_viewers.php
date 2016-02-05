<?php
/* In this file we define viewers for the front page (page visible to anybody visiting the website).
 */

/**
 * This class is used for definin a namespace for the functions related to front viewers
 */
class FrontViewers{
  /**
   * This function returns a HTML code with the view of the section we want to draw in the main area.
   * @param section The identifier of the section we want to draw.
   * @returns string View of the generated section
   */
  static function getSectionViewer($section){
    
  }
  
  /**
   * Returns HTML representing the navigation bar.
   * TODO: If the nav bar is static enough calling it could be simply including the HTML file.
   */
  static function navBarViewer() {
    
  }
  
  /**
   * Returns HTML representing the top bar of the site.
   * TODO: If the top bar is static enough calling it could be simply including the HTML file.
   */
  static function topBarViewer() {
    
  }
  
  /**
   * Returns HTML representing the bottom bar fo the site.
   * TODO: If the bottom bar is static enough calling it could be simply including the HTML file.
   */
  static function bottomViewer() {
    
  }
}
