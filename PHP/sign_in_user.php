<?php
require_once("../PHP/log_bd.php");

	$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password);
	if(isset($_POST['formconnect']))
	{
		$emailconnect = htmlspecialchars($_POST['emailconnect']);
		$mdpconnect = sha1($_POST['mdpconnect']);
		if(!empty($emailconnect) AND !empty($mdpconnect))
		{
			$requser = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND mdp = ?");
			$requser->execute(array($emailconnect, $mdpconnect));
			$userexist = $requser->rowCount();
			if($userexist == 1)
			{
				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				$_SESSION['email'] = $userinfo['email'];
				$_SESSION['isconnected'] = true;
				header("Location: ../HTML/index.php");
			} 
			else
			{
				$_SESSION['erreur_connexion'] = "L'utilisateur n'existe pas";
				header("Location: ../HTML/connexion.php");
			}
		} 
		else 
		{
			$_SESSION['erreur_connexion'] = "Tous les champs doivent etre compléter !";
			header("Location: ../HTML/connexion.php");
		}
	}

?>