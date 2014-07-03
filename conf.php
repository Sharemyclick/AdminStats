<?php
try
{
	// On se connecte à la base de données.
	$bdd = new PDO('mysql:host=localhost;dbname=basetest', 'root', '');
}
catch (Exception $e)
{
	/*En cas d'erreur, on affiche un message et on arrête tout*/
	die('Erreur : '.$e->getMessage());
}
?>