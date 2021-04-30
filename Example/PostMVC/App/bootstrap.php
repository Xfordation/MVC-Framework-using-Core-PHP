<?php
// LODAING LIBRARY CLASSES.
//Autoload Class Library
spl_autoload_register(function ($cname) {
  require_once "Library/" . $cname . ".php";
});

// LOADING CONFIGURATION FILE
require_once "../App/Config/config.php";
// Helper Files
require_once "../App/Help/url_helper.php";
require_once "../App/Help/session_helper.php";
?>
