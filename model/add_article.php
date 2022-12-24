<?php



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
$article_add= article_add_one($db,$disignation,$prix,$qte,$image_name);
header('location:../articles.php');

?>