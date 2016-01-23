<?php
	start_page("Messagerie",1);
?>
		<div class="row">
			<div class="frame cols3">
				<!-- <div class="frame cols5"> -->
					<div class="hb cyan3"><h2 class="hb-title">Conversations</h2></div>
					<div class="frame-content">
						<div class="of-y">
						<?php
							if (empty($res)) {
								echo "Pas de conversation en cours !";
							}
							else {
								foreach ($res as $conv) {
									if ($conv->idtrajet) {
									?>
										<a class="conv <?php if ($_GET['traj'] == $conv->idtrajet) echo 'cur'; ?>" href="messagerie.php?traj=<?= $conv->idtrajet ?>">
											<div class="line">
												<div class="icon date"></div>
												<span class="icon-content">Le <strong><?= $conv->date ?></strong></span>
											</div>
											<div class="line">
												<?php echo $conv->villedep.' - '.$conv->villearr; ?>
											</div>
										</a>
										<hr />
										
									<?php
									}
								}
							}
						?>
						</div>
					</div>
				<!-- </div> -->
			</div>
			<div class="g1"></div>
			<div class="frame cols6">
				<!-- <div class="frame cols7"> -->
					<div class="hb green3"><h2 class="hb-title"><?php if ($_GET['traj']) echo $trajet->villedep ." - ". $trajet->villearr; else echo "Messages";?></h2></div>
					<div class="frame-content">
						<!-- affichage des messages -->
						<div class="of-y">
						<?php
							echo "<table>";
									if (empty($res2) || !($res2[0]->idauteur)) {
										echo "Aucun message à afficher";
									}
									else {
										foreach ($res2 as $mess) {
											if ($mess->prenom) {

												$pos = 'left';
												$bubble = 'bubble0 blue2';
												$from = 'from0';

												if ($mess->idauteur == $_SESSION['id']) {
													$pos = 'right';
													$bubble = 'bubble1 white';
													$from = 'from1';
												}
												
												echo "<span class='user-avatar $pos'><img src=" . IMG . "/$mess->avatar></span>";
												echo '<div class= "'.$bubble.'">';
													echo '<span class="'.$from.'">'.$mess->prenom.' '.$mess->nom.'</span>';
													echo '<p class="msg">'.htmlentities($mess->message).'</p>';
													list($heure, $min, $sec) = explode(":", substr($mess->date, 11));
													list($y, $m, $d) = explode("-", $mess->date);
													list($d, $b) = explode(" ", $d);
													echo '<span class="datemsg">'. "$heure:$min le $d/$m/$y" .'</span>';
												echo '</div>';
												echo '<div class="clear"></div>';
											}
										}
									}
							echo "</table>";
						?>
						</div>
						<!-- Et la possibilité de répondre -->

						<form method="post" action="#" class="center">
							<textarea id="mess" placeholder="Votre message ici." name="mess" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[mess]" ?>></textarea>
							<input class="btn green3 center" type="submit" value="Valider" name="send" id="send">
						</form>
					</div>
				<!-- </div> -->
			</div>
		</div><!-- .row -->

<?php 
	end_page();
?>