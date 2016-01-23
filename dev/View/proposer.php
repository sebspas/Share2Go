<?php
	start_page("Proposer un trajet",1);
?>
		<div class="row">
			<div class="frame cols5">
				<div class="hb red3"><h2 class="hb-title">Nouveau trajet</h2></div>
				<div class="frame-content">
					<form method="post" action="#" class="center">
	       				<input type="text" placeholder="Date : dd/MM/yyyy" name="date" id="date" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[date2]"; ?> required />
	       				<input type="text" placeholder="Ville départ" name="villedep" id="villedep" class="autocompleteAdr" <?php if(isset($error) && $error != "NoError") echo "value=$villedep"; ?> required />
	       				<input type="text" placeholder="Ville arrivée" name="villearr" id="villearr" class="autocompleteAdr" <?php if(isset($error) && $error != "NoError") echo "value=$villearr"; ?> required />
	       				<input type="text" placeholder="Heure départ : hh:mm" name="Hdep" id="Hdep" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[Hdep]"; ?> required />
	       				<input type="text" placeholder="Prix" name="prix" id="prix" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[prix]"; ?> required />
					    <label>Véhicule</label>
	       				<select name="vehicule">
				          	<?php
	       						foreach($res as $vehi) {
	       							if ($vehi->idvehicule) {
	       								echo "<option id='vehicule' value=$vehi->idvehicule>$vehi->marque $vehi->model</option>";
	       							}
	       						}
	       					?>
					    </select>
					    <label>Place(s) disponible(s)</label>
	       				<select name="places">
				          	<option value="1">1</option>
				          	<option value="2">2</option>
				          	<option value="3">3</option>
				          	<option value="4">4</option>
				          	<option value="5">5</option>
					    </select>
					    <label>Options</label>
						<div class="line2">
							<label class="sp1" for="music"><div class="icon music"></div></label>
							<input type="checkbox" class="vt-top" id="music" name="music" value="music" />

							<label class="sp1" for="bag"><div class="icon bag"></div></label>
							<input type="checkbox" class="vt-top" id="bag" name="bag" value="bag" />

							<label class="sp1" for="nocig"><div class="icon nocig"></div></label>
							<input type="checkbox" class="vt-top" id="nocig" name="nocig" value="nocig" />

							<label class="sp1" for="talk"><div class="icon talk"></div></label>
							<input type="checkbox" class="vt-top" id="talk" name="talk" value="talk" />
						</div>
						<div class="line2">
							<label>Commentaire</label>
							<textarea id="com" placeholder="Votre commentaire ici." name="com" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[com]" ?>></textarea>
						</div>
	                	<div class="line2">
	                		<p class="txt-center">En cliquant sur valider, vous acceptez les <a href="#">conditions générales</a> d'utilisation.</p>
	                	</div>
	                	<input class="btn red3 center" type="submit" value="Valider" name="send" id="send">
					</form>
				</div>
			</div>
			<div class="g1"></div>
			<div class="cols5">
				<div class="frame cols11">
					<div class="hb blue2"><h2 class="hb-title">Carte</h2></div>
					<div class="frame-content">
						<iframe width="425" 
							height="350" 
							frameborder="0" 
							scrolling="no" 
							marginheight="0" 
							marginwidth="0" 
							src="https://maps.google.fr/maps?f=d&amp;source=s_d&amp;saddr=<?php echo $source; ?>&amp;daddr=<?php echo $dest; ?>&amp;hl=fr&amp;geocode=FRSWlAIdOPtUACnLJqXwM6PJEjG8woyx4SGNLA%3BFQWdngIdmFNJACkHnbw5h-u1EjE2ex36bptC5g&amp;aq=&amp;sll=43.949318,4.805529&amp;sspn=0.001634,0.001124&amp;vpsrc=0&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=43.637317,5.209932&amp;spn=0.692203,0.822113&amp;output=embed">
						</iframe>
					</div>
				</div>
				<div class="clear"></div>
				<div class="frame cols11">
					<div class="hb green2"><h2 class="hb-title">Ajouter un véhicule</h2></div>
					<div class="frame-content">
						<p>Vous pouvez enregistrer plusieurs véhicule et choisir celui que vous désirez pour chaque trajet.</p>
						<p>Cliquez sur le bouton “Nouveau véhicule” pour enregistrer un véhicule.</p>
						<div class="line2">
							<a class="btn2 green2 right" href="vehicule.php">Nouveau véhicule</a>
						</div>
					</div>
				</div>
			</div>
			
		</div> <!-- .row -->
<?php
	end_page();

?>
<script type="text/javascript">
	setTimeout(getNbPlace(),3000);
</script>