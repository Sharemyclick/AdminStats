<?php
class AffiliateManagerSql
{
private $bdd;

public function AffiliateManagerSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectAffiliateManagerList($mainAffiliateManager = false){

	$req = $this->bdd->query('SELECT * FROM affiliate_manager');
	return $req;
	
}

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

