<?php
	start_page("Réservation",1);
?>
<div class="row">
	<div class="frame cols5">
		<div class="hb <?= $_GET['color']?>"><h2 class="hb-title"><?php echo $trajet->villedep . " - " . $trajet->villearr; ?></h2></div>
		<div class="frame-content">
			<span class="price <?= $_GET['color']?> right"><strong><i class="price-i"><?= $trajet->prix . " €"?></i></strong></span>
			<div class="line">
				<div class="icon date"></div>
				<span class="icon-content">Le <strong><?= $trajet->date ?></strong> à <strong><?= $trajet->heuredep ?></strong></span>
			</div>
			<div class="line">
				<span class="line-content"><strong><?= $trajet->nbplace ?></strong> place(s) disponible(s)</span>
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
				<hr />
				<div class="icon2 car"></div>
				<span class="icon-content">
					<strong>
					<?php
						$vehicule = recupVehicule($trajet->idvehicule);
						echo $vehicule->marque . " " . $vehicule->model;
					?>
					</strong>
				</span>
			</div>
			<div class="line2">
				<label>Commentaire</label>
				<br />
				<?php
					echo $trajet->com;
				 ?>
				<!--</strong></span>-->
			</div>
			<div class="line">
				<a class="btn2 <?= $_GET['color']?> right" href="<?= 'messagerie.php?traj='. $trajet->idtrajet ?>">Discussion</a>
			<?php
				if ($trajet->idauteur != $_SESSION['id']) {
			?>
				<a class="btn2 <?= $_GET['color']?> right" href="<?= 'reservation.php?idt=' . $_GET['idt'] . '&color=' . $_GET['color'] .'&idtajout=' . $trajet->idtrajet ?>">Réserver</a>
			<?php
				}
			?>
			</div>
		</div><!-- .frame-content -->
	</div><!-- .frame -->
	<div class="g1"></div>
	<div class="frame cols5">
		<div class="hb blue2"><h2 class="hb-title">Carte</h2></div>
		<div class="frame-content">
			<iframe width="425" 
				height="350" 
				frameborder="0" 
				scrolling="no" 
				marginheight="0" 
				marginwidth="0" 
				src="https://maps.google.fr/maps?f=d&amp;source=s_d&amp;saddr=<?php echo $trajet->villedep; ?>&amp;daddr=<?php echo $trajet->villearr; ?>&amp;hl=fr&amp;geocode=FRSWlAIdOPtUACnLJqXwM6PJEjG8woyx4SGNLA%3BFQWdngIdmFNJACkHnbw5h-u1EjE2ex36bptC5g&amp;aq=&amp;sll=43.949318,4.805529&amp;sspn=0.001634,0.001124&amp;vpsrc=0&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=43.637317,5.209932&amp;spn=0.692203,0.822113&amp;output=embed">
			</iframe>
		</div><!-- .frame-content -->
	</div><!-- .frame -->
</div><!-- .row -->
<div class="row">
	<?php
		if ($trajet->idauteur != $_SESSION['id']) {
	?>
	<div class="frame cols3">
		<div class="hb cyan1">
			<h2 class="hb-title">Conducteur</h2>
			<div class="g2"></div>
			<div class="cols3">
				<span class="profil-avatar"><img src="<?= IMG . '/' . $auteur->avatar?>" alt="avatar"></span>
			</div>
			<div class="clear"></div>
			<h2 class="hb-title"><?= $auteur->prenom . " " . $auteur->nom?></h2>
			<div class="g2"></div>
			<div class="cols4">
				<?php 
					afficheStar($auteur->nbtrajet);
				?>
			</div>
		</div>
		<div class="frame-content">
			<div class="line">
				<p>Âge : <strong>
				<?php 
					list($y1) = explode("-", $auteur->age );
					$y2 = date('Y');
					echo $y2 - $y1;
				?>
				</strong> ans</p>
			</div>
			<div class="line">
				<p>Date inscription : <strong><?= $auteur->dateinscription ?></strong></p>
			</div>
			<div class="line">
				<p>Téléphone : <strong><?= $auteur->tel ?></strong></p>
			</div>
			<div class="line">
				<p>Trajet(s) proposé(s) : <strong><?= $auteur->nbtrajet ?></strong></p>
			</div>
		</div><!-- .frame-content -->
	</div><!-- .frame -->
	<div class="g3"></div>
	<?php
		}
	?>
	<div class="frame cols5">
		<div class="hb green3"><h2 class="hb-title">Utilisateurs inscrits pour ce trajet</h2></div>
		<div class="frame-content">
		<?php
		if(empty($listInscrit[0])) {
			echo "Pas d'utilisateur inscrit pour ce trajet !";
		}
		else {
			foreach ($listInscrit as $user) {
				if($user->iduser) {?>
				<div class="line">
					<span class="user-avatar-l left"><img src="<?= IMG . '/' . $user->avatar ?>" alt="avatar"></span>
					<span class="user-name">
					<?php 
						echo $user->prenom . " " . $user->nom;
					?></span>
					<?php 
						afficheStar($user->nbtrajet);
						if ($trajet->idauteur == $_SESSION['id']) {
					?>
					<a class="btn2 green3 right" href="<?= 'reservation.php?idt=' . $_GET['idt'] . '&color=' . $_GET['color'] . '&idu=' . $user->iduser ?>">Supprimer</a>
				<?php
					}
				?>
				</div>
				<div class="line2">
					<hr />
				</div>
			<?php
				}
			}
		}
		?>	
		</div><!-- .frame-content -->
	</div><!-- .frame -->
</div><!-- .row -->
<?php
	end_page();
?>