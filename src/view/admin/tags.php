<?php

use src\model\Tag;
require_once __DIR__ . '/../../model/Categorie.php';
session_start();
if(!isset($_SESSION["email"])){
    header("location: ../connexion.php");
};
if ($_SESSION["role"] != 'admin') {
    header("location: ../connexion.php");
};
include 'layouts/header.php';
include 'layouts/sidebar.php';
//pour delete
if(isset($_GET["id"])){
	$id = $_GET["id"];
	$delete=new Tag($id,null);
	$delete->delete();
}

//pour ajout
if (isset($_POST["add"])) {
            $nomTag = $_POST["nomTag"];
            $tg = new Tag("", $nomTag);
            $tg->add();
            header("location:./tags.php");
}


if (isset($_GET["edit_id"])) {
    $editId = $_GET["edit_id"];
    $editTag = new Tag($editId, "");
    $editTag = $editTag->getById();
}

if (isset($_POST["edit"])) {
    $id = $_POST["editId"];
    $nomTag = $_POST["nomTag"];
    $tg = new Tag($id, $nomTag);
    $tg->edit();
    header("location: ./tags.php");
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
							<a href="#">Tags</a>
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
						<h3>Recent Tags</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<form action="" method="POST" style="margin-bottom:30px">
                        <input type="hidden" name="editId" value="<?php echo isset($editTag['id']) ? $editTag['id'] : ''; ?>">
						<input type="text" style="width:250px;height:30px" placeholder="Nom Tag" name="nomTag" value="<?php echo isset($editTag['nom']) ? $editTag['nom'] : ''; ?>">
						<button type="submit" style="width:150px;height:30px" name="<?php echo isset($editTag['id']) ? 'edit' : 'add'; ?>">
                        <?php echo isset($editTag['id']) ? 'Edit' : 'Add'; ?>
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
                        $tg=new Tag("","");
                        $tg->display();
                        ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<?php
    include 'layouts/footer.php';
    ?>

