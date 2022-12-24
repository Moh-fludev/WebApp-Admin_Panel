<?php  

if(isset($_POST['add_user'])){
session_start();
if($_POST['code_admin']=='admin'){
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$telephone = $_POST['telephone'];
include('database.php');
include('crud.php');
$db = db_connect();
add_user($db,$username,$email,$password,$telephone);
$_SESSION['usernameAdmin']=$email;
$_SESSION['passwordAdmin']=$password;
header('location: ../index.php');
}else{
    header('location: ../signup.php');
}
}
else{
    header('location: ../singup.php');
}

?>