<?php
 function clients_list($db){
	 $sql ="SELECT * FROM client";
	$requete = $db->prepare($sql);
	$requete->execute();
	return $requete;
}


function client_add_one($db,$nom,$prenom,$telephone,$email,$pass){
	$sql = 'INSERT INTO client(nom_client,prenom_client,tele_client,email_client,pass)
	values(:nom_client,:prenom_client,:tele_client,:email_client,:pass)';
	$requete = $db-> prepare($sql);
	$requete -> bindvalue(':nom_client',$nom);
	$requete -> bindvalue(':prenom_client',$prenom);
	$requete -> bindvalue(':tele_client',$telephone);
	$requete -> bindvalue(':email_client',$email);
	$requete -> bindvalue(':pass',$pass);
	$requete -> execute();
	return $requete;
}
function client_delete_one($db,$id){
	$sql ="DELETE FROM client where id_client=:id_client";
	$requete = $db->prepare($sql);
	$requete->bindvalue(':id_client',$id);
	$requete->execute();
	return $requete;
}
function client_update_one($db,$id,$nom,$prenom,$telephone,$email,$pass){
$sql =" UPDATE client 
SET nom_client=:nom_client,prenom_client=:prenom_client,tele_client=:tele_client,email_client=:email_client,pass=:pass
						where id_client=:id_client";
	$requete = $db->prepare($sql);
	$requete -> bindvalue(':id_client',$id);
    $requete -> bindvalue(':nom_client',$nom);
    $requete -> bindvalue(':prenom_client',$prenom);
    $requete -> bindvalue(':tele_client',$telephone);
	$requete -> bindvalue(':email_client',$email);
    $requete -> bindvalue(':pass',$pass);
	$requete -> execute();
	return $requete;
}
function client_get_one($db,$id){
$sql = "SELECT * FROM client where id_client=:id_client";
$requete = $db -> prepare($sql);
$requete -> bindvalue(':id_client',$id);
$requete -> execute();
return $requete;
}
/*********   Fin Parti de client   *************/
/*********   debut Parti de Article  *************/
function article_list($db){
    $sql ="SELECT * FROM article";
   $requete = $db->prepare($sql);
   $requete->execute();
   return $requete;
}
function article_add_one($db,$disignation,$prix,$qte,$img_ar){
	$sql = 'INSERT INTO article(disignation_ar,prix_ar,qte_ar,img_ar)
	values(:disignation_ar,:prix_ar,:qte_ar,:img_ar)';
	$requete = $db-> prepare($sql);
	$requete -> bindvalue(':disignation_ar',$disignation);
	$requete -> bindvalue(':prix_ar',$prix);
	$requete -> bindvalue(':qte_ar',$qte);
	$requete -> bindvalue(':img_ar',$img_ar);
	$requete -> execute();
	return $requete;
}
function article_delete_one($db,$id){
	$sql ="DELETE FROM article where id_ar=:id_ar";
	$requete = $db->prepare($sql);
	$requete->bindvalue(':id_ar',$id);
	$requete->execute();
	return $requete;
}
function article_update_one($db,$id,$disignation,$prix,$qte,$img_ar){
$sql =" UPDATE article 
SET disignation_ar=:disignation_ar,prix_ar=:prix_ar,qte_ar=:qte_ar,img_ar=:img_ar
						where id_ar=:id_ar";
	$requete = $db->prepare($sql);
	$requete -> bindvalue(':id_ar',$id);
    $requete -> bindvalue(':disignation_ar',$disignation);
    $requete -> bindvalue(':prix_ar',$prix);
    $requete -> bindvalue(':qte_ar',$qte);
	$requete -> bindvalue(':img_ar',$img_ar);
	$requete -> execute();
	return $requete;
}
function article_get_one($db,$id){
$sql = "SELECT * FROM article where id_ar=:id_ar";
$requete = $db -> prepare($sql);
$requete -> bindvalue(':id_ar',$id);
$requete -> execute();
return $requete;
}

/*********   Fin Parti de client   *************/
/*********   debut Parti de Article  *************/


 function fournisseurs_list($db){
	 $sql ="SELECT * FROM fournisseur";
	$requete = $db->prepare($sql);
	$requete->execute();
	return $requete;
}


function fournisseurs_add_one($db,$nom,$prenom,$telephone){
	$sql = 'INSERT INTO fournisseur(nom_four,prenom_four,tel_four)
	values(:nom_four,:prenom_four,:tel_four)';
	$requete = $db-> prepare($sql);
	$requete -> bindvalue(':nom_four',$nom);
	$requete -> bindvalue(':prenom_four',$prenom);
	$requete -> bindvalue(':tel_four',$telephone);
	$requete -> execute();
	return $requete;
}
function fournisseurs_delete_one($db,$id){
	$sql ="DELETE FROM fournisseur where id_four=:id_four";
	$requete = $db->prepare($sql);
	$requete->bindvalue(':id_four',$id);
	$requete->execute();
	return $requete;
}
function fournisseurs_update_one($db,$id,$nom,$prenom,$telephone){
$sql =" UPDATE fournisseur 
SET nom_four=:nom_four,prenom_four=:prenom_four,tel_four=:tel_four
						where id_four=:id_four";
	$requete = $db->prepare($sql);
	$requete -> bindvalue(':id_four',$id);
    $requete -> bindvalue(':nom_four',$nom);
    $requete -> bindvalue(':prenom_four',$prenom);
    $requete -> bindvalue(':tel_four',$telephone);
	$requete -> execute();
	return $requete;
}
function fournisseurs_get_one($db,$id){
$sql = "SELECT * FROM fournisseur where id_four=:id_four";
$requete = $db -> prepare($sql);
$requete -> bindvalue(':id_four',$id);
$requete -> execute();
return $requete;
}
/*********   Fin Parti de client   *************/
/*********   debut Parti de facture  *************/

