<?php
  namespace App\Model\Classes;
  use \PDO;

  /**
   * Connects with database using mysqli.
   */
  class DbConnect extends EnvHandler {
    /**
     * @var object
     *  Define global $conn to hold connection object after successful authentication with database.
     */
    protected $conn; 
    public function __construct() {
      // Loading enviroment varialble through EnvHandler Class
      parent::__construct();
      $dsn = "mysql:host={$this->credential['server']};dbname={$this->credential['dbName']};charset=UTF8";

      // Stores the Mysqli connection object. 
      try {
        $pdo = new PDO($dsn, $this->credential['sqlUser'], $this->credential['sqlPass']);
        if($pdo) {
            $this->conn= $pdo;
        }
    }
    catch (\PDOException $e) {
        echo $e->getMessage();
        exit;
    }

    }
  }
?>
