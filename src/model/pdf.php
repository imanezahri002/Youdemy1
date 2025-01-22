<?php

namespace src\model;
include __DIR__ . '/../../vendor/autoload.php';
use src\model\Cour;



class Pdf extends Cour
{
    public function displayContent() {
        $sql="SELECT 
        c.id,
        c.titre,
        c.description,
        c.prix,
        c.contenu,
        cat.nom as category,
        u.nom as teacher,
        t.nom as tagName
        FROM cours c
        JOIN categorie cat ON c.category_id = cat.id
        join user u ON u.id=c.user_id
        join courstag ctag on ctag.idcours = c.id
        join tag t ON t.id = ctag.idtag
        WHERE c.id = :id ;
        ";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ":id"=>$this->id
        ]);
         $course=$stmt->fetchAll(\PDO::FETCH_ASSOC);
         
         $coursegroup=[];
         $tagname=[];
         $coursegroup['id']=$course[0]['id'];
         $coursegroup['titre']=$course[0]['titre'];
         $coursegroup['description']=$course[0]['description'];
         $coursegroup['prix']=$course[0]['prix'];
         $coursegroup['contenu']=$course[0]['contenu'];
         $coursegroup['category']=$course[0]['category'];
         $coursegroup['teacher']=$course[0]['teacher'];
         $tagname= array_column($course,'tagName');
         $coursegroup['tag']=$tagname;
        //  print_r($coursegroup);

       echo '          
        <div class="course-details">
            <h1 class="course-title"> '.$coursegroup["titre"].'</h1>
            <p class="course-description"> '.$coursegroup["description"].'</p>
            <div class="course-info">
                <span class="course-price"> '.$coursegroup["prix"].'</span>
                <span class="course-category">'. $coursegroup["category"].'</span>
            </div>
                            <div class="course-tags">
                    <strong>Tags :</strong>';
                    
                    foreach ($coursegroup["tag"] as $tag) {
                        echo '<span class="tag">'. $tag.' </span> ';
                    }
                echo  '
                  
                </div>
                <div class="course-teacher">
                    <strong>Enseignant :</strong>  '.$coursegroup["teacher"].'
                </div>
            <div class="course-content">
                <iframe src="'  . $coursegroup["contenu"] . '" type="application/pdf" width="100%" height="600px" />
            </div>

            </div>
      ';
   }
}
?>