<?php
	require_once("../PHP/log_bd.php");
	if(isset($_GET['add_button'])){
		$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$base = "game_".$_SESSION['id']."membre";
		$date = date("Y-m-d");
		$id = $_GET['game_id'];
		$sql = "INSERT INTO $base(id_game, add_date) VALUES (?, ?)";
		$requete = $bdd->prepare($sql);
		$requete->execute(array($id, $date));
		$_SESSION['game_added'] = "Le jeu a été ajouté";
		header("Location: ../HTML/game.php?id=".$_GET['game_id']);
	}
	
?>
