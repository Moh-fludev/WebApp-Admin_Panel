<?php
session_start();
if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) {
	
?>
<?php
		include('layout/header.php')
		?>
		<?php
		include('layout/nav.php')
		?>
		<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">Article</h1>
				<hr class="mb-4">
				<div class="row g-4 settings-section">
					<div class="col-12 col-md-4">
						<h3 class="section-title">Ajouter un Article</h3>

					</div>
					<div class="col-12 col-md-8">
						<div class="app-card app-card-settings shadow-sm p-4">

		<div class="app-card-body">
			<form class="settings-form" method="POST" action="model/add_article.php" enctype="multipart/form-data">
			<div class="mb-3">
					<label for="setting-input-2" class="form-label">Disignation</label>
					<input type="text" name="disignation" class="form-control" id="setting-input-2"required>
				</div>
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">Prix</label>
					<input type="number" name="prix" class="form-control" id="setting-input-2" value="" required>
				</div>
				<div class="mb-3">
					<label for="setting-input-3" class="form-label">Qte</label>
					<input type="number" name="qte" class="form-control" id="setting-input-3">
				</div>
				<div class="mb-3">
					<label for="setting-input-3" class="form-label">Uploade image</label>
					<input type="file" name="image" class="form-control" id="setting-input-3">
				</div>
				<button type="submit" class="btn app-btn-primary">Save Changes</button>
			</form>
		</div>
		<!--//app-card-body-->

						</div>
						<!--//app-card-->
					</div>
				</div>
				<!--//row-->

			</div>
			<!--//app-wrapper-->
			</div>
			</div>

			<!-- Javascript -->
			<script src="public/plugins/popper.min.js"></script>
			<script src="public/plugins/bootstrap/js/bootstrap.min.js"></script>

			<!-- Page Specific JS -->
			<script src="public/js/app.js"></script>

			</body>

			</html>
			<?php
}
else {
	header('location: login.php');
	exit();
}
?>