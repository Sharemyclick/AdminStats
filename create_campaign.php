<?php
// On inclut la page de paramètre de connection.
include('conf.php');

// On recupere tout le contenu de la table "database"
$req = $bdd->prepare('INSERT INTO campaigns (name, partner_name, type_name, price, date_conf, sending_date, volume) VALUES (:name, :partner_name, :type_name, :price, :date_conf, :sending_date, :volume)');
// On execute la requete en lui transmettant la liste des parametres
	$req->execute(array(
		'name' => $_POST['name'],
		'partner_name' => $_POST['partner_name'],
		'type_name' => $_POST['type_name'],
		'price' => $_POST['price'],
		'date_conf' => $_POST['date_conf'],
		'sending_date' => $_POST['sending_date'],
		'volume' => $_POST['volume']
		)) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
// On termine le traitement de la requete
$coreg_id = $bdd->lastInsertId();
$req->closeCursor();

// Redirection du visiteur vers la page suivante  
    header("location:validated-campaign.php");
?>