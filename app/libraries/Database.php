<?php
    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $dbname = DB_NAME;
        
        private $dbh;
        private $statement;
        private $error;

        public function __construct(){
            $dsn = 'mysql:host ='.$this->host.';dbname='.$this->dbname;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
        
            //instantiate PDO
            try{
                $this-> dbh = new PDO($dsn, $this->user, $this->password, $options);
            }
            catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this-> error;
            }     
        }

        //prepared statements
        public function query($sql){
            $this->statement = $this->dbh->prepare($sql);
        }

        //bind parameters
        public function bind($param,$value,$type=null){
            if(is_null($type)){
              switch(true){
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
            
            $this->statement->bindValue($param, $value, $type);
        }
            
        //execute the prepared statement
         public function execute(){
            return $this->statement->execute();
        }

        //get multiple records as the result
        public function resultSet(){
            $this->execute();
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }

        //get single record as the single record
        public function single(){
            $this->execute();
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }

        //get row count
        public function rowCount(){
            return $this->statement->rowCount();
        }


    }

  

?>