<?php

	require_once("../Core/utils.php");

	require_once("../Model/modifier.php");



	$User = recupUser($_SESSION['id']);



	function check($Tab,$User) {

		$Nom = $Tab['nom'];

		$Prenom = $Tab['prenom'];

		$Age = $Tab['age'];

		$Sexe = $Tab['sexe'];

		$Mail = $Tab['email'];

		$Mail2 = $Tab['email2'];

		$Pass = $Tab['password'];

		$Tel = $Tab['tel'];

		if (!preg_match('/^[a-zA-Z- ]{4,25}$/',$Nom)) {

			return "Nom Invalide, il ne doit être composé que de lettres.";

		}

		if (!preg_match('/^[a-zA-Z- ]{4,25}$/',$Prenom)) {

			return "Prenom Invalide, il ne doit être composé que de lettres.";

		}

		if (!preg_match('/^[a-zA-Z0-9.+-_]*@[a-zA-Z0-9.-_]*.[a-zA-Z-]{2,10}$/',$Mail)) {

			return "Email invalide, merci de rentrer un mail valide !";

		}

		if ($Mail != $Mail2) {

			return "Les deux Email ne correspondent pas.";

		}

		if ($Mail != $User->mail && isMailInDb($Mail)) {

			return "Email déjà utilisé !";

		}

		list($dd,$mm,$yyyy) = explode('/',$Age);

		if (!checkdate($mm,$dd,$yyyy)) {

			return "Age invalide, il doit être au format dd/mm/yyyy (ex : 22/11/1995).";

		}

		$_POST['age'] = $yyyy . "/" . $mm . "/" . $dd;

		$_POST['age2'] = $dd . "/" . $mm . "/" . $yyyy;

		if (!preg_match('/^\+?[0-9]{1,3}[0-9() ]{0,10}$/',$Tel)) {

			return "Télèphone invalide, merci de rentrer un numero valide !";

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

		$error = check($_POST,$User);

		if ($error == "NoError") {

			$permis = 1;

			if ($_POST['permis'] != "permis") {

				$permis = 0;

			} 

			$ret = updateUser($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['sexe'],$_POST['tel'],$_POST['email'],$permis,$User);

			$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Modification enregistrée !</p></div>";

			header("Location : profil.php");

		}

		else {

			echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";

		}

	}



	if ($_GET['demande']) {



			$token = uniqid(rand(), true);

			$token = sha1($token);



			updateTok($_SESSION['email'],$token);



			$link = "http://62.210.110.24/S2go/dev/changepass.php?mail=" . $_SESSION['email'] . "&tok=" . $token;



			$mail = new mail($_SESSION['email'], "Mot de passe !", "mdp",$link);



			$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Demande de changement envoyée !</p></div>";

			header("Location : profil.php");

	}



	function checkInfo($Tab) {



		list($dd,$mm,$yyyy) = explode('/',$Tab['date']);

		if (!checkdate($mm,$dd,$yyyy)) {

			return "Date invalide, il doit être au format dd/mm/yyyy (ex : 22/11/1995).";

		}

		$_POST['date2'] = $dd . "/"  . $mm . "/" . $yyyy;

		$_POST['date'] = $yyyy . "/" . $mm . "/" . $dd;

		if ($yyyy < date('Y') || ($mm == date('m') && $dd < date('j'))) {

			return "Date invalide, elle doit être supérieure à la date d'aujourdhui.";

		}



		if (!preg_match('/^[a-zA-Z-_ÀÁÂÃÄÅÇÑñÇçÈÉÊËÌÍÎÏÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöøùúûüýÿ ]{3,25}$/',$Tab['villedep'])) {

			return "Ville de départ Invalide, elle ne doit être composée que de lettres (ou de - _).";

		}



		if (!preg_match('/^[a-zA-Z-_ÀÁÂÃÄÅÇÑñÇçÈÉÊËÌÍÎÏÒÓÔÕÖØÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöøùúûüýÿ ]{3,25}$/',$Tab['villearr'])) {

			return "Ville d'arrivée Invalide, elle ne doit être composée que de lettres (ou de - _).";

		}



		list($gg,$ii) = explode(':',$Tab['Hdep']);

		if (!$gg > 23 || $ii > 59) {

			return "Heure invalide, format 13:30.";

		}

		$_POST['Hdep'] = $gg . ":" . $ii ;

		if ($Tab['prix'] > 100  || $Tab['prix'] < 0) {

			return "Prix invalide, il doit être compris entre 0 et 99.";

		}



		return "NoError";

	}



	if ($_GET['traj']) {

		$res = recupVehicule($_SESSION['id']);

		$trajet = recupTrajet($_GET['traj']);

		list($yyyy,$mm,$dd) = explode('-',$trajet->date);

		if ($trajet->idauteur != $_SESSION['id']) {

			$_SESSION['msg'] = "<div class='error' ><p class='error-txt' > Degage de là tricheur !</p></div>";

			header("Location : profil.php");

		}

		$dateR = $dd . "/"  . $mm . "/" . $yyyy;

			

		if ($_POST['trajet']) {

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



				$ret = updateTrajet($_POST['date'],$villedep,$villearr,$_POST['Hdep'],$_POST['prix'],$_POST['places'],$nocig,$music,$bag,$bavar,$_POST['com'],$_POST['vehicule'],$trajet);

				$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Trajet modifié !</p></div>";

				header("Location : reservation.php?idt=" . $trajet->idtrajet . "&color=cyan1");

			}

			else {

				echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";

			}

		}

	}



	require_once("../View/modifier.php");

?>