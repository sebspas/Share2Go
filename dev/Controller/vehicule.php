<?php
	require_once("../Core/utils.php");
	require_once("../Model/vehicule.php");

	isNoLog("login.php");

	$User = recupUser($_SESSION['id']);
	isNoPermis($User->permis);

	$nbvehicule = countVehicule($_SESSION['id']);

	if ($nbvehicule >= 3) {
		$_SESSION['msg'] = "<div class='error' ><p class='error-txt' >Vous avez atteind le nombre maximal de vehicule ! Veuillez en supprimer depuis la page profil.</p></div>";
		header("Location : profil.php");
	}
	function checkInfo($Tab) {

		if (!preg_match('/^[a-zA-Z-_ÀÁÂÃÄÅÇÑñÇçÈÉÊËÌÍÎÏÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöøùúûüýÿ ]{3,15}$/',$Tab['marque'])) {
			return "Marque Invalide, elle ne doit être composée que de lettres.";
		}
		if (!preg_match('/^[a-zA-Z0-9-_ÀÁÂÃÄÅÇÑñÇçÈÉÊËÌÍÎÏÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöøùúûüýÿ ]{2,15}$/',$Tab['modele'])) {
			return "Modèle Invalide, il doit correspondre a un modèle existant.";
		}

		return "NoError";
	}

	if ($_POST['send']) {
		$error = checkInfo($_POST);
		if ($error == "NoError") {

			$ret = inscritVehicule($_POST['marque'],$_POST['modele'],$_POST['places'],$_SESSION['id']);

			echo "<div class='success' ><p class='success-txt' >Véhicule enregistré !</p></div>";
		}
		else {
			echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";
		}
	}

	require_once('../View/vehicule.php');
?>