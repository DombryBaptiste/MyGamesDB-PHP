<?php 
	require_once("../PHP/log_bd.php");
	require_once("../PHP/case_connexion.php");
	require_once("../PHP/affiche_game.php");
	/*$bdd = new PDO('mysql:host='.$host.';dbname='.$database.'',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$requete = $bdd->prepare("SELECT * FROM jeu WHERE id = ?");
	$requete->execute(array($_GET['id']));
	$infogame = $requete->fetch();
	if(isset($_SESSION['isconnected'])){
		if($_SESSION['isconnected']){
			$requete2 = $bdd->prepare("SELECT * FROM game_".$_SESSION['id']."membre WHERE id_game = ?");
			$requete3 = $bdd->query("SELECT * FROM jeu");
			$requete4 = $bdd->query("SELECT * FROM game_".$_SESSION['id']."membre");
			$requete->execute(array($_GET['id']));
			$requete2->execute(array($_GET['id']));
			$infogame = $requete->fetch();
			$row = $requete2->rowCount();
			$nbGameBDD = $requete3->rowCount();
			$nbGameUser = $requete4->rowCount();
		}
	}*/
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php title_game($_GET['id']); ?></title>
	<link href="../CSS/style.css" rel="stylesheet">
	<link href="../CSS/menu.css" rel="stylesheet">
	<link href="../CSS/header.css" rel="stylesheet">
	<link href="../CSS/game.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="../circle-progress-master/dist/circle-progress.min.js"></script>
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
	<div class="game">
		<div class="desc">
			<img src="<?php image_game($_GET['id'])?>" class="img_game">
			<div class="desc_text">
				<?php 
				show_one_game($_GET['id']);
				?>
				<div class="button_info">
					<?php
						show_button($_GET['id']);
					?>
				</div>	
			</div>
		</div>
		<div class="video">
			<iframe width="560" height="315" src="<?php show_video($_GET['id']); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			<?php
				show_progress($_GET['id']);
     		?>
	</div>

</body>
</html>