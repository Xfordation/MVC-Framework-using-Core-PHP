<?php
class Users extends Controller
{
  public function __construct()
  {
    //Load Model
    $this->userModel = $this->model("User");
  }
  public function register()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //die("hello");
      //Process Form
      //Initializing data in form
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        "name" => htmlspecialchars(trim($_POST["name"])),
        "email" => htmlspecialchars(trim($_POST["email"])),
        "password" => htmlspecialchars(trim($_POST["password"])),
        "confirm_password" => htmlspecialchars(
          trim($_POST["confirm_password"])
        ),
        "name_err" => "",
        "email_err" => "",
        "password_err" => "",
        "confirm_password_err" => "",
      ];
      // --VALIDATION--

      #Validate Email-
      if (empty($data["email"])) {
        $data["email_err"] = "Email Field Cannot be set Empty";
      } else {
        if ($this->userModel->findUserByEmail($data["email"])) {
          //   die("ss");
          $data["email_err"] = "Email already Exist";
        }
      }

      #Validate Name
      if (empty($data["name"])) {
        $data["name_err"] = "Name Field Cannot be set Empty";
      }

      #Password
      if (empty($data["password"])) {
        $data["password_err"] = "Password Field Cannot be set Empty";
      } elseif (strlen($data["password"]) < 6) {
        $data["password_err"] =
          "Password length should be Greater than 6 Charcters";
      }

      #Confirm Password
      if (empty($data["confirm_password"])) {
        $data["confirm_password_err"] = "Password Field Cannot be set Empty";
      } else {
        if ($data["password"] != $data["confirm_password"]) {
          $data["confirm_password_err"] = "Passwords does not Match.";
        }
      }

      //Check if all fields are Empty
      if (
        empty($data["name_err"]) &&
        empty($data["email_err"]) &&
        empty($data["password_err"]) &&
        empty($data["confirm_password_err"])
      ) {
        //Verify Data
        # Hash Password
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        #Register User
        if ($this->userModel->register($data)) {
          flash_msg(
            "register_success",
            "Your are Susscessfully Registed with Us"
          );
          redirect("users/login");
        } else {
          die("Something Went Wrong");
        }
      } else {
        $this->View("users/register", $data);
      }
    } else {
      //Load form
      //Initializing data in form
      $data = [
        "name" => "",
        "email" => "",
        "password" => "",
        "confirm_password" => "",
        "name_err" => "",
        "email_err" => "",
        "password_err" => "",
        "confirm_password_err" => "",
      ];
      //Load View
      $this->View("users/register", $data);
    }
  }
  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //Process Form
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        "email" => htmlspecialchars(trim($_POST["email"])),
        "password" => htmlspecialchars(trim($_POST["password"])),
        "email_err" => "",
        "password_err" => "",
      ];

      // --VALIDATION--

      #Validate Email-
      if (empty($data["email"])) {
        $data["email_err"] = "Email Field Cannot be set Empty";
      }

      #Check for user Email
      if ($this->userModel->findUserByEmail($data["email"])) {
      } else {
        $data["email_err"] = "User not found. ";
      }

      #Password
      if (empty($data["password"])) {
        $data["password_err"] = "Password Field Cannot be set Empty";
      }

      //Empty all the error fields
      if (empty($data["email_err"]) && empty($data["password_err"])) {
        //call user model
        $login = $this->userModel->login($data["email"], $data["password"]);
        if ($login) {
          //Create Session Variable
          $this->createUserSession($login);
        } else {
          //Rerender the Form
          $data["password_err"] = "Incorrect Password Please try again";
          //Redirect to the login page
          $this->View("users/login", $data);
        }
      } else {
        //Check and set logged in user
        $this->View("users/login", $data);
      }
    } else {
      //Load form
      //Initializing data in form
      $data = [
        "email" => "",
        "password" => "",
        "email_err" => "",
        "password_err" => "",
      ];
      //Load View
      $this->View("users/login", $data);
    }
  }
  public function createUserSession($user)
  {
    $_SESSION["user_ID"] = $user->id;
    $_SESSION["user_EMAIL"] = $user->email;
    $_SESSION["user_NAME"] = $user->name;
    //Redirect
    redirect("posts/index");
  }

  //USER Logout
  public function logout()
  {
    unset($_SESSION["user_ID"]);
    unset($_SESSION["user_EMAIL"]);
    unset($_SESSION["user_NAME"]);
    session_destroy();
    redirect("users/login");
  }
}
?>
