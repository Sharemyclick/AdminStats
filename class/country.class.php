<?php

include "countrysql.class.php";
class Country
{
  private $id_country;
  private $name_country;
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//GETTERS
    public function getId_country() {
        return $this->id_country;
    }

    public function getName_country() {
        return $this->name_country;
    }
    
    
 //SETTERS
    
 public function setId_country($id_country) {
     $this->id_country = $id_country;
 }

 public function setName_country($name_country) {
     $this->name_country = $name_country;
 }
 
 
 //METHODS
  
 
}