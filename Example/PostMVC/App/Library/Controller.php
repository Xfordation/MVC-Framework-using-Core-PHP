<?php
/**
 * Base Controller
 * Loads Models and Views
 */
class Controller
{
  //Load Model
  public function model($model)
  {
    //Require Model File
    require_once "../App/Model/" . $model . ".php";
    return new $model();
  }
  //Load View
  #Here we can will also pass an array as an param to pass in dynamic values but its optional
  public function View($view, $data = [])
  {
    //Check if it View exists
    if (file_exists('../App/View/' . $view . '.php')) {
      require_once "../App/View/" . $view . ".php";
    } else {
      #this can be handeled in other ways but for now die()
      die("View Does not Exists");
    }
  }
}

?>
