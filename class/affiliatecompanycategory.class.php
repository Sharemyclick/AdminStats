<?php

include "affiliatecompanycategorysql.class.php";

class Affiliate_Company
{
  private $id_affiliate_company;
  private $id_category;
  private $id_manager;

  public function getId_affiliate_company() {
      return $this->id_affiliate_company;
  }

  public function getId_category() {
      return $this->id_category;
  }

  public function getId_manager() {
      return $this->id_manager;
  }
  
  
  
  public function setId_affiliate_company($id_affiliate_company) {
      $this->id_affiliate_company = $id_affiliate_company;
  }

  public function setId_category($id_category) {
      $this->id_category = $id_category;
  }

  public function setId_manager($id_manager) {
      $this->id_manager = $id_manager;
  }
  
  /* METHOD*/
  
}