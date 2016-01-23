<?php
require_once "../Core/utils.php";
require_once "../Model/login.php";

isLog("index.php");

function checklog($Tab) {

	if (!isMailInDb($Tab['email'])) {
		return "Email inconnu !";
	}
	if (!passIsOk($Tab['email'], $Tab['password'])) {
		return "Password incorrect !";
	}
	if (banni($Tab['email']) == true) {
		return "Merci d'activer votre compte via l'email reçu lors de l'inscription !";
	}

	return "NoError";
} //checklog()

if ($_POST['send']) {
	$error = checklog($_POST);
	if ($error == "NoError") {
		$User = new user($_POST['email']);
		$_SESSION['id'] = $User->getId();
		if ($User->getLastco() == NUll) {
			$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Bienvenue, Share2Go vous souhaite un bon voyage !</p></div>";
		}

		updateCo(True);
		$_SESSION['login'] = "ok";
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['lastco'] = $User->getlastco();
		$_SESSION['nbnewmess'] = getNbNewMess($User->getId());
		$_SESSION['lu'] = false;
		header('Location: index.php');
	} else {
		echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";
	}
}

if ($_GET['tok']) {
	$error = activation($_GET['mail'], $_GET['tok']);
	if ($error == "ok") {
		$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Compte activé !</p></div>";
	} else {
		$_SESSION['msg'] = "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";
	}

	header("Location: login.php");
}

require_once "../View/login.php";
?>

