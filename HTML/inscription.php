<?php
	require_once("../PHP/log_bd.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../CSS/style.css" rel="stylesheet">
	<link href="../CSS/connexion.css" rel="stylesheet">
	<link href="../CSS/menu.css" rel="stylesheet">
	<link href="../CSS/header.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<title>Inscription | MyGamesDB</title>
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
	<div class="all_form">
		<div class="form_connect">
			<h1>Inscription</h1>
			<form method="POST" action="../PHP/sign_up_user.php">
				<table>
					<tr>
						<td>
							<label for="pseudo">Pseudo :</label>
						</td>
						<td>
							<input type="text" id ="pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo;}?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="email">Email :</label>
						</td>
						<td>
							<input type="email" id="email" name="email" value="<?php if(isset($email)) {echo $email;}?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="email2">Confirmer email :</label>
						</td>
						<td>
							<input type="email" id="email2" name="email2" value="<?php if(isset($email2)) {echo $email2;}?>">
						</td>
					</tr>
					<tr>
						<td>
							<label for="mdp">Mot de passe :</label>
						</td>
						<td>
							<input type="password" id="mdp" name="mdp">
						</td>
					</tr>
					<tr>
						<td>
							<label for="mdp2">Confirmer Mot de passe :</label>
						</td>
						<td>
							<input type="password" id="mdp2" name="mdp2">
						</td>
					</tr>
				</table>
				<input type="submit" name="forminscription"value="Je m'inscrit">
			</form>
		</div>
	</div>
	<?php
		if(isset($erreur)){
			echo '<font color="red">'.($erreur).'</font>';
		}
	?>
	<footer>
		
</footer>
</body>

</html>