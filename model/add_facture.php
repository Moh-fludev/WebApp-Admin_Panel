<?php

session_start();
if (isset($_SESSION['usernameAdmin']) and isset($_SESSION['passwordAdmin'])) { 

    $code_fact= $_POST['code_fact'];
    $date_fact= $_POST['date_fact'];
    $montant_fact = $_POST['montant_fact'];
    $id_client= $_POST['id_client'];
    $id_user = $_POST['id_user'];
    include('database.php');
    include('crud.php');
    $db = db_connect();
    facture_add_one($db,$code_fact,$date_fact,$montant_fact,$id_client,$id_user);
    $fact_add = facture_get_one_for_art($db,$code_fact,$date_fact,$montant_fact,$id_client,$id_user)->fetch(PDO::FETCH_ASSOC);
    header('location:../add_art_fact.php');
    header('location:../add_art_fact.php?id_fact='.$fact_add['id_fact']);
    

 }else{
    header('location: ../login.php');
 }


?>