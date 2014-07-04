<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdvertiserSql
{
private $bdd;

public function AdvertiserSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectAdvertisersList($advetiser = false){

	$req = $this->bdd->query('SELECT * FROM advertiser');
	return $req;
	
}
public function insertAdvertiser($advertiser)
{ $req = $this->$bdd->prepare('INSERT INTO advertiser( " company_name, websites, category_product,'
        . ' id_stats_validation, id_invoice_contact, id_management_contact,  logo, status, adress,company_type, telephone_company") '
        . 'VALUES (" :company_name, :websites, :category_product, :id_stats_validation, :id_invoice_contact, :id_management_contact,'
        . ' :logo, :status, :adress, :company_type, :telephone_company")');
$req->execute(array(
		'company_name' => $_POST['company_name'],
                'websites'=> $_POST['websites'],
		'category_product' => $_POST['category_product'],
		'id_stats_validation' => $_POST['id_stats_validation'],
		'id_invoice_contact' => $_POST['id_invoice_contact'],
		'id_management_contact' => $_POST['id_management_contact'],
                'logo' => $_POST['logo'],
		'status' => $_POST['status'],
                'address' => $_POST['address'],
                'company_type' => $_POST['company_type'],
                'telephone_company' => $_POST['telephone_comnpany']
		
		)) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
// On termine le traitement de la requete
$coreg_id = $bdd->lastInsertId();
$req->closeCursor();
}

}