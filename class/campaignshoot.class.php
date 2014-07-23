<?php
include "campaignshootsql.class.php";


class CampaignShoot{
    
   private $id_campaign_shoot;
   private $id_db;
   private $date;
   private $price;
   private $type_payout;
   private $id_campaign_management;
   private $leads;
   private $impressions;
   private $clics;
   
   
   public $campaign_shoots_list;
   public $campaign_shoots_info;
   
 //====================GET==================================
   
   
   public function getId_campaign_shoot() {
       return $this->id_campaign_shoot;
   }

   public function getId_db() {
       return $this->id_db;
   }

   public function getDate() {
       return $this->date;
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

   public function getLeads() {
       return $this->leads;
   }

   public function getImpressions() {
       return $this->impressions;
   }

   public function getClics() {
       return $this->clics;
   }


    //=========================GET LIST==================================
    public function getCampaignShootsList(){
	  $campaign_shootSql = new CampaignShootSql();
	  $campaign_shoots_list= $campaign_shootSql->SelectCampaignShootsList();
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setCampaignShootsList($campaign_shoots_list);
	  }
          
          public function getCampaignShootsInfo($id_campaign_shoot){
	  $campaign_shootSql = new CampaignShootSql();
	  $campaign_shoots_info= $campaign_shootSql->SelectCampaignShootsInfo($id_campaign_shoot);
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setCampaignShootsInfo($campaign_shoots_info);
	  }
   
   
   //==============================SET=====================================
   
   public function setId_campaign_shoot($id_campaign_shoot) {
       $this->id_campaign_shoot = $id_campaign_shoot;
   }

   public function setId_db($id_db) {
       $this->id_db = $id_db;
   }

   public function setDate($date) {
       $this->date = $date;
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

   public function setLeads($leads) {
       $this->leads = $leads;
   }

   public function setImpressions($impressions) {
       $this->impressions = $impressions;
   }

   public function setClics($clics) {
       $this->clics = $clics;
   }

//===============================SET LIST====================================
   public function setCampaignShootsList($campaign_shoots_list)
  {
   $this->campaign_managements_list = $campaign_managements_list;
  } 
   public function setCampaignShootsInfo($campaign_shoots_info)
  {
   $this->campaign_managements_info = $campaign_managements_info;
  } 
   
   
   //===============================METHODS==================================
public function createCampaignShoot($campaign_shoot)
 { $campaign_shootSql = new CampaignShootSql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $campaign_shootSql->insertCampaignShoot($campaign_shoot);
  if(!$result)
  {return($campaign_shootSql->error);}
  else{
         return 'A campaign shoot has been created';
  } 
 }
 
  }
