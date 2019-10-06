 <?php

  class Database {
    
    private $host = DB_HOST;
    private $username = DB_USERNAME;
    private $passwd = DB_PASSWD;
    private $dbname = DB_NAME;
    private $port = DB_PORT;
    private $charset = DB_CHARSET;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() {
      
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';port=' . $this->port;
      $options = [ 
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'"
      ];

      try {
        
        $this->dbh = new PDO($dsn, $this->username, $this->passwd, $options);
      
      } catch (PDOException $e) {
        
        $this->error = $e->getMessage();
      
      }

    }

    public function query($sql) {
      
      $this->stmt = $this->dbh->prepare($sql);
    
    }

    public function bind($param, $value, $type = null) {
      
      if (!is_null($type)) {
        
        switch(true) {

          case is_int($value):
            $type = PDO::PARAM_INT;
            break;

          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;

          default:
            $type = PDO::PARAM_STR;

        }

      } else {

        $type = PDO::PARAM_NULL;

      }

      $this->stmt->bindValue($param, $value, $type);

    }

    public function execute() {

      return $this->stmt->execute();

    }

    public function all()
    {

      $this->execute();
      return $this->stmt->fetchAll();
    
    }

    public function get()
    {

      $this->execute();
      return $this->stmt->fetch();
    
    }

    public function rowCount()
    {

      return $this->stmt->rowCont();
    
    }

  }
  
