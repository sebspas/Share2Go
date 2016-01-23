<?php
	require_once("../Core/utils.php");
	require_once("../Model/messagerie.php");

	isNoLog("login.php");

	if (isset($_GET['traj'])) {
		if ($_POST['send'] && isset($_POST['mess'])) {
			inscritMessage($_POST['mess'], $_SESSION['id'], $_GET['traj']);
		}
	}

	$res = readConversations($_SESSION['id']);
	if (isset($_GET['traj'])) {
		$res2 = readMessages($_GET['traj']);
		$trajet = recupTrajet($_GET['traj']);
	}
	
	$_SESSION['lu'] = true;

	require_once("../View/messagerie.php");
?>