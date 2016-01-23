<?php
	function isMailInDb($Mail) {
		$BD = new BD("user");
		return $BD->isInDb("mail", $Mail);
	}

	function updateTok($Mail,$Tokens) {
		$BD = new BD("user");
		$BD->update("tokens",$Tokens,"mail",$Mail);
	}

	function changepass($Mail,$Tokens,$Pass) {
		$BD = new BD("user");
		$user = $BD->select("mail",$Mail);
		
		if ($user->tokens == $Tokens) {
			$Pass2 = sha1($Pass);
			$BD->update("mdp",$Pass2,"iduser",$user->iduser);
			$BD->update("tokens",NULL,"iduser",$user->iduser);
			return "ok";
		}
		else {
			return "Changement impossible ...";
		}
	}
?>