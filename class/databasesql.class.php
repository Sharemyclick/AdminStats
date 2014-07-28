<?php
class DatabaseSql
{
private $bdd;
public $error;

public function DatabaseSql(){
	// On se connecte à la base de données.
	include 'connectbase.php';
}

public function SelectDatabasesList($database = false){

	$req = $this->bdd->query('SELECT * FROM dbase d LEFT JOIN affiliate_manager_database amd ON amd.id_database = d.id_database '
                . 'LEFT JOIN affiliate_manager am ON amd.id_affiliate_manager = am.id_affiliate_manager '
                . 'LEFT JOIN database_country dc ON dc.id_database = d.id_database '
                . 'LEFT JOIN country c ON c.id_country = dc.id_country '
                . 'LEFT JOIN database_type dt ON dt.id_database = d.id_database '
                . 'LEFT JOIN type_display_db tdt ON tdt.id_type = dt.id_type');
	return $req;
	
}

public function SelectDatabasesListSimple($database = false){

	$req = $this->bdd->query('SELECT * FROM dbase ');
	return $req;
	
}

public function SelectDatabasesView($database = false){

	$req = $this->bdd->query('SELECT * FROM dbase d LEFT JOIN affiliate_manager_database amd ON amd.id_database = d.id_database '
                . 'LEFT JOIN affiliate_manager am ON amd.id_affiliate_manager = am.id_affiliate_manager '
                . 'LEFT JOIN database_country dc ON dc.id_database = d.id_database '
                . 'LEFT JOIN country c ON c.id_country = dc.id_country '
                . 'LEFT JOIN database_type dt ON dt.id_database = d.id_database '
                . 'LEFT JOIN type_display_db tdt ON tdt.id_type = dt.id_type WHERE id_database='.$database);
	return $req;
	
}
public function selectDatabaseCountryList(){

	$req = $this->bdd->query('SELECT * FROM database_country');
	return $req;
}

public function selectDatabaseTypeList(){

	$req = $this->bdd->query('SELECT * FROM type_display_db');
	return $req;
}
 //======================INSERT========================
  //====================================================
        
public function insertDatabase($database)
        
          //====================DATABASE===============================
   
{$req = $this->bdd->prepare('INSERT INTO dbase(  database_name, collect_url, volume, campaign_performance, database_status ) VALUES ( :database_name, :collect_url, :volume, :campaign_performance, :database_status)');
        $req->execute(array(
            'database_name' => $database['database_name'],
             'collect_url' => $database['collect_url'],
            'volume' => $database['volume'],
             'campaign_performance' => $database['campaign_performance'],
            'database_status' => $database['database_status']
           )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
   $id_database = $this->bdd->lastInsertId();
         
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
    $this->error = 'database : '.$errors[2];
}
      //====================MANAGER_DATABASE===============================
    
   $req = $this->bdd->prepare('INSERT INTO affiliate_manager_database(  id_affiliate_manager, id_database) VALUES ( :id_affiliate_manager, :id_database)');
        $req->execute(array(
            'id_database' => $id_database,
             'id_affiliate_manager' => $database['id_affiliate_manager']
             )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         

         
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
    $this->error = 'affiliate_manager_database : '.$errors[2];
}
      //====================DATABASE_COUNTRY===============================
    
   $req = $this->bdd->prepare('INSERT INTO database_country(  id_database,id_country) VALUES ( :id_database, :id_country)');
        $req->execute(array(
            'id_database' => $id_database,
             'id_country' => $id_database['id_country']    
                
                 )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
         
  
 if($req->errorCode() == 0) {
   
    
} else {
    $errors = $req->errorInfo();
    
    $this->error = 'database : '.$errors[2];
}
      //====================DATABASE_TYPE===============================
    
   $req = $this->bdd->prepare('INSERT INTO database_type(  id_type, id_database) VALUES ( :id_type, :id_database)');
        $req->execute(array(
           'id_type' => $database['id_type'],
                'id_database' => $id_database
             
                )) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
 if($req->errorCode() == 0) {
     $req->closeCursor();
     return true;
} else {
    $errors = $req->errorInfo();
    $req->closeCursor();
    $this->error = 'type : '.$errors[2];
    return false;
   
}

}

}
          
