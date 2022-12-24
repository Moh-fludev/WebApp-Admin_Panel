<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="public/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="public/css/portal.css">

</head> 

<body class="app app-signup p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4"><a class="app-logo" href="signup.php"><img class="logo-icon me-2" src="public/images//Logo.png" alt="logo"></a></div>
					<h2 class="auth-heading text-center mb-4">Sign up to Info Tech</h2>					
	
					<div class="auth-form-container text-start mx-auto">
						<form  action="model/add_user.php" method="POST">         
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Username</label>
								<input id="signup-name" name="username" type="text" class="form-control signup-name" placeholder="Username" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Telephone</label>
								<input id="signup-name" name="telephone" type="text" class="form-control signup-name" placeholder="Telephone" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Your Email</label>
								<input id="signup-email" name="email" type="email" class="form-control signup-email" placeholder="Email" required="required">
							</div>
							<div class="password mb-3">
								<label class="sr-only" for="signup-password">Password</label>
								<input id="signup-password" name="password" type="password" class="form-control signup-password" placeholder="Create a password" required="required">
							</div>
							<div class="email mb-3">
								<label class="sr-only" for="signup-email">Code Admin</label>
								<input id="signup-name" name="code_admin" type="text" class="form-control signup-name" placeholder="Code Admin" required="required">
							</div>
						
							
							<div class="text-center">
								<button type="submit" name="add_user" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
							</div>
						</form><!--//auth-form-->
						
						<div class="auth-option text-center pt-5">Already have an account? <a class="text-link" href="login.php" >Log in</a></div>
					</div><!--//auth-form-container-->	
					
					
				    
			    </div><!--//auth-body-->
		    
			    
		    </div><!--//flex-column-->   
	    </div><!--//auth-main-col-->
	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder">			    
		    </div>
		   
	    </div><!--//auth-background-col-->
    
    </div><!--//row-->


</body>
</html> 

