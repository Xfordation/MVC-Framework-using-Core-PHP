<?php

//*Main Application Core
//*Create and Load Core Controller
//*URL Format - controller/method/params

class Core
{
  protected $currentMethod = "index";
  protected $currentController = "pages";
  protected $params = [];

  //CONSTRUCTOR
  public function __construct()
  {
    $url = $this->getURL();

    //Looking into The first part of the URL
    if (isset($url[0])) {
      if (file_exists('../App/Controller/' . ucwords($url[0]) . ".php")) {
        $this->currentController = ucwords($url[0]);
        unset($url[0]);
      }
    }
    require_once '../App/Controller/' . $this->currentController . '.php';

    //Init
    $this->currentController = new $this->currentController();

    //Check if Method Exists
    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        unset($url[1]);
      }
    }

    //Prams
    $this->params = $url ? array_values($url) : [];
    call_user_func_array(
      [$this->currentController, $this->currentMethod],
      $this->params
    );
  }
  public function getURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], "/");
      $url = filter_var($url, FILTER_SANITIZE_URL);
      //Breaking a String into a ARRAY
      $url = explode("/", $url);
      //print_r($url);
      return $url;
    }
  }
}
?>
