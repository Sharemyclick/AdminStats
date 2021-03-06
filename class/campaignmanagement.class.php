<?php
include "campaignmanagementsql.class.php";


class CampaignManagement{
    
    private $id_campaign_management;
    private $name;
    private $payout_affiliate;
    private $payout_smc;
    private $type_payout;
    private $allowed;
    private $conversion;
    private $device;
    private $thumbnail;
    private $id_advertiser;
    
     public $campaign_managements_list = array();
    public $campaign_managements_info= array();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
public function getId_campaign_management() {
    return $this->id_campaign_management;
}

public function getName() {
    return $this->name;
}

public function getPayout_affiliate() {
    return $this->payout_affiliate;
}

public function getPayout_smc() {
    return $this->payout_smc;
}

public function getType_payout() {
    return $this->type_payout;
}

public function getAllowed() {
    return $this->allowed;
}

public function getThumbnail() {
    return $this->thumbnail;
}
public function getId_advertiser() {
    return $this->id_advertiser;
}
public function getConversion() {
    return $this->conversion;
}

public function getDevice() {
    return $this->device;
}

  public function getCampaignManagementsList(){
	  $campaign_managementSql = new CampaignManagementSql();
	  $campaign_managements_list= $campaign_managementSql->SelectCampaignManagementsList();
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setCampaignManagementsList($campaign_managements_list);
	  }
 public function getCampaignManagementsInfo($id_campaign_management){
	  $campaign_managementSql = new CampaignManagementSql();
	  $campaign_managements_info= $campaign_managementSql->SelectCampaignManagementsInfo($id_campaign_management);
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setCampaignManagementsInfo($campaign_managements_info);
	  }	
	/*
  SETTERS
  */
public function setId_campaign_management($id_campaign_management) {
    $this->id_campaign_management = $id_campaign_management;
}

public function setName($name) {
    $this->name = $name;
}

public function setPayout_affiliate($payout_affiliate) {
    $this->payout_affiliate = $payout_affiliate;
}

public function setPayout_smc($payout_smc) {
    $this->payout_smc = $payout_smc;
}

public function setType_payout($type_payout) {
    $this->type_payout = $type_payout;
}

public function setAllowed($allowed) {
    $this->allowed = $allowed;
}

public function setThumbnail($thumbnail) {
    $this->thumbnail = $thumbnail;
}
public function setId_advertiser($id_advertiser) {
    $this->id_advertiser = $id_advertiser;
}
public function setConversion($conversion) {
    $this->conversion = $conversion;
}

public function setDevice($device) {
    $this->device = $device;
}

  public function setCampaignManagementsList($campaign_managements_list)
  {
   $this->campaign_managements_list = $campaign_managements_list;
  } 
   public function setCampaignManagementsInfo($campaign_managements_info)
  {
   $this->campaign_managements_info = $campaign_managements_info;
  } 
    /*
  METHODS
  */
 public function createCampaignManagement($campaign_managements_list)
 { $affiliate_campaign_managementSql = new CampaignManagementSql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $affiliate_campaign_managementSql->insertCampaignManagement($campaign_managements_list);
  if(!$result)
  {return($affiliate_campaign_managementSql->error);}
  else{
         return 'A campaign management has been created';
  } 
 }
  public function updateCampaignManagement($id_campaign_management,$values)
 { $campaign_managementSql = new CampaignManagementSql();

   $result = $campaign_managementSql->updateCampaignManagement($id_campaign_management,$values);
  if(!$result)
  {return($campaign_managementSql->error);}
  else{
         return 'Campaign has been updated';
  } 
 }   
}