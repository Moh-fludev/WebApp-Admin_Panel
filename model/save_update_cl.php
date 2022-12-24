<?php
if (isset($_POST['update_cl'])) {
    $id= $_POST['id_client'];
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email= $_POST['email'];
    $pass = $_POST['pass'];
    include('database.php');
    include('crud.php');
    
    $db = db_connect();
    client_update_one($db,$id,$nom,$prenom,$telephone,$email,$pass);
    header('location:../clients.php');
}else{
    header('location:../clients.php');
}

?>