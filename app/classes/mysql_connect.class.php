<?php 

abstract class mysql_connect implements query_sql{ // Not used direct just for inheritance

  /*
    * Create Varibale For Used In Insert Info Connect Database
  */
  private $db_dsn, $db_user, $db_pass, $options;
  
  private $conn; // Container Result The Connect
  private $msg_error; // For Error Messages If Not Connect In Database
  private $stmt;   
  

  public function __construct() {
    /*
      * Get Constant Values Connect Database \ "config.php"
    */
    $this->db_dsn  = DSN; 
    $this->db_user = DB_USER;
    $this->db_pass = DB_PASS;
    $this->options = OPT;

    $this->conn(); // Call Function Connect
  }

  protected function conn() {

    try {

      /*
        * Connect To Database With "PDO Connect"
      */
      $this->conn = new PDO($this->db_dsn, $this->db_user, $this->db_pass, $this->options);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){

      /* If Not Connect Get Message Error */
      $this->msg_error =  'Sory Not Connect In Database : ( ' . $e->getMessage();
      echo $this->msg_error;

    } // End Catch

    return $this->conn;  // Return Resutl Connect

  } //  End Function "conn"

    /*
    * Start Functions Abstract Interface => "database_connect" 
    */
  public function select($colum, $table, $condition = null) {
        // select("SELECT * FROM users WHERE id = 1")
    $this->stmt = $this->conn()->prepare("SELECT {$colum} FROM {$table} $condition");
    return $this->stmt;
    /*
    //  Test Query :
    //  select("*", "users", "");
    */

  }

  public function custom_query($query) {
              // custom_query("Query Here")
    $this->stmt = $this->conn()->prepare("{$query}");
    return $this->stmt;
}



  public function update($table, $colums, $condition = null) {

          // prepare('UPDATE categories SET name = ?, pass = ? WHERE id = ?');
    $this->stmt = $this->conn()->prepare("UPDATE {$table} SET {$colums} {$condition}");
    return $this->stmt;
    /*
    //  Test Query :
    //  update("users", "username = ?, password = ?", WHERE id = ?);
    */

  }

  public function delete($table, $condition = null) {
          // prepare("DELETE FROM categories WHERE cat_id = ?");
    $this->stmt = $this->conn()->prepare("DELETE FROM {$table} {$condition}");
    return $this->stmt;
    /*
    //  Test Query :
    //  delete("users", "WHERE id = 1");
    */

  }

  public function insert($table, $colums, $test_values) {
          // prepare('INSERT INTO categories (name, email) VALUES (:xname, :xmail)');
    $this->stmt = $this->conn()->prepare("INSERT INTO {$table} ({$colums}) VALUES ({$test_values})");
    return $this->stmt;
    /*
    //  Test Query :
    //  insert("users", "username, password, email", ":user, :pass, :mail");
    */

  }

  public function input_string($string) {

    return htmlentities($string);

  }

  function redirecr_page($msg, $path, $time = 3) {

    $time = $time;
    header("refresh:$time;url=$path");
    echo $msg;
    exit(); 
    
  }



  
}