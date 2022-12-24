<?php


$id= $_POST['if_fact'];
$code= $_POST['code_fact'];
$date= $_POST['date_fact'];
$montant = $_POST['montant_fact'];
$id_client= $_POST['id_client'];
$id_user = $_POST['id_user'];
include('database.php');
include('crud.php');

$db = db_connect();
client_update_one($db,$id,$code,$date,$montant,$id_client,$id_user);
header('location:../facturation.php');

?>