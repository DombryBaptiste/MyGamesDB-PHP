<?php
	require_once("log_bd.php");

		if(isset($_GET['new_pseudo']) AND isset($_GET['Modifier'])){
			if(!empty($_GET['new_pseudo']) AND !empty($_GET['Modifier'])){
				$new_pseudo = htmlspecialchars($_GET['new_pseudo']);
				$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				$requete = $bdd->prepare(" 	UPDATE membres
											SET pseudo = '".$new_pseudo."'
											WHERE id = ?");
				$requete->execute(array($_SESSION['id']));
				$_SESSION['pseudo'] = $new_pseudo;
				$_SESSION['var_info'] = "Le pseudo a bien été changé";
				header("Location: ../HTML/index.php");
			}
		}
	
?>