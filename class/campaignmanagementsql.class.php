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
	include 'connectbase.php';
}

public function SelectCampaignManagementsList($campaign_management = false){

	$req = $this->bdd->query('SELECT * FROM campaign_management cm LEFT JOIN country c ON c.id_country=cm.id_country LEFT JOIN campaign_management_category cmc ON cmc.id_campaigns_management=cm.id_campaign_management LEFT JOIN category_product cp ON cp.id_category_product=cmc.id_category LEFT JOIN advertiser adv ON adv.id_advertiser=cm.id_advertiser');
	return $req;
	
}

public function SelectCampaignManagementsInfo($id_campaign_management = false){

	$req = $this->bdd->query('SELECT * FROM campaign_management cm LEFT JOIN country c ON c.id_country=cm.id_country LEFT JOIN campaign_management_category cmc ON cmc.id_campaigns_management=cm.id_campaign_management LEFT JOIN category_product cp ON cp.id_category_product=cmc.id_category LEFT JOIN advertiser adv ON adv.id_advertiser=cm.id_advertiser WHERE id_campaign_management='.$id_campaign_management);
	$res=$req->fetch();
        return $res;
	
}
//==========================INSERT====================================


public function insertCampaignManagement($campaign_management)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO campaign_management(  name, id_advertiser, payout_affiliate, payout_smc, type_payout_management, allowed, conversion, device, id_country,  thumbnail ) VALUES ( :name,:id_advertiser, :payout_affiliate, :payout_smc, :type_payout_management, :allowed, :conversion, :device, :id_country, :thumbnail)');
        $req->execute(array(
            'name' => $campaign_management['name'],
           'id_advertiser' => $campaign_management['id_advertiser'],
            'payout_affiliate' => $campaign_management['payout_affiliate'],
             'payout_smc' => $campaign_management['payout_smc'],
            'type_payout_management' => $campaign_management['type_payout_management'],
            'allowed' => $campaign_management['allowed'],
            'conversion' => $campaign_management['conversion'],
            'device' => $campaign_management['device'],
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


public function updateCampaignManagement($id_campaign_management,$values)
{
   $req = $this->bdd->prepare('UPDATE campaign_management SET name=:name, id_advertiser=:id_advertiser, payout_affiliate=:payout_affiliate, payout_smc=:payout_smc, id_country=:id_country, type_payout_management=:type_payout_management, allowed=:allowed, conversion=:conversion, device=:device, thumbnail = :thumbnail WHERE id_campaign_management =' .$id_campaign_management);
   $req->execute(array(    
            'name' => $values['name'],
            'id_advertiser' => $values['id_advertiser'],
            'payout_affiliate' => $values['payout_affiliate'],
            'payout_smc' => $values['payout_smc'],
            'type_payout_management' => $values['type_payout_management'],
          'id_country' => $values['id_country'],
            'allowed' => $values['allowed'],   
            'conversion' => $values['conversion']   ,
       'device' => $values['device']   ,
            'thumbnail' => $values['thumbnail']

))  or die(print_r($req->errorInfo()));
            $req = $this->bdd->prepare('UPDATE campaign_management_category SET id_category=:id_category WHERE  id_campaigns_management =' .$id_campaign_management);
    $req->execute(array( 
                'id_category'=> $values['id_category']
                
           ))
           or die(print_r($req->errorInfo()));  // On traque l'erreur s'il y en a une
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
