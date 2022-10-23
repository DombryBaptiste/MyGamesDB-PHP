<?php
	require_once("log_bd.php");
	require_once("affiche_game.php");

	function show_search(){
		global $host, $user, $password, $database;
		if(isset($_GET['recherche'])){
			if(strlen($_GET['recherche']) > 2){
				$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	        	$keywords = explode(' ', $_GET['recherche']);
	       	 	$like = "";
		        foreach($keywords as $keyword) {
		            if(strlen($keyword) >= 3) {
		                $like.= " UPPER(nom) LIKE '%".strtoupper($keyword)."%' OR";
		            }
		        }
		        $like = substr($like, 0, strlen($like) - 3);
		        $req = "SELECT * FROM jeu WHERE ".$like." ORDER BY nom";
		        $request = $bdd->query($req);
		        while($game = $request->fetch()) {
						echo("
							<a href=\"game.php?id=".$game['id']."\"><img src=\"".$game['img']."\"/ ".getClass($game['platform'])."></a>
							");
					}
			} else {
				$_SESSION['var_info'] = "Veuillez entrer au moins 3 caractères";
				header("Location: ../HTML/index.php");
			}	
		} else {
			$_SESSION['var_info'] = "Recherche vide";
			header("Location: ../HTML/index.php");
		}
				
	}
?>