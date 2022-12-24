<?php

/*Connexion INIT *******************************************************************************/
 

function db_connect(){
	$host = 'localhost';
	$dbname = 'infotech';
	$user_name = 'root';
	$pass = '';

	try {
		$db = new PDO("mysql:host=".$host.";dbname=".$dbname,$user_name,$pass);
		//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
//		echo "Connecter  ";
	} catch ( Exception  $e ) {
		echo "ERREUR :  " . $e->getMessage();
	}

	return $db;
}?>


