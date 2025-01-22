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

      
    <!-- Contenu principal -->
<main class="main-content">
    <h1>HELLO <span style="color:#FD7238"><?php if(isset($_SESSION["userName"])){echo $_SESSION["userName"];}else{echo "";}?></span> </h1>
    <h2 class="titleC">Cours</h2>
    <div class="course-grid" style="display: grid;grid-template-columns: auto auto auto;gap:20px;">
        <?php
            $courstudent=Student::displayCours();
            foreach ($courstudent as $cour) { ?>

            <div class="course-card">
                    <img class="course-thumbnail" src="<?php echo $cour['image'] ?>">
                    <div class="course-body">
                        <h3 class="course-title"><?php echo $cour['titre'] ?></h3>
                        <p class="course-description"><?php echo $cour['description'] ?></p>
                        <div class="course-meta">
                            <span class="course-teacher"><?php echo $cour['nom'] ?></span>
                            <span class="course-price"><?php echo $cour['prix'] ?></span>
                        </div>
                        
                        <a href="./Mycours.php?id_cour=<?php echo $cour['id']; ?>"><button name="inscription" class="choose-button">S'inscrire</button></a>
                    </div>
            </div>
        <?php }; ?>
        
    </div>
</main>
</section>
<?php
include './layouts/footer.php';
?>