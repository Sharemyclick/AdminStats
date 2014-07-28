<?php
try
{
	// On se connecte � la base de donn�es.
	$bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}
catch (Exception $e)
{
	/*En cas d'erreur, on affiche un message et on arr�te tout*/
	die('Erreur : '.$e->getMessage());
}

?>
