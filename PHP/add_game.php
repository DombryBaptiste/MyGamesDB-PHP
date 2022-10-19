<?php
	require_once("../PHP/log_bd.php");

	$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$a = "game_".$_SESSION['id']."membre";
	$sql = "INSERT INTO '$a' VALUES (?, ?)";
	$requete = $bdd->prepare($sql);
	$requete->execute(array($_GET['id'], date("Y-m-d")));
	echo ($sql);
	//header("Location: ../HTML/game.php?id=".$_GET['id']);
?>
