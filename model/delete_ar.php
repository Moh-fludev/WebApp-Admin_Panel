<?php



$id= $_GET['id_ar'];

include('database.php');
include('crud.php');

$db = db_connect();
article_delete_one($db,$id);
header('location:../articles.php');

?>