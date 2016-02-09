<?php
/* This module contains the HTML for the header of the page.
 */
require_once "../config_params.php";
require_once "../front_viewers.php";
?>
<header>
  <div id="title">
    <?php echo ConfigParams::getTitle();?>
  </div>
  <div id="login-area">
    <?php
    if(validLoginCode()){
      // User is logged in, so we show the login identifier
      echo FrontViewers::getLoginIdentifier();
    }else{
      // User isn't logged in, so we show the login form.
      echo FrontViewers::getLoginForm();
    }
    ?>
  </div>
</header>
