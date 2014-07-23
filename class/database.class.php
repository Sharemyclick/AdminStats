<?php
include "databasesql.class.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database{
    
    private $id_database;
    private $name;
    private $collect_url;
    private $volume;
    private $company_performance;
    private $status;
   
    public $databases_view = array();
    public $databases_list = array();
    public $database_country_list = array();
   public $database_types_list = array();
 //==========================GET=====================================   
    public function getId_database() {
        return $this->id_database;
    }

    public function getName() {
        return $this->name;
    }

    public function getCollect_url() {
        return $this->collect_url;
    }

    public function getVolume() {
        return $this->volume;
    }

    public function getCompany_performance() {
        return $this->company_performance;
    }

    public function getStatus() {
        return $this->status;
    }
  //=================================GET=LIST================================  
     public function getDatabasesList(){
	  $databaseSql = new DatabaseSql();
	  $databases_list= $databaseSql->SelectDatabasesList();
	  //TODO setup $databases_list from query results
	  // structure of $database_list : Array('id','name')
	  return $this->setDatabasesList($databases_list);
	  }
           public function getDatabasesListSimple(){
	  $databaseSql = new DatabaseSql();
	  $databases_list= $databaseSql->SelectDatabasesListSimple();
	  //TODO setup $databases_list from query results
	  // structure of $database_list : Array('id','name')
	  return $this->setDatabasesListSimple($databases_list);
	  }
          
            public function getDatabasesView(){
	  $databaseSql = new DatabaseSql();
	  $databases_view= $databaseSql->SelectDatabasesView($database['id_database']);
	  //TODO setup $databases_list from query results
	  // structure of $database_list : Array('id','name')
	  return $this->setDatabasesView($databases_view);
	  }
          
          
           public function getDatabaseTypesList(){
	  $databaseSql = new DatabaseSql();
	  $database_types_list= $databaseSql->SelectDatabaseTypeList();
	  //TODO setup $databases_list from query results
	  // structure of $database_list : Array('id','name')
	  return $this->setDatabaseTypesList($database_types_list);
	  }
          
	 public function getDatabaseCountryList(){
	  $database_countrySql = new DatabaseSql();
          
	  $databases_country_list= $database_countrySql->selectDatabaseCountryList();
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  return $this->setDatabasesCountryList($databases_country_list);
	  }
	/*
  ======================================SETTERS================================
  */
    public function setId_database($id_database) {
        $this->id_database = $id_database;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setCollect_url($collect_url) {
        $this->collect_url = $collect_url;
    }

    public function setVolume($volume) {
        $this->volume = $volume;
    }

    public function setCompany_performance($company_performance) {
        $this->company_performance = $company_performance;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
  //=================================SET=LIST====================================  
     public function setDatabasesList($databases_list)
  {
   $this->databases_list = $databases_list;
  } 
   public function setDatabasesListSimple($databases_list)
  {
   $this->databases_list = $databases_list;
  } 
       public function setDatabasesView($databases_view)
  {
   $this->databases_view = $databases_view;
  } 
  
   public function setDatabaseTypesList($database_types_list)
  {
   $this->database_types_list = $database_types_list;
  } 
  
  public function setDatabasesCountryList($database_country_list) {
     $this->database_country_list = $database_country_list;
 }  
 
    /*
  =========================================METHODS================================
  */
  
   public function createDatabase($database)
 { $databaseSql = new DatabaseSql();
 
 //if($this->downloadLogo($advertiser['logo']))
   $result = $databaseSql->insertDatabase($database);
  if(!$result)
  {return($databaseSql->error);
  
  }
  else{
         return 'A <database has been created';
  } 
 }
}
