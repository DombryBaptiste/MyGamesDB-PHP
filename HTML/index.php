<?php
	require_once("../PHP/log_bd.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>MyGamesDB</title>
	<link href="../CSS/style.css" rel="stylesheet">
	<link href="../CSS/menu.css" rel="stylesheet">
	<link href="../CSS/header.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
	<header>
		<div class="header_bar">
			<a href="index.php"><img class="header_logo" src="../Logo/M.png" alt="Logo"></a>
			<div class="recherche">
				<div class="div_loupe">
					<img class="loupe" src="../Logo/loupe.png" alt="loupe">
				</div>
				<input class="search_bar" type="search">
			</div>
			<div class="connexion">
				<?php
					if(isset($_SESSION['isconnected'])){
						if($_SESSION['isconnected']){
							echo("<ul class=\"listeconsole\">
									<li class=\"li_profil\">
										<div class=\"ongletPROFIL\">
											".$_SESSION['pseudo']."
										</div>
										<div class=\"deroulantPROFIL\">
											<ul class=\"listeoptionPROFIL\">
												<a href=\"profil_user.php\" class=\"link_profil\"><li class=\"option\">Mon profil</li></a>
												<a href=\"collection_user.php\" class=\"link_profil\"><li class=\"option\">Ma collection</li></a>
												<a href=\"deconnexion_user.php\" class=\"link_profil\"><li class=\"option\">Se deconnecter</li></a>
											</ul>
										</div>
									</li>
								</ul>");
			
						}
					} else {
						echo("<a class=\"link_con_ins\" href=\"connexion.php\">Connexion</a>
								<span>|</span>
								<a class=\"link_con_ins\" href=\"inscription.php\">Inscription</a>");
					}
				?>
			</div>
		</div>
		
	</header>
	<nav class="nav1">
		<ul class="listeconsole">
			<li class="li_console">
				<div class="ongletPS">
					PlayStation
				</div>
				<div class="deroulantPS">
					<ul class="listeoption">
						<a class="link_console" href="list_game.php?type=PS1"><li class="option">PS1</li></a>
						<a class="link_console" href="list_game.php?type=PS2"><li class="option">PS2</li></a>
						<a class="link_console" href="list_game.php?type=PS3"><li class="option">PS3</li></a>
						<a class="link_console" href="list_game.php?type=PS4"><li class="option">PS4</li></a>
						<a class="link_console" href="list_game.php?type=PS5"><li class="option">PS5</li></a>
					</ul>
				</div>
			</li>
			<li class="li_console">
				<div class="ongletXBOX">
					Xbox
				</div>
				<div class="deroulantXBOX">
					<ul class="listeoption">
						<a class="link_console" href="list_game.php?type=Xbox"><li class="option">Xbox</li></a>
						<a class="link_console" href="list_game.php?type=Xbox360"><li class="option">Xbox 360</li></a>
						<a class="link_console" href="list_game.php?type=XboxOne"><li class="option">Xbox One</li></a>
						<a class="link_console" href="list_game.php?type=XboxSeriesX"><li class="option">Xbox Series X</li></a>
					</ul>
				</div>
			</li>
			<li class="li_console">
				<div class="ongletNINTENDO">
					Nintendo
				</div>
				<div class="deroulantNINTENDO">
					<ul class="listeoption">
						<a class="link_console" href="list_game.php?type=DS"><li class="option">DS</li></a>
						<a class="link_console" href="list_game.php?type=3DS"><li class="option">3DS</li></a>
						<a class="link_console" href="list_game.php?type=Wii"><li class="option">Wii</li></a>
						<a class="link_console" href="list_game.php?type=WiiU"><li class="option">Wii U</li></a>
						<a class="link_console" href="list_game.php?type=Switch"><li class="option">Switch</li></a>
					</ul>
				</div>
			</li>
		</ul>
	</nav>
	<script src="../JS/menu.js"></script>	
	<div>
		<?php 
			$bdd = new PDO('mysql:host=localhost;dbname=espace_membre', 'root', '');
			$request = $bdd->prepare("SELECT * FROM jeu");
			$request->execute();
			while($info = $request->fetch()){
				echo("
				<p>".$info['nom']."</p>
				<img src=\"../image/DS/".$info['img']."\"/>
			");
			}
			
		?>
	</div>
	<footer>
		
	</footer>
</body>



</html>
