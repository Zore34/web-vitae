<?php
/* In this file we define default values for every valid param to have a value if we don't get one from URL.
 */
 
// Defining default values.
var $defaults = Array(
  "section" => "blog",
  "style" => []
  );
 
/**
 * Returns the default value for a param.
 * @param $param The parameter 
 * @return 
 */
function defaultParam($param){
  return $defaults[$param];
}
