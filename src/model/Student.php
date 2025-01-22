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

        $rqt="SELECT * FROM subscription WHERE student_id=:id_st AND cours_id=:id_cr";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($rqt);
        $stmt->execute([
            ":id_st"=>$idStudent,
            ":id_cr"=>$idCour
        ]);
        if($stmt->rowCount() == 0){

            $sql="INSERT INTO subscription (student_id,cours_id) VALUES (:id_st,:id_cr)";
            $conn=Database::getConnection();
            $stmt=$conn->prepare($sql);
            $stmt->execute([
                ":id_st"=>$idStudent,
                ":id_cr"=>$idCour
            ]);
        }

    }
    public static function displayMycours($id){
        $sql="SELECT * FROM subscription s 
                JOIN cours c ON s.cours_id= c.id  
                WHERE s.student_id=:id";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ":id"=>$id
        ]);
        $cours=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cours;
    }
    
}

?>