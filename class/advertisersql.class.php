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

	$req = $this->bdd->query('SELECT * FROM advertiser ORDER BY "company_name"');
	return $req;
	
}
public function insertAdvertiser($advertiser)
        
  //=============================INSERT======================================
        //==============================================================
        
        //================MANAGEMENT_CONTACT================================
        
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
  //================STAT_VALIDATION================================


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
  //================INVOICE_CONTACT================================


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

     //================ADVERTISER================================


 $req = $this->bdd->prepare('INSERT INTO advertiser(  company_name, websites, id_category_product, country'
        . ' , id_stats_validation, id_invoice_contact, id_management_contact,  logo, status, address,company_type, telephone_company) '
        . 'VALUES ( :company_name, :websites, :id_category_product, :country, :id_stats_validation, :id_invoice_contact, :id_management_contact,'
        . ' :logo, :status, :address, :company_type, :telephone_company)');
 
 
$req->execute(array(
		'company_name' => $advertiser['company_name'],
                'websites'=> $advertiser['websites'],
		'id_category_product' => $advertiser['id_category_product'],
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
    $req = $this->bdd->query('SELECT id_advertiser, company_name, websites, id_category_product, country, logo, status, address, company_type, telephone_company,i.email AS invoice_email, i.name AS invoice_name, iban, swift, invoicing_contact, vat, url, username, password, validation_delay, m.name AS management_name, m.email AS management_email, telephone, skype, conversation_language FROM advertiser a JOIN invoice_contact i ON a.id_invoice_contact=i.id_invoice_contact JOIN stats_validation s ON a.id_stats_validation=s.id_stats_validation JOIN management_contact m ON a.id_management_contact=m.id_management_contact'
            . ' WHERE 1 '.$where.$order_by);
return $req;

}


//============================UPDATE=========================================

public function updateAdvertiser($advertiser)
{
    $id_advertiser=$advertiser['id_advertiser'];
  
   $req = $this->bdd->query('SELECT id_invoice_contact, id_management_contact,id_stats_validation, id_category_product FROM advertiser WHERE id_advertiser =' .$id_advertiser);
   $res = $req->fetch();
    $id_management_contact=$res['id_management_contact'];
    $id_invoice_contact=$res['id_invoice_contact'];
    $id_stats_validation=$res['id_stats_validation'];
    $id_category_product=$res['id_category_product'];
    
    
    
   $req = $this->bdd->prepare('UPDATE advertiser SET company_name=:company_name, websites=:websites, country=:country , logo=:logo , status=:status , address=:address , company_type=:company_type , telephone_company=:telephone_company  WHERE id_advertiser =' .$id_advertiser);
   $req->execute(array( 
       'company_name' => $advertiser['company_name'],
                'websites'=> $advertiser['websites'],
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
            'conversation_language' => $advertiser['conversation_language']));
           
           
    $req = $this->bdd->prepare('UPDATE advertiser_category SET id_advertiser=:id_advertiser, id_category_product=:id_category_product WHERE id_advertiser =' .$id_advertiser);
   $req->execute(array(    
             'id_advertiser' => $advertiser['id_advertiser'],
             'id_category_product' => $advertiser['id_category_product']

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


public function insertAdvertiserHistorical($advertiser)
{
  
 $req = $this->bdd->prepare('INSERT INTO historical_advertiser ( modification_date, id_advertiser, company_name, websites, id_category_product,' 
        .'logo, status, company_address, company_type, telephone_company, '
        . ' country, url_stats_validation, username, password, validation_delay, email_invoice_contact, name_invoice_contact, iban, swift, vat,'
        . 'invoicing_contact, name_management_contact, email_management_contact, telephone_management_contact, skype) '
        . 'VALUES'
        . '( :modification_date, :id_advertiser, :company_name, :websites, :id_category_product, :logo, :status, :company_address,'
        . ':company_type, :telephone_company, '
        . ' :country, :url, :username, :password, :validation_delay, :email_invoice_contact, :name_invoice_contact, :iban, :swift, :vat,'
        . ':invoicing_contact, :name_management_contact, :email_management_contact, :telephone_management_contact, :skype)');
 
$req->execute(array(
                'modification_date' => date('Y-m-d'),
		'id_advertiser' => $advertiser[0]['id_advertiser'],
                'company_name'=> $advertiser[0]['company_name'],
                'websites'=> $advertiser[0]['websites'],
		'id_category_product' => $advertiser[0]['id_category_product'],
                'logo' => $advertiser[0]['logo'],
		'status' => $advertiser[0]['status'],
                'company_address' => $advertiser[0]['address'],
                'company_type' => $advertiser[0]['company_type'],
                'telephone_company' => $advertiser[0]['telephone_company'],
                'country' => $advertiser[0]['country'],
                'url' => $advertiser[0]['url'],
                'username' => $advertiser[0]['username'],
                'password' => $advertiser[0]['password'],
                'validation_delay' => $advertiser[0]['validation_delay'],
                'email_invoice_contact' => $advertiser[0]['invoice_email'],
                'name_invoice_contact' => $advertiser[0]['invoice_name'],
                'iban' => $advertiser[0]['iban'],
                'swift' => $advertiser[0]['swift'],
                'vat' => $advertiser[0]['vat'],
                'invoicing_contact' => $advertiser[0]['invoicing_contact'],
                'name_management_contact' => $advertiser[0]['management_name'],
                'email_management_contact' => $advertiser[0]['management_email'],
                'telephone_management_contact' => $advertiser[0]['telephone'],
                'skype' => $advertiser[0]['skype']
        
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