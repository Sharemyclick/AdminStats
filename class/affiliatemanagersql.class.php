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
public function selectAffiliateManagerList(){

	$req = $this->bdd->query('SELECT * FROM affiliate_manager am 
                 LEFT JOIN affiliate_company ac ON am.id_affiliate_company = ac.id_affiliate_company ');
	return $req;
	
}
public function selectAffiliateManager($id_affiliate_manager=false){

	$req = $this->bdd->query('SELECT * FROM affiliate_manager am LEFT JOIN affiliate_company ac ON am.id_affiliate_company = ac.id_affiliate_company WHERE am.id_affiliate_manager= '.$id_affiliate_manager);
	$res=$req->fetch();
        return $res;
	
}

//==========================INSERT====================================


public function insertAffiliateManager($affiliate_manager)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO affiliate_manager(  name, surname, email, skype, telephone, id_affiliate_company, id_country, date_birth, manager_status ) VALUES ( :name, :surname, :email, :skype, :telephone, :id_affiliate_company, :id_country, :date_birth, :manager_status)');
        $req->execute(array(
            'name' => $affiliate_manager['name'],
             'surname' => $affiliate_manager['surname'],
            'email' => $affiliate_manager['email'],
             'skype' => $affiliate_manager['skype'],
            'telephone' => $affiliate_manager['telephone'],
            'id_affiliate_company' => $affiliate_manager['id_affiliate_company'],
              'id_country' => $affiliate_manager['id_country'],
            'date_birth' => $affiliate_manager['date_birth']   ,
            'manager_status' => $affiliate_manager['manager_status']
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
  
         
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
}
  
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'manager : '.$errors[2];
    return false;
   
}




//========================UPDATE===================================


public function updateAffiliateManager($affiliate_manager,$values)
{
   $req = $this->bdd->prepare('UPDATE affiliate_manager SET name=:name, surname=:surname, email=:email,skype=:skype, telephone=:telephone, id_affiliate_company=:id_affiliate_company, date_birth=:date_birth, manager_status=:manager_status WHERE id_affiliate_manager =' .$id_affiliate_manager);
   $req->execute(array(    
            'name' => $values['name'],
            'surname' => $values['surname'],
            'email' => $values['email'],
            'skype' => $values['skype'],
            'telephone' => $values['telephone'],
          'id_country' => $values['id_country'],
            'id_affiliate_company' => $values['id_affiliate_company'],   
            'date_birth' => $values['date_birth']   ,
            'manager_status' => $values['manager_status']

)) or die(print_r($req->errorInfo()));  // On traque l'erreur s'il y en a une
 if($req->errorCode() == 0) {
     $req->closeCursor();
     return true;
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'manager : '.$errors[2];
    return false;
}
}

}