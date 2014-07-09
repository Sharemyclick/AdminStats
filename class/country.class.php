<?php

include "countrysql.class.php";
class Country
{
  private $id_country;
  private $name_country;
 
   public $countryselect = array();
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
  
 public function getCountry($id_country){
             $countrySql = new CountrySql();
	  $countries_sql= $countrySql->SelectCountry($id_country);
          
            while($result = $countries_sql->fetch())
        {
          $this->countryselect['id_country'] = $result['id_country'];
          $this->countryselect['name_country'] = $result['name_country'];
        }
        return true;
            }

             public function getCountryList(){
                 $i = 0;
             $countrySql = new CountrySql();
	  $countries_sql= $countrySql->SelectCountryList();
          
            while($result = $countries_sql->fetch())
        {
          $this->countryselect[$i]['id_country'] = $result['id_country'];
          $this->countryselect[$i]['name_country'] = $result['name_country'];
          $i++;
        }
        return true;
            }

        }