<?php
namespace src\view;
include '../../../vendor/autoload.php';
include './layouts/sidebar.php';
include './layouts/header.php';
use src\model\Video;
use src\model\Pdf;


    
    // include '../../model/Video.php';
    // include '../../model/Pdf.php';

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

