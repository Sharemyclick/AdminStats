<?php
// On inclut la page de parametre de connection.
include('conf.php');

var_dump ($_POST);

// On recupere tout le contenu de la table "database"
$req = $bdd->prepare('INSERT INTO dbase (name, url, country, affilate_id) VALUES (:name, :url, :country, :affilate_id)');
// On execute la requete en lui transmettant la liste des parametres
	$req->execute(array(
		'name' => $_POST['name'],
		'url' => $_POST['url'],
		'country' => $_POST['country'],
		'affilate_id' => $_POST['affilate_id']
		)) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
	$id = $bdd->lastInsertId();
	$_SESSION['id']=$id;

// Insertion des données dans la table 'db_affiliates' à l'aide d'une requête préparée	
$req = $bdd->prepare('INSERT INTO db_affiliates (affiliates_id, dbase_id) VALUES(:affiliates_id, :dbase_id)');
// On execute la requete en lui transmettant la liste des parametres
	$req->execute(array(
		'affiliates_id' => $_POST['affilate_id'],
		'dbase_id' => $id
		)) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
	
	// On termine le traitement de la requete
$req->closeCursor();

// Redirection du visiteur vers la page suivante  
        header("location:validated-database.php");
?>