<?php
class Pages extends Controller
{
  // public function __construct()
  // {
  // }
  //Default Method as it is already set as Index
  public function index()
  {
    if (isLoggedIn()) {
      redirect("posts");
    }
    $this->View("Pages/index", [
      "title" => "Rosesso",
      "description" => "A post sharing Site Made using MVC Architecture",
    ]);
  }
  public function about()
  {
    $this->View("Pages/about", [
      "title" => "Rosesso: About",
      "description" => "This is a Site to share Posts",
    ]);
  }
}
?>
