<?php
// On inclut la page de paramètre de connection.
include('conf.php');
if(isset($_POST['approval_name'])){
	$req = $bdd->prepare('UPDATE campaigns SET approval_name = :approval_name WHERE id = :id ');
	$req->execute(array(	"approval_name" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['volume'])){
	$req = $bdd->prepare('UPDATE campaigns SET volume = :volume WHERE id = :id ');
	$req->execute(array(	"volume" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['volume_delivered'])){
	$req = $bdd->prepare('UPDATE campaigns SET volume_delivered = :volume_delivered WHERE id = :id ');
	$req->execute(array(	"volume_delivered" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['approved_leads'])){
	$req = $bdd->prepare('UPDATE campaigns SET approved_leads = :approved_leads WHERE id = :id ');
	$req->execute(array(	"approved_leads" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['clicks'])){
	$req = $bdd->prepare('UPDATE campaigns SET clicks = :clicks WHERE id = :id ');
	$req->execute(array(	"clicks" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['opens'])){
	$req = $bdd->prepare('UPDATE campaigns SET opens = :opens WHERE id = :id ');
	$req->execute(array(	"opens" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'name'){
	$req = $bdd->prepare('UPDATE campaigns SET name = :name WHERE id = :id ');
	$req->execute(array(	"name" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'price'){
	$req = $bdd->prepare('UPDATE campaigns SET price = :name WHERE id = :id ');
	$req->execute(array(	"name" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'leads'){
	$req = $bdd->prepare('UPDATE campaigns SET leads = :name WHERE id = :id ');
	$req->execute(array(	"name" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'type_name' ){
	$req = $bdd->prepare('UPDATE campaigns SET type_name = :type_name WHERE id = :id ');
	$req->execute(array(	"type_name" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'partner_name' ){
	$req = $bdd->prepare('UPDATE campaigns SET partner_name = :partner_name WHERE id = :id ');
	$req->execute(array(	"partner_name" => $_POST['value'],
	"id" => $_POST['pk']));
}
if(isset($_POST['name']) && $_POST['name'] == 'db_name' ){
	$req = $bdd->prepare('UPDATE campaigns SET db_name = :db_name WHERE id = :id ');
	$req->execute(array(	"db_name" => $_POST['value'],
	"id" => $_POST['pk']));
}
die();
?>