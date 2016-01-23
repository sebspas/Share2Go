<?php
	function inscritMessage($Message, $IdAuteur, $IdMessage) {
		$BD = new BD("message");
		$BD->addMessage($Message, $IdAuteur, $IdMessage);
	}

	function readConversations($IdAuteur) {
		$BD = new BD("message");
		return $BD->getConversations($IdAuteur);
	}

	function readMessages($IdTrajet) {
		$BD = new BD("message");
		return $BD->getMessages($IdTrajet);
	}

	function recupTrajet($idtrajet) {
		$BD = new BD("trajet");
		return $BD->select("idtrajet",$idtrajet);
	}
?>