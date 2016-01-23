<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
</head>
<body>
<?php
	require_once("../../Core/utils.php");
	echo "<h1>Test Class bd </h1></br>";
	echo "<h2>Test Constructeur </h2></br>";
	$BD = new BD("user");
	echo "Objet crée sur la table : " . $BD->getUsedTable();

	/* Test Fonction Select */
	echo "<h2>Test Fonction Select </h2></br>";
	$donnes = $BD->select("iduser",1);

	print_r($donnes);
	echo "</br>";

	/* Test Fonction Select */
	echo "<h2>Test Fonction SelectAll </h2></br>";
	$donnees = $BD->selectAll();

	foreach ($donnees as $value) {
		print_r($value);
		echo "</br>";
		echo "$value->nom";
		echo "</br>";
	}

	/* Test Fonction addUser */
	$BD->addUser("Jean","test",20,"homme","testpass",0750917831,"sebspas@legitan.com");

	echo "<h2>Test Fonction addUser </h2></br>";
	$donnees = $BD->selectAll();

	foreach ($donnees as $value) {
		print_r($value);
		echo "</br>";
	}

	/* Test update */
	$BD->update("nom","Jeanne","nom","Jean");

	echo "<h2>Test Fonction UPDATE </h2></br>";
	$donnees = $BD->selectAll();

	foreach ($donnees as $value) {
		print_r($value);
		echo "</br>";
		echo "$value->nom";
		echo "</br>";
	}

	/* Test delete */
	$BD->delete("nom","Jeanne");

	echo "<h2>Test Fonction DELETE </h2></br>";
	$donnees = $BD->selectAll();

	foreach ($donnees as $value) {
		print_r($value);
		echo "</br>";
		echo "$value->nom";
		echo "</br>";
	}

	echo "<h2>Test Changement de table </h2></br>";
	echo "Objet crée sur la table : " . $BD->getUsedTable() . "</br>";
	$BD->setUsedTable("trajet");
	echo "Objet modifier sur la table : " . $BD->getUsedTable() . "</br>";

	/* Test Fonction addTrajet */
	$BD->addTrajet("Boulogne","Bois",date("H:i:s"),date("H:i:s"),50,2,"Fiat Punto",1);

	echo "<h2>Test Fonction addTrajet </h2></br>";
	$donnees = $BD->selectAll();

	foreach ($donnees as $value) {
		print_r($value);
		echo "</br>";
		echo "$value->nom";
		echo "</br>";
	}

	/* Test delete */
	$BD->setUsedTable("user");
	$ID = $BD->select("iduser",1)->iduser;
	$BD->setUsedTable("trajet");
	$BD->delete("idauteur",$ID);

	echo "<h2>Test Fonction DELETE </h2></br>";
	$donnees = $BD->selectAll();

	foreach ($donnees as $value) {
		print_r($value);
		echo "</br>";
		echo "$value->nom";
		echo "</br>";
	}
?>