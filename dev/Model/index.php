<?php
	function recupTrajetParam($cond_att,$cond_val,$cond_att2,$cond_val2) {
		$BD = new BD('trajet');
		return $BD->selectTwoParam($cond_att,$cond_val,$cond_att2,$cond_val2,'date');

	}

	function recupTrajet() {
		$BD = new BD('trajet');
		return $BD->selectAll('date');
	}

	function recupUser($iduser) {
		$BD = new BD('user');
		return $BD->select("iduser",$iduser);
	}

	function recupVehicule($idvehicule) {
		$BD = new BD('vehicule');
		return $BD->select("idvehicule",$idvehicule);
	}

?>