function facture_list($db){
	$sql ="SELECT * FROM facture
	  INNER join client on facture.id_client = client.id_client 
      INNER join users on facture.id_user = users.id_user";
   $requete = $db->prepare($sql);
   $requete->execute();
   return $requete;
}

function facture_add_one($db,$code_fact,$date_fact,$montant_fact,$id_client,$id_user){
	$sql = 'INSERT INTO facture(code_fact,date_fact,montant_fact,id_client,id_user)
	                     values(:code_fact,:date_fact,:montant_fact,:id_client,:id_user)';
	$requete = $db-> prepare($sql);
	$requete -> bindvalue(':code_fact',$code_fact);
	$requete -> bindvalue(':date_fact',$date_fact);
	$requete -> bindvalue(':montant_fact',$montant_fact);
	$requete -> bindvalue(':id_client',$id_client);
	$requete -> bindvalue(':id_user',$id_user);
	$requete -> execute();
	return $requete;
}

function facture_delete_one($db,$id){
	$sql ="DELETE FROM facture where id_fact=:id_fact";
	$requete = $db->prepare($sql);
	$requete->bindvalue(':id_fact',$id);
	$requete->execute();
	return $requete;
}
function facture_update_one($db,$id_fact,$code_fact,$date_fact,$montant_fact,$id_client,$id_user){
$sql =" UPDATE facture 
SET code_fact=:code_fact,date_fact=:date_fact,montant_fact=:montant_fact,id_client=:id_client,id_user=:id_user
						where id_fact=:id_fact";
	$requete = $db->prepare($sql);
	$requete -> bindvalue(':id_fact',$id_fact);
	$requete -> bindvalue(':code_fact',$code_fact);
    $requete -> bindvalue(':date_fact',$date_fact);
    $requete -> bindvalue(':montant_fact',$montant_fact);
    $requete -> bindvalue(':id_client',$id_client);
	$requete -> bindvalue(':id_user',$id_user);
	$requete -> execute();
	return $requete;
}
function facture_update_montant($db,$id_fact,$montant_fact){
	$sql =" UPDATE facture 
	SET montant_fact=:montant_fact	where id_fact=:id_fact";
		$requete = $db->prepare($sql);
		$requete ->  bindvalue(':id_fact',$id_fact);
		$requete -> bindvalue(':montant_fact',$montant_fact);
		$requete -> execute();
		return $requete;
	}
function facture_get_one($db,$id){
$sql = "SELECT * FROM facture where id_fact=:id_fact";
$requete = $db -> prepare($sql);
$requete -> bindvalue(':id_fact',$id);
$requete -> execute();
return $requete;
}
function facture_get_one_for_art($db,$code_fact,$date_fact,$montant_fact,$id_client,$id_user){
	$sql = "SELECT * FROM facture where code_fact=:code_fact and date_fact=:date_fact 
	and montant_fact=:montant_fact and id_client=:id_client and id_user=:id_user";
	$requete = $db -> prepare($sql);
	$requete -> bindvalue(':code_fact',$code_fact);
	$requete -> bindvalue(':date_fact',$date_fact);
	$requete -> bindvalue(':montant_fact',$montant_fact);
	$requete -> bindvalue(':id_client',$id_client);
	$requete -> bindvalue(':id_user',$id_user);
	
	$requete -> execute();
	return $requete;
	}
function facture_add_art($db,$id_ar,$id_fact,$prix,$qte){
	$sql = 'INSERT INTO vent(id_ar,id_fact,pu_fact,qte_fact)
	values(:id_ar,:id_fact,:pu_fact,:qte_fact)';
	$requete = $db-> prepare($sql);
	$requete -> bindvalue(':id_ar',$id_ar);
	$requete -> bindvalue(':id_fact',$id_fact);	
	$requete -> bindvalue(':pu_fact',$prix);
	$requete -> bindvalue(':qte_fact',$qte);
	$requete -> execute();
	return $requete;
}


function facture_list_art($db,$id_fact){
	$sql ="SELECT * FROM vent where id_fact=:id_fact";
	$requete = $db->prepare($sql);
	$requete -> bindvalue(':id_fact',$id_fact);
   $requete->execute();
   return $requete;
}
function add_user($db,$username_user,$email_user,$pass,$telephone){
$sql = 'INSERT INTO users(username_user,email_user,pass,telephone)
                  values(:username_user,:email_user,:pass,:telephone)';
$requete= $db-> prepare($sql);
$requete-> bindvalue(':username_user',$username_user);
$requete-> bindvalue(':email_user',$email_user);
$requete-> bindvalue(':pass',$pass);
$requete-> bindvalue(':telephone',$telephone);
$requete -> execute();
return $requete;
}



function user_get_one($db,$email,$pass){
	$sql = "SELECT * FROM users where email_user=:email_user and pass=:pass";
	$requete = $db -> prepare($sql);
	$requete -> bindvalue(':email_user',$email);
	$requete -> bindvalue(':pass',$pass);
	$requete -> execute();
	return $requete;
	}

?>

