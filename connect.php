<?php require ('conf.php');
	if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password']))
		{
	extract ($_POST);

	// On récupère tout le contenu de la table "user"
	$req = $bdd->prepare('SELECT * FROM user WHERE login = :login');
	// On execute la requête en lui transmettant la liste des paramètres
	$req->execute(array(
		':login' => $login)) or die(print_r($req->errorInfo())); // On traque l'erreur s'il y en a une
	// Si le login fonctionne...
		if ($req->rowCount() == 1)
			{
			// Il existe, on assigne les donnée dans $data
			$data = $req->fetch(PDO::FETCH_ASSOC);
				// On compare
				if($data['password'] == $_POST['password'])
				{
				/// Là le pass est correct, on peut faire le session_start();
				session_start();
				$_SESSION['login'] = $login;
				$_SESSION['right'] = $data['right_id'];
				echo 'pass correct';
				echo '<script> document.location.href="dashboard.php" </script>';
				}
					// Si le login ne fonctionne pas on le renvoie à la page de login
					else{
						unset($_SESSION);echo 'pass false';
						echo '<script>document.location.href="index.php"</script>';
						exit;
						}
	// On termine le traitement de la requête
	$req->closeCursor();
			}
			else{echo 'pb rowcount==1';}
		}
?>