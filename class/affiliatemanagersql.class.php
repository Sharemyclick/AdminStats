<?php
class AffiliateManagerSql
{
private $bdd;

public function AffiliateManagerSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}
public function selectAffiliateManagerCategoryList(){

	$req = $this->bdd->query('SELECT * FROM affiliate_company_category acc LEFT JOIN ');
return $req;

}

public function selectAffiliateManagerCountryList(){

	$req = $this->bdd->query('SELECT * FROM affiliate_manager_country m'
                 . 'LEFT JOIN country c ON m.id_country = c.id_country');
	return $req;
}
public function selectAffiliateManagerList($mainAffiliateManager = false){

	$req = $this->bdd->query('SELECT * FROM affiliate_manager  ');
	return $req;
	
}

//==========================INSERT====================================


public function insertAffiliateManager($affiliate_manager)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO affiliate_manager(  name, surname, email, skype, telephone, id_affiliate_company, date_birth, status ) VALUES ( :name, :surname, :email, :skype, :telephone, :id_affiliate_company, :date_birth, :status)');
        $req->execute(array(
            'name' => $affiliate_manager['name'],
             'surname' => $affiliate_manager['surname'],
            'email' => $affiliate_manager['email'],
             'skype' => $affiliate_manager['skype'],
            'telephone' => $affiliate_manager['telephone'],
         
            'id_affiliate_company' => $affiliate_manager['id_affiliate_company'],   
            'date_birth' => $affiliate_manager['date_birth']   ,
            'status' => $affiliate_manager['status']
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
   $id_affiliate_manager = $this->bdd->lastInsertId();
         
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
    $this->error = 'affiliate_company : '.$errors[2];
   
   $req = $this->bdd->prepare('INSERT INTO affiliate_company_category(  id_affiliate_manager, id_affiliate_company) VALUES ( :id_affiliate_manager, :id_affiliate_company)');
        $req->execute(array(
            'id_affiliate_manager' => $id_affiliate_manager,
             'id_affiliate_company' => $affiliate_manager['id_affiliate_company']
             )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
  
         
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
    $this->error = 'affiliate_company : '.$errors[2];
   
   $req = $this->bdd->prepare('INSERT INTO affiliate_manager_country(  id_affiliate_manager,id_country) VALUES ( :id_affiliate_manager, :id_country)');
        $req->execute(array(
            'id_affiliate_manager' => $id_affiliate_manager,
             'id_country' => $affiliate_manager['id_country']    
                
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
}

//========================UPDATE===================================


public function updateAffiliateManager($affiliate_manager)
{
   $req = $this->bdd->prepare('UPDATE affiliate_manager SET name=:name, surname=:surname, email=:email,skype=:skype, telephone=:telephone, id_affiliate_company=:id_affiliate_company, date_birth=:date_birth, status=:status WHERE id_affiliate_manager =' .$id_affiliate_manager);
   $req->execute(array(    
            'name' => $affiliate_manager['name'],
            'surname' => $affiliate_manager['surname'],
            'email' => $affiliate_manager['email'],
            'skype' => $affiliate_manager['skype'],
            'telephone' => $affiliate_manager['telephone'],
         
            'id_affiliate_company' => $affiliate_manager['id_affiliate_company'],   
            'date_birth' => $affiliate_manager['date_birth']   ,
            'status' => $affiliate_manager['status']

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