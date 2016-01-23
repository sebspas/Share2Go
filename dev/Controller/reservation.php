<?php
	require_once("../Core/utils.php");
	require_once("../Model/reservation.php");

	//isNoLog("login.php");
	$trajet = recupTrajet($_GET['idt']);
	$auteur = recupAuteur($trajet->idauteur);
	
	$listInscrit = recupEffectueTrajet($_GET['idt']);

	function verif($listInscrit,$trajet) {
		if ($trajet->nbplace <= 0) {
			return "Le trajet est complet ! Impossible d'effectuer la réservation !";
		}
		foreach ($listInscrit as $user) {
			if ($user->iduser == $_SESSION['id']) return "Vous êtes déja inscrit pour ce trajet. Réservation impossible !";
		}
		if ($trajet->idauteur == $_SESSION['id']) return "Vous êtes le propriétaire de ce trajet, vous ne pouvez pas vous y inscrire !";
		return "NoError";
	}

	if ($_GET['idtajout']) {
		$error = verif($listInscrit,$trajet);
		if ($error == "NoError") {
			addeffectue($_GET['idtajout'],$_SESSION['id']);
			majnbplace($_GET['idtajout']);
			$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Trajet ajouté !</p></div>";
			header("Location : index.php");
		}
		else {
			$_SESSION['msg'] = "<div class='error' ><p class='error-txt' >" . $error . "</p></div>";
			header("Location : reservation.php?idt=" . $_GET['idt'] . "&color=" . $_GET['color']);
		}
	}

	if ($_GET['idu']) {
		supprUser($_GET['idu'],$trajet->idtrajet);
		majnbplaceincr($trajet->idtrajet);
		$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Utilisateur supprimé !</p></div>";
		header("Location : reservation.php?idt=" . $_GET['idt'] . "&color=" . $_GET['color']);
	}
	require_once("../View/reservation.php");
?>