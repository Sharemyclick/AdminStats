<?php

include 'advertisersql.class.php';
class Advertiser
{
  private $id_advertiser;
  private $company_name;
  private $websites;
  private $id_category_product;
  private $id_stats_validation;
  private $id_invoice_contact;
  private $id_management_contact;
  private $logo;
  private $country;
  private $status;
  private $address;
  private $company_type;
  private $telephone_company;
  public $advertisers = array(); 
  public $advertisers_list = array();
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
    return $this->id_category_product;
  }
  
  public function getCountry() {
      return $this->country;
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
	  $advertisers_list= $advertiserSql->SelectAdvertisersList();
	  //TODO setup $campaign_managements_list from query results
	  // structure of $campaign_management_list : Array('id','name')
	  return $this->setAdvertisersList($advertisers_list);
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
   $this->id_category_product = $id_category_product;
  }
  
  public function setCountry($country) {
      $this->country = $country;
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

    public function setAdvertisersList($advertisers_list)
  {
  $this->advertisers_list = $advertisers_list;}
  
  
  
  public function createAdvertiser($advertiser)
 {
      $advertiserSql = new AdvertiserSql();
 
 if(is_array($advertiser['logo'])){ 
    if($this->downloadLogo($advertiser['logo']))
      $result = $advertiserSql->insertAdvertiser($advertiser);
 }else $result = $advertiserSql->insertAdvertiser($advertiser);
  if(!$result)
  {return($advertiserSql->error);}
  else{
         return 'advertiser has been created';
  } 
 }
  
  
  public function getAdvertisers($filters = false, $order = false)
  {$advertiserSql = new AdvertiserSql();
  $query = $advertiserSql->getAdvertisers($filters, $order);
      if(!$query)
          {return false;}
      else{
        $i = 0;
        while($result = $query->fetch())
        {
             $this->advertisers[$i]['id_advertiser'] = $result['id_advertiser'];
            $this->advertisers[$i]['company_name'] = $result['company_name'];
            $this->advertisers[$i]['websites'] = $result['websites'];
            $this->advertisers[$i]['id_category_product'] = $result['id_category_product'];
            
            $this->advertisers[$i]['logo'] = $result['logo'];
            $this->advertisers[$i]['country'] = $result['country'];
            $this->advertisers[$i]['status'] = $result['status'];
            $this->advertisers[$i]['address'] = $result['address'];
            $this->advertisers[$i]['company_type'] = $result['company_type'];
            $this->advertisers[$i]['telephone_company'] =$result['telephone_company'];
            $this->advertisers[$i]['invoice_email'] =$result['invoice_email'];
            $this->advertisers[$i]['invoice_name'] = $result['invoice_name'];
            $this->advertisers[$i]['iban'] = $result['iban'];
            $this->advertisers[$i]['swift'] = $result['swift'];
            $this->advertisers[$i]['invoicing_contact'] = $result['invoicing_contact'];
            $this->advertisers[$i]['vat'] = $result['vat'];
            $this->advertisers[$i]['url'] =$result['url'];
            $this->advertisers[$i]['username'] = $result['username'];
            $this->advertisers[$i]['password'] = $result['password'];
            $this->advertisers[$i]['validation_delay'] =$result['validation_delay'];
            $this->advertisers[$i]['management_name'] = $result['management_name'];
            $this->advertisers[$i]['management_email'] = $result['management_email'];
            $this->advertisers[$i]['telephone'] = $result['telephone'];
            $this->advertisers[$i]['skype'] = $result['skype'];
            $this->advertisers[$i]['conversation_language'] = $result['conversation_language'];

            $i++;
        }
    return true;
        }
}
public function updateAdvertiser($advertiser)
 { $advertiserSql = new AdvertiserSql();
 
 if(!$advertiser['ready_to_upload']){
 if($this->downloadLogo($advertiser['logo']))
   $result = $advertiserSql->updateAdvertiser($advertiser);
 }else $result = $advertiserSql->updateAdvertiser($advertiser);
  if(!$result)
 {
      return($advertiserSql->error);
      
  }
  else{
         return 'advertiser has been created';
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
 public function downloadLogo($logo){
     
 $folder = 'http://data.sharemyclick.com/img/logo/';//TODO remove local part when upload to server !!
 $file = utf8_decode(basename($logo['name']));
 $max_height = 1048576;
 $height = filesize($logo['tmp_name']);
 $extends = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.JPEG', '.GIF', '.PNG');
 $extend= strrchr($logo['name'], '.'); 
// Début des vérifications de sécurité$id_advertiser...
if(!in_array($extend, $extends)) // Si l'extension n'est pas dans le tableau
 {
    $error = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ...';
 }
if($height>$max_height)
 {
    $error = 'l\'image est trop lourde. Maximum de 500ko...';
 }
if(!isset($error)) //S'il n'y a pas d'erreur, on upload
 {
    // On formate le nom du fichier ici...
    $upload_file = strtr($file, 
  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
   //$file = preg_replace('/([^.a-z0-9]+)/i', '-', $upload_file);

if(move_uploaded_file($logo['tmp_name'], $folder . $upload_file)) // Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {

 foreach($_POST as $indPost => $valPost){
  $checkpos = strpos($indPost, "result_");
  if($checkpos !== false)
   $result = $valPost;
 }
 }else return false;
  return true;
}
return false;

 }
 //Get historical information
  public function createAdvertiserHistorical($advertiser)
 { $advertiserSql = new AdvertiserSql();
 

 //if($this->downloadLogo($advertiser['logo']))
   $result = $advertiserSql->insertAdvertiserHistorical($advertiser);

  if(!$result)
  {return($advertiserSql->error);}
  else{
         return 'advertiser has been created';
  } 
 }
  
 
}