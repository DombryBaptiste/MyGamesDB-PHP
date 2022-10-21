<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>test</title>
</head>
<body>
	<?php
		$result = array();
		for ($i=65; $i<=90; $i++) {
			$result[] = chr($i);
		}
		echo($result);
		/*$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
		$tab = ['A','B', 'C', 'EOT'];
		$i = 0;
		$pointeur = $tab[$i];
		while($pointeur != "EOT"){
			echo("<div class=\"game_by_letter\">");
			echo($pointeur);
			$requete = $bdd->prepare("SELECT * FROM jeu WHERE platform = 'Nintendo DS' AND nom
				LIKE '".$tab[$i]."%' ");
				$requete->execute();
					while($info = $requete->fetch()){
					echo("
					<div class=\"list_game_bdd\">
						<a href=\"game.php?id=".$info['id']."\"><img src=\"".$info['img']."\"/ class=\"pic\"></a>
					</div>
					");
			}	
			$i++;
			$pointeur = $tab[$i];
			echo("</div>");

		}*/
	?>
</body>
</html>