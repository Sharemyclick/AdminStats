
<?php
class AffiliateCompanySql
{
private $bdd;

public function AffiliateCompanySql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectAffiliateCompanyCategoryList(){

	$req = $this->bdd->query('SELECT * FROM affiliate_company_category');
	return $req;
	
}

public function SelectAffiliateCompanyList($mainCategory = false){

	$req = $this->bdd->query('SELECT * FROM affiliate_company a JOIN country c ON a.id_country = c.id_country');
	return $req;
	
}

        
//=====================================INSERT=======================================        
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
         $id_affiliate_company = $this->bdd->lastInsertId();
         
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
    $this->error = 'affiliate_company : '.$errors[2];
   
   $req = $this->bdd->prepare('INSERT INTO affiliate_company_category(  id_affiliate_company, id_country) VALUES ( :id_affiliate_company, :id_country)');
        $req->execute(array(
            'id_affiliate_company' => $id_affiliate_company,
             'id_country' => $affiliate_company['id_country']
                
                
                )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         $id_affiliate_company = $this->bdd->lastInsertId();
         
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
$this->error = 'affiliate_company : '.$errors[2];}
   
   $req = $this->bdd->prepare('INSERT INTO affiliate_company_traffic(  id_affiliate_company, id_traffic) VALUES ( :id_affiliate_company, :id_traffic)');
        $req->execute(array(
            'id_affiliate_company' => $id_affiliate_company,
             'id_traffic' => $affiliate_company['id_traffic']
                
                )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
 if($req->errorCode() == 0) {
     $req->closeCursor();
     return true;
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'category : '.$errors[2];
    return false;
}
}

}

//============================UPDATE==============================================
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