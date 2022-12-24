
<?php
session_start();
if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) {
	
?>
<?php
  $id = $_GET['id_fact'];
  include('model/database.php');
  include('model/crud.php');
   $db= db_connect();
   $facture_get_one =facture_get_one($db,$id)->fetch(PDO::FETCH_ASSOC);
   $id_client = $facture_get_one['id_client'];
   $client_get_one =client_get_one($db,$id_client)->fetch(PDO::FETCH_ASSOC);
   $list_client =  clients_list($db);
		include('layout/header.php')
		?>
		<?php
		include('layout/nav.php')
		
		?>
		<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">
				<h1 class="app-page-title">Facture</h1>
				<hr class="mb-4">
				<div class="row g-4 settings-section">
					<div class="col-12 col-md-4">
						<h3 class="section-title">Update un Facture</h3>

					</div>
					<div class="col-12 col-md-8">
						<div class="app-card app-card-settings shadow-sm p-4">

		<div class="app-card-body">
			<form class="settings-form" method="POST" action="model/save_update_fact.php">
			<div class="mb-3">
					<label for="setting-input-2" class="form-label">ID</label>
					
					<input readonly type="text" name="id_fact" value="<?php echo $facture_get_one['id_fact']?>" class="form-control" id="setting-input-2"required>
				</div>
			<div class="mb-3">
					<label for="setting-input-2" class="form-label">Code Fact</label>

					<input type="text" name="code_fact" value="<?php echo $facture_get_one['code_fact']?>" class="form-control" id="setting-input-2"required>
				</div>
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">Date</label>
					<input type="text" name="date_fact" value="<?php echo $facture_get_one['date_fact']?>" class="form-control" id="setting-input-2" required>
				</div>
				<div class="mb-3">
					<label for="setting-input-3" class="form-label">Montant Total</label>
					<input type="number" name="montant_fact" value="<?php echo $facture_get_one['montant_fact']?>" class="form-control" id="setting-input-3">
				</div>
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">Client</label>
					<select name="id_client" id="inputState" class="form-control">
        <option selected>Choose...</option>
        <?php foreach($list_client as $client){?>
            <option value="<?php echo $client['id_client']?>" <?php if($client_get_one['id_client'] ==$client['id_client'])echo 'selected'?>><?php echo $client['nom_client']?></option>
            <?php } ?>
      </select>
				</div>
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">User</label>

					<input readonly type="text" name="id_user" value="<?php echo $facture_get_one['id_user']?>" class="form-control" id="setting-input-2"required>
				</div>
				<button name="update_fact" type="submit" class="btn app-btn-primary">Save Changes</button>
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