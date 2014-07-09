<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdvertiserSql
{
private $bdd;
public $error;

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

$req = $this->bdd->prepare('INSERT INTO invoice_contact(  email, name, iban, swift, invoicing_contact,vat ) VALUES ( :email, :name, :iban, :swift, :invoicing_contact, :vat)');
        $req->execute(array(
		'email' => $advertiser['email_invoice_contact'],
        'name' => $advertiser['name_invoice_contact'],
            'iban' => $advertiser['iban'],
            'swift' => $advertiser['swift'],
            'invoicing_contact' => $advertiser['invoicing_contact'],
                'vat' => $advertiser['vat']
        )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
          $id_invoice_contact = $this->bdd->lastInsertId();
 if($req->errorCode() == 0) {
     $req->closeCursor();
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'invoice_contact : '.$errors[2];
   
}

   
 $req = $this->bdd->prepare('INSERT INTO advertiser(  company_name, websites, category_product, country'
        . ' id_stats_validation, id_invoice_contact, id_management_contact,  logo, status, address,company_type, telephone_company) '
        . 'VALUES ( :company_name, :websites, :category_product, :country, :id_stats_validation, :id_invoice_contact, :id_management_contact,'
        . ' :logo, :status, :address, :company_type, :telephone_company)');
 
 
$req->execute(array(
		'company_name' => $advertiser['company_name'],
                'websites'=> $advertiser['websites'],
		'category_product' => $advertiser['category_product'],
    'country' => $advertiser['country'],
    'id_stats_validation'  => $id_stats_validation,
    'id_invoice_contact' => $id_invoice_contact,
    'id_management_contact' => $id_management_contact,
                'logo' => $advertiser['logo']['name'],
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
public function getAdvertisers($filters = false, $order = false)
{
   $where = "";
    if($order){
       $order_by = ' ORDER BY '.$order['value'].' '.$order['asc_desc'];
   }else{
       $order_by = ' ORDER BY company_name';
   }
    if($filters){
        $where = " AND ".$filters['field']." = ".$filters['value'];
    }
    $req = $this->bdd->query('SELECT id_advertiser, company_name, websites, category_product, country, logo, status, address, company_type, telephone_company,i.email AS invoice_email, i.name AS invoice_name, iban, swift, invoicing_contact, vat, url, username, password, validation_delay, m.name AS management_name, m.email AS management_email, telephone, skype, conversation_language FROM advertiser a JOIN invoice_contact i ON a.id_invoice_contact=i.id_invoice_contact JOIN stats_validation s ON a.id_stats_validation=s.id_stats_validation JOIN management_contact m ON a.id_management_contact=m.id_management_contact'
            . ' WHERE 1 '.$where.$order_by);
return $req;

}




public function updateAdvertiser($advertiser)
{
    $id_advertiser=$advertiser['id_advertiser'];
  
   $req = $this->bdd->query('SELECT id_invoice_contact, id_management_contact,id_stats_validation FROM advertiser WHERE id_advertiser =' .$id_advertiser);
   $res = $req->fetch();
    $id_management_contact=$res['id_management_contact'];
    $id_invoice_contact=$res['id_invoice_contact'];
    $id_stats_validation=$res['id_stats_validation'];
    
    
    
   $req = $this->bdd->prepare('UPDATE advertiser SET company_name=:company_name, websites=:websites, category_product=:category_product, country=:country , logo=:logo , status=:status , address=:address , company_type=:company_type , telephone_company=:telephone_company  WHERE id_advertiser =' .$id_advertiser);
   $req->execute(array( 
       'company_name' => $advertiser['company_name'],
                'websites'=> $advertiser['websites'],
		'category_product' => $advertiser['category_product'],
                'country' => $advertiser['country'],
                'logo' => $advertiser['logo']['name'],
		'status' => $advertiser['status'],
                'address' => $advertiser['address'],
                'company_type' => $advertiser['company_type'],
                'telephone_company' => $advertiser['telephone_company']
           ));



   $req = $this->bdd->prepare('UPDATE invoice_contact SET email=:email, name=:name, iban=:iban, swift=:swift, invoicing_contact=:invoicing_contact, vat=:vat WHERE id_invoice_contact =' .$id_invoice_contact);
   $req->execute(array(
             'email' => $advertiser['email_invoice_contact'],
             'name' => $advertiser['name_invoice_contact'],
            'iban' => $advertiser['iban'],
            'swift' => $advertiser['swift'],
            'invoicing_contact' => $advertiser['invoicing_contact'],
            'vat' => $advertiser['vat']
       )) ;
       




   $req = $this->bdd->prepare('UPDATE stats_validation SET  url=:url, username=:username, password=:password, validation_delay=:validation_delay WHERE id_stats_validation =' .$id_stats_validation);
  $req->execute(array(
             'url' => $advertiser['url'],
             'username' => $advertiser['username'],
            'password' => $advertiser['password'],
            'validation_delay' => $advertiser['validation_delay']   
      )) ;





   $req = $this->bdd->prepare('UPDATE management_contact SET name=:name, email=:email, telephone=:telephone,skype=:skype, conversation_language=:conversation_language WHERE id_management_contact =' .$id_management_contact);
   $req->execute(array(    
             'name' => $advertiser['name_management_contact'],
             'email' => $advertiser['email_management_contact'],
            'telephone' => $advertiser['telephone'],
            'skype' => $advertiser['skype'],
            'conversation_language' => $advertiser['conversation_language'] 

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