<?php
	require_once("log_bd.php");

		if(isset($_GET['new_email']) AND isset($_GET['Modifier'])){
			if(!empty($_GET['new_email']) AND !empty($_GET['Modifier'])){
				$new_email = htmlspecialchars($_GET['new_email']);
				$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				$requeteTestMail = $bdd->prepare("SELECT * FROM membres WHERE email = '".$new_email."'");
				$requeteTestMail->execute();
				$row = $requeteTestMail->rowCount();
				echo($row);
				if($row > 0){
					$_SESSION['var_info'] = "L'email est deja utilisé";
					header("Location: ../HTML/change_email.php");
				}
				$requete = $bdd->prepare(" 	UPDATE membres
											SET email = '".$new_email."'
											WHERE id = ?");
				$requete->execute(array($_SESSION['id']));
				$_SESSION['email'] = $new_email;
				$_SESSION['var_info'] = "L'email a bien été changé";
				header("Location: ../HTML/index.php");
			}
		}
	
?>