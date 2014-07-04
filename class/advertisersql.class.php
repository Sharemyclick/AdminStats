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
{ $req = $this->$bdd->prepare('INSERT INTO advertiser( "id_advertiser, company_name, websites, category_product, validation_delay, id_stats_validation, id_invoice_contact, id_management_contact, thumbnail, logo, status, adress") VALUES (":id_advertiser, :company_name,:websites, :category_product, :validation_delay, :id_stats_validation, :id_invoice_contact, :id_management_contact, :thumbnail, :logo, :status, :adress")');
return $req;
}

}