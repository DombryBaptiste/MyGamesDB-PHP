<?php
	require_once("../PHP/log_bd.php");
	require_once("../PHP/case_connexion.php")
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
	<link href="../CSS/profil.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<title>Connexion | MyGamesDB</title>
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
					echo_connexion_inscription();
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
						<a class="link_console" href="list_game.php?type=Nintendo DS"><li class="option">DS</li></a>
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
	<div class="account">
		<p class="p_account"><span class="span_account">Changemnt de mot de passe</span></p>
		<p class="p_pseudo">
			<form method="GET" action="../PHP/mdp_user.php" class="form_new_pseudo">
				<div class="mdp">
					<p class="p_mdp">Ancien Mot de passe :</p>
					<input  class="new_mdp_input" type="password" name="old_mdp">
					<p class="p_mdp">Nouveau mot de passe :</p>
					<input  class="new_mdp_input" type="password" name="new_mdp">
					<p class="p_mdp"> Confirmer nouveau mot de passe :</p>
					<input  class="new_mdp_input" type="password" name="new_mdp_confirm">
				</div>
				<input class="new_pseudo_input" type="submit" value ="Modifier" name="form_changemdp">
			</form>
		<p>
			<p>
			<?php 	if(isset($_SESSION['var_info'])){
						echo($_SESSION['var_info']);
						unset($_SESSION['var_info']);
					}
			?>
				
			</p>
	</div>
</body>
</html>