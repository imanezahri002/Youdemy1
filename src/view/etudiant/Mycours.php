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
if(isset($_GET["id_cour"])){
    $idstudent=$_SESSION["userid"];
    $idcours=$_GET["id_cour"];
    Student::addStudentCours($idcours,$idstudent);

}
?>
<section id="content">
		
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

    <div class="course-grid" style="display: grid;grid-template-columns: auto auto auto; gap:20px;">
        <?php
            $id_user=$_SESSION["userid"];
            $courstudent=Student::displayMycours($id_user);
            foreach ($courstudent as $cour) { ?>

            <div class="course-card">
                    <img class="course-thumbnail" src="<?php echo $cour['image'] ?>">
                    <div class="course-body">
                        <h3 class="course-title"><?php echo $cour['titre'] ?></h3>
                        <p class="course-description"><?php echo $cour['description'] ?></p>
                        <div class="course-meta">
                            <span class="course-price"><?php echo $cour['prix'] ?></span>
                        </div>
                        
                        <a href="#"><button name="inscription" class="choose-button">Afficher</button></a>
                    </div>
            </div>
        <?php }; ?>
        
    </div>

    </main>