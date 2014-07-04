<?php
include "usersql.class.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user{
    
    private $id_user;
    private $name;
    private $surname;
    private $email_smc;
    private $skype_smc;
    private $tel;
    private $contract_type;
    private $position;
    private $country_covered;
    private $image;
    private $login;
    private $password;
    private $id_post;
    
    private $users_list = array();
    
    
    public function getId_user() {
        return $this->id_user;
    }
    public function getSkype_smc() {
        return $this->skype_smc;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getContract_type() {
        return $this->contract_type;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getCountry_covered() {
        return $this->country_covered;
    }

    public function getImage() {
        return $this->image;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getId_post() {
        return $this->id_post;
    }

        public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getEmail_smc() {
        return $this->email_smc;
    }
  // get categories list
   public function getAffiliateCompaniesList(){
	  $userSql = new UserSql();
	  $users_sql= $userSql->SelectUserList();
	  //TODO setup $affiliatecompanies_list from query results
	  // structure of $affiliatecompany_list : Array('id','name')
	  return $this->setUsersList($users_list);
	  }
	
	/*
  SETTERS
  */
    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function setEmail_smc($email_smc) {
        $this->email_smc = $email_smc;
    }

    public function setSkype_smc($skype_smc) {
        $this->skype_smc = $skype_smc;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setContract_type($contract_type) {
        $this->contract_type = $contract_type;
    }

    public function setPosition($position) {
        $this->position = $position;
    }

    public function setCountry_covered($country_covered) {
        $this->country_covered = $country_covered;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setId_post($id_post) {
        $this->id_post = $id_post;
    }

 public function setUsersList($users_list)
  {
   $this->users_list = $users_list;
  } 
    /*
  METHODS
  */
    
}

