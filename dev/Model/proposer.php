<?php
	function recupUser($iduser) {
		$BD = new BD('user');
		$res = $BD->select("iduser",$iduser);
		return $res;
	}
	
	function recupVehicule() {
		$BD = new BD('vehicule');
		$res = $BD->selectMult("iduser",$_SESSION['id']);
		return $res;
	}

	function inscritTrajet($Date,$VilleDep,$VilleArr,$HeureDep,$Prix,$NbrPlace,$nonfumeur,$musique,$valise,$bavar,$com,$idauteur,$idvehicule) {
		$BD = new BD('trajet');
		$BD->addTrajet($Date,$VilleDep,$VilleArr,$HeureDep,$Prix,$NbrPlace,$nonfumeur,$musique,$valise,$bavar,$com,$idauteur,$idvehicule);
		$BD->setUsedTable('user');
		$BD->inc("nbtrajet","iduser",$idauteur);
	}

	function nbPlace($idvehicule) {
		$BD = new BD('vehicule');
		$res = $BD->select('idvehicule',$idvehicule);
		return $res->nbplace;
	}

?>