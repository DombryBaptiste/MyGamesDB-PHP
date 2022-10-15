<?php
	require_once("../PHP/log_bd.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>MyGamesDB</title>
	<link href="../CSS/style.css" rel="stylesheet">
	<link href="../CSS/header.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	
</head>

<body>
	<ul>
		<li>Mon profil</li>
		<li>Ma collection</li>
		<li>Se deconnecter</li>
	</ul>
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
							echo("<p> Salut <span class=\"pseudoconnected\">".$_SESSION['pseudo']. "</span> </p>
									<ul class=\"listeonglet\">
										<li class=\"option\">Mon profil</li>
										<li class=\"option\">Ma collection</li>
										<li class=\"option\">Se déconecter</li>
									</ul>
								</div>");
							//unset($_SESSION['isconnected']);
						}
					} else {
						echo("	<a class=\"link_con_ins\" href=\"connexion.php\">Connexion</a>
								<span>|</span>
								<a class=\"link_con_ins\" href=\"inscription.php\">Inscription</a>");
					}
				?>
				
			</div>
		</div>
		
	</header>
	<nav class="nav1">
		<ul class="listeonglet">
			<li class="li_game">
				<div class="onglet">
					PlayStation
				</div>
				<div class="deroulantPS">
					<ul class="listeoption">
						<li class="option">PS1</li>
						<li class="option">PS2</li>
						<li class="option">PS3</li>
						<li class="option">PS4</li>
						<li class="option">PS5</li>	
					</ul>
				</div>
			</li>
			<li class="li_game">
				<div class="onglet">
					Xbox
				</div>
				<div class="deroulantXBOX">
					<ul class="listeoption">
						<li class="option">Xbox</li>
						<li class="option">Xbox 360</li>
						<li class="option">Xbox One</li>
						<li class="option">Xbox Series X</li>
					</ul>
				</div>
			</li>
			<li class="li_game">
				<div class="onglet">
					Nintendo
				</div>
				<div class="deroulantNINTENDO">
					<ul class="listeoption">
						<li class="option">DS</li>
						<li class="option">3DS</li>
						<li class="option">Wii</li>
						<li class="option">Wii U</li>
						<li class="option">Switch</li>	
					</ul>
				</div>
			</li>
		</ul>
	</nav>
	<script src="../JS/menu.js"></script>
	<!--<div class="testdiv"></div>-->
	<h1 id="title">HELLO</h1>
	<h1 id="title">HELLO</h1>
	<p>Ma premiere utilisation de Git/GitHub</p>
</body>



</html>
