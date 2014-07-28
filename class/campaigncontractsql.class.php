<?php

class CampaignContractSql
{
private $bdd;
public $error = 0;
public $errors;

public function CampaignContractSql(){
	// On se connecte à la base de données.
	include 'connectbase.php';
}

public function SelectCampaignContractsList($campaign_contract = false){

	$req = $this->bdd->query('SELECT * FROM campaign_contract cs LEFT JOIN campaign_management cm ON cs.id_campaign_management=cm.id_campaign_management LEFT JOIN dbase d ON cs.id_database=d.id_database ');
       // $res=$req->fetch();
	return $req;
	
}
public function SelectCampaignContractsInfo($campaign_contract = false){

	$req = $this->bdd->query('SELECT * FROM campaign_contract cs LEFT JOIN campaign_management cm ON cs.id_campaign_management=cm.id_campaign_management '
                . 'LEFT JOIN dbase d ON cs.id_database=d.id_database WHERE id_campaign_contract='.$campaign_contract );
        //$res= $req->fetch();
	return $req;
	
}
public function SelectCampaignShootsInfo($campaign_contract = false){

	$req = $this->bdd->query('SELECT * FROM campaign_shoot WHERE id_campaign_contract='.$campaign_contract );
        //$res= $req->fetch();
	return $req;
	
}
//==========================INSERT====================================


public function insertCampaignContract($campaign_contract)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO campaign_contract(  date_contract, id_database, price, id_campaign_management, type_payout ) VALUES ( :date_contract, :id_database, :price, :id_campaign_management, :type_payout)');
        $req->execute(array(
            'date_contract' => $campaign_contract['date_contract'],
           'id_database' => $campaign_contract['id_database'],
            'price' => $campaign_contract['price'],
             'id_campaign_management' => $campaign_contract['id_campaign_management'],
            'type_payout' => $campaign_contract['type_payout']
            
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
}
public function insertCampaignShoot($campaign_shoot)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO campaign_shoot(  id_campaign_contract, date_shoot, clics, leads, impressions ) VALUES ( :id_campaign_contract, :date_shoot, :clics, :leads, :impressions)');
        $req->execute(array(
            'id_campaign_contract' => $campaign_shoot['id_campaign_contract'],
           'date_shoot' => $campaign_shoot['date_shoot'],
            'clics' => $campaign_shoot['clics'],
             'leads' => $campaign_shoot['leads'],
            'impressions' => $campaign_shoot['impressions']
            
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
}
}