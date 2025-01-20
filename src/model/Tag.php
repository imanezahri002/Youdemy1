<?php
namespace src\model;
include __DIR__ . '/../../vendor/autoload.php';
use src\model\Database;
use PDO;
use Exception;


class Tag{
    private $id;
    private $nom;

    public function __construct($id,$nom){
        $this->id=$id;
        $this->nom=$nom;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom=$nom;
    }
    public function add(){
        $sql="INSERT INTO tag (nom) VALUES (:nom)";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([':nom'=>$this->nom]);
    }
    
    public function display(){

        $sql="SELECT * FROM tag";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $datas=$stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($datas as $info) {
            echo '<tr>
            <td>'.$info["nom"].' </td>
            <td>
                <a href="../../view/admin/tags.php?edit_id='.$info['id'].'"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3c91e6;"></i></a>
                <a href="../../view/admin/tags.php?id='.$info['id'].'"><i class="fa-solid fa-trash fa-xl" style="color: #ff425f;"></i></a>
            </td>
        </tr>';
    }
    }

    public function delete(){
        $sql="DELETE FROM tag WHERE id=:id";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([':id'=>$this->id]);
    }

    public function getById() {
        $sql = "SELECT * FROM tag WHERE id = :id";
        $conn = Database::getConnection();
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $this->id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit(){
        $sql="UPDATE tag SET nom=:nom WHERE id=:id";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([':nom'=>$this->nom,
        'id'=>$this->id]);
    }
    public function tags(){
        $sql="SELECT * FROM tag";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $tags=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tags;
    }
}

?>