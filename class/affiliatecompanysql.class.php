
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
public function insertAffiliateCompany($affiliate_company)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO affiliate_company(  company_name, address, id_country, websites, id_hq, type_of_affiliate,  status ) VALUES ( :company_name, :address, :id_country, :websites, :id_hq, :type_of_affiliate, :status)');
        $req->execute(array(
            'company_name' => $affiliate_company['company_name'],
             'address' => $affiliate_company['address'],
            'id_country' => $affiliate_company['id_country'],
             'websites' => $affiliate_company['websites'],
            'id_hq' => $affiliate_company['id_hq'],
         
            'type_of_affiliate' => $affiliate_company['type_of_affiliate'],   
           
            'status' => $affiliate_company['status']
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
 if($req->errorCode() == 0) {
     $req->closeCursor();
    
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'affiliate_manager : '.$errors[2];
   
   
}

}
public function updateAffiliateCompany($affiliate_company)
{
   $req = $this->bdd->prepare('UPDATE affiliate_company SET company_name=:company_name, address=:address, id_country=:id_country, websites=:websites, id_hq=:id_hq, type_of_affiliate=:type_of_affiliate,  status=:status WHERE id_affiliate_company =' .$id_affiliate_company);
   $req->execute(array(    
         'company_name' => $affiliate_company['company_name'],
             'address' => $affiliate_company['address'],
            'id_country' => $affiliate_company['id_country'],
             'websites' => $affiliate_company['websites'],
            'id_hq' => $affiliate_company['id_hq'],
         
            'type_of_affiliate' => $affiliate_company['type_of_affiliate'],   
           
            'status' => $affiliate_company['status']

)) or die(print_r($req->errorInfo()));  // On traque l'erreur s'il y en a une
 if($req->errorCode() == 0) {
     $req->closeCursor();
     return true;
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'advertiser : '.$errors[2];
    return false;
}
}

}