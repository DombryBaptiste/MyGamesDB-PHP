<?php
	require_once("../PHP/log_bd.php");
	if(isset($_GET['delete_button'])){
		$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$base = "game_".$_SESSION['id']."membre";
		$id = $_GET['game_id'];
		$sql = "DELETE FROM $base WHERE id_game = ?";
		$requete = $bdd->prepare($sql);
		$requete->execute(array($id));
		$_SESSION['game_added'] = "Le jeu a été supprimé";
		header("Location: ../HTML/game.php?id=".$_GET['game_id']);
	}
?>