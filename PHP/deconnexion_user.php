<?php
	require_once("../PHP/log_bd.php");
	if(isset($_SESSION['isconnected'])){
		if($_SESSION['isconnected']){
			unset($_SESSION['isconnected']);
			header("Location: ../HTML/index.php");
			session_destroy();
		}
	}


?>