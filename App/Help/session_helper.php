<?php
/**
 * This file must be included in the "Bootstrap.php" 
 * inorder to user the following Sesstion methods.
 */

session_start();

/**
 * This function can be used to display a Success message.
 * @param string $name
 * @param string $message
 * @param string $class
 * @return void
 */
function flash_msg($name = "", $message = "", $class = "alert alert-success")
{
  if (!empty($name)) {
    if (!empty($message) && empty($_SESSION[$name])) {
      if (!empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
      }
      if (!empty($_SESSION[$name . "_class"])) {
        unset($_SESSION[$name . "_class"]);
      }
      $_SESSION[$name] = $message;
      $_SESSION[$name . "_class"] = $class;
    } elseif (empty($message) && !empty($_SESSION[$name])) {
      $class = !empty($_SESSION[$name . "_class"])
        ? $_SESSION[$name . "_class"]
        : "";
      echo '<div class="' .
        $class .
        '" id="msg-flash">' .
        $_SESSION[$name] .
        "</div>";
      unset($_SESSION[$name]);
      unset($_SESSION[$name . "_class"]);
    }
  }
}

/**
 * Function to Check if the User has Logged In or not
 * Returns True if User_ID is  Set in the Session else 
 * will return False
 */
function isLoggedIn()
{
  if (isset($_SESSION["user_ID"])) {
    return true;
  } else {
    return false;
  }
}

?>
