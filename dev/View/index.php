<?php
start_page("Home", 1);
?>
		<div class="row">
			<div class="cols3 search">
				<div class="frame cols7">
					<div class="hb blue1"><h2 class="hb-title">Recherche</h2></div>
					<div class="frame-content">
						<form method="post" action="#" >
							<div class="line">
								<label id="departure-logo" for="departure"></label>
								<input type="text" placeholder="Départ" id="departure" class="autocompleteAdr" name="villedep" <?php if (isset($error)) {
	echo "value=$villedep";
}
?> required />
							</div>
							<div class="line">
								<label id="arrival-logo" for="arrival"></label>
								<input type="text" placeholder="Arrivée" id="arrival" class="autocompleteAdr" name="villearr" <?php if (isset($error)) {
	echo "value=$villearr";
}
?> required />
							</div>
							<!-- <div class="line">
								<input id="autocompleteAddress" type="text" />
							</div> -->
							<div class="line">
								<label for="showExpired">Voir les trajets expirés</label>
								<input type="checkbox" name="showDisabled2" value="" id="showExpired" />
							</div>
							<div class="line">
								<input type="submit" class="btn2 blue1 right" value="Rechercher" name="send" />
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="cols10">
				<?php
foreach ($res as $trajet) {

	if ($trajet->idtrajet && $trajet->idauteur != $_SESSION['id']) {
		if ($numcolor == 6) {
			$numcolor = 0;
		}

		?>
				<div class="frame cols5 <? if($trajet->nbplace == 0) echo 'disabled2'; ?>">
					<div class="hb <?php echo $color[$numcolor];?>"><h2 class="hb-title"><?=$trajet->villedep?> - <?=$trajet->villearr?></h2></div>
					<div class="frame-content">
						<span class="price <?php echo $color[$numcolor];?> right"><strong><i class="price-i"><?=$trajet->prix?> €</i></strong></span>
						<div class="line">
							<div class="icon date"></div>
							<span class="icon-content">Le <strong><?=$trajet->date?></strong> à <strong><?=$trajet->heuredep?></strong></span>
						</div>
						<div class="line">
							<span class="line-content"><strong><?=$trajet->nbplace?></strong> place(s) disponible(s)</span>
						</div>
						<div class="line">
							<?php
if ($trajet->musique) {
			echo "<div class='icon music'></div>";
		}
		if ($trajet->valise) {
			echo "<div class='icon bag'></div>";
		}
		if ($trajet->nonfumeur) {
			echo "<div class='icon nocig'></div>";
		}
		if ($trajet->bavar) {
			echo "<div class='icon talk'></div>";
		}
		?>
						</div>
						<div class="line2">
							<hr/>
							<div class="icon2 car"></div>
							<span class="icon-content"><strong>
							<?php
$vehicule = recupVehicule($trajet->idvehicule);
		echo $vehicule->marque . " ";
		echo $vehicule->model;
		?></strong></span>
						</div>
						<div class="line">
							<?php
$user = recupUser($trajet->idauteur);
		?>
							<span class="user-avatar-l left"><img src="<?=IMG . '/' . $user->avatar?>" alt="avatar"></span>
							<span class="user-name">
							<?php
echo $user->prenom . " ";
		echo $user->nom;
		?></span>
							<?php
afficheStar($user->nbtrajet);
		?>
						</div><!-- /.line -->
						<?php
if ($trajet->nbplace > 0) {
			?>
						<div class="line">
							<a class="btn2 <?php echo $color[$numcolor];if ($trajet->nbplace == 0) {
				echo 'disabled';
			}
			?> right" href="<?='reservation.php?idt=' . $trajet->idtrajet . '&color=' . $color[$numcolor]?>">Voir</a>
						</div>
							<?php
}
		?>
					</div><!-- /.frame-content -->
				</div>
				<?php
}
	++$numcolor;
}
?>
			</div>
		</div><!-- .row -->
<?php
end_page();
?>