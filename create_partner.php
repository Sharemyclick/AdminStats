<?php
// On inclut la page de paramètre de connection.
include('conf.php');

// On recupere tout le contenu de la table "database"
$req = $bdd->prepare('INSERT INTO partner (name, address, iban, swift_bic, email_finance, vat_number, telephone) VALUES (:name, :address, :iban, :swift_bic, :email_finance, :vat_number, :telephone)');
// On execute la requete en lui transmettant la liste des parametres
	$req->execute(array(
		'name' => $_POST['name'],
		'address' => $_POST['address'],
		'iban' => $_POST['iban'],
		'swift_bic' => $_POST['swift_bic'],
		'email_finance' => $_POST['email_finance'],
		'vat_number' => $_POST['vat_number'],
		'telephone' => $_POST['telephone']
		)) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
// On termine le traitement de la requete
$coreg_id = $bdd->lastInsertId();
$req->closeCursor();

// Redirection du visiteur vers la page suivante  
    header("location:validated-partner.php");
?>