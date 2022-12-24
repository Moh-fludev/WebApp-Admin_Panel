
<?php
session_start();
if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) {
	
?>
<?php
  $id = $_GET['id_four'];
  include('model/database.php');
  include('model/crud.php');
   $db= db_connect();
   $fournisseurs_get_one =fournisseurs_get_one($db,$id)->fetch(PDO::FETCH_ASSOC);
		include('layout/header.php')
		?>
		<?php
		include('layout/nav.php')
		
		?>
		<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">Fournisseur</h1>
				<hr class="mb-4">
				<div class="row g-4 settings-section">
					<div class="col-12 col-md-4">
						<h3 class="section-title">Update un Fournisseur</h3>

					</div>
					<div class="col-12 col-md-8">
						<div class="app-card app-card-settings shadow-sm p-4">

		<div class="app-card-body">
			<form class="settings-form" method="POST" action="model/save_update_four.php">
			<div class="mb-3">
					<label for="setting-input-2" class="form-label">ID</label>
					
					<input readonly type="text" name="id_four" value="<?php echo $fournisseurs_get_one['id_four']?>" class="form-control" id="setting-input-2"required>
				</div>
			<div class="mb-3">
					<label for="setting-input-2" class="form-label">Nom</label>

					<input type="text" name="nom" value="<?php echo $fournisseurs_get_one['nom_four']?>" class="form-control" id="setting-input-2"required>
				</div>
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">Prenom</label>
					<input type="text" name="prenom" value="<?php echo $fournisseurs_get_one['prenom_four']?>" class="form-control" id="setting-input-2" required>
				</div>
				<div class="mb-3">
					<label for="setting-input-3" class="form-label">Telephone</label>
					<input type="number" name="telephone" value="<?php echo $fournisseurs_get_one['tel_four']?>" class="form-control" id="setting-input-3">
				</div>
				
				<button name="update_four" type="submit" class="btn app-btn-primary">Save Changes</button>
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