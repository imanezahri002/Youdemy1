<?php

use src\model\Categorie;
require_once __DIR__ . '/../../model/Categorie.php';

if(!isset($_SESSION["email"])){
    header("location: ../connexion.php");
};
if ($_SESSION["role"] != 'admin') {
    header("location: ../connexion.php");
};
include 'layouts/header.php';
include 'layouts/sidebar.php';

if(isset($_GET["id"])){
	$id = $_GET["id"];
	$delete=new Categorie($id,null);
	$delete->delete();
	header("location: ./categories.php");
}
if(isset($_POST["add"])){
	$nomCat=$_POST["nomCat"];
	$cat=new Categorie("",$nomCat);
	$cat->add();
	header("location:./categories.php");
}
if (isset($_GET["edit_id"])) {
    $editId = $_GET["edit_id"];
    $editCat = new Categorie($editId, "");
    $editCat = $editCat->getById();
}

if (isset($_POST["edit"])){
	$editId=$_POST["edit_id"];
	$editNom=$_POST["nomCat"];
	$editCat=new Categorie($editId,$editNom);
	$editCat->edit();
	header("location: ./categories.php");
	exit();
}
?>

	<!-- CONTENT -->
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
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Categories</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Categories</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<form action="" method="POST" style="margin-bottom:30px">
						<input type="hidden" name="edit_id" value="<?php echo isset($editCat['id']) ? $editCat['id'] : ''; ?>">
						<input type="text" style="width:250px;height:30px" placeholder="Nom Categorie" name="nomCat" value="<?php echo isset($editCat['nom']) ? $editCat['nom'] : ''; ?>">
						<button type="submit" style="width:150px;height:30px" name="<?php if (isset($editCat['id'])) { echo 'edit';} else {echo 'add';}?>">
							<?php	if (isset($editCat['id'])) { echo 'edit';} else {echo 'add';} ?>
						</button>
					</form>
					<table>
						<thead>
							<tr>
								<th>nom</th>
								<th>Options</th>
							</tr>
						</thead>
						<tbody>
						<?php
                    $cat=new Categorie("","");
                    $datas=$cat->display();
                    foreach ($datas as $data) {?>
							<tr>
                            <td><?php echo $data["nom"] ?></td>
                            <td>
                                <a href="categories.php?edit_id=<?=$data['id']?>"><i class="fa-solid fa-pen-to-square fa-xl" style="color: #3c91e6;"></i></a>
                                <a href="categories.php?id=<?=$data['id']?>"><i class="fa-solid fa-trash fa-xl" style="color: #ff425f;"></i></a>
                            </td>
                        </tr>
                   <?php }
                    ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<?php
	?>
	<!-- CONTENT -->
	<?php
    include 'layouts/footer.php';
    ?>

