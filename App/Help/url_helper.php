<?php
/**
 * This function is Used to Redirect the user form the current page
 * @param [type] $page (the name of the page you want to redirect the user to) 
 * @return void
 */
function redirect($page)
{
  header("location:" . URL_ROOT . "/" . $page);
}
?>