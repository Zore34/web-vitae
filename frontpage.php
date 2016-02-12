<html>
  <head>
    <?php
    require_once "front_viewers.php";
    require_once "config_params.php";
    require_once "default_params.php"
    // This file shows the frontpage of the site. Depending of the params, shows one section or another.
    // We define the styles. ConfigParams::getStyles takes care of looking for a default param if there's no HTTP param.
    foreach(FrontViewers::getStyles(ConfigParams::getStyles()) as $style){
    ?>
    <link rel="stylesheet" type="text/css" href="<?php print $style;?>">
    <?php
    }
    // And define the active JavaScripts
    foreach(FrontViewers::getJS() as $js){
      ?>
      <script type="text/javascript" src="<?php print $js;?>"></script>
      <?php
    }
    ?>
    <title><?php print getTitle() ?></title>
  </head>
  <body>
    <?php
    // Print the front page parts: header, nav bar, active section body and footer
    // TODO: We could call FrontViewers or BackViewers depending on a param.
    FrontViewers::getHeaderViewer();
    FrontViewers::getNavBarViewer();
    FrontViewers::getSectionViewer(defaultParam('section'));
    FrontViewers::getFooterViewer();
    ?>
  </body>
</html>
