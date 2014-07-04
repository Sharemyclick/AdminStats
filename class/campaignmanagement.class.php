<?php
include "campaignmanagementsql.class.php";


class user{
    
    private $id_campaign_management;
    private $name;
    private $payout_affiliate;
    private $payout_smc;
    private $type_payout;
    private $allowed;
    private $thumbnail;
    
     private $campaign_managements_list = array();
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

  public function getCampaignManagementsList(){
	  $campaign_managementSql = new CampaignManagementSql();
	  $campaign_managements_sql= $campaign_managementSql->SelectCampaignManagementList();
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setCampaignManagementsList($campaign_managements_list);
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

  public function setCampaignManagementsList($campaign_managements_list)
  {
   $this->campaign_managements_list = $campaign_managements_list;
  } 
    /*
  METHODS
  */

}