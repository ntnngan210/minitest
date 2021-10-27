<?php 

namespace App;

use mysqli;

class User{
  
   public $conn ;
   private $host = 'localhost';
   private $dbname = 'minitest';
   private $user = 'root';
   private $pass = "";
    public function __construct(){
        $this->connectDB();
        $this->conn ;
        
    }
    private function connectDB(){
        $this->conn = new \mysqli($this->host, $this->user, $this->pass, 
        $this->dbname);
       if(!$this->conn){
         $this->error ="Connection fail".$this->conn->connect_error;
        return false;
       }
    }
    public function select($query){
        $result = $this->conn->query($query) or 
        die($this->link->error.__LINE__);
        $x[]=null;
        if ($result) {
 
            while ($row=mysqli_fetch_assoc($result)) {
               $x[]=$row;
            }
            $object = (object) $x;
            return $object;
    
            mysqli_free_result($result);
        }
    }
    public function insert($query){
        $result = $this->conn->query($query)or 
        die($this->link->error.__LINE__);
        if($result){
           
            return $result;
        }else{
            return false;
        }

    }
    
}

?>