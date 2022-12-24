
<?php
session_start();
if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) {
	
?><?php
include('layout/header.php')
?>
<?php
include('layout/nav.php')
?>
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    <div class="position-relative mb-3">
				    <div class="row g-3 justify-content-between">
					    <div class="col-auto">
					        <h1 class="app-page-title mb-0">Dashboard / Notifications</h1>
					    </div>
					   
				    </div>
			    </div>
			    
                <div class="app-card app-card-notification shadow-sm mb-4">
				    <div class="app-card-header px-4 py-3">
				        <div class="row g-3 align-items-center">
					        <div class="col-12 col-lg-auto text-center text-lg-start">						        
				                <img class="profile-image" src="public/images/profiles/profile-1.png" alt="">
					        </div><!--//col-->
					        <div class="col-12 col-lg-auto text-center text-lg-start">
						        <div class="notification-type mb-2"><span class="badge bg-info">Project</span></div>
						        <h4 class="notification-title mb-1">Notification </h4>
						        
						        <ul class="notification-meta list-inline mb-0">
							        <li class="list-inline-item">2 hrs ago</li>
							        <li class="list-inline-item">|</li>
							        <li class="list-inline-item">Moh Dev</li>
						        </ul>
						   
					        </div><!--//col-->
				        </div><!--//row-->
				    </div><!--//app-card-header-->
				    <div class="app-card-body p-4">
					    <div class="notification-content">Nouveu client a ajouter</div>
				    </div><!--//app-card-body-->
				    <div class="app-card-footer px-4 py-3">
					    <a class="action-link" href="#">View all<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ms-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
</svg></a>
				    </div><!--//app-card-footer-->
				</div><!--//app-card-->
				
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 
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