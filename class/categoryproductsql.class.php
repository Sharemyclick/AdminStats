<?php
class CategorySql
{
private $bdd;

public function CategorySql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectCategoriesList($mainCategory = false){

	$req = $this->bdd->query('SELECT id_category, name_category, mother_category FROM category_product ORDER BY mother_category');
	return $req;
}

public function SelectCategoryByAdvertiser ($id_advertiser) {
    $req = $this->bdd->query('SELECT c.* FROM  category_product c INNER JOIN advertiser a '
            . 'ON a.id_category_product=c.id_category_product AND a.id_advertiser = '.$id_advertiser);
return $req;}



public function selectCategoryNameFromId($id_category){
$req = $this->bdd->query('SELECT name_category FROM  category_product WHERE id_category = '.$id_category);
return $req;

}


}