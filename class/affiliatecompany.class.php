<?php

include "affiliatecompanysql.class.php";

class Affiliate_Company
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
	public function getCategoriesList($mainCategory = false){
	  $categorySql = new CategorySql();
	  $categories_sql= $categorySql->selectCategoriesList($mainCategory);
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  return $this->setCategoriesList($categories_list);
	  }
	
	/*
  SETTERS
  */
  
   // set idcategory
  public function setIdCategory($id_category)
  {
   $this->id_category = $id_category;
  } 
   // set category_name
  public function setCategoryName($category_name)
  {
   $this->category_name = $category_name;
  } 
  
   // set category_mother
  public function setCategoryMother($category_mother)
  {
   $this->category_mother = $category_mother;
  } 
  
    // set categories list
  public function setCategoriesList($categories_list)
  {
   $this->categories_list = $categories_list;
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