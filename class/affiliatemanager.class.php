<?php

include "affiliatemanagersql.class.php";
class AffiliateManager
{
  private $id_affiliate_manager;
  private $name;
  private $surname;
  private $email;
  private $skype;
  private $telephone;
  private $id_affiliate_company;
  private $date_birth;
  private $status;        
  
  private $affiliatecompanies_list = array();
 public  function getId_affiliate_manager() {
return $this->id_affiliate_manager;
}

public  function getName() {
return $this->name;
}

public  function getSurname() {
return $this->surname;
}

public  function getEmail() {
return $this->email;
}

public  function getSkype() {
return $this->skype;
}

public  function getTelephone() {
return $this->telephone;
}

public  function getId_affiliate_company() {
return $this->id_affiliate_company;
}

public  function getDate_birth() {
return $this->date_birth;
}

public  function getStatus() {
return $this->status;
}

  // get categories list
	public function getAffiliateManagersList(){
	  $affiliatemanagerSql = new AffiliateManagerSql();
	  $affiliatemanagers_sql= $affiliatemanagerSql->SelectAffiliateManagerList();
	  //TODO setup $affiliatemanagers_list from query results
	  // structure of $affiliatemanager_list : Array('id','name')
	  return $this->setAffiliateManagersList($affiliatemanagers_list);
	  }
	
	/*
  SETTERS
  */

public function setId_affiliate_manager($id_affiliate_manager) {
    $this->id_affiliate_manager = $id_affiliate_manager;
}

public function setName($name) {
    $this->name = $name;
}

public function setSurname($surname) {
    $this->surname = $surname;
}

public function setEmail($email) {
    $this->email = $email;
}

public function setSkype($skype) {
    $this->skype = $skype;
}

public function setTelephone($telephone) {
    $this->telephone = $telephone;
}

public function setId_affiliate_company($id_affiliate_company) {
    $this->id_affiliate_company = $id_affiliate_company;
}

public function setDate_birth($date_birth) {
    $this->date_birth = $date_birth;
}

public function setStatus($status) {
    $this->status = $status;
}

public function setAffiliateManagersList($affiliatemanagers_list)
  {
   $this->affiliatemanagers_list = $affiliatemanagers_list;
  } 
    /*
  METHODS
  */
    public function createAffiliateManager($affiliate_manager)
 { $affiliate_managerSql = new AdffiliateManagerSql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $affiliate_managerSql->insertAffiliateManager($affiliate_manager);
  if(!$result)
  {return($affiliate_managerSql->error);}
  else{
         return 'An affiliate manager has been created';
  } 
 }
   public function updateAffiliateManager($affiliate_manager)
 { $affiliate_managerSql = new AdffiliateManagerSql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $affiliate_managerSql->updateAffiliateManager($affiliate_manager);
  if(!$result)
  {return($affiliate_managerSql->error);}
  else{
         return 'affiliate manager has been updated';
  } 
 }   
}