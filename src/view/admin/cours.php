<?php
use src\model\Admin;
use src\model\Teacher;
require_once __DIR__ . '/../../model/Admin.php';
require_once __DIR__ . '/../../model/Teacher.php';
include './layouts/sidebar.php';
include './layouts/header.php';

if(!isset($_SESSION["email"])){
    header("location: ../connexion.php");
};
if ($_SESSION["role"] != 'admin') {
    header("location: ../connexion.php");
};

if(isset($_POST["delete"])){
	$id=$_POST["id_delete"];
	$cc=new Admin("","","","","","");
	$cc->deleteCour($id);
	header("location:./cours.php");
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
        <!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
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
						<h3>Recent Orders</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
                        <thead>
							<tr>
								<th>Title</th>
								<th>Description</th>
								<th>Category</th>
								<th>Type</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
								<?php
									$course=new Teacher("","","","","","");
									$courses=$course->displayCours();
									 
									foreach ($courses as $course) {
										?>
									
							<tr>
								<td><?php echo $course["titre"] ?></td>
								<td><?php echo $course["description"] ?></td>
								<td><?php echo $course["nom"] ?></td>
								<td><?php echo $course["type"] ?></td>
								<td><span class="status completed"><?php echo $course["prix"] ?></span></td>
								<td>
							        <form action="#" method="POST">
										<input type="hidden" name="id_delete" value="<?php echo $course['id'];?>">
								    <button type="submit" name="delete" style="border:none;background-color:none;cursor:pointer;"><i class="fa-solid fa-trash fa-lg" style="color: #f31b1b;"></i></button>
									</form>
							</td>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>
				
			</div>
</main>
<?php include './layouts/footer.php';
?>