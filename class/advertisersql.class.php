<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdvertiserSql
{
private $bdd;
private $error;

public function AdvertiserSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectAdvertisersList($advetiser = false){

	$req = $this->bdd->query('SELECT * FROM advertiser');
	return $req;
	
}
public function insertAdvertiser($advertiser)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO management_contact(  name, email, telephone,skype, conversation_language ) VALUES ( :name, :email, :telephone, :skype, :conversation_language)');
        $req->execute(array(
		'name' => $advertiser['name_management_contact'],
        'email' => $advertiser['email_management_contact'],
            'telephone' => $advertiser['telephone_management_contact'],
            'skype' => $advertiser['skype'],
              'conversation_language' => $advertiser['conversation_language']   
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
          $id_management_contact = $this->bdd->lastInsertId();
 if($req->errorCode() == 0) {
     $req->closeCursor();
    
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'management contact : '.$errors[2];
   
   
}

    $req = $this->bdd->prepare('INSERT INTO stats_validation(  url, username, password,validation_delay ) VALUES ( :url, :username, :password, :validation_delay)');
        $req->execute(array(
		'url' => $advertiser['url'],
        'username' => $advertiser['username'],
            'password' => $advertiser['password'],
            'validation_delay' => $advertiser['validation_delay']   
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
          $id_stats_validation = $this->bdd->lastInsertId();
 if($req->errorCode() == 0) {
     $req->closeCursor();
    
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'stats validation : '.$errors[2];
   
   
}

$req = $this->bdd->prepare('INSERT INTO invoice_contact(  email, name, iban, swift, invoicing_contact ) VALUES ( :email, :name, :iban, :swift, :invoicing_contact)');
        $req->execute(array(
		'email' => $advertiser['email_invoice_contact'],
        'name' => $advertiser['name_invoice_contact'],
            'iban' => $advertiser['iban'],
            'swift' => $advertiser['swift'],
            'invoicing_contact' => $advertiser['invoicing_contact']
        )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
          $id_invoice_contact = $this->bdd->lastInsertId();
 if($req->errorCode() == 0) {
     $req->closeCursor();
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'invoice_contact : '.$errors[2];
   
}

   
 $req = $this->bdd->prepare('INSERT INTO advertiser(  company_name, websites, category_product,'
        . ' id_stats_validation, id_invoice_contact, id_management_contact,  logo, status, address,company_type, telephone_company) '
        . 'VALUES ( :company_name, :websites, :category_product, :id_stats_validation, :id_invoice_contact, :id_management_contact,'
        . ' :logo, :status, :address, :company_type, :telephone_company)');
 
 
$req->execute(array(
		'company_name' => $advertiser['company_name'],
                'websites'=> $advertiser['websites'],
		'category_product' => $advertiser['category_product'],
    'id_stats_validation'  => $id_stats_validation,
    'id_invoice_contact' => $id_invoice_contact,
    'id_management_contact' => $id_management_contact,
                'logo' => $advertiser['logo'],
		'status' => $advertiser['status'],
                'address' => $advertiser['address'],
                'company_type' => $advertiser['company_type'],
                'telephone_company' => $advertiser['telephone_company']
		
		)) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
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