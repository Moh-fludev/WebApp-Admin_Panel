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

			<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			<h1 class="app-page-title mb-0">Dashboard / comptabilité</h1>
			
			</div>

			</div>
			<!--//row-->
       
			



			</div>
			<!--//container-fluid-->
			</div>
			<!--//app-content-->
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
	exit();
}
?>