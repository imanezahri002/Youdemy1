<?php
namespace src\view;

include '../../../vendor/autoload.php';
include './layouts/aside.php';
include './layouts/header.php';

use src\model\Video;
use src\model\Pdf;


if(isset($_GET["id_detail"])&&isset($_GET["type"])){
    $id=$_GET["id_detail"];
    $type=$_GET["type"];
    if($type=="video"){
        $obj=new Video($id,"","","","","","");
    }else if($type=="pdf"){
       $obj=new Pdf($id,"","","","","","");
    }
       $obj->displayContent();
}

?>