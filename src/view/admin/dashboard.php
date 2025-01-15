<?php
session_start();
if(!isset($_SESSION["email"])){
    header("location:../connexion.php");
};
if ($_SESSION["role"]!= 'admin') {
    header("location: ../connexion.php");
};

?>