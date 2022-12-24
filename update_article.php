
<?php
session_start();
if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) {
	
?>
<?php
  $id = $_GET['id_ar'];
  include('model/database.php');
  include('model/crud.php');
   $db= db_connect();
   $article_get_one =article_get_one($db,$id)->fetch(PDO::FETCH_ASSOC);
		include('layout/header.php')
		?>
		<?php
		include('layout/nav.php')
		
		?>
		<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">Articles</h1>
				<hr class="mb-4">
				<div class="row g-4 settings-section">
					<div class="col-12 col-md-4">
						<h3 class="section-title">Update un Article</h3>
						<img src="public/images/articles/<?php echo $article_get_one['img_ar'] ?>">

					</div>
					
					<div class="col-12 col-md-8">
						<div class="app-card app-card-settings shadow-sm p-4">

		<div class="app-card-body">
			<form class="settings-form" method="POST" action="model/save_update_ar.php" enctype="multipart/form-data">
			<div class="mb-3">
					<label for="setting-input-2" class="form-label">ID</label>
					
					<input readonly type="text" name="id_ar" value="<?php echo $article_get_one['id_ar']?>" class="form-control" id="setting-input-2"required>
				</div>
			<div class="mb-3">
					<label for="setting-input-2" class="form-label">Disignation</label>
					<input type="text" name="disignation" value="<?php echo $article_get_one['disignation_ar']?>" class="form-control" id="setting-input-2"required>
				</div>
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">Prix</label>
					<input type="text" name="prix" value="<?php echo $article_get_one['prix_ar']?>" class="form-control" id="setting-input-2" required>
				</div>
				<div class="mb-3">
					<label for="setting-input-3" class="form-label">Qte</label>
					<input type="number" name="qte" value="<?php echo $article_get_one['qte_ar']?>" class="form-control" id="setting-input-3">
				</div>
				<div class="mb-3">
					<label for="setting-input-3" class="form-label">Uploade image</label>
					<input type="file" name="image" class="form-control" id="setting-input-3">
				</div>
				<button name="update_art" type="submit" class="btn app-btn-primary">Save Changes</button>
			</form>
		</div>
		<!--//app-card-body-->

						</div>
						<!--//app-card-->
					</div>
				</div>
				<!--//row-->

			</div>
			</div>
			</div>
			<!--//app-wrapper-->


			<!-- Javascript -->
			<script src="public/plugins/popper.min.js"></script>
			<script src="public/plugins/bootstrap/js/bootstrap.min.js"></script>

			<!-- Page Specific JS -->
			<script src="public/js/app.js"></script>

			</body>

			</html>			<?php
}
else {
	header('location: login.php');
	exit();
}
?>