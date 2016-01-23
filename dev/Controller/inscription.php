<?php
	require_once("../Core/utils.php");

	require_once("../Model/inscription.php");

	isLog("index.php");
	
	function check($Tab) {
		$Nom = $Tab['nom'];
		$Prenom = $Tab['prenom'];
		$Age = $Tab['age'];
		$Sexe = $Tab['sexe'];
		$Mail = $Tab['email'];
		$Mail2 = $Tab['email2'];
		$Pass = $Tab['password'];
		$Tel = $Tab['tel'];
		if (!preg_match('/^[a-zA-Z- ]{4,25}$/',$Nom)) {
			return "Nom invalide, il ne doit être composé que de lettres.";
		}
		if (!preg_match('/^[a-zA-Z- ]{4,25}$/',$Prenom)) {
			return "Prenom invalide, il ne doit être composé que de lettres.";
		}
		if (!preg_match('/^[a-zA-Z][-a-zA-Z0-9_]*\.[-a-zA-Z0-9_]+@(etu.)?univ-amu\.fr$/',$Mail) && !preg_match('/^[a-zA-Z][-a-zA-Z0-9_]*\.[-a-zA-Z0-9_]+@(etu.)?univ-amu\.fr$/',$Mail)) {
			return "Email invalide, merci de rentrer un mail valide de l'amu !";
		}
		if ($Mail != $Mail2) {
			return "Les deux emails ne correspondent pas.";
		}
		if (isMailInDb($Mail)) {
			return "Email déjà utilisé !";
		}
		list($dd,$mm,$yyyy) = explode('/',$Age);
		if (!checkdate($mm,$dd,$yyyy)) {
			return "Age invalide, il doit être au format dd/mm/yyyy (ex : 22/11/1995).";
		}
		$_POST['age'] = $yyyy . "/" . $mm . "/" . $dd;
		$_POST['age2'] = $dd . "/" . $mm . "/" . $yyyy;
		if (!preg_match('/^[a-zA-Z.-_*^!:;,&]{6,25}$/',$Pass)) {
			return "Mot de passe invalide, il doit être composé de 6 à 25 caractères.";
		}
		if ($Tab['password'] != $Tab['password2']) {
			return "Les deux mot de passe doivent être identique.";
		}
		if (!preg_match('/^\+?[0-9]{1,3}[0-9() ]{0,10}$/',$Tel)) {
			return "Téléphone invalide, merci de rentrer un numéro valide.";
		}
		list($y1) = explode("-", $_POST['age']);
		$y2 = date('Y');
		$age = $y2 - $y1;
		if ($_POST['permis'] == "permis" && $age < 18) {
			return "Si vous avez moins de 18ans, vous ne pouvez avoir le permis ...";
		}
		return "NoError";
	}

	if ($_POST['send']) {
		$error = check($_POST);
		if ($error == "NoError") {
			$permis = 1;
			if ($_POST['permis'] != "permis") {
				$permis = 0;
			} 
			$ret = inscrit($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['sexe'],$_POST['password'],$_POST['tel'],$_POST['email'],$permis);
			$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Inscription Ok ! Veuillez activer votre compte via l'email que vous venez de recvoir.</p></div>";
			header("Location : login.php");
		}
		else {
			echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";
		}
	}

	require_once("../View/inscription.php");
?>