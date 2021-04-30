<?php

/**
 * This file is used to load all of our library files and helper files and our config file.
 */

 //Autoload Class Library
spl_autoload_register(function ($cname) {
  require_once "Library/" . $cname . ".php";
});

// LOADING CONFIGURATION FILE
require_once "../App/Config/config.php";

// LOADING HELPER FILES
require_once "../App/Help/session_helper.php";
require_once "../App/Help/url_helper.php";
require_once "../App/Help/mail_helper.php";


?>
