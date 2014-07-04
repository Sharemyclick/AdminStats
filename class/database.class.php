<?php
include "databasesql.class.php";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user{
    
    private $id_database;
    private $name;
    private $collect_url;
    private $volume;
    private $company_performance;
    private $status;
    
    
    private $databases_list = array();
    
    
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
    
     public function getDatabasesList(){
	  $databaseSql = new DatabaseSql();
	  $databases_sql= $databaseSql->SelectDatabaseList();
	  //TODO setup $databases_list from query results
	  // structure of $database_list : Array('id','name')
	  return $this->setDatabasesList($databases_list);
	  }
	
	/*
  SETTERS
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
    
     public function setDatabasesList($databases_list)
  {
   $this->databases_list = $databases_list;
  } 
    /*
  METHODS
  */
}