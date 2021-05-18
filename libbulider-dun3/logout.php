<?php
session_start();
if (!isset($_SESSION['userSession'])) {
	header("Location: adminlogin.php");
} else if (isset($_SESSION['userSession'])!="") {
	header("Location: homepage.php");
}

	if("username"){
	session_destroy();
	unset($_SESSION['SESS_NAME']);
	include'adminlogin.php';
	}
?>
