<?php

session_start();
if(!isset($_SESSION["email"])){
    header("location: ../connexion.php");
};
if ($_SESSION["role"] != 'teacher') {
    header("location: ../connexion.php");
};
include '../layouts/header.php';
include '../layouts/sidebar.php';

?>








<?php
include '../footer.php';
?>