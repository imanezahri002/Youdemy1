<?php
namespace src\model;
include_once $_SERVER['DOCUMENT_ROOT']."/YouDemy1/vendor/autoload.php";

use src\model\Database;
use PDO;
use Exception;
class User{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $role;

   
        public function __construct($firstname,$lastname,$email,$password,$role){
            $this->firstname=$firstname;
            $this->lastname=$lastname;
            $this->email=$email;
            $this->password=$password;
            $this->role=$role;
        }
    
    public function setFirstName($firstname){
        $this->firstname=$firstname;
    }
    public function setLastName($lastname){
        $this->lastname=$lastname;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setPassword($password){
        $this->password=$password;
    }
    
    public function setRole($role){
        $this->role = $role;
    }
    public function getFirstName(){
        return $this->firstname;
    }
    public function getLastName(){
        return $this->lastname;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getRole(){    
        return $this->role;
    }

   public function display(){
        $sql = "SELECT nom, prenom, email, password, role FROM user";
        $conn=Database::getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
        public function add() {
            $conn = Database::getConnection();
            $sql="SELECT * FROM user WHERE email=:email";
            $stmt = $conn->prepare($sql);
            $stmt->execute([":email" => $this->email]);
            $useR = $stmt->fetch();
            if ($useR) {

                throw new Exception("the user is already registred");
            }
            

            $sql = "INSERT INTO user (nom, prenom, email, password, role) VALUES (:firstname, :lastname, :email, :password, :role)";
            $conn = Database::getConnection();
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':firstname' => $this->firstname,
                ':lastname' => $this->lastname,
                ':email' => $this->email,
                ':password' => $this->password,
                ':role' => $this->role
            ]);
        }
        public function login(){
            $conn = Database::getConnection();
            $sql="SELECT * FROM user WHERE email=:email";
            $stmt=$conn->prepare($sql);
            $stmt->execute([":email"=>$this->email]);
            $useR=$stmt->fetch();
            if($useR && password_verify($this->password,$useR["password"])){
               $_SESSION["userid"]=$useR["id"];
               $_SESSION["email"]=$useR["email"];
               $_SESSION["role"]=$useR["role"];
               print_r($_SESSION["role"]);
            //    if ($useR["type"]=="admin") {
            //        header("location:./Admin/admin.php");
            //     }else{
            //      header("location:./Admin/client.php");
    
            //    }
    
            }
        }
}
?>