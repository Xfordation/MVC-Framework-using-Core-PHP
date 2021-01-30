<?php
class User
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
      "INSERT INTO coustomers (name, email, password, address, prefrences, user_type) VALUES(:name, :email, :password, :addr, :prefrences, :user_type)"
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
    $this->db->query("SELECT * FROM coustomers WHERE email = :email");
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
    $this->db->query("SELECT * FROM coustomers WHERE email = :email");
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
    $this->db->query("SELECT * FROM coustomers WHERE id = :id");
    // Bind value
    $this->db->bind(":id", $id);

    $row = $this->db->single();
    return $row;
  }
}
?>
