<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CampaignManagementSql
{
private $bdd;

public function CampaignManagementSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectCampaignManagementsList($campaign_management = false){

	$req = $this->bdd->query('SELECT * FROM campaign_management');
	return $req;
	
}

}