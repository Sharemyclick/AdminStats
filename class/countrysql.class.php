<?php
class CountrySql
{
private $bdd;

public function CountrySql(){
	// On se connecte à la base de données.
	include 'connectbase.php';
}


public function SelectCountry($id_country){

	$req = $this->bdd->query('SELECT id_country, name_country FROM country WHERE id_country =' .$id_country);
	return $req;
}
public function SelectCountryList(){

	$req = $this->bdd->query("SELECT id_country, name_country FROM country 
                order by case name_country
               when 'France'   then 1
               when 'Germany'   then 2
               when 'Italy'   then 3
               when 'Netherlands'   then 4
               when 'Portugal'   then 5
               when 'Spain' then 6
               when 'United Kingdom' then 7
               when '-------------------'then 8
               else 9
              end, 
             name_country");
             
	return $req;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

}