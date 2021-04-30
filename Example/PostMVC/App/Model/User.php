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
      'INSERT INTO users (name, email, password) VALUES(:name, :email, :password)'
    );

    //Bind Values
    $this->db->bind(':name', $data["name"]);
    $this->db->bind(':email', $data["email"]);
    $this->db->bind(':password', $data["password"]);

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
    $this->db->query('SELECT * FROM users WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  //User Login
  public function login($email, $password)
  {
    $this->db->query("SELECT * FROM users WHERE email = :email");
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
    $this->db->query('SELECT * FROM users WHERE id = :id');
    // Bind value
    $this->db->bind(':id', $id);

    $row = $this->db->single();
    return $row;
  }
}
?>
