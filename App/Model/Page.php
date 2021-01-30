<?php
class Page
{
  private $db;
  public function __construct()
  {
    $this->db = new DB();
  }
  public function getOrders()
  {
    // Query String
    $this->db->query("SELECT * FROM menu ORDER BY created_at DESC");
    $results = $this->db->resultSet();
    return $results;
  }

  //   Place Order
  public function placeOrder($data)
  {
    // Query String
    $this->db->query(
      "INSERT INTO placeorder (ordered_by, order_name, delivered_from
      ) VALUES(:ordered_by, :order_name, :delivered_from)"
    );

    //Bind Values
    $this->db->bind(":ordered_by", $data["ordered_by"]);
    $this->db->bind(":order_name", $data["order_name"]);
    $this->db->bind(":delivered_from", $data["delivered_from"]);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
