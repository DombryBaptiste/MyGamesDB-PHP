<?php
	require_once("log_bd.php");
	function echo_connexion_inscription(){
		if(isset($_SESSION['isconnected'])){
			if($_SESSION['isconnected']){
				echo("	<ul class=\"listeconsole\">
							<li class=\"li_profil\">
								<div class=\"ongletPROFIL\">
									".$_SESSION['pseudo']."
								</div>
								<div class=\"deroulantPROFIL\">
									<ul class=\"listeoptionPROFIL\">
										<a href=\"profil_user.php\" class=\"link_profil\"><li class=\"option\">Mon profil</li></a>
										<a href=\"collection_user.php\" class=\"link_profil\"><li class=\"option\">Ma collection</li></a>
										<a href=\"../PHP/deconnexion_user.php\" class=\"link_profil\"><li class=\"option\">Se deconnecter</li></a>
									</ul>
								</div>
							</li>
						</ul>");
			}
		} else {
			echo("	<a class=\"link_con_ins\" href=\"connexion.php\">Connexion</a>
					<span>|</span>
					<a class=\"link_con_ins\" href=\"inscription.php\">Inscription</a>");
		}
	}
?>