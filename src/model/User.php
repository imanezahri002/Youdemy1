<?php
namespace app\model;

use app\config\Database;
use PDO;

class User{
    private $id;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $role;

   
        public function __call($name, $arguments)
        {   if($name == "construct"){
                if(count($arguments)== 2)
                {
                    $this->lastname=$arguments[0];
                    $this->firstname=$arguments[1];
                }
                if(count ($arguments)== 4){
                    $this->firstname=$arguments[0];
                    $this->email=$arguments[1];     
                    $this->password=$arguments[2];
                    $this->lastname =$arguments[3];
                    $this->role=$arguments[4];  
                }}
                if($name == "instanceWidthPasswordAndEmail"){
                if(count ($arguments)== 2){
                    $this->email=$arguments[0];     
                    $this->password=$arguments[1];
                }}
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
        
}
?>