<?php



$id= $_GET['id_client'];

include('database.php');
include('crud.php');

$db = db_connect();
client_delete_one($db,$id);
header('location:../clients.php');

?>