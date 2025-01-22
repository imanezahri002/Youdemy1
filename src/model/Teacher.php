<?php
namespace src\model;
use src\model\User;
use src\model\Cour;
use src\model\Database;
use PDO;
use Exception;
require_once __DIR__ . '/User.php';
class Teacher extends User{

    public function addCours($title,$description,$type,$img,$contenu,$price,$userid,$categorie,$tagSel){

        $sql="INSERT INTO cours (titre,contenu,user_id,description,type,image,prix,category_id ) VALUES (:titre,:contenu,:user_id,:description,:type,:image,:prix,:category_id)";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ":titre"=>$title,
            ":contenu"=>$contenu,
            ":user_id"=>$userid,
            ":description"=>$description,
            ":type"=>$type,
            ":image"=>$img,
            ":prix"=>$price,
            ":category_id"=>$categorie

        ]);
        $courseId = $conn->lastInsertId();
        if (!empty($tagSel)) {
            $sql="INSERT INTO courstag (idcours,idtag) VALUES (:idcours,:idtag)";
            $stmt=$conn->prepare($sql);
            foreach ($tagSel as $tagId) {
            $stmt->execute([
                ":idcours" => $courseId,
                ":idtag" => $tagId
            ]);
        }

    }
}
    public function displayCours($id){
        $sql="SELECT c.id AS id,c.titre AS titre,c.description AS description,c.prix AS prix,c.type AS type,ca.nom AS nom FROM cours c INNER JOIN categorie ca ON c.category_id = ca.id WHERE c.user_id=:id;";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ":id"=>$id
        ]);
        $cours=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cours;
    }
    public function deleteCour($id){
        $sql2="DELETE FROM cours WHERE id=:id";
        $conn2=Database::getConnection();
        $stmt2=$conn2->prepare($sql2);
        $stmt2->execute([
            ":id"=>$id
        ]);
    }
}
?>