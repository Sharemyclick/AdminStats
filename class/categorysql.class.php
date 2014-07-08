<?php
class CategorySql
{
private $bdd;

public function CategorySql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectCategoriesList($mainCategory = false){

	$req = $this->bdd->query('SELECT id_category, name_category, mother_category FROM category ORDER BY mother_category');
	return $req;
}

public function SelectCategory () {
    $req = $this->bdd->query('SELECT * FROM  category a JOIN advertiser a ON a.category_product=c.id_category');
return $req;}
}