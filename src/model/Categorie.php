<?php
namespace src\model;
include_once $_SERVER['DOCUMENT_ROOT']."/YouDemy1/vendor/autoload.php";
session_start();
use src\model\Database;
use PDO;
use Exception;

class Categorie{
        private $id;
        private $nom;

        public function __construct($id,$nom){
            $this->nom=$nom;
            $this->id=$id;
        }
        public function getNom(){
            return $this->nom;
        }
        public function setNom($nom){
            $this->nom=$nom;
        }

        public function add(){
            $sql="INSERT INTO categorie (nom) VALUES (:nom)";
            $conn=Database::getConnection();
            $stmt=$conn->prepare($sql);
            $stmt->execute([':nom'=>$this->nom]);
        }
        public function display(){
            $sql="SELECT * FROM categorie";
            $conn=Database::getConnection();
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $data=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        public function delete(){
            $sql="DELETE FROM categorie WHERE id=:id";
            $conn=Database::getConnection();
            $stmt=$conn->prepare($sql);
            $stmt->execute([':id'=>$this->id]);
        }
        public function edit(){
            $sql="UPDATE categorie SET nom=:nom WHERE id=:id";
            $conn=Database::getConnection();
            $stmt=$conn->prepare($sql);
            $stmt->execute([':nom'=>$this->nom,
            'id'=>$this->id]);
        }

}
?>