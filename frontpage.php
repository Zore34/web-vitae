<html>
  <head>
    <?php
    require_once "front_viewers.php";
    require_once "config_params.php";
    require_once "default_params.php"
    // This file shows the frontpage of the site. Depending of the params, shows one section or another.
    // TODO: Function getSectionViewer is not defined yet. Should be in front_viewers.php
    $viewer = getSectionViewer(defaultParam('section'));
    // We define the styles
    foreach(getStyles(defaultParam('style')) as $style){
    ?>
    <link rel="stylesheet" type="text/css" href="<?php print $style ?>">
    <?php
    }
    ?>
    <title><?php print getTitle() ?></title>
  </head>
  <body>
    
  </body>
</html>
