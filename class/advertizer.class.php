<?php
class Advertizer
{
  private $id_advertiser;
  private $company_name;
  private $websites;
  private $category_product;
  private $validation_delay;
  private $id_stats_validation;
  private $id_invoice_contact;
  private $id_management_contact;
  private $thumbnail;
  private $logo;
  private $status;
  private $adress;
       
  public function Advertizer(){
      
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
  
  // get validationdelay
  public function getValidationDelay()
  {
    return $this->validation_delay;
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
   
  // get thumbnail
  public function getThumbnail()
  {
    return $this->thumbnail;
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
    return $this->Adress;
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
  
  // set validationdelay
  public function setValidationDelay($validation_delay)
  {
   $this->validation_delay = $validation_delay;
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
   
  // set thumbnail
  public function setThumbnail($thumbnail)
  {
    $this->thumbnail = $thumbnail;
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
  
   // set address
  public function setAddress($address)
  {
    $this->adress = $address;
  }
  
  /*
  METHODS
  */
  /*public createAdvertizer($advertiser){
	$advertizerSql = new AdvertizerSql();
	$advertizerSql->insertAdvertizer($advertiser);
  }*/
  
  /*public saveLogo($logo){
	$this->setLogo($logo['name']);
	//save in base
	$advertizerSql = new AdvertizerSql();
	$advertizerSql->insertLogo($logo['src']);
	//upload logo in server
	move_uploaded_file($logo['file'], '/img/'.$logo['name'])); //etc.......
  }*/
  
}