<?php

if (isset($_POST['add_client'])) {
    
$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$telephone = $_POST['telephone'];
$email= $_POST['email'];
$pass = $_POST['pass'];
include('database.php');
include('crud.php');

$db = db_connect();
client_add_one($db,$nom,$prenom,$telephone,$email,$pass);
header('location:../clients.php');
}else{
    header('location: ../add_client.php ');
}

?>