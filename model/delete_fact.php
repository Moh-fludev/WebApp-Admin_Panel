<?php



$id= $_GET['id_fact'];

include('database.php');
include('crud.php');

$db = db_connect();
 $vent_art = facture_list_art($db,$id)->rowCount();


if($vent_art<=0){
    facture_delete_one($db,$id);
header('location:../facturation.php');
}else{
    header('location:../facturation.php');
}
?>


