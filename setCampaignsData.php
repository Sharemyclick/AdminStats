<?php
// On inclut la page de param�tre de connection.
include('conf.php');

if(isset($_POST['name']) && $_POST['name'] == 'date' ){
	$req = $bdd->prepare('UPDATE campaign_contract SET date_contract = :date WHERE id_campaign_contract = :id ');
	$req->execute(array(	"date" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'price'){
	$req = $bdd->prepare('UPDATE campaign_contract SET price = :name WHERE id_campaign_contract = :id ');
	$req->execute(array(	"name" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'db_name' ){
	$req = $bdd->prepare('UPDATE campaign_contract SET id_database = :db_name WHERE id_campaign_contract = :id ');
	$req->execute(array(	"db_name" => $_POST['value'],
	"id" => $_POST['pk']));
}

if(isset($_POST['name']) && $_POST['name'] == 'type_payout' ){
	$req = $bdd->prepare('UPDATE campaign_contract SET type_payout = :type_payout WHERE id_campaign_contract = :id ');
	$req->execute(array(	"type_payout" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'affiliate_name' ){
	$req = $bdd->prepare('UPDATE campaign_contract SET id_campaign_management = :affiliate_name WHERE id_campaign_contract = :id ');
	$req->execute(array(	"affiliate_name" => $_POST['value'],
	"id" => $_POST['pk']));
}
die();
?>