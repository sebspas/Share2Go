<?php
//header("Location: http://www.google.fr");
//var_dump(__DIR__);
//die();
require_once "../Core/utils.php";
require_once "../Model/index.php";

isNoLog("login.php");

function checkInfo($Tab) {
	if (!preg_match('/^[a-zA-Z-_ÀÁÂÃÄÅÇÑñÇçÈÉÊËÌÍÎÏÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöøùúûüýÿ ]{3,25}$/', $Tab['villedep'])) {
		return "Ville de départ Invalide, elle ne doit être composée que de lettres (ou de - _).";
	}
	if (!preg_match('/^[a-zA-Z-_ÀÁÂÃÄÅÇÑñÇçÈÉÊËÌÍÎÏÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöøùúûüýÿ ]{3,25}$/', $Tab['villearr'])) {
		return "Ville d'arrivée Invalide, elle ne doit être composée que de lettres (ou de - _).";
	}

	return "NoError";
}

if (isset($_POST['send']) && $_POST['send']) {
	list($villedep, $Pays) = explode(',', $_POST['villedep']);
	list($villearr, $Pays) = explode(',', $_POST['villearr']);

	$_POST['villedep'] = $villedep;
	$_POST['villearr'] = $villearr;

	$error = checkInfo($_POST);

	if ($error == "NoError") {

		$res = recupTrajetParam('villedep', '' . $villedep . '', 'villearr', '' . $villearr . '');

		echo "<div class='success' ><p class='success-txt' >Recherche effectuée !</p></div>";
	} else {
		echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";
	}
} else {
	$res = recupTrajet();
}

require_once "../View/index.php";
?>