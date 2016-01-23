<?php
	require_once("../Core/utils.php");
	require_once("../Model/changeavatar.php");

	isNoLog("login.php");

	$maxsize = 1572864;

	if ($_POST['change']) {
		list($type1, $type2) = explode('/', $_FILES['avatar']['type']);
		if ($type1 != "image") {
			echo "<div class='error' ><p class='error-txt' >Type invalide</p></div>";
		}
		if($_FILES['avatar']['size'] > $maxsize) {
			echo "<div class='error' ><p class='error-txt' >Fichier trop volumineux !</p></div>";
		}
		if($type2 != "jpeg" || $type2 != "png" || $type2 != "jpg" || $type2 != "gif") {
			echo "<div class='error' ><p class='error-txt' >Format de l'image invalide !</p></div>";
		}

		$_FILES['avatar']['name'] = $_SESSION['id'] . '.' . $type2;

		$nom = "avatar/{$_SESSION['id']}.{$type2}";
		$res = move_uploaded_file($_FILES['avatar']['tmp_name'], "../webroot/img/$nom");
		changeUrl($_SESSION['id'], $nom);
		if ($res) {
			$_SESSION['msg'] = "<div class='success' ><p class='success-txt' >Avatar changé ! Actualiser la page pour voir le changement !</p></div>";
			header("Location : profil.php");	
		} 
	}

	require_once("../View/changeavatar.php");
?>