<?php

class CampaignShootSql
{
private $bdd;
public $error = 0;
public $errors;

public function CampaignShootSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectCampaignShootsList($campaign_shoot = false){

	$req = $this->bdd->query('SELECT * FROM campaign_shoot cs LEFT JOIN campaign_management cm ON cs.id_campaign_management=cm.id_campaign_management '
                . 'LEFT JOIN dbase d ON cs.id_db=d.id_database ');
	return $req;
	
}
public function SelectCampaignShootsInfo($campaign_shoot = false){

	$req = $this->bdd->query('SELECT * FROM campaign_shoot cs LEFT JOIN campaign_management cm ON cs.id_campaign_management=cm.id_campaign_management '
                . 'LEFT JOIN dbase d ON cs.id_db=d.id_database WHERE campaign_shoot='.$campaign_shoot );
        $res= $req->fetch();
	return $res;
	
}

//==========================INSERT====================================


public function insertCampaignManagement($campaign_shoot)
        
        
        
{$req = $this->bdd->prepare('INSERT INTO campaign_management(  date, id_database, price, id_campaign_management, type_payout, leads, impressions, clics ) VALUES ( :date, :id_database, :price, :id_campaign_management, :type_payout, :leads, :impressions, :clics)');
        $req->execute(array(
            'date' => $campaign_shoot['date'],
           'id_database' => $campaign_shoot['id_database'],
            'price' => $campaign_shoot['price'],
             'id_campaign_management' => $campaign_shoot['id_campaign_management'],
            'type_payout' => $campaign_shoot['type_payout'],
            'leads' => $campaign_shoot['leads'],
            'impressions' => $campaign_shoot['impressions'],
            
           
            'clics' => $campaign_shoot['clics']
     )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
}
}