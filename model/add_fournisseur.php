<?php



$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$telephone = $_POST['telephone'];

include('database.php');
include('crud.php');

$db = db_connect();
$user_add= fournisseurs_add_one($db,$nom,$prenom,$telephone);
header('location:../fournisseurs.php');

?>