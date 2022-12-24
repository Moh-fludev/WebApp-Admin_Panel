<?php


if(isset($_POST['update_four'])){
    $id= $_POST['id_four'];
$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$telephone = $_POST['telephone'];

include('database.php');
include('crud.php');

$db = db_connect();
fournisseurs_update_one($db,$id,$nom,$prenom,$telephone);
header('location:../fournisseurs.php');
}else{
    header('location:../fournisseurs.php');}

?>