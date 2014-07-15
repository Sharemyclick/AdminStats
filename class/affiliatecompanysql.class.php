
<?php
class AffiliateCompanySql
{
private $bdd;

public function affiliateCompanySql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function selectAffiliateCompanyCategoryList(){

	$req = $this->bdd->query('SELECT * FROM affiliate_company_category');
	return $req;
	
}

public function selectAffiliateCompanyList($mainCategory = false){

	$req = $this->bdd->query('SELECT * FROM affiliate_company a '
                . 'LEFT JOIN country c ON a.id_country = c.id_country '
                . 'LEFT JOIN affiliate_company_traffic act ON a.id_affiliate_company=act.id_affiliate_company '
                . 'LEFT JOIN type_traffic t ON act.id_traffic=t.id_traffic   '
                . ' LEFT JOIN affiliate_company_type_affiliate acta ON acta.id_affiliate_company = a.id_affiliate_company'
                . ' LEFT JOIN type_affiliate ta ON ta.id_type_affiliate = acta.id_type_affiliate ');
	return $req;
	
}
public function selectAffiliateCompanyHQList($mainCategory = false){

	$req = $this->bdd->query('SELECT * FROM affiliate_company ');
	return $req;
	
}


public function selectAffiliateCompanyTrafficList($mainCategory = false){

	$req = $this->bdd->query('SELECT * FROM type_traffic ');
	return $req;
	
}
  public function selectAffiliateCompanyTypeAffiliateList($id_affiliate_company = false){

	$req = $this->bdd->query('SELECT * FROM type_affiliate WHERE id_affiliate_company = '.$id_affiliate_company);
	return $req;
	
}      
//=====================================INSERT======================================= 
//================================================================================

//==============Affiliate=company==================


        public function insertAffiliateCompany($affiliate_company)
{
            
            $req = $this->bdd->prepare('INSERT INTO affiliate_company(  company_name, address, id_country, websites, id_hq,   status ) VALUES ( :company_name, :address, :id_country, :websites, :id_hq,  :status)');
        $req->execute(array(
            'company_name' => $affiliate_company['company_name'],
             'address' => $affiliate_company['address'],
            'id_country' => $affiliate_company['id_country'],
             'websites' => $affiliate_company['websites'],
            'id_hq' => $affiliate_company['id_hq'],       
            'status' => $affiliate_company['status']
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         $id_affiliate_company = $this->bdd->lastInsertId();
         
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
$this->error = 'affiliate_company : '.$errors[2];}


  //=============Affiliate=company=category============================================
    

  /* $req = $this->bdd->prepare('INSERT INTO affiliate_company_category(  id_category, id_affiliate_company) VALUES ( :id_category, :id_affiliate_company)');
        $req->execute(array(
            'id_category' => $affiliate_company['id_category'],
            'id_affiliate_company' => $id_affiliate_company             
                
                
                )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         $id_affiliate_company = $this->bdd->lastInsertId();
      
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
$this->error = 'affiliate_company : '.$errors[2];} */


   //=================Type=TRAFFIC==========================================


   $req = $this->bdd->prepare('INSERT INTO affiliate_company_traffic(  id_affiliate_company, id_traffic) VALUES ( :id_affiliate_company, :id_traffic)');
        $req->execute(array(
            'id_affiliate_company' => $id_affiliate_company,
             'id_traffic' => $affiliate_company['id_traffic']
                
                )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
 if($req->errorCode() == 0) {
    
} else {
    $errors = $req->errorInfo();
    
    $this->error = 'category : '.$errors[2];
   
}

  //=================Type=type=AFFILIATE==========================================


   $req = $this->bdd->prepare('INSERT INTO affiliate_company_type_affiliate(  id_affiliate_company, id_type_affiliate) VALUES ( :id_affiliate_company, :id_type_affiliate)');
        $req->execute(array(
            'id_affiliate_company' => $id_affiliate_company,
             'id_type_affiliate' => $affiliate_company['id_type_affiliate']
                
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

//============================UPDATE==============================================
//==================================================================================


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