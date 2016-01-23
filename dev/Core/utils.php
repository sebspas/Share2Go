<?php
/**
 * Fichier utils.php
 *
 * Fichier contenant les fonctions comprise sur toutes les pages du site
 * @package Utils
 * @subpackage Utilitaire
 * @author TeamShare2Go
 */
session_name('s2go');
session_start();
ini_set('display_errors', 0);
define("CSS", '../dev/webroot/css', TRUE);
define("Img", '../dev/webroot/img', TRUE);
$color = array(0 => 'blue3', 1 => 'red3', 2 => 'cyan1', 3 => 'green3', 4 => 'blue2', 5 => 'yellow2', 6 => 'maroon1');
$numcolor = 0;

if (isset($_SESSION['msg']) && $_SESSION['msg']) {
	echo $_SESSION['msg'];
	$_SESSION['msg'] = '';
}

/**
 * Function __autoload()
 *
 * Gere le chargement automatique dela class lors d'un appel a new $classname
 * @param string $classname Le nom de la class
 */
function __autoload($classname) {
	$filename = __DIR__ . "/" . $classname . "_class.php";
	include_once $filename;
}

function isNoLog($Page) {
	if (!isset($_SESSION['login'])) {
		header("Location: " . $Page . "");
	}
}

function isLog($Page) {
	if (isset($_SESSION['login'])) {
		header("Location:" . $Page . "");
	}
}

/**
 * Function start_page()
 *
 * Construit le header en html
 * @param string $titre Le nom de la page
 */
function start_page($titre, $nummenu) {
	?>
		    <!doctype html>
		    <html lang="fr">
		    <head>
		        <meta charset="utf-8">
		        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		        <title>Share2go : <?=$titre?></title>
		        <link rel="stylesheet" href=<?="" . CSS . "/style.css";?>/>
		        <link href="http://62.210.110.24/S2go/dev/webroot/img/favicon.ico" type="image/x-icon" rel="icon"/>
		        <link href="http://62.210.110.24/S2go/dev/webroot/img/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
		    </head>
		    <body>
		    <div id="main">
	<?php
if ($nummenu == 1) {
		?>
				        <div class="menu">
				            <div class="menu-logo">
				                <a class="menu-logo-link" href="index.php"></a>
				            </div>
				            <div class="js-menu-btn"></div>
				            <nav class="menu-navigation">
				                <ul class="navigation-ul">
				                    <li class="menu-list">
				                        <a class="menu-link <?php if ($titre == "Home") {
			echo 'current';
		}
		?>" href="index.php">Home</a>
				                    </li>
				                    <li class="menu-list"><a class="menu-link <?php if ($titre == "Profil") {
			echo 'current';
		}
		?>" href="profil.php">Profil</a></li>
				                    <li class="menu-list">
				                        <a class="menu-link <?php if ($titre == "Messagerie") {
			echo 'current';
		}
		?>" href="messagerie.php">Messages

				                            <!-- <span class="link-notif"><i class="link-notif-i">3</i></span> -->

		<?php if (($_SESSION['lu'] == false) && (isset($_SESSION['nbnewmess'])) && $_SESSION['nbnewmess'] != 0) {
			echo "<span class='link-notif'><i class='link-notif-i'>" . $_SESSION['nbnewmess'] . "</i></span>";
		}
		?> <!-- Marche pas ! Pour afficher les bonnes notifs -->
				                        </a>
				                    </li>
				                    <li class="menu-list"><a
				                            class="menu-link <?php if ($titre == "Proposer un trajet" || $titre == "Enregistrer un vehicule") {
			echo 'current';
		}
		?>" href="proposer.php">Nouveau trajet</a></li>
				                </ul>
				            </nav>
				            <div class="menu-user right">
		<?php $BD = new BD('user');
		$user = $BD->select('iduser', $_SESSION['id']);?>
				                <span class="user-avatar left"><img src="<?=IMG . '/' . $user->avatar;?>" alt="avatar"></span>
				                <a class="menu-link right logout0" href="../dev/Controller/logout.php">Se déconnecter</a>

				                <div class="logout1"><a href="../dev/Controller/logout.php"></a></div>
				            </div>
				        </div><!-- // menu -->
		<?php
}
	if ($nummenu == 2) {
		?>
		<div class="menu">
				            <div class="menu-logo">
				                <a class="menu-logo-link" href="index.php"></a>
				            </div>

				            <div class="menu-user right">
				                <a class="btn2 blue2 right" href="../dev/login.php">Se connecter</a>
				            </div>
				        </div><!-- // menu -->
		<?php
}
	if ($nummenu == 3) {
		?>
		<div class="menu">
				            <div class="menu-logo">
				                <a class="menu-logo-link" href="index.php"></a>
				            </div>

				            <div class="menu-user right">
				                <a class="btn2 red3 right" href="../dev/inscription.php">Inscription</a>
				            </div>
				        </div><!-- // menu -->
		<?php
}
}

/**
 * Function start_page()
 *
 * Construit le pied de page en html
 */
function end_page() {?>
	</div>
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		    <!--<script type="text/javascript" src="../dev/webroot/js/oXHR.js"></script>-->
		    <script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"
		            type="text/javascript"></script>
		    <script type="text/javascript" src="../dev/webroot/js/velocity.min.js"></script>
		    <script type="text/javascript" src="../dev/webroot/js/velocity.ui.min.js"></script>
		    <script type="text/javascript" src="../dev/webroot/js/oXHR.js"></script>
		    <script type="text/javascript" src="../dev/webroot/js/nbplace.js"></script>
		    <script type="text/javascript" src="../dev/webroot/js/autocomplete.js"></script>
		    <script type="text/javascript" src="../dev/webroot/js/background.js"></script>
		    <script type="text/javascript" src="../dev/webroot/js/main.js"></script>
		    </body>
		    </html>
	<?php }

function afficheStar($nbtrajet) {
	$nbetoile = (int) ($nbtrajet / 5);
	echo '<div>';
	for ($i = 0; $i < $nbetoile; ++$i) {
		echo "<div class='icon0 star1'></div>";
	}
	for ($i; $i < 5; ++$i) {
		echo "<div class='icon0 star0'></div>";
	}
	echo "</div>\n";
}

function isNoPermis($permis) {
	if (!$permis) {
		$_SESSION['msg'] = "<div class='error' ><p class='error-txt' >Tant que vous ne possédez pas le permis vous ne pouvez pas ajouter de trajet ou de véhicule.</p></div>";
		header("Location: index.php");
	}
}

?>