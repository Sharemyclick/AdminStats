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
     public $advertisers = array();  
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
 if($this->downloadLogo($advertiser['logo']))
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
      if(!$query){return false;}
  else{
   
    $i = 0;
    
    while($result = $query->fetch())
    {$str = htmlentities($str, ENT_QUOTES);
        $this->advertisers[$i]['company_name'] = htmlentities($result['company_name'], ENT_QUOTES);
        $this->advertisers[$i]['websites'] = htmlentities($result['websites'], ENT_QUOTES);
        $this->advertisers[$i]['category_product'] = htmlentities($result['category_product'], ENT_QUOTES);
       $this->advertisers[$i]['logo'] = htmlentities($result['logo'], ENT_QUOTES);
        $this->advertisers[$i]['status'] = htmlentities($result['status'], ENT_QUOTES);
        $this->advertisers[$i]['address'] = htmlentities($result['address'], ENT_QUOTES);
        $this->advertisers[$i]['company_type'] = htmlentities($result['company_type'], ENT_QUOTES);
        $this->advertisers[$i]['telephone_company'] = htmlentities($result['telephone_company'], ENT_QUOTES);
        $this->advertisers[$i]['invoice_email'] = htmlentities($result['invoice_email'], ENT_QUOTES);
        $this->advertisers[$i]['invoice_name'] = htmlentities($result['invoice_name'], ENT_QUOTES);
        $this->advertisers[$i]['iban'] = htmlentities($result['iban'], ENT_QUOTES);
        $this->advertisers[$i]['swift'] = htmlentities($result['swift'], ENT_QUOTES);
        $this->advertisers[$i]['invoicing_contact'] = htmlentities($result['invoicing_contact'], ENT_QUOTES);
        $this->advertisers[$i]['url'] = htmlentities($result['url'], ENT_QUOTES);
        $this->advertisers[$i]['username'] = htmlentities($result['username'], ENT_QUOTES);
        $this->advertisers[$i]['password'] = htmlentities($result['password'], ENT_QUOTES);
        $this->advertisers[$i]['validation_delay'] = htmlentities($result['validation_delay'], ENT_QUOTES);
        $this->advertisers[$i]['management_name'] = htmlentities($result['management_name'], ENT_QUOTES);
        $this->advertisers[$i]['management_email'] = htmlentities($result['management_email'], ENT_QUOTES);
        $this->advertisers[$i]['telephone'] = htmlentities($result['telephone'], ENT_QUOTES);
        $this->advertisers[$i]['skype'] = htmlentities($result['skype'], ENT_QUOTES);
        $this->advertisers[$i]['conversation_language'] = htmlentities($result['conversation_language'], ENT_QUOTES);
      
        $i++;
    }
    return true;
  
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
     
 $folder = 'C:/xampp/htdocs/campaigns/img/logo/';//TODO remove local part when upload to server !!
 $file = basename($logo['name']);
 $max_height = 1048576;
 $height = filesize($logo['tmp_name']);
 $extends = array('.png', '.gif', '.jpg', '.jpeg', '.JPG', '.JPEG', '.GIF', '.PNG');
 $extend= strrchr($logo['name'], '.'); 
// Début des vérifications de sécurité...
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
    $file = strtr($file, 
  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
        'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    $file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
 
if(move_uploaded_file($_FILES['logo']['tmp_name'], $folder . $file)) // Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    {

 foreach($_POST as $indPost => $valPost){
  $checkpos = strpos($indPost, "result_");
  if($checkpos !== false)
   $result .= $valPost;
 }
 }
  
}
return true;

 }
}