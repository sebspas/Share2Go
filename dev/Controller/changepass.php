<?php

	require_once("../Core/utils.php");

	require_once("../Model/changepass.php");



	if (isset($_SESSION['login'])) session_destroy();

	

	function checklog($Tab) {



		if(!isMailInDb($Tab['email'])) {

			return "Email inconnu !";

		}



		return "NoError";

	} //checklog()



	if ($_POST['send']) {

		$error = checklog($_POST);

		if ($error == "NoError") {



			$token = uniqid(rand(), true);

			$token = sha1($token);



			updateTok($_POST['email'],$token);



			$link = "http://62.210.110.24/S2go/dev/changepass.php?mail=" . $_POST['email'] . "&tok=" . $token;



			$mail = new mail($_POST['email'], "Mot de passe !", "mdp",$link);



			echo "<div class='success' ><p class='success-txt' > Un email a bien été envoyé, cliquez sur le lien pour changer votre mot de passe.</p></div>";

		}

		else {

			echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";

		}

	}



	function checkpass($Tab) {

		if (!preg_match('/^[a-zA-Z.-_*^!:;,&]{6,25}$/',$Tab['password'])) {

			return "Mot de passe invalide, il doit être composé de 6 à 25 caractères.";

		}

		if($Tab['password'] != $Tab['password2']) {

			return "Mot de passe invalide , les deux mot de passes doivent correspondrent.";

		}



		return "NoError";

	}



	if ($_POST['change']) {

		$error = checkpass($_POST);



		if ($error != "NoError") {

			echo "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";

		}

		else {

			$error = changepass($_GET['mail'],$_GET['tok'],$_POST['password']);

		

			if ($error == "ok") 

				$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Mot de passe changé !</p></div>";

			else 

				$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >" . $error . "</p></div>";

			header("Location : login.php");

		}

		

	}

	require_once("../View/changepass.php");

?>



