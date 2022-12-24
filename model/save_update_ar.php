<?php


if(isset($_POST['update_art'])){
    $id= $_POST['id_ar'];
$disignation= $_POST['disignation'];
$prix= $_POST['prix'];
$qte = $_POST['qte'];
$image_name = $_FILES['image']['name'];
$temp_image = $_FILES['image']['tmp_name'];
$folder = "../public/images/articles/";

move_uploaded_file($temp_image,$folder.$image_name);
include('database.php');
include('crud.php');

$db = db_connect();
article_update_one($db,$id,$disignation,$prix,$qte,$image_name);
header('location:../articles.php');
}else{
    header('location:../articles.php');
}

?>