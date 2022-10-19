<?php
require_once("../PHP/log_bd.php");
$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password);

if(isset($_POST['forminscription'])){
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$email = htmlspecialchars($_POST['email']);
	$email2 = htmlspecialchars($_POST['email2']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);

	if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])){
		

		$pseudolength = strlen($pseudo);
		if($pseudolength <= 255){
			if($email == $email2){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$reqmail = $bdd->prepare("SELECT * FROM membres WHERE email = ?");
					$reqmail->execute(array($email));
					$mailexist = $reqmail->rowCount();
					if($mailexist == 0) {
						if($mdp == $mdp2){
							$requete = "INSERT INTO membres(pseudo, email, mdp) VALUES('$pseudo','$email','$mdp')";
							$r = $bdd->query($requete);
							if($r){
								$requser = $bdd->prepare("SELECT * FROM membres WHERE email = ?");
								$requser->execute(array($email));
								$userinfo = $requser->fetch();
								$requete2 = "CREATE TABLE game_".$userinfo['id']."membre (id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, id_game INT, add_date DATE)";
								$r2 = $bdd->query($requete2);
								if($r2){
									$_SESSION['erreur_inscription'] = "Votre compte a été créer";
									header("Location: ../HTML/inscription.php");
								}
								
							} else{
								echo $bdd->errorInfo()[2];
								header("Location: ../HTML/inscription.php");
							}
						
							
						} else {
							$_SESSION['erreur_inscription'] = "Vos mdp sont différents";
							header("Location: ../HTML/inscription.php");
						}
					} else {
							$_SESSION['erreur_inscription']  = "Mail deja entrée";
							header("Location: ../HTML/inscription.php");
						}
				} else {
					$_SESSION['erreur_inscription']  = "Votre email ne fonctionne pas";
					header("Location: ../HTML/inscription.php");
				}
			} else {
				$_SESSION['erreur_inscription']  = "Vos email sont différents";
				header("Location: ../HTML/inscription.php");
			}
		} else {
			$_SESSION['erreur_inscription']  = "Votre pseudo fait plus de 255 caractères";
			header("Location: ../HTML/inscription.php");
		}
	} else {
		$_SESSION['erreur_inscription']  = "Tous les champs doivent etre compléter";
		header("Location: ../HTML/inscription.php");
	}
}
?>