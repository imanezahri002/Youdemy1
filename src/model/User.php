<?php
namespace src\model;
include __DIR__ . '/../../vendor/autoload.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
use src\model\Database;
use PDO;
use Exception;
class User{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $email;
    protected $password;
    protected $role;
    protected $status;

   
        public function __construct($firstname,$lastname,$email,$password,$role,$status){
            
            $this->firstname=$firstname;
            $this->lastname=$lastname;
            $this->email=$email;
            $this->password=$password;
            $this->role=$role;
            $this->status=$status;
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

   public static function display(){
        $sql = "SELECT * FROM user WHERE role != 'admin'";
        $conn=Database::getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
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
            

            $sql = "INSERT INTO user (nom, prenom, email, password, role,status) VALUES (:firstname, :lastname, :email, :password, :role,:status)";
            $conn = Database::getConnection();
            $stmt = $conn->prepare($sql);
            
            $stmt->execute([
                ':firstname' => $this->firstname,
                ':lastname' => $this->lastname,
                ':email' => $this->email,
                ':password' => $this->password,
                ':role' => $this->role,
                ':status'=>$this->role == 'teacher' ? 'desactive' : 'active'
            ]);
           
            if($this->role=='student'){
                header ("location: ../view/etudiant/index.php");
            }else  {header("location:../view/inscription.php");}
        }
        public function login(){
            $conn = Database::getConnection();
            $sql="SELECT * FROM user WHERE email=:email";
            $stmt=$conn->prepare($sql);
            $stmt->execute([":email"=>$this->email]);
            $useR=$stmt->fetch();
            if($useR && password_verify($this->password,$useR["password"])){
               $_SESSION["userid"]=$useR["id"];
               $_SESSION["userName"]=$useR["nom"];
               $_SESSION["email"]=$useR["email"];
               $_SESSION["role"]=$useR["role"];
               $_SESSION["status"]=$useR["status"];
               $_SESSION["message"]="";
               if ($useR["role"]=="admin") {
                    $_SESSION["message"]="";
                   header("location: ../view/admin/dashboard.php");
                }else if($useR["role"]=="teacher" && $useR["status"]=="active"){
                    $_SESSION["message"]="";
                 header("location: ../view/enseignant/index.php");

               }else if($useR["role"]=="student" && $useR["status"]=="active"){
                    $_SESSION["message"]="";
                header ("location: ../view/etudiant/index.php");
               }else {
                $_SESSION["message"]="veuillez attender l'activation de votre compte Merci pour votre comprehension";
                header ("location: ../view/connexion.php");
                }
            }
        }
        public static function logout() {
            session_destroy();
            header('location: ../view/connexion.php');
            exit;
        }
        public function updateStatus($id,$status){
            $sql="UPDATE user SET status=:status WHERE id=:id";
            $conn=Database::getConnection();
            $stmt=$conn->prepare($sql);
            $stmt->execute([
                ":status"=>$status,
                ":id"=>$id
            ]);
        }
      
}
?>