<?php
/* This module contains the HTML for the header of the page.
 */
require_once "../config_params.php"
?>
<header>
  <div id="title">
    
  </div>
  <?php
  if(validLoginCode()){
  ?>
    <div>
      
    </div>
  <?php
  }else{
  ?>
    
  <?php
  }
  ?>
</header>
