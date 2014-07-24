<?php

class CampaignContractSql
{
private $bdd;
public $error = 0;
public $errors;

public function CampaignContractSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectCampaignContractsList($campaign_contract = false){

	$req = $this->bdd->query('SELECT * FROM campaign_contract cs LEFT JOIN campaign_management cm ON cs.id_campaign_management=cm.id_campaign_management LEFT JOIN dbase d ON cs.id_database=d.id_database ');
        
	return $req;
	
}
public function SelectCampaignContractsInfo($campaign_contract = false){

	$req = $this->bdd->query('SELECT * FROM campaign_contract cs LEFT JOIN campaign_management cm ON cs.id_campaign_management=cm.id_campaign_management '
                . 'LEFT JOIN dbase d ON cs.id_db=d.id_database WHERE campaign_contract='.$campaign_contract );
        $res= $req->fetch();
	return $res;
	
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
}