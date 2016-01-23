<?php
	function recupTrajet($idtrajet) {
		$BD = new BD('trajet');
		$res = $BD->select("idtrajet",$idtrajet);
		return $res;
	} 

	function recupAuteur($idauteur) {
		$BD = new BD('user');
		$res = $BD->select("iduser",$idauteur);
		return $res;
	}

	function recupVehicule($idvehicule) {
		$BD = new BD('vehicule');
		return $BD->select("idvehicule",$idvehicule);
	}

	function recupEffectueTrajet($idt) {
		$BD = new BD('effectue');
		$res1 = $BD->selectMult("idtrajet",$idt);
		$BD->setUsedTable('user');
		foreach($res1 as $tuple) {
			$donnees[] = $BD->select("iduser",$tuple->iduser);
		}
		return $donnees;
	}

	function addeffectue($iduser,$idtrajet) {
		$BD = new BD('effectue');
		$BD->addeffectue($iduser,$idtrajet);
	}

	function majnbplace($idtrajet) {
		$BD = new BD('trajet');
		$BD->decr("nbplace","idtrajet",$idtrajet);
	}

	function supprUser($iduser,$idtrajet) {
		$BD = new BD('effectue');
		$BD->deleteTwoParam("iduser",$iduser,"idtrajet",$idtrajet);
	}

	function majnbplaceincr($idtrajet) {
		$BD = new BD('trajet');
		$BD->inc("nbplace","idtrajet",$idtrajet);
	}
?>