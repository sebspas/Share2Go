<?php
	require_once("../Core/utils.php");
	require_once("../Model/proposer.php");
	
	isNoLog("login.php");
	
	$User = recupUser($_SESSION['id']);
	isNoPermis($User->permis);

	$res = recupVehicule($_SESSION['id']);
	if (!isset($res[0]->idvehicule)) {
		$_SESSION['msg'] = "<div class='error' ><p class='error-txt' >Vous devez enregistrer un véhicule avant de proposer un trajet.</p></div>";
		header("Location : vehicule.php");
	}

	function checkInfo($Tab) {

		list($dd,$mm,$yyyy) = explode('/',$Tab['date']);
		if (!checkdate($mm,$dd,$yyyy)) {
			return "Date invalide, il doit être au format dd/mm/yyyy (ex : 22/11/1995).";
		}
		$_POST['date2'] = $dd . "/"  . $mm . "/" . $yyyy;
		$_POST['date'] = $yyyy . "/" . $mm . "/" . $dd;
		if ($yyyy < date('Y') || ($mm == date('m') && $dd < date('j'))) {
			return "Date invalide, elle doit être supérieure à la date d’aujourd’hui";
		}

		if (!preg_match('/^[a-zA-Z-_ÀÁÂÃÄÅÇÑñÇçÈÉÊËÌÍÎÏÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöøùúûüýÿ ]{3,25}$/',$Tab['villedep'])) {
			return "Ville de départ Invalide, elle ne doit être composée que de lettres (ou de - _).";
		}

		if (!preg_match('/^[a-zA-Z-_ÀÁÂÃÄÅÇÑñÇçÈÉÊËÌÍÎÏÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöøùúûüýÿ ]{3,25}$/',$Tab['villearr'])) {
			return "Ville d'arrivée Invalide, elle ne doit être composée que de lettres (ou de - _).";
		}
		if (!preg_match('/^[0-9]{2}:[0-9]{2}$/', $Tab['Hdep'])) {
			return "Format de l'heure invalide (ex: 15:45).";
		}
		list($gg,$ii) = explode(':',$Tab['Hdep']);
		if (!$gg > 23 || $ii > 59) {
			return "Heure invalide, format 13:30.";
		}
		$_POST['Hdep'] = $gg . ":" . $ii ;
		if (!preg_match('/^[0-9]{1,2}$/', $Tab['prix']) || $Tab['prix'] > 100  || $Tab['prix'] < 0) {
			return "Prix invalide, il doit être compris entre 0 et 99.";
		}
		if (nbPlace($Tab['vehicule']) < $Tab['places']) {
			return "Vous ne pouvez proposer plus de places que votre voiture n'en posséde !";
		}

		return "NoError";
	}

	if ($_POST['send']) {
		list ($villedep,$Pays) = explode(',', $_POST['villedep']);
		list ($villearr,$Pays) = explode(',', $_POST['villearr']);
		
		$_POST['villedep'] = $villedep;
		$_POST['villearr'] = $villearr;

		$error = checkInfo($_POST);
		if ($error == "NoError") {
			$nocig = 1;
			if ($_POST['nocig'] != "nocig") $nocig = 0;

			$music = 1;
			if ($_POST['music'] != "music") $music = 0;

			$bag = 1;
			if ($_POST['bag'] != "bag") $bag = 0;

			$bavar = 1;
			if ($_POST['talk'] != "talk") $bavar = 0;

			$ret = inscritTrajet($_POST['date'],$villedep,$villearr,$_POST['Hdep'],$_POST['prix'],$_POST['places'],$nocig,$music,$bag,$bavar,$_POST['com'],$_SESSION['id'],$_POST['vehicule']);
			echo "<div class='success' ><p class='success-txt' >Trajet enregistré !</p></div>";
		}
		else {
			echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";
		}
	}

	if ($_POST['vehicule']) {
		//print_r($_POST['vehicule']);
	}

	require_once("../View/proposer.php");
?>