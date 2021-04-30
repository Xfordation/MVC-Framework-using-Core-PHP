<?php
// How the calling works, it uses the url where it calls Controller/method/prameter
class Posts extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn()) {
      redirect("users/login");
    }
    // Loading Model
    $this->postModel = $this->model("Post");
    $this->userModel = $this->model("User");
  } 
  public function index()
  {
    $post = $this->postModel->getPosts();
    $data = [
      "posts" => $post,
    ];
    $this->View("posts/index", $data);
  }

  //Add Posts Function
  public function add()
  {
    //   Check for a POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //Sanitaize Post
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        "title" => htmlspecialchars(trim($_POST["title"])),
        "body" => htmlspecialchars(trim($_POST["body"])),
        "user_id" => $_SESSION["user_ID"],
        "title_err" => "",
        "body_err" => "",
      ];

      //--VALIDATION--
      #TITLE VALIDATION
      if (empty($data["title"])) {
        $data["title_err"] = "Title cannont be Left Empty";
      }
      #BODY VALIDATE
      if (empty($data["body"])) {
        $data["body_err"] = "Body cannont be Left Empty";
      }

      //Check if there is any Errors
      if (empty($data["title_err"]) && empty($data["title_err"])) {
        if ($this->postModel->addposts($data)) {
          flash_msg("post_added", "Post Has been Added Susscessfully");
          redirect("posts");
        } else {
          die("Something Went Wrong");
        }
      } else {
        $this->View("posts/add", $data);
      }
    } else {
      $data = [
        "title" => "",
        "body" => "",
      ];
      $this->View("posts/add", $data);
    }
  }
  public function show($id)
  {
    $post = $this->postModel->getPost($id);
    $user = $this->userModel->getUserId($post->user_id);
    $data = [
      "post" => $post,
      "user" => $user,
    ];
    $this->View("posts/show", $data);
  }
  public function edit($id)
  {
    //   Check for a POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //Sanitaize Post
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      $data = [
        "id" => $id,
        "title" => htmlspecialchars(trim($_POST["title"])),
        "body" => htmlspecialchars(trim($_POST["body"])),
        "user_id" => $_SESSION["user_ID"],
        "title_err" => "",
        "body_err" => "",
      ];

      //--VALIDATION--
      #TITLE VALIDATION
      if (empty($data["title"])) {
        $data["title_err"] = "Title cannont be Left Empty";
      }
      #BODY VALIDATE
      if (empty($data["body"])) {
        $data["body_err"] = "Body cannont be Left Empty";
      }

      //Check if there is any Errors
      if (empty($data["title_err"]) && empty($data["title_err"])) {
        if ($this->postModel->editposts($data)) {
          flash_msg("post_added", "Post Has been Edited Susscessfully");
          redirect("posts");
        } else {
          die("Something Went Wrong");
        }
      } else {
        //Load View With Error
        $this->View("posts/edit", $data);
      }
    } else {
      //Fetch Post
      $post = $this->postModel->getPost($id);
      //Check for the Owner
      if ($post->user_id != $_SESSION["user_ID"]) {
        redirect("posts");
      }
      $data = [
        "id" => $id,
        "title" => $post->title,
        "body" => $post->body,
      ];
      $this->View("posts/edit", $data);
    }
  }
  public function delete($id)
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //Model Call
      if ($this->postModel->deletePost($id)) {
        flash_msg("post_delete", "Your Post has been Deleted Susscesfully. ");
        redirect("posts");
      } else {
        //Something Went Hrorible Wrong
        die("Something Went Wrong");
      }
    } else {
      redirect("posts");
    }
  }
}
?>
