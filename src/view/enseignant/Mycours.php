<?php

session_start();
if(!isset($_SESSION["email"])){
    header("location: ../connexion.php");
};
if ($_SESSION["role"] != 'teacher') {
    header("location: ../connexion.php");
};
include './layouts/header.php';
include './layouts/sidebar.php';


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
        <main>
			<div class="head-title">
				<div class="left">

					<h1>HELLO <span style="color:#3C91E6"><?php if(isset($_SESSION["userName"])){echo $_SESSION["userName"];}else{echo "";}?></span></h1>
					<h3>Dashboard</h3>
					<ul class="breadcrumb">
						<li>
                        <a href="#" style="text-decoration:none">Dashboard</>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#" style="text-decoration:none">Home</a>
						</li>
					</ul>
				</div>
			</div>
            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Cours</h3>
						<!-- <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i> -->
                        <form action="" method="POST">
                        <button name="add" type="submit" style="background-color:#3C91E6;color:#ffff;width:70px;height:30px;border-radius:20px;border:none;cursor:pointer" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add  <i class="fa-solid fa-plus fa-lg" style="color:rgb(255, 255, 255);"></i>
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout des cours</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

            <div class="container mt-2">
                    <form id="course-form" class="bg-light p-4 rounded shadow">
                        <div class="mb-3">
                            <label for="course-title" class="form-label">Titre du cours</label>
                            <input type="text" class="form-control" id="course-title" required>
                        </div>

                        <div class="mb-3">
                            <label for="course-description" class="form-label">Description</label>
                            <textarea class="form-control" id="course-description" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="course-price" class="form-label">Prix (€)</label>
                            <input type="number" class="form-control" id="course-price" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="course-type" class="form-label">Type</label>
                            <select class="form-select" id="course-type" required>
                                <option value="video">Vidéo</option>
                                <option value="pdf">PDF</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="course-category" class="form-label">Catégorie</label>
                            <select class="form-select" id="course-category" required>
                                <option value="developpement">Développement Web</option>
                                <option value="design">Design</option>
                                <option value="marketing">Marketing</option>
                                <option value="business">Business</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="course-tags-input" class="form-label">Tags</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="course-tags-input" placeholder="Ajouter un tag">
                                <button type="button" class="btn btn-primary" id="add-tag-btn">Ajouter</button>
                            </div>
                            <div id="tags-list" class="d-flex flex-wrap gap-2 mt-2"></div>
                        </div>

                        <div class="mb-3">
                            <label for="course-content" class="form-label">Contenu</label>
                            <input type="text" class="form-control" id="course-price" required placeholder="url vers video ou pdf">
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" name="save">Ajouter</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status process">Process</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</main>
	</section>
<?php
include './layouts/footer.php';
?>