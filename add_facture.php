<?php
session_start();
if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) {
            include('model/database.php');
      include('model/crud.php');
      $db = db_connect();
      $list_client =  clients_list($db);
	  $user_get_one = user_get_one($db,$_SESSION['usernameAdmin'],$_SESSION['passwordAdmin'])->fetch(PDO::FETCH_ASSOC);   

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
				<h1 class="app-page-title">Facture</h1>
				<hr class="mb-4">
				<div class="row g-4 settings-section">
					<div class="col-12 col-md-4">
						<h3 class="section-title">Ajouter un Facture</h3>
              
					</div>
					<div class="col-12 col-md-8">
						<div class="app-card app-card-settings shadow-sm p-4">

		<div class="app-card-body">
			<form class="settings-form" method="POST" action="model/add_facture.php">
			<div class="mb-3">
					<label for="setting-input-2" class="form-label">Code Facture</label>
					<input type="text" name="code_fact" class="form-control" id="setting-input-2"required>
				</div>
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">Date Facture</label>
					<input type="date" name="date_fact" class="form-control" id="setting-input-2" value="" required>
				</div>
				
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">Nom_Client</label>
					<select name="id_client" id="inputState" class="form-control">
                        <?php foreach($list_client as $client){?>
                        <option value="<?php echo $client['id_client']?>"><?php echo $client['nom_client']?></option>
                         <?php } ?>
                    </select>

				</div>
				<div class="mb-3">
					<label for="setting-input-2" class="form-label">Nom_User</label>
					<input type="text"  class="form-control" id="setting-input-2" value="<?php echo $user_get_one['username_user'] ?>" readonly >
					<input hidden type="text" name="id_user" class="form-control" id="setting-input-2" value="<?php echo $user_get_one['id_user'] ?>" readonly >
				</div>
				<div class="mb-3">
					<label for="setting-input-3" class="form-label">Montant Fact</label>
					<input type="number" name="montant_fact" class="form-control" id="setting-input-3" value="0.00" readonly>
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
			</div>
			</div>
			<!--//app-wrapper-->


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
	
}
?>