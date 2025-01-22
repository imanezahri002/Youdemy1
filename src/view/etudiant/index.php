<?php

session_start();
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
    <div class="course-grid">

        <!-- Carte de cours 2 -->
            <div class="course-card">
                    <img class="course-thumbnail" src="cours-js-max.jpg" alt="Thumbnail du cours">
                    <div class="course-body">
                        <h3 class="course-title">Titre du Cours 2</h3>
                        <p class="course-description">Une brève description du cours. Ce cours couvre les bases de...</p>
                        <div class="course-meta">
                            <span class="course-teacher">Enseignant : Jane Smith</span>
                            <span class="course-price">59,99 €</span>
                        </div>
                        <div class="course-tags">
                            <span class="tag">Design</span>
                            <span class="tag">UI/UX</span>
                        </div>
                        <button class="choose-button">S'inscrire</button>
                    </div>
            </div>

        
    </div>
</main>
</section>
<?php
include './layouts/footer.php';
?>