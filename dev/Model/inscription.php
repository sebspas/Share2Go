<?php
	function isMailInDb($Mail) {
		$BD = new BD("user");
		return $BD->isInDb("mail",$Mail);
	}

	function inscrit($Nom,$Prenom,$Age,$Sexe,$Pass,$Tel,$Mail,$Permis) {
		$BD = new BD("user");

		$BD->addUser($Nom,$Prenom,$Age,$Sexe,$Pass,$Tel,$Mail,$Permis);

		$BD->update("banni",1,"mail",$Mail);

		$token = uniqid(rand(), true);
		$token = sha1($token);
		$BD->update("tokens",$token,"mail",$Mail);

		$BD->update("avatar","avatar/default.png","mail",$Mail);
		
		$link = "http://62.210.110.24/S2go/dev/login.php?mail=" . $Mail . "&tok=" . $token;
		
		$mail = new mail($Mail,"Share2go : Validation de votre compte !","Reservation",$link);

	}
?>