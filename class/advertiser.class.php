<?php

include 'advertisersql.class.php';
class Advertiser
{
  private $id_advertiser;
  private $company_name;
  private $websites;
  private $category_product;
  private $id_stats_validation;
  private $id_invoice_contact;
  private $id_management_contact;
  private $logo;
  private $status;
  private $address;
  private $company_type;
  private $telephone_company;
       
  public function Advertiser(){
      
  }
  
   /*
   GETTERS
   */
   // get idadvertiser
  public function getIdAdvertiser()
  {
    return $this->id_advertiser;
  } 
  // get companyname
  public function getCompanyName()
  {
    return $this->company_name;
  }
        
  // get websites
  public function getWebsites()
  {
    return $this->websites;
  }
        
  // get categoryproduct
  public function getCategoryProduct()
  {
    return $this->category_product;
  }
  
  
  // get idstatsvalidation
  public function getIdStatsValidation()
  {
    return $this->id_stats_validation;
  }
  
   
  // get idinvoicecontact
  public function getIdInvoiceContact()
  {
    return $this->id_invoice_contact;
  }
  
   // get idmanagementcontact
  public function getIdManagementContact()
  {
    return $this->id_management_contact;
  }
   
  
  // get logo
  public function getLogo()
  {
    return $this->logo;
  }
  
   // get status
  public function getStatus()
  {
    return $this->status;
  }
  
   // get address
  public function getAddress()
  {
    return $this->address;
  }
  public function getCompany_type() {
      return $this->company_type;
  }

  public function getTelephone_company() {
      return $this->telephone_company;
  }

    public function getAdvertisersList(){
	  $advertiserSql = new AdvertiserSql();
	  $advertisers_sql= $advertiserSql->SelectAdvertisersList();
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setAdvertisersList($advertiser_list);
	  }
       
  /*
  SETTERS
  */
  

   // set idadvertiser
  public function setIdAdvertiser($id_advertiser)
  {
   $this->id_advertiser = $id_advertiser;
  } 
  // set companyname
  public function setCompanyName( $company_name)
  {
   $this->company_name = $companyname;
  }
        
  // set websites
  public function setWebsites($websites)
  {
   $this->websites = $websites;
  }
        
  // set categoryproduct
  public function setCategoryProduct($category_product)
  {
   $this->category_product = $category_product;
  }
  
  
  // set idstatsvalidation
  public function setIdStatsValidation($id_stats_validation)
  {
   $this->id_stats_validation = $id_stats_validation;
  }
  
   
  // set idinvoicecontact
  public function setIdInvoiceContact($id_invoice_contact)
  {
    $this->id_invoice_contact = $id_invoice_contact;
  }
  
   // set idmanagementcontact
  public function setIdManagementContact($id_management_contact)
  {
   $this->id_management_contact = $id_management_contact;
  }

  
  // set logo
  public function setLogo($logo)
  {
    $this->logo = $logo;
  }
  
   // set status
  public function setStatus($status)
  {
   $this->status = $status;
  }
  public function setAddress($address) {
      $this->address = $address;
  }

    public function setCompany_type($company_type) {
      $this->company_type = $company_type;
  }

  public function setTelephone_company($telephone_company) {
      $this->telephone_company = $telephone_company;
  }

     // set address
 
  public function createAdvertiser($advertiser)
 { $advertiserSql = new AdvertiserSql();
   $result = $advertiserSql->insertAdvertiser($advertiser);
  if(!$result)
  {return($advertiserSql->error);}
  else{
         return 'advertiser has been created';
  } 
 }
  
  
  public function getAdvertisers($filters = false, $order = false)
  {$advertiserSql = new AdvertiserSql();
  $query = $advertiserSql->getAdvertisers($filters, $order);
      if(!$result){return false;}
  else{
    $advertisers = array();
    $i = 0;
    while($result = $query->fetch())
    {
       $advertisers[$i]['company_name'] = $result['company_name'];
        $advertisers[$i]['websites'] = $result['websites'];
        $advertisers[$i]['category_product'] = $result['category_product'];
        $advertisers[$i]['logo'] = $result['logo'];
        $advertisers[$i]['status'] = $result['status'];
        $advertisers[$i]['address'] = $result['address'];
        $advertisers[$i]['company_type'] = $result['company_type'];
        $advertisers[$i]['telephone_company'] = $result['telephone_company'];
        $advertisers[$i]['invoice_email'] = $result['i.email'];
        $advertisers[$i]['invoice_name'] = $result['i.name'];
        $advertisers[$i]['iban'] = $result['iban'];
        $advertisers[$i]['swift'] = $result['swift'];
        $advertisers[$i]['invoicing_contact'] = $result['invoicing_contact'];
        $advertisers[$i]['url'] = $result['url'];
        $advertisers[$i]['username'] = $result['username'];
        $advertisers[$i]['password'] = $result['password'];
        $advertisers[$i]['validation_delay'] = $result['validation_delay'];
        $advertisers[$i]['management_name'] = $result['m.name'];
        $advertisers[$i]['management_email'] = $result['m.email'];
        $advertisers[$i]['telephone'] = $result['telephone'];
        $advertisers[$i]['skype'] = $result['skype'];
        $advertisers[$i]['conversation_language'] = $result['conversation_language'];
      
        $i++;
    }
    return $advertisers;
  
}
  }
  /*
  METHODS
  */
  /*public createAdvertiser($advertiser){
	$advertizerSql = new AdvertizerSql();
	$advertizerSql->insertAdvertizer($advertiser);
  }*/
  
  /*public saveLogo($logo){
	$this->setLogo($logo['name']);
	//save in base
	$advertiserSql = new AdvertiserSql();
	$advertiserSql->insertLogo($logo['src']);
	//upload logo in server
	move_uploaded_file($logo['file'], '/img/'.$logo['name'])); //etc.......
  }*/
 
  
}