<?php
	function isMailInDb($Mail) {
		$BD = new BD("user");
		return $BD->isInDb("mail",$Mail);
	}

	function recupVehicule($id) {
		$BD = new BD('vehicule');
		$res = $BD->selectMult("iduser",$id);
		return $res;
	}

	function recupUser($iduser) {
		$BD = new BD('user');
		$res = $BD->select("iduser",$iduser);
		return $res;
	}

	function recupTrajet($id) {
		$BD = new BD('trajet');
		$res = $BD->select("idtrajet",$id);
		return $res;
	}

	function updateUser($Nom,$Prenom,$Age,$Sexe,$Tel,$Mail,$permis,$oldUser) {
		$BD = new BD('user');
		if ($oldUser->Nom != $Nom) {
			$BD->update("nom",$Nom,"iduser",$oldUser->iduser);
		}
		if ($oldUser->Prenom != $Prenom) {
			$BD->update("pernom",$Prenom,"iduser",$oldUser->iduser);
		}
		if ($oldUser->Sexe != $Sexe) {
			$BD->update("sexe",$Sexe,"iduser",$oldUser->iduser);
		}
		if ($oldUser->tel != $Tel) {
			$BD->update("tel",$Tel,"iduser",$oldUser->iduser);
		}
		if ($oldUser->mail != $Mail) {
			$BD->update("mail",$Mail,"iduser",$oldUser->iduser);
		}
		if ($oldUser->permis != $permis) {
			$BD->update("permis",$permis,"iduser",$oldUser->iduser);
		}		
		$BD->update("age",$Age,"iduser",$oldUser->iduser);
	}

	function updateTok($Mail,$Tokens) {
		$BD = new BD("user");
		$BD->update("tokens",$Tokens,"mail",$Mail);
	}

	function updateTrajet($Date,$villedep,$villearr,$hdep,$prix,$place,$nocig,$music,$bag,$bavar,$com,$idvehicule,$oldtrajet) {
		$BD = new BD('trajet');
		if ($oldtrajet->Date != $Date) {
			$BD->update("date",$Date,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->villedep != $villedep) {
			$BD->update("villedep",$villedep,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->villearr != $villearr) {
			$BD->update("villearr",$villearr,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->heuredep != $hdep) {
			$BD->update("heuredep",$hdep,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->prix != $prix) {
			$BD->update("prix",$prix,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->nbplace != $place) {
			$BD->update("nbplace",$place,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->nonfumeur != $nocig) {
			$BD->update("nonfumeur",$nocig,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->musique != $music) {
			$BD->update("musique",$music,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->valise != $bag) {
			$BD->update("valise",$bag,"idtrajet",$oldtrajet->idtrajet);
		}	
		if ($oldtrajet->bavar != $bavar) {
			$BD->update("bavar",$bavar,"idtrajet",$oldtrajet->idtrajet);
		}		
		if ($oldtrajet->com != $com) {
			$BD->update("com",$com,"idtrajet",$oldtrajet->idtrajet);
		}		
		if ($oldtrajet->valise != $bag) {
			$BD->update("valise",$bag,"idtrajet",$oldtrajet->idtrajet);
		}
		if ($oldtrajet->idvehicule != $idvehicule) {
			$BD->update("idvehicule",$idvehicule,"idtrajet",$oldtrajet->idtrajet);
		}	
	}
?>