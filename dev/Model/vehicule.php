<?php
	function recupUser($iduser) {
		$BD = new BD('user');
		$res = $BD->select("iduser",$iduser);
		return $res;
	}

	function countVehicule($id) {
		$BD = new BD('vehicule');
		$res = $BD->count("iduser",$id);
		return $res;
	}

	function inscritVehicule($Marque,$Model,$NbPlace,$Iduser) {
		$BD = new BD("vehicule");
		$BD->addVehicule($Marque,$Model,$NbPlace,$Iduser);
	}
?>