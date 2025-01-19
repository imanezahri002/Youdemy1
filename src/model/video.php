<?php
class video extends Cour{

    public function display(){
        $sql="SELECT * FROM cours";
        $conn=Database::getConnection();
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $datas=$stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>