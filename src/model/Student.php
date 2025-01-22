<?php
namespace src\model;
use src\model\User;
use src\model\Database;
use PDO;
use Exception;
require_once __DIR__ . '/User.php';
class Student extends User{

    public static function displayCours(){
        $sql="SELECT c.id AS id,
        c.titre AS titre,
        c.description AS description,
        c.prix AS prix,
        c.type AS type,
        c.image AS image,
        ca.nom AS nom
        FROM cours c 
        JOIN categorie ca ON c.category_id = ca.id ;";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $cours=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cours;


    }
    public static function addStudentCours($idCour,$idStudent){
        $sql="INSERT INTO subscription (student_id) VALUES (cours_id)";
        

    }
}

?>