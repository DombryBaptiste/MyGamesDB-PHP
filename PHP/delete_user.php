<?php
	require_once("log_bd.php");
	if(isset($_GET['form_delete'])){
		$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$bdd->query("DROP TABLE game_".$_SESSION['id']."membre");
		$bdd->query("DELETE FROM membres WHERE id ='".$_SESSION['id']."'");
		$_SESSION['var_info'] = "Compte effacer";
		$_SESSION['is_connected'] = false;
		session_destroy();
		header("Location: ../HTML/index.php");
	}
?>