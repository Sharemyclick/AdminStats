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
  private $status;          
   /*
   GETTERS
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
	
	  // get categories list
	public function getAffiliateCompaniesList(){
	  $affiliate_companiesSql = new AffiliateCompanySql();
	  $affiliate_companies_sql= $affiliate_companySql->selectAffiliateCompaniesList();
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  return $this->setAffiliateCompaniessList();
	  }
	
	/*
  SETTERS
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

     // set categories list
  public function setAffiliateCompanyList($affiliate_companies_list)
  {
   $this->affiliate_companies_list = $affiliate_companies_list;
  } 

    /*
  METHODS
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