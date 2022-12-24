<?php

if(isset($_POST['update_fact'])){
    $id= $_POST['id_fact'];
$code= $_POST['code_fact'];
$date= $_POST['date_fact'];
$montant = $_POST['montant_fact'];
$client = $_POST['id_client'];
$user = $_POST['id_user'];
include('database.php');
include('crud.php');

$db = db_connect();
facture_update_one($db,$id,$code,$date,$montant,$client,$user);
header('location:../facturation.php');
}else{
    header('location:../facturation.php');}

?>