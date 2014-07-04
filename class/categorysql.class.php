<?php
class CategorySql
{
private $bdd;

public function CategorySql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectCategoriesList($mainCategory = false){

	$req = $this->bdd->query('SELECT id_category, name_category FROM category');
	return $req;
	
}

}