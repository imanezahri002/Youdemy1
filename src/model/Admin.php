<?php
namespace src\model;
use src\model\User;
use src\model\Cour;
use src\model\Database;
use PDO;
use Exception;
require_once __DIR__ . '/User.php';

class Admin extends User{



    public function deleteUser($id){
        $sql="DELETE FROM user WHERE id=:id";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute([
            ":id"=>$id
        ]);
    }
    public function deleteCour($id){
        //deleete from courstag
        $sql1="DELETE FROM courstag WHERE idcours=:id";
        $conn1=Database::getConnection();
        $stmt1=$conn1->prepare($sql1);
        $stmt1->execute([
            ":id"=>$id
        ]);
        //delete from cours
        $sql2="DELETE FROM cours WHERE id=:id";
        $conn2=Database::getConnection();
        $stmt2=$conn2->prepare($sql2);
        $stmt2->execute([
            ":id"=>$id
        ]);

    }
}
?>