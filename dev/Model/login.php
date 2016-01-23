<?php
	function isMailInDb($Mail) {
		$BD = new BD("user");
		return $BD->isInDb("mail", $Mail);
	}

	function passIsOk($Mail,$Pass) {
		$Pass = sha1($Pass);
		$BD = new BD("user");
		$res = $BD->select("mail",$Mail);
		if ($res->mdp == $Pass) {
			return true;
		}
		else {
			return false;
		}
	}

	function updateCo($online) {
		$BD = new BD("user");
		$BD->update("lastco",date('y/m/d H:i:s'),"iduser",$_SESSION['id']);
		$BD->update("online",$online,"iduser",$_SESSION['id']);	
	}

	function banni($Mail) {
		$BD = new BD('user');
		$test = $BD->select('mail',$Mail);
		
		if ($test->banni == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	function activation($Mail,$Tokens) {
		$BD = new BD("user");
		$user = $BD->select("mail",$Mail);
		if ($user->tokens == $Tokens) {
			$BD->update("banni",0,"iduser",$user->iduser);
			$BD->update("tokens",0,"iduser",$user->iduser);
			return "ok";
		}
		else {
			return "Validation impossible ...";
		}
	}

	function getNbNewMess($iduser) {
		$nbNewMess = 0;
		$BD = new BD("message");
		$conv = $BD->getConversations($iduser);
		foreach ($conv as $res) {
			$mess = $BD->getMessagesDesc($res->idtrajet);
			//echo $mess->date . " compare to " . $_SESSION['lastco'];
			if ($mess->date > $_SESSION['lastco']) {
				$nbNewMess = $nbNewMess + 1;
			}
		}
		return $nbNewMess;
	}
?>