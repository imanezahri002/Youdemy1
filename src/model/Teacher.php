<?php
namespace src\model;
use src\model\Cour;
use src\model\Database;
use PDO;
use Exception;

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
    public function displayCours(){
        $sql="SELECT * FROM cours c INNER JOIN categorie ca ON c.category_id= ca.id;";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $cours=$stmt->execute();
        return $cours;
    }
}
?>