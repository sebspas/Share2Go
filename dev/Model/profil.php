<?php
	function recupVehicule($id) {
		$BD = new BD('vehicule');
		$res = $BD->selectMult("iduser",$id);
		return $res;
	}

	function recupTrajetProprio($id) {
		$BD = new BD('trajet');
		$res = $BD->selectMult("idauteur",$id);
		return $res;
	}

	function recupTrajetReserv($id) {
		$BD = new BD('effectue');
		$res = $BD->selectMult("iduser",$id);
		$BD->setUsedTable('trajet');
		foreach ($res as $tuple) {
			if ($tuple->idtrajet) {
				$result[] = $BD->select("idtrajet",$tuple->idtrajet);
			}
		}
		return $result;
	}
	function countUserTrajet($idtrajet) {
		$BD = new BD('effectue');
		return $BD->count("idtrajet",$idtrajet);
	}

	function deletevehicule($idv) {
		$BD = new BD('vehicule');
		$BD->delete("idvehicule",$idv);
	}

	function deletetrajet($idtrajet,$iduser) {
		$BD = new BD('trajet');
		$BD->delete("idtrajet",$idtrajet);
		$BD->setUsedTable('user');
		$BD->decr("nbtrajet","iduser",$iduser);
	}

	function supprEffectue($iduser,$idtrajet) {
		$BD = new BD('effectue');
		$BD->deleteTwoParam("iduser",$iduser,"idtrajet",$idtrajet);
	}

	function majnbplace($idtrajet) {
		$BD = new BD('trajet');
		$BD->inc("nbplace","idtrajet",$idtrajet);
	}
?>