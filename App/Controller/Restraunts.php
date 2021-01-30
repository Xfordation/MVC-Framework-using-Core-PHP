<?php
class Restraunts extends Controller
{
  public function __construct()
  {
    //Load Model
    $this->restrauntModel = $this->model("Restraunt");
  }
  //Coustomer Login
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
        "addr" => htmlspecialchars(trim($_POST["addr"])),
        "prefrences" => htmlspecialchars(trim($_POST["prefrences"])),
        "user_type" => htmlspecialchars(trim($_POST["user_type"])),
        "name_err" => "",
        "email_err" => "",
        "password_err" => "",
        "confirm_password_err" => "",
        "addr_err" => "",
      ];

      // --VALIDATION--
      #Validate Email-
      if (empty($data["email"])) {
        $data["email_err"] = "Email Field Cannot be set Empty";
      } else {
        if ($this->restrauntModel->findUserByEmail($data["email"])) {
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

      #Validate Address
      if (empty($data["addr"])) {
        $data["addr_err"] = "Name Field Cannot be set Empty";
      }

      //Check if all fields are Empty
      if (
        empty($data["name_err"]) &&
        empty($data["email_err"]) &&
        empty($data["password_err"]) &&
        empty($data["confirm_password_err"]) &&
        empty($data["addr_err"])
      ) {
        //Verify Data
        # Hash Password
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        #Register User
        if ($this->restrauntModel->register($data)) {
          flash_msg(
            "register_success",
            "Your are Susscessfully Registed with Us"
          );
          redirect("Restraunts/login");
        } else {
          die("Something Went Wrong");
        }
      } else {
        $this->View("Restraunts/register", $data);
      }
    } else {
      //Load form
      //Initializing data in form
      $data = [
        "name" => "",
        "email" => "",
        "password" => "",
        "confirm_password" => "",
        "addr" => "",
        "prefrences" => "",
        "name_err" => "",
        "email_err" => "",
        "password_err" => "",
        "confirm_password_err" => "",
        "addr_err" => "",
      ];
      //Load View
      $this->View("Restraunts/register");
    }
  }

  public function login()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
      if ($this->restrauntModel->findUserByEmail($data["email"])) {
      } else {
        $data["email_err"] = "User not found. ";
      }

      #Validate Password
      if (empty($data["password"])) {
        $data["password_err"] = "Password Field Cannot be set Empty";
      }

      //Empty all the error fields
      if (empty($data["email_err"]) && empty($data["password_err"])) {
        //call user model
        $login = $this->restrauntModel->login(
          $data["email"],
          $data["password"]
        );
        if ($login) {
          //Create Session Variable
          $this->createUserSession($login);
        } else {
          //Rerender the Form
          $data["password_err"] = "Incorrect Password Please try again";
          //Redirect to the login page
          $this->View("Restraunts/login", $data);
        }
      } else {
        //Check and set logged in user
        $this->View("Restraunts/login", $data);
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
      $this->View("Restraunts/login", $data);
    }
  }
  public function createUserSession($user)
  {
    $_SESSION["user_ID"] = $user->id;
    $_SESSION["user_EMAIL"] = $user->email;
    $_SESSION["user_NAME"] = $user->name;
    $_SESSION["user_TYPE"] = $user->user_type;
    //Redirect
    redirect("Pages/menu");
  }

  //USER Logout
  public function logout()
  {
    unset($_SESSION["user_ID"]);
    unset($_SESSION["user_EMAIL"]);
    unset($_SESSION["user_NAME"]);
    unset($_SESSION["user_TYPE"]);
    session_destroy();
    redirect("Restraunt/login");
  }

  //Menu Section
  public function menu()
  {
    // You will be redirected to home page if you are not Logged in as Restraunt
    if (!isLoggedInAsRestraunt()) {
      redirect("");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //die("hello");
      //Process Form
      //Initializing data in form
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        "dish" => htmlspecialchars(trim($_POST["dish"])),
        "category" => htmlspecialchars(trim($_POST["category"])),
        "dish_type" => htmlspecialchars(trim($_POST["dish_type"])),
        "main_item1" => htmlspecialchars(trim($_POST["main_item1"])),
        "main_item2" => htmlspecialchars(trim($_POST["main_item2"])),
        "main_item3" => htmlspecialchars(trim($_POST["main_item3"])),
        "amount" => htmlspecialchars(trim($_POST["amount"])),
        "uploaded_by" => htmlspecialchars(trim($_POST["uploaded_by"])),
        "dish_err" => "",
        "category_err" => "",
        "dish_type_err" => "",
        "main_item_err" => "",
        "amount_err" => "",
      ];

      // --VALIDATION--
      #Validate Dish-
      if (empty($data["dish"])) {
        $data["dish_err"] = "Dish Field Cannot be set Empty";
      }

      #dish_type
      if (empty($data["dish_type"])) {
        $data["dish_type_err"] = "Dish Type Field Cannot be set Empty";
      }

      #Confirm Password
      if (
        empty($data["main_item1"]) &&
        empty($data["main_item2"]) &&
        empty($data["main_item3"])
      ) {
        $data["main_item_err"] = "Main Item Field Cannot be set Empty";
      }

      #Validate Address
      if (empty($data["amount"])) {
        $data["amount_err"] = "Amount Field Cannot be set Empty";
      }

      //Check if all fields are Empty
      if (
        empty($data["dish_err"]) &&
        empty($data["dish_type_err"]) &&
        empty($data["main_item_err"]) &&
        empty($data["amount_err"])
      ) {
        //Verify Data
        # check if there is anychange in the database
        if ($this->restrauntModel->menu($data)) {
          redirect("Restraunts/menu");
        } else {
          die("Something Went Wrong");
        }
      } else {
        $this->View("Restraunts/menu", $data);
      }
    } else {
      //Load form
      //Initializing data in form
      $data = [
        "dish" => "",
        "category" => "",
        "dish_type" => "",
        "main_item1" => "",
        "main_item2" => "",
        "main_item3" => "",
        "amount" => "",
        "uploaded_by" => "",
        "dish_err" => "",
        "category_err" => "",
        "dish_type_err" => "",
        "main_item_err" => "",
        "amount_err" => "",
      ];
      $this->View("Restraunts/menu");
    }
  }
}
