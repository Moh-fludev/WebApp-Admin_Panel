<?php



$id= $_GET['id_four'];

include('database.php');
include('crud.php');

$db = db_connect();
fournisseurs_delete_one($db,$id);
header('location:../fournisseurs.php');

?>