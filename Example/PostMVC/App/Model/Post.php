<?php
class Post
{
  private $db;
  public function __construct()
  {
    $this->db = new DB();
  }
  public function getPosts()
  {
    $this->db->query("SELECT * ,
                    posts.id as postId,
                    users.id as userId,
                    posts.created_at as postCreated,
                    users.created_at as userCreated
                    FROM posts
                    INNER JOIN users
                    ON posts.user_id = users.id
                    ORDER BY posts.created_at DESC
                    ");
    $results = $this->db->resultSet();
    return $results;
  }
  public function addposts($data)
  {
    // Query String
    $this->db->query(
      'INSERT INTO posts (title,user_id,body) VALUES(:title,:user_id ,:body)'
    );

    //Bind Values
    $this->db->bind(':title', $data["title"]);
    $this->db->bind(':user_id', $data["user_id"]);
    $this->db->bind(':body', $data["body"]);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  //Get Whole Post
  public function getPost($id)
  {
    $this->db->query("SELECT * FROM posts WHERE id= :id");
    // Bind Value
    $this->db->bind(":id", $id);
    //Return Row
    $row = $this->db->single();
    return $row;
  }
  public function editposts($data)
  {
    // Query String
    $this->db->query(
      'UPDATE posts SET title = :title ,body = :body WHERE id = :id'
    );

    //Bind Values
    $this->db->bind(':id', $data["id"]);
    $this->db->bind(':title', $data["title"]);
    $this->db->bind(':body', $data["body"]);

    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
  public function deletePost($id)
  {
    //Query
    $this->db->query("DELETE FROM posts WHERE id = :id");
    //Binding Values
    $this->db->bind(":id", $id);
    // Checking If it is exicuted or not
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
?>
