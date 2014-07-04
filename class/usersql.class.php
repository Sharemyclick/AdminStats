
<?php
class UserSql
{
private $bdd;

public function UserSql(){
	// On se connecte à la base de données.
	$this->bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}

public function SelectUsersList($user = false){

	$req = $this->bdd->query('SELECT * FROM user');
	return $req;
	
}

}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

