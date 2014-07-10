
<?php
class AffiliateCompanySql
{
private $bdd;

public function AffiliateCompanySql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectAffiliateCompanyList($mainCategory = false){

	$req = $this->bdd->query('SELECT * FROM affiliate_company');
	return $req;
	
}

}