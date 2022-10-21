<?php
	require_once("../PHP/log_bd.php");

	function show_last_game(){
		global $host, $user, $password, $database;
		if(isset($_SESSION['isconnected'])){
			if($_SESSION['isconnected']){
				$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
				$request = $bdd->prepare("	SELECT *
											FROM jeu
											INNER JOIN game_".$_SESSION['id']."membre ON jeu.id = game_".$_SESSION['id']."membre.id_game
											ORDER BY game_".$_SESSION['id']."membre.id DESC
											LIMIT 18;
										");
				$request->execute();
				while($info = $request->fetch()) {
					echo("
						<a href=\"game.php?id=".$info['id_game']."\"><img src=\"".$info['img']."\"/ class=\"pic\"></a>
						");
				}
			}
		}
	}

	function show_all_game($type){
		global $host, $user, $password, $database;
		$tab_letter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', "EOT");
		$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
		$i = 0;
		$pointeur = $tab_letter[$i];
		while($pointeur != "EOT"){
			echo("<div class=\"game_by_letter\">");
			$requete = $bdd->prepare("SELECT * FROM jeu WHERE platform = ? AND nom
				LIKE '".$tab_letter[$i]."%' ORDER BY nom");
			$requete->execute(array($type));
			if(($requete->rowCount()) != 0){
				echo("<p class=\"first_letter_game\">".$pointeur."</p>");
			}
			while($info = $requete->fetch()){
					echo("
					<div class=\"list_game_bdd\">
						<a href=\"game.php?id=".$info['id']."\"><img src=\"".$info['img']."\"/ class=\"pic\"></a>
					</div>
					");
			}
			$i++;
			$pointeur = $tab_letter[$i];
			echo("</div>");
		}
	}

	function bdd_game($id){
		global $host, $user, $password, $database;
		$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		$requete = $bdd->prepare("SELECT * FROM jeu WHERE id = ?");
		$requete->execute(array($id));
		$infogame = $requete->fetch();
		return $infogame;
	}

	function title_game($id){
		$info = bdd_game($id);
		echo($info['nom']);
	}

	function image_game($id){
		$info = bdd_game($id);
		echo($info['img']);
	}

	function show_video($id){
		$info = bdd_game($id);
		echo($info['trailer']);
	}

	function show_one_game($id){
		$info = bdd_game($id);
		$date = new DateTime($info['release_date']);
		echo("
				<h3>".$info['nom']."</h3>
				<p class=\"description\">".$info['description']."</p>
				<p>Platforme : ".$info['platform']."</p>
				<p>Date de sortie en france : ".$date->format('d/m/Y')." </p>
			");
	}


	function show_button($id){
		global $host, $user, $password, $database;
		if(isset($_SESSION['isconnected'])){
			if($_SESSION['isconnected']){
				$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
				$requete = $bdd->prepare("SELECT * FROM jeu WHERE id = ?");
				$requete->execute(array($id));
				$info = $requete->fetch();

				$requete2 = $bdd->prepare("SELECT * FROM game_".$_SESSION['id']."membre WHERE id_game = ?");
				$requete2->execute(array($id));
				$row = $requete2->rowCount();
				if($row == 1){
					echo("
						
							<form action=\"../PHP/delete_game.php\" method=\"GET\">
								<input type=\"hidden\" name=\"game_id\" value=\"".$info['id']."\">
								<input class=\"add_game\" type=\"submit\" value=\"Effacer\" name=\"delete_button\">
							</form>
						
						");
				} else {
					echo("
						
							<form action=\"../PHP/add_game.php\" method=\"GET\">
								<input type=\"hidden\" name=\"game_id\" value=\"".$info['id']."\">
								<input class=\"add_game\" type=\"submit\" value=\"Ajouter\" name=\"add_button\">
							</form>
						");
				}
				
				if(isset($_SESSION['game_added'])){
					echo("<p class=\"info_game\">".$_SESSION['game_added']."</p>");
					unset($_SESSION['game_added']);
				}
			}
		}
	}

	function show_progress($id){
		if(isset($_SESSION['isconnected'])){
			if($_SESSION['isconnected']){
				global $host, $user, $password, $database;
				$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

				$requete3 = $bdd->query("SELECT * FROM jeu");
				$requete4 = $bdd->query("SELECT * FROM game_".$_SESSION['id']."membre");
				$nbGameBDD = $requete3->rowCount();
				$nbGameUser = $requete4->rowCount();
				
				$percent = number_format((100 * $nbGameUser) / $nbGameBDD,2);
			 		echo("<div class=\"progressbar-wrapper\">
      					<div class=\"progressbar\">".$percent."%</div>
     					</div>
     					<style>
     						.progressbar{
     							width:".$percent."%;
     						}
     					</style>");
			 	}
			 }
	}

?>