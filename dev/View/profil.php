<?php
	start_page("Profil",1);
?>
<div class="row">
			<div class="frame cols3">
				<div class="hb cyan1">
					<h2 class="hb-title"><?php echo $user->getPrenom() . " " . $user->getNom();?></h2>
					<div class="g2"></div>
					<div class="cols3">
						<span class="profil-avatar"><img src="<?= IMG . '/' . $user->getAvatar()?>" alt="avatar"></span>
					</div>
					<div class="clear"></div>
					<div class="g2"></div>
					<div class="cols4">
						<?php 
							afficheStar($user->getNbTrajet());
						?>
					</div>
				</div>
				<div class="frame-content">
					<div class="line">
						<p>Âge : <strong>
						<?php 
							list($y1) = explode("-", $user->getAge() );
							$y2 = date('Y');
							echo $y2 - $y1;
						?>
						</strong> ans</p>
					</div>
					<div class="line">
						<p>Date inscription : <strong><?= $user->getDateInscription() ?></strong></p>
					</div>
					<div class="line">
						<p>Téléphone : <strong><?= $user->getTel() ?></strong></p>
					</div>
					<div class="line">
						<p>Trajet(s) proposé(s) : <strong><?= $user->getNbTrajet() ?></strong></p>
					</div>
					<div class="line">
						<a class="btn2 cyan1 right" href="<?= 'modifier.php' ?>">Modifier</a>
					</div>
				</div>
			</div>
			<div class="g3"></div>
			<div class="frame cols5">
				<div class="hb green2"><h2 class="hb-title">Mes véhicules</h2></div>
				<div class="frame-content">
					<?php
					$nbvehi = 0;
	       				foreach($listvehicule as $vehi) {
	       					if ($vehi->idvehicule) {
	       						++$nbvehi;?>
					<div class="line">
						<div class="icon2 car"></div>
						<span class="icon-content"><strong><?php echo $vehi->marque . " " . $vehi->model;?> </strong></span>
						<a class="btn2 green2 right" href="<?= 'profil.php?idv='.$vehi->idvehicule ?>">Supprimer</a>
					</div>
					<div class="line2">
						<hr />
					</div>
	       			<?php
	       					}
	       				}
	       				if ($nbvehi < 3) {
	       			?>
					<div class="line">
							<a class="btn2 green2 right" href="vehicule.php">Nouveau véhicule</a>
					</div>
					<?php } ?>
				</div>
			</div>
		</div><!-- .row -->
		<div class="row">
			<div class="frame cols5">
				<div class="hb yellow0"><h2 class="hb-title">Mes trajets</h2></div>
				<div class="frame-content">
					<?php
					foreach($listTrajetProprio as $trajet) {
	       					if ($trajet->idtrajet) {
	       			?>
					<div class="line <? if ($trajet->date < date('Y-m-d')) echo 'disabled'; ?>">
						<span class="right">
							<div class="icon date"></div>
							<span class="icon-content">Le <strong><?= $trajet->date ?></strong> à <strong><?= $trajet->heuredep ?></strong></span>
						</span>
						<div class="line">
							<div class="icon departure"></div>
							<span class="icon-content"><strong><?= $trajet->villedep ?></strong></span>
						</div>
						<div class="line">
							<div class="icon arrival"></div>
							<span class="icon-content"><strong><?= $trajet->villearr ?></strong></span>
						</div>
						<div class="line">
							<?php
								if ($trajet->date > date('Y-m-d')) {
							?>	
							<a class="btn2 yellow0 right" href="<?= 'reservation.php?idt=' . $trajet->idtrajet . '&color=cyan1' ?>">Voir</a>
							<a class="btn2 yellow0 right" href="<?= 'modifier.php?traj='.$trajet->idtrajet ?>">Editer</a>
							<a class="btn2 yellow0 right" href="<?= 'profil.php?idt='.$trajet->idtrajet ?>">Supprimer</a>
							<?php
								}
								else {
							?>
								<p class="btn2 cyan3 right">EXPIRÉ</p>
							<?php } ?>
						</div>
					</div>
					<div class="line2">
						<hr />
					</div>
					<?php
						}
					}
					?>
					<div class="line">
						<a class="btn2 yellow0 right" href="proposer.php">Nouveau trajet</a>
					</div>
				</div>
			</div>
			<div class="g1"></div>
			<div class="frame cols5">
				<div class="hb maroon2"><h2 class="hb-title">Trajet(s) réservé(s)</h2></div>
				<div class="frame-content">
					<?php 
					if (empty($listTrajetReserv)) {
						echo "Vous n'avez pas de trajet réservé !";
					}
					else {
						foreach($listTrajetReserv as $trajet) {
							if ($trajet->idtrajet) {
					?>
					<div class="line <? if ($trajet->date < date('Y-m-d')) echo 'disabled'; ?> ">
						<span class="right">
							<div class="icon date"></div>
							<span class="icon-content">Le <strong><?= $trajet->date ?></strong> à <strong><?= $trajet->heuredep ?></strong></span>
						</span>
						<div class="line">
							<div class="icon departure"></div>
							<span class="icon-content"><strong><?= $trajet->villedep ?></strong></span>
						</div>
						<div class="line">
							<div class="icon arrival"></div>
							<span class="icon-content"><strong><?= $trajet->villearr ?></strong></span>
							<?php
								if ($trajet->date > date('Y-m-d')) {
							?>
						</div>
						<div class="line">
							<a class="btn2 maroon2 right" href="<?= 'reservation.php?idt='.$trajet->idtrajet . '&color=' . $color[2] ?>">Voir</a>
							<a class="btn2 maroon2 right" href="<?= 'profil.php?idts='.$trajet->idtrajet ?>">Annuler</a>
							<?php
								}
							?>
						</div>
					</div>
					<div class="line2">
						<hr />
					</div>
					<?php
						}
					}
				}
					?>
				</div>
			</div>
		</div><!-- .row -->
<?php
	end_page();
?>