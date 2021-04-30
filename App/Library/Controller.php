<?php
/**
 * Base Controller
 * Loads Models and Views
 * This Class must be Extended by all the Contollers 
 * inorder to load Views and Access the Model 
 */
class Controller
{
  /**
   * Function to load model in our Contoller
   * takes in the name of the Model the User 
   * wants to Load.  
   * @param [type] $model
   * @return void
   */
  public function model($model)
  {
    //Require Model File
    require_once "../App/Model/" . $model . ".php";
    return new $model();
  }
  
  /**
   * Function to load View so that it can be Displayed to the user
   * Here we can will also pass an array as an param to pass in 
   * dynamic values but is Optional
   * @param [type] $view (Name of the view user wants to Load)
   * @param array $data
   * @return void
   */
  public function View($view, $data = [])
  {
    //Check if it View exists
    if (file_exists("../App/View/" . $view . ".php")) {
      require_once "../App/View/" . $view . ".php";
    } else {
      #this can be handeled in other ways but for now die()
      die("View Does not Exists");
    }
  }
}

?>
