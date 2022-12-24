<?php
 session_start();
include("database.php");
$db = db_connect();
if (isset($_POST['login_btn'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
     $requete = $db-> prepare('SELECT * FROM users WHERE email_user= ? AND pass= ?');
	 $requete -> execute(array($email,$password));
	 $count = $requete-> fetch(PDO::FETCH_OBJ);
	 if ($count>0) {
		$_SESSION['usernameAdmin']=$email;
		$_SESSION['passwordAdmin']=$password;
		header("Location: ../index.php");
	 }else {
        header("Location: ../login.php?error=Incorect User name or password");
     }
	
}
?>