<?php
use src\model\Tag;
use src\model\Categorie;

use src\model\Teacher;

require_once __DIR__ . '/../../model/Tag.php';
require_once __DIR__ . '/../../model/Categorie.php';

require_once __DIR__ . '/../../model/Teacher.php';

if(!isset($_SESSION["email"])){
    header("location: ../connexion.php");
};
if ($_SESSION["role"] != 'teacher') {
    header("location: ../connexion.php");
};
include './layouts/header.php';
// include './layouts/sidebar.php';
if(isset($_POST["save"])){
	$title=$_POST["title"];
	$description=$_POST["description"];
	$price=$_POST["price"];
	$type=$_POST["type"];
	$categorie=$_POST["categorie"];
	$tagSel=$_POST["tagSel"];
	$contenu=$_POST["contenu"];
	$img=$_POST["img"];
	$userid=$_SESSION["userid"];
	$userRole=$_SESSION["role"];
	$cour=new Teacher("","","","","","");
	$cour->addCours($title,$description,$type,$img,$contenu,$price,$userid,$categorie,$tagSel);
}
if(isset($_POST["delete"])){
	$id=$_POST["id_delete"];
	
	$cc=new Teacher("","","","","","");
	$cc->deleteCour($id);
	header("location:./Mycours.php");
}

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
						 <i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
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
                            <input type="text" name="title" class="form-control" id="course-title" required>
                        </div>

                        <div class="mb-3">
                            <label for="course-description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="course-description" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="course-price" class="form-label">Prix (€)</label>
                            <input type="number" name="price" class="form-control" id="course-price" step="0.01" required>
                        </div>

                        <div class="mb-3">
                            <label for="course-type" class="form-label">Type</label>
                            <select class="form-select" name="type" id="course-type" required>
                                <option value="video">Vidéo</option>
                                <option value="pdf">PDF</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="course-category" class="form-label">Catégorie</label>
                            <select class="form-select" name="categorie" id="course-category" required>
							<?php
								$ct = new Categorie("", "");
								$categories = $ct->display();
								
								foreach ($categories as $categorie){ ?>

										<option value="<?php echo htmlspecialchars($categorie['id']); ?>">
											<?php echo htmlspecialchars($categorie['nom']); ?>
										</option>
							<?php
							}?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="course-tags-input" class="form-label">Tags</label>
                            <div class="input-group">
                            
							<select name="tagSel[]" id="countries" multiple>
								<?php
            $test = new Tag("", "");
            $tags = $test->tags();
			foreach ($tags as $tag){ ?>

                    <option value="<?php echo htmlspecialchars($tag['id']); ?>">
                        <?php echo htmlspecialchars($tag['nom']); ?>
                    </option>
                <?php
            }?>
        </select>
                            </div>
                            <!-- <div id="tags-list" class="d-flex flex-wrap gap-2 mt-2"></div> -->
                        </div>

                        <div class="mb-3">
                            <label for="course-content" class="form-label">Contenu</label>
                            <input type="text" name="contenu" class="form-control" id="course-price" required placeholder="url vers video ou pdf">
                        </div>
                        <div class="mb-3">
                            <label for="course-image" class="form-label">Image</label>
                            <input type="text" name="img" class="form-control" id="course-price" required placeholder="url d'Image">
                        </div>

                </div>
            </div>
            <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" name="save">Ajouter</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>
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
								<td style="display:flex;justify-content:space-between"> 
									<i class="fa-solid fa-eye fa-lg" style="color: #db504a;"></i>
									<i class="fa-solid fa-pen-to-square fa-lg" style="color: #3c91e6;"></i>
									<form action="#" method="POST">
										<input type="hidden" name="id_delete" value="<?php echo $course['id'];?>">
								    <button type="submit" name="delete"><i class="fa-solid fa-trash fa-lg" style="color: #f31b1b;"></i></button>
									</form>
							</td>
							</tr>
							<?php } ?>
							
						</tbody>
					</table>
				</div>

			</div>
		</main>
	</section>
	<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>

	<script>
	new MultiSelectTag('countries', {
    rounded: true,
    shadow: true,
    placeholder: 'Search',
    tagColor: {
        textColor: '#3C91E6',
        borderColor: '#689fd6',
        bgColor: '#CFE8FF',
    },
    onChange: function(values) {
        console.log(values)
    }
})
</script>
 <?php
include './layouts/footer.php';
?>