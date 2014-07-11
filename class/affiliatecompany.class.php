<?php

include "affiliatecompanysql.class.php";

class AffiliateCompany
{
  private $id_affiliate_company;
  private $company_name;
  private $address;
  private $id_country;
  private $websites;
  private $id_hq;
  private $type_of_affiliate;
  public $affiliate_companies_list;
  private $status;  
  public $affiliate_companySql = array();
  public $affiliate_company_category_list;
  

   /*
   =============================GETTERS==================================
   */
   // get id_affiliate_company
  public function getIdAffiliateCompany()
  {
    return $this->id_affiliate_company;
  }
	   // get company_name
  public function getCompanyName()
  {
    return $this->company_name;
  }
	   // get address
  public function getAddress()
  {
    return $this->address;
	}
	
	 // get id_country
  public function getIdCountry()
  {
    return $this->id_country;
  }	
	   // get websites
  public function getWebsites()
  {
    return $this->websites;
  }	
  public function getAffiliate_companies_list() {
      return $this->affiliate_companies_list;
  }

  	   // get id_hq 
  public function getIdHq()
  {
    return $this->id_hq;
    
    
	}	
	
	   // get status
  public function getTypeOfAffiliate()
  {
    return $this->type_of_affiliate;
	}
	
	   // get status
  public function getStatus()
  {
    return $this->status;
	}
	//==================================GET=LIST==========================
	  // get categories list
	public function getAffiliateCompanyList(){
	  $affiliate_companySql = new AffiliateCompanySql();
	  $affiliate_companies_list= $affiliate_companySql->selectAffiliateCompanyList();
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  $this->setAffiliateCompaniesList($affiliate_companies_list);
          return true;
	  }
	
          public function getAffiliateCompanyCategoryList(){
	  $affiliate_company_categorySql = new AffiliateCompanySql();
	  $affiliate_companies_list= $affiliate_company_categorySql->selectAffiliateCompanyCategoryList();
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  return $this->setAffiliateCompanyCategoryList($affiliate_companies_list);
	  }
	/*
  =============================SETTERS======================================
  */
  
 public function setId_affiliate_company($id_affiliate_company) {
     $this->id_affiliate_company = $id_affiliate_company;
 }

 public function setCompany_name($company_name) {
     $this->company_name = $company_name;
 }

 public function setAddress($address) {
     $this->address = $address;
 }

 public function setId_country($id_country) {
     $this->id_country = $id_country;
 }

 public function setWebsites($websites) {
     $this->websites = $websites;
 }

 public function setId_hq($id_hq) {
     $this->id_hq = $id_hq;
 }

 public function setType_of_affiliate($type_of_affiliate) {
     $this->type_of_affiliate = $type_of_affiliate;
 }

 public function setStatus($status) {
     $this->status = $status;
 }
 
 //=================================SET=LIST============================
 public function setAffiliateCompanyCategoryList($affiliate_company_category_list) {
     $this->affiliate_company_cattegory_list = $affiliate_company_category_list;
 }  

      // set categories list
  public function setAffiliateCompaniesList($affiliate_companies_list)
  {
   $this->affiliate_companies_list = $affiliate_companies_list;
  } 

    /*
 ========================= METHODS==================================
  */
 public function createAffiliateCompany($affiliate_company)
 { $affiliate_companySql = new AdffiliateManagerSql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $affiliate_companySql->insertAffiliateCompany($affiliate_company);
  if(!$result)
  {return($affiliate_companySql->error);}
  else{
         return 'An affiliate company has been created';
  } 
 }
   public function updateAffiliateCompany($affiliate_company)
 { $affiliate_companySql = new AdffiliateCompanySql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $affiliate_companySql->updateAffiliateCompany($affiliate_company);
  if(!$result)
  {return($affiliate_managerSql->error);}
  else{
         return 'affiliate company has been updated';
  } 
 }   
  
  
  }