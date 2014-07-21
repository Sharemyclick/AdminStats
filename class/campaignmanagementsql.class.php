<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CampaignManagementSql
{
private $bdd;
public $error = 0;
public $errors;

public function CampaignManagementSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectCampaignManagementsList($campaign_management = false){

	$req = $this->bdd->query('SELECT * FROM campaign_management cm LEFT JOIN country c ON c.id_country=cm.id_country LEFT JOIN campaign_management_category cmc ON cmc.id_campaigns_management=cm.id_campaign_management LEFT JOIN category_product cp ON cp.id_category_product=cmc.id_category');
	return $req;
	
}
//==========================INSERT====================================


public function insertCampaignManagement($campaign_management)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO campaign_management(  name, payout_affiliate, payout_smc, type_payout, allowed, id_country,  thumbnail ) VALUES ( :name,  :payout_affiliate, :payout_smc, :type_payout, :allowed, :id_country, :thumbnail)');
        $req->execute(array(
            'name' => $campaign_management['name'],
           
            'payout_affiliate' => $campaign_management['payout_affiliate'],
             'payout_smc' => $campaign_management['payout_smc'],
            'type_payout' => $campaign_management['type_payout'],
            'allowed' => $campaign_management['allowed'],
              'id_country' => $campaign_management['id_country'],
           
            'thumbnail' => $campaign_management['thumbnail']
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
   $id_campaign_management = $this->bdd->lastInsertId();
     
 if($req->errorCode() == 0) {
   
    
} else {echo fistnot;
    $errors = $req->errorInfo();
}
  $req = $this->bdd->prepare('INSERT INTO campaign_management_category(  id_category, id_campaigns_management ) VALUES ( :id_category,  :id_campaigns_management)');
        $req->execute(array(
            
           
            'id_category' => $campaign_management['id_category']   ,
             'id_campaigns_management' => $id_campaign_management
                
                  )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
   $id_camapign_management = $this->bdd->lastInsertId();
         
 if($req->errorCode() == 0) {
   

}

else {
    echo secondnotok;
}
  
    $req->closeCursor();
   
    return false;
   
}




//========================UPDATE===================================


public function updateAffiliateManager($id_affiliate_manager,$values)
{
   $req = $this->bdd->prepare('UPDATE affiliate_manager SET name=:name, surname=:surname, email=:email, skype=:skype, id_country=:id_country, telephone=:telephone, id_affiliate_company=:id_affiliate_company, date_birth=:date_birth, manager_status=:manager_status WHERE id_affiliate_manager =' .$id_affiliate_manager);
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
 if($req->errorCode() === 0) {
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
