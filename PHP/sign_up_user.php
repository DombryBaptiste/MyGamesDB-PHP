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
								$requete2 = "CREATE TABLE game_".$userinfo['id']."membre (id INT)";
								$r2 = $bdd->query($requete2);
								if($r2){
									$erreur = "Votre compte a été créer";
									header("Location: ../HTML/index.php");
								}
								
							} else{
								echo $bdd->errorInfo()[2];
							}
						
							
						} else {
							$erreur = "Vos mdp sont différents";
						}
					} else {
							$erreur = "Mail deja entrée";
						}
				} else {
					$erreur = "Votre email ne fonctionne pas";
				}
			} else {
				$erreur = "Vos email sont différents";
			}
		} else {
			$erreur = "Votre pseudo fait plus de 255 caractères";
		}
	} else {
		$erreur = "tout les champs doivent etre compléter";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php echo($erreur) ?>
</body>
</html>