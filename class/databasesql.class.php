<?php
class DatabaseSql
{
private $bdd;

public function DatabaseSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectDatabasesList($database = false){

	$req = $this->bdd->query('SELECT * FROM database');
	return $req;
	
}

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

