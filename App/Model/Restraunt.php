<?php
class Restraunt
{
  private $db;
  public function __construct()
  {
    $this->db = new DB();
  }
  #Register and send account details on the DB
  public function register($data)
  {
    // Query String
    $this->db->query(
      "INSERT INTO restraunt (name, email, password, address, prefrences, user_type) VALUES(:name, :email, :password, :addr, :prefrences, :user_type)"
    );

    //Bind Values
    $this->db->bind(":name", $data["name"]);
    $this->db->bind(":email", $data["email"]);
    $this->db->bind(":password", $data["password"]);
    $this->db->bind(":addr", $data["addr"]);
    $this->db->bind(":prefrences", $data["prefrences"]);
    $this->db->bind(":user_type", $data["user_type"]);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  #Checking If Email already Exists or not
  public function findUserByEmail($email)
  {
    $this->db->query("SELECT * FROM restraunt WHERE email = :email");
    // Bind value
    $this->db->bind(":email", $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  //   User Login
  public function login($email, $password)
  {
    $this->db->query("SELECT * FROM restraunt WHERE email = :email");
    $this->db->bind(":email", $email);
    $row = $this->db->single();
    $hashPassword = $row->password;
    if (password_verify($password, $hashPassword)) {
      return $row;
    } else {
      return false;
    }
  }
  // Get user Id
  public function getUserId($id)
  {
    $this->db->query("SELECT * FROM restraunt WHERE id = :id");
    // Bind value
    $this->db->bind(":id", $id);

    $row = $this->db->single();
    return $row;
  }

  #Register and send menu on the DB
  public function menu($data)
  {
    // Query String
    $this->db->query(
      "INSERT INTO menu (dish, category, dish_type, main_item1, main_item2, main_item3, amount, uploaded_by) VALUES(:dish, :category, :dish_type, :main_item1, :main_item2, :main_item3, :amount, :uploaded_by)"
    );

    //Bind Values
    $this->db->bind(":dish", $data["dish"]);
    $this->db->bind(":category", $data["category"]);
    $this->db->bind(":dish_type", $data["dish_type"]);
    $this->db->bind(":main_item1", $data["main_item1"]);
    $this->db->bind(":main_item2", $data["main_item2"]);
    $this->db->bind(":main_item3", $data["main_item3"]);
    $this->db->bind(":amount", $data["amount"]);
    $this->db->bind(":uploaded_by", $data["uploaded_by"]);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
?>
