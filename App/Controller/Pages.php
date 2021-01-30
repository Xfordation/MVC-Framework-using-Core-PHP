<?php
class Pages extends Controller
{
  public function __construct()
  {
    //Load Model
    $this->pageModel = $this->model("Page");
  }
  //Default Method as it is already set as Index
  public function index()
  {
    $this->View("Pages/index");
  }
  public function about()
  {
    $this->View("Pages/about");
  }
  public function order()
  {
    // It checks if we are logged in as Restraunt Owners we cannot access this page
    if (isLoggedInAsRestraunt()) {
      redirect("");
    }
    #Get List of Orders
    $orders = $this->pageModel->getOrders();
    // The reson we put our Model Result in an array because we are going to get a Array of sets returned
    $data = [
      "order" => $orders,
    ];
    $this->View("Pages/order", $data);
  }
  public function placeOrder()
  {
    #place YOur Order
    $data = [
      "ordered_by" => htmlspecialchars(trim($_SESSION["user_NAME"])),
      "order_name" => htmlspecialchars(trim($_POST["order_name"])),
      "delivered_from" => htmlspecialchars(trim($_POST["delivered_from"])),
    ];
    if ($this->pageModel->placeOrder($data)) {
      flash_msg("order_placed", "Order has been placed Susscessfully");
      redirect("");
    } else {
      die("Some Thing Went Wrong");
    }
  }
}
?>
