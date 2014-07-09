<?php
class CountrySql
{
private $bdd;

public function CountrySql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}


public function SelectCountry($id_country){

	$req = $this->bdd->query('SELECT id_country, name_country FROM country WHERE id_country ==' .$id_country);
	return $req;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

}