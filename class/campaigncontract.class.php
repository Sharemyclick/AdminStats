<?php
include "campaigncontractsql.class.php";


class CampaignContract{
    
   private $id_campaign_contract;
   private $id_db;
   private $date_contract;
   private $price;
   private $type_payout;
   private $id_campaign_management;

   
   
   public $campaign_contracts_list;
   public $campaign_contracts_info;
   
 //====================GET==================================
   
   
   public function getId_campaign_contract() {
       return $this->id_campaign_contract;
   }

   public function getId_db() {
       return $this->id_db;
   }

   public function getDate_contract() {
       return $this->date_contract;
   }

   
   public function getPrice() {
       return $this->price;
   }

   public function getType_payout() {
       return $this->type_payout;
   }

   public function getId_campaign_management() {
       return $this->id_campaign_management;
   }




    //=========================GET LIST==================================
    public function getCampaignContractsList(){
	  $campaign_contractSql = new CampaignContractSql();
	  $campaign_contracts_list= $campaign_contractSql->SelectCampaignContractsList();
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setCampaignContractsList($campaign_contracts_list);
	  }
          
          public function getCampaigncontractsInfo($id_campaign_contract){
	  $campaign_contractSql = new CampaignContractSql();
	  $campaign_contracts_info= $campaign_contractSql->SelectCampaignContractsInfo($id_campaign_contract);
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setCampaignContractsInfo($campaign_contracts_info);
	  }
   
   
   //==============================SET=====================================
   
   public function setId_campaign_contract($id_campaign_contract) {
       $this->id_campaign_contract = $id_campaign_contract;
   }

   public function setId_db($id_db) {
       $this->id_db = $id_db;
   }

   public function setDate_contract($date_contract) {
       $this->date_contract = $date_contract;
   }

   
   public function setPrice($price) {
       $this->price = $price;
   }

   public function setType_payout($type_payout) {
       $this->type_payout = $type_payout;
   }

   public function setId_campaign_management($id_campaign_management) {
       $this->id_campaign_management = $id_campaign_management;
   }

 
//===============================SET LIST====================================
   public function setCampaignContractsList($campaign_contracts_list)
  {
   $this->campaign_contracts_list = $campaign_contracts_list;
  } 
   public function setCampaignContractsInfo($campaign_contracts_info)
  {
   $this->campaign_contracts_info = $campaign_contracts_info;
  } 
   
   
   //===============================METHODS==================================
public function createCampaignContract($campaign_contract)
 { $campaign_contractSql = new CampaignContractSql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $campaign_contractSql->insertCampaignContract($campaign_contract);
  if(!$result)
  {return($campaign_contractSql->error);}
  else{
         return 'A campaign contract has been created';
  } 
 }
 
  }
