<?php
	require_once("../Core/utils.php");
	require_once('../Model/logout.php');

	updateCo(false,$_SESSION['email']);

	session_destroy();
	header("Location : ../login.php");
?>