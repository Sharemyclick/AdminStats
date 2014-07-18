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
public $affiliate_managers_list =array();
public $affiliate_manager_category_list =array();
public $affiliate_manager_country_list =array();
public $affiliate_manager = array();

//==================================GET=======================================
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
//================================GET=LIST==============================
  // get categories list
	public function getAffiliateManagersList(){
	  $affiliatemanagerSql = new AffiliateManagerSql();
	  $affiliate_managers_list= $affiliatemanagerSql->selectAffiliateManagerList();
	  //TODO setup $affiliatemanagers_list from query results
	  // structure of $affiliatemanager_list : Array('id','name')
	  return $this->setAffiliateManagersList($affiliate_managers_list);
	  }
           public function getAffiliateManagerInformation($id){
	  $affiliate_managerSql = new AffiliateManagerSql();
	  $affiliate_manager= $affiliate_managerSql->selectAffiliateManager($id);
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  $this->setAffiliateManagerInformation($affiliate_manager);
          return true;
	  }
	public function getAffiliateManagerCategoryList(){
	  $affiliate_manager_categorySql = new AffiliateManagerSql();
          
	  $affiliate_managers_list= $affiliate_manager_categorySql->selectAffiliateManagerCategoryList();
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  return $this->setAffiliateManagersCategoryList($affiliate_managers_list);
	  }
          public function getAffiliatemanagerCountryList(){
	  $affiliate_manager_countrySql = new AffiliateManagerSql();
          
	  $affiliate_managers_list= $affiliate_manager_countrySql->selectAffiliateManagerCountryList();
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  return $this->setAffiliateManagersCountryList($affiliate_managers_list);
	  }
	/*
  ==========================SETTERS===================================
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
//==================SET=LIST====================

public function setAffiliateManagersList($affiliate_managers_list)
  {
   $this->affiliate_managers_list = $affiliate_managers_list;
  } 
  public function setAffiliateManagersCategoryList($affiliate_manager_category_list) {
     $this->affiliate_manager_category_list = $affiliate_manager_category_list;
 }  
public function setAffiliateManagersCountryList($affiliate_manager_country_list) {
     $this->affiliate_manager_country_list = $affiliate_manager_country_list;
 }  
 public function setAffiliateManagerInformation($affiliate_manager)
  {
   $this->affiliate_manager = $affiliate_manager;
  } 
    /*
  ==============================METHODS==================================
  */
    public function createAffiliateManager($affiliate_manager)
 { $affiliate_managerSql = new AffiliateManagerSql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $affiliate_managerSql->insertAffiliateManager($affiliate_manager);
  if(!$result)
  {return($affiliate_managerSql->error);}
  else{
         return 'An affiliate manager has been created';
  } 
 }
   public function updateAffiliateManager($affiliate_manager,$values)
 { $affiliate_managerSql = new AffiliateManagerSql();

   $result = $affiliate_managerSql->updateAffiliateManager($affiliate_manager,$values);
  if(!$result)
  {return($affiliate_managerSql->error);}
  else{
         return 'affiliate manager has been updated';
  } 
 }   
}