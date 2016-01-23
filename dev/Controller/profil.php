<?php
	require_once("../Core/utils.php");
	require_once("../Model/profil.php");

	isNoLog("login.php");

	$user = new user($_SESSION['email']);

	$listvehicule = recupVehicule($user->getId());
	$listTrajetProprio = recupTrajetProprio($user->getId());
	$listTrajetReserv = recupTrajetReserv($user->getId());

	function checkused($idv,$listTrajetProprio,$listvehicule) {
		foreach($listTrajetProprio as $trajet) {
			if ($trajet->idvehicule == $idv) return "Véhicule utilisé pour un trajet, merci de supprimer le trajet avant de pouvoir supprimer le véhicule.";
		}
		foreach($listvehicule as $vehi) {
			if ($vehi->iduser && $vehi->iduser != $_SESSION['id']) {
			return "Vous n'êtes pas le proriétaire du vehicule ! Petit insolent !";
			}
		}
		
		return "Suppression enregistrée !";
	}

	function checktrajet($idt,$listTrajetProprio) {
		foreach($listTrajetProprio as $trajet) {
			if ($trajet->idtrajet && $trajet->idauteur != $_SESSION['id']) return "Vous n'êtes pas le prorietaire du trajet ! Petit insolent !";
		}
		if (countUserTrajet($idt) > 0) return "Ce trajet n'est pas vide, supprimez d'abord ses utilisateurs avant de le supprimer.";
		return "Suppression enregistrée !";
	}

	if ($_GET['idv']) {
		$error = checkused($_GET['idv'],$listTrajetProprio,$listvehicule);
		if ($error == "Suppression enregistrée !") {
			deletevehicule($_GET['idv']);
			$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >" . $error . "</p></div>";
			header("Location : profil.php");
		}
		else {
			echo "<div class='error' ><p class='error-txt' > " . $error . "</p></div>";
		}
	}

	if ($_GET['idt']) {
		$error = checktrajet($_GET['idt'],$listTrajetProprio);
		if ($error == "Suppression enregistrée !") {
			deletetrajet($_GET['idt'],$_SESSION['id']);
			$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >" . $error . "</p></div>";
			header("Location : profil.php");
		}
		else {
			echo "<div class='error' ><p class='error-txt' > " . $error . "</p></div>";
		}
	}
	
	if ($_GET['idts']) {
		supprEffectue($_SESSION['id'],$_GET['idts']);
		majnbplace($_GET['idts']);
		$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Vous êtes désinscrit de ce trajet !</p></div>";
		header("Location : profil.php");

	}
	require_once("../View/profil.php");
?>