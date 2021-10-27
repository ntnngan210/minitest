<?php 
namespace App\Http\Controllers;


use App\User;


class HomeController {
    private $user ;
    public function __construct(){
        $this->user = new User();
     
    }
    public function index() {

        $query = "SELECT * FROM users " ;
        $result = $this->user->select($query);
        return $result;
    }
    public function insert_user($Name,$Phone,$Email,$Age,$Des){
        $Name = mysqli_real_escape_string($this->user->conn,$Name);
        $Phone = mysqli_real_escape_string($this->user->conn,$Phone);
        $Email = mysqli_real_escape_string($this->user->conn,$Email);
        $Age = mysqli_real_escape_string($this->user->conn,$Age);
        $Des = mysqli_real_escape_string($this->user->conn,$Des);
        $query = "INSERT INTO users(Name,Phone,Email,Age,Des) VALUES('$Name','$Phone','$Email','$Age','$Des')" ;
        $result = $this->user->insert($query);
        
        return $Name.$Phone.$Email.$Age.$Des;
    }
}



?>