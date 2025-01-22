<?php

use src\model\Student;

include '../../../vendor/autoload.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION["email"])){
    header("location: ../connexion.php");
};
if ($_SESSION["role"] != 'student') {
    header("location: ../connexion.php");
};
include './layouts/header.php';
include './layouts/aside.php';

?>
<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>

    <main class="main-content">
    <h1>HELLO <span style="color:#FD7238"><?php if(isset($_SESSION["userName"])){echo $_SESSION["userName"];}else{echo "";}?></span> </h1>
    <h2 class="titleC">Cours</h2>

    
</main>