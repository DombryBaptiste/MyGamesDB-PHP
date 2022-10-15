<?php
require_once("../PHP/log_bd.php");

	$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
	if(isset($_POST['formconnect'])){
		$emailconnect = htmlspecialchars($_POST['emailconnect']);
		$mdpconnect = sha1($_POST['mdpconnect']);
		if(!empty($emailconnect) AND !empty($mdpconnect)){
			$requser = $bdd->prepare("SELECT * FROM membres WHERE email = ? AND mdp = ?");
			$requser->execute(array($emailconnect, $mdpconnect));
			$userexist = $requser->rowCount();
			if($userexist == 1){
				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				$_SESSION['email'] = $userinfo['email'];
				$_SESSION['isconnected'] = true;
				header("Location: index.php");
			} else {
				$erreur = "L'utilisateur n'existe pas";
			}
		} else {
			$erreur = "Tous les champs doivent etre compléter !";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion | MyGamesDB</title>
</head>
<body>
	<form method="POST" action="">
		<input type="email" name="emailconnect" placeholder="Email">
		<input type="password" name="mdpconnect" placeholder="Mot de passe">
		<input type="submit" name="formconnect"value="Se connecter">
	</form>
	<?php
		if(isset($erreur)){
			echo '<font color="red">'.($erreur).'</font>';
		}
	?>
</body>
</html>