<?php

if(isset($_POST['fact_add_ar'])){
$id_ar = $_POST['id_ar'];
$id_fact = $_POST['id_fact'];
$prix_fact = $_POST['prix_fact'];
$qte_fact = $_POST['qte_fact'];
include('database.php');
include('crud.php');
$db = db_connect();
facture_add_art($db,$id_ar,$id_fact,$prix_fact,$qte_fact);
header('location:../add_art_fact.php');
header('location:../add_art_fact.php?id_fact='.$id_fact);

}
else{
    header('location:../add_art_fact.php');}

?>