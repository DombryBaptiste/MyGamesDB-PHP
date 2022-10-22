<?php 
	require_once("log_bd.php");

	if(isset($_GET['form_changemdp'])){
		if(!empty($_GET['old_mdp']) AND !empty($_GET['new_mdp']) AND !empty($_GET['new_mdp_confirm'])){
			$old_mdp = sha1($_GET['old_mdp']);
			$new_mdp = sha1($_GET['new_mdp']);
			$new_mdp_confirm = sha1($_GET['new_mdp_confirm']);
			$user_id = $_SESSION['id'];
			$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			$is_goodmdp = $bdd->query("SELECT * FROM membres WHERE id = '".$user_id."' AND mdp = '".$old_mdp."'");
			if(($is_goodmdp->rowCount()) == 1) {
				if($new_mdp == $new_mdp_confirm){
					$change_mdp = $bdd->prepare("	UPDATE membres
													SET mdp = '".$new_mdp."'
													WHERE id = ?");
					$change_mdp->execute(array($_SESSION['id']));
					$_SESSION['var_info'] = "Le mot de passe a bien été changé";
					$_SESSION['mdp'] = $new_mdp;
					header("Location: ../HTML/index.php");
				} else {
					$_SESSION['var_info'] = "Les deux nouveau mot de passes ne correspondent pas";
					header("Location: ../HTML/change_mdp.php");

				}
				
			} else {
				$_SESSION['var_info'] = "L'ancien mot de passe est mauvais";
				header("Location: ../HTML/change_mdp.php");
			}
		} else {
			$_SESSION['var_info'] = "Tous les champs doivent etre remplis";
			header("Location: ../HTML/change_mdp.php");
		}
	} 
?>