<?php
/*
 * PDO Database Class
 * Connect to database
 * Create prepared statements
 * Bind values
 * Return rows and results
 * This class must be Extended By all the Models in order to Interact with the DataBase
 */
 class DB
{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASSWORD;
  private $dbname = DB_NAME;

  private $dbh;
  private $stmt;
  private $error;

  public function __construct()
  {
    // Set DSN
    $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    // Create PDO instance
    try {
      $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }

  /**
   * Function To Prepare a SQL Statement.
   *
   * @param [type] $sql
   * @return void
   */
  public function query($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  /**
   * Function to bindValues must be invoked after Preparing
   * a Statment
   *
   * @param [type] $param
   * @param [type] $value
   * @param [type] $type
   * @return void
   */
  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  /**
   * Function to Execute a SQL Statement 
   * Returns True on Success and False on Failure. 
   * @return void
   */
  public function execute()
  {
    return $this->stmt->execute();
  }

  /**
   * Function to get result set an Array of Objects from the Current DataBase
   *
   * @return void
   */ 
  public function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  /**
   * Function to get a Single record as an Object from the Current DataBase
   *
   * @return void
   */
 
  public function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  /**
   * Function to get number of rows in the Current DataBase
   *
   * @return void
   */
  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}
