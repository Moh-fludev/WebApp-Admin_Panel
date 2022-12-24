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
			<?php
			include('model/database.php');
			include('model/crud.php');
			$db = db_connect();
			$list =  clients_list($db);
			$counte = $list-> rowCount() ;
?>
			<div class="app-wrapper">

			<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
			<div class="col-auto">
			<h1 class="app-page-title mb-0">Dashboard / Clients</h1>
			
			</div>

			</div>
			<!--//row-->
        <div>
			<a href="add_client.php"><button type="submit" class="btn app-btn-primary">Ajouter Client</button></a></div>
			<div class="tab-content" id="orders-table-tab-content">
			<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
			<div class="app-card app-card-orders-table shadow-sm mb-5">
				<div class="app-card-body">
					
					<div class="table-responsive">
						<table class="table app-table-hover mb-0 text-left">
							<thead>
								<tr>
									<th class="cell">#</th>
									<th class="cell">Nom</th>
									<th class="cell">Prenom</th>
									<th class="cell">Tel</th>
									<th class="cell">Email</th>
									<th class="cell">Password</th>
									<th class="cell"></th>
									
								</tr>
							</thead>
							<tbody>
							<?php
							if($counte>0){
								foreach($list as $client){
									echo '<tr class="cell">';
									echo '<td class="cell">'.$client['id_client'].'</td>';
									echo '<td class="cell">'.$client['nom_client'].'</td>';
									echo '<td class="cell">'.$client['prenom_client'].'</td>';
									echo '<td class="cell">'.$client['tele_client'].'</td>';
									echo '<td class="cell">'.$client['email_client'].'</td>';
									echo '<td class="cell">'.$client['pass'].'</td>';
								?>
								<td>
                <div class="app-utility-item">
                    <a href="update_client.php?id_client=<?php echo $client['id_client']?>">
                    
                    <button class="btn btn-primary " type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                    <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                     </svg></button>
                    </a>
                </div>
                <div class="app-utility-item">
                    <a href="model/delete_cl.php?id_client=<?php echo $client['id_client']?>" >
                    
                    <button class="btn btn-primary "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16">
            <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
            </svg></button>
                    </a>
                </div>
                            </td>


							
							<?php
			echo'</tr>';
			}}else{
				echo '<tr class="cell">';
									echo '<td class="cell"></td>';
									echo '<td class="cell"></td>';
									echo '<td class="cell"></td>';
									echo '<td class="cell">No Articles existes !!!!</td>';
									echo '<td class="cell"></td>';
									echo '<td class="cell"></td>';
				echo '</tr>'		;			
			}
			?>
								
							</tbody>
						</table>
					</div>
					<!--//table-responsive-->
				</div>
				<!--//app-card-body-->
				
			</div>
			<!--//app-card-->


			</div>
			<!--//tab-pane-->

			</div>
			<!--//tab-content-->



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