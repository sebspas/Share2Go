<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
</head>
<body>
<?php
	require_once("../../Core/utils.php");
	echo "<h1>Test Class User </h1></br>";
	echo "<h2>Test Constructeur </h2></br>";
	$user = new user("corfa");
	$user->Afficher();
	echo "<h2>Test Setter Avant :</h2></br>";	
	$user->Afficher();
	$user->setNom("Paul");
	$user->setAge(40);
	$user->setMail("gitan@gmail.com");
	$user->setTel(750917831);
	echo "<h2>Test Setter Après :</h2></br>";
	$user->Afficher();

	echo "<h2>Undo des setter </h2></br>";	
	$user->setNom("CORFA");
	$user->setAge(19);
	$user->setMail("sebspas@gmail.com");
	$user->setTel(785486952);
	$user->Afficher();
?>
