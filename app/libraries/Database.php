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
      
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';port=' . $this->port . ';charset=' . $this->charset;
      $options = [ 
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
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
      
      if (is_null($type)) {
        
        switch(true) {

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

    public function executeWithParams($params = []) {

      return $this->stmt->execute($params);

    }

    public function all()
    {

      $this->stmt->execute();
      return $this->stmt->fetchAll();
    
    }

    public function get()
    {

      $this->stmt->execute();
      return $this->stmt->fetch();
    
    }

    public function rowCount()
    {

      return $this->stmt->rowCont();
    
    }

    public function stmtNull()
    {

      return $this->stmt = null;
    
    }

  }
  
