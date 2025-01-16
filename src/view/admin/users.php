<?php

use src\model\User;
require_once __DIR__ . '/../../model/User.php';

if(!isset($_SESSION["email"])){
    header("location: ../connexion.php");
};
if ($_SESSION["role"] != 'admin') {
    header("location: ../connexion.php");
};
include 'layouts/header.php';
include 'layouts/sidebar.php';
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
							<a href="#">Users</a>
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
								<th>firstName</th>
								<th>lastName</th>
                                <th>email</th>
                                <th>role</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                    $user=new User("","","","","","");
                    $datas=$user->display();
                    foreach ($datas as $data) {?>
                        
							<tr>
                            <td><?php echo $data["nom"] ?></td>
                            <td><?php echo $data["prenom"]?></td>
                            <td><?php echo $data["email"]?></td>
                            <td><?php echo $data["role"]?></td>
                            <td><span class="status completed"><?php echo $data["status"]?></span></td>
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
	<!-- CONTENT -->
	<?php
    include 'layouts/footer.php';
    ?>

