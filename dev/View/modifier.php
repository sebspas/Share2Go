<?php 
	start_page("Profil",1);
	if (! isset($_GET['traj'])) {
?>
		<div class="row">
			<div class="frame cols4">
				<div class="hb red3"><h2 class="hb-title">Modification</h2></div>
				<div class="frame-content">
					<form method="post" action="#" class="center">
	       				<input type="text" placeholder="Nom" name="nom" id="nom" <?php if(isset($error) && $error != "NoError") echo "value=\"$_POST[nom]\""; else echo "value=\"$User->nom\""; ?>>
	       				<input type="text" placeholder="Prenom" name="prenom" id="prenom" <?php if(isset($error) && $error != "NoError") echo "value=\"$_POST[prenom]\""; else echo "value=\"$User->prenom\""; ?>>
	       				<input type="email" placeholder="Email" name="email" id="email" <?php if(isset($error) && $error != "NoError") echo "value=\"$_POST[email]\""; else echo "value=\"$User->mail\""; ?>>
	       				<input type="email" placeholder="Email confirmation" name="email2" id="email2" <?php if(isset($error) && $error != "NoError") echo "value=\"$_POST[email]\""; else echo "value=\"$User->mail\""; ?>>
	       				<input type="text" placeholder="Date Naissance : 22/11/1995" name="age" id="age" <?php 
	       				if(isset($error) && $error != "NoError") {
	       					echo "value=$_POST[age2]"; 
	       				}
	       				else {
	       					list($yyyy,$mm,$dd) = explode("-", $User->age);
	       					echo "value=$dd/$mm/$yyyy";
	       				} ?>>
	       				<select name="sexe">
				          	<option value="Homme">Homme</option>
				          	<option value="Femme" <?php if ($User->sexe == "Femme" || $_POST['sexe'] == "Femme") echo "selected";?>>Femme</option>
					    </select>
					    <input type="text" placeholder="Téléphone" name="tel" id="tel" <?php if(isset($error) && $error != "NoError") echo "value=\"$_POST[tel]\""; else echo "value=\"$User->tel\""; ?>>
						<label for="permis">Permis</label><input type="checkbox"  id="permis" name="permis" value="permis" <?php 
						if(isset($error) && $error != "NoError") { if ($_POST['permis']) echo "checked";}
						else if ($User->permis) echo "checked"; ?>/>
	                	<div class="line">
	                		<p>En cliquant sur modifier, vous acceptez les <a href="#">conditions générales</a> d'utilisation.</p>
	                	</div>
	                	<input class="btn red3 center" type="submit" value="Modifier" name="send" id="send">
					</form>
				</div>
			</div>
			<div class="g1"></div>
			<div class="cols6">
			<div class="frame cols10">
				<div class="hb green0"><h2 class="hb-title">Modifier mon mot de passe</h2></div>
				<div class="frame-content">
					Pour modifier votre mot de passe, merci de faire une demande via le bouton ci-dessous. Un e-mail de changement de mot de passe vous sera envoyé.
					<div class="line">
							<a class="btn2 green0 right" href="modifier.php?demande=1">Changer mot de passe</a>
					</div>
				</div>
			</div>
			
			<div class="frame cols10">
				<div class="hb cyan3"><h2 class="hb-title">Modifier/Changer l'avatar </h2></div>
				<div class="frame-content">
					Vous pouvez modifier votre avatar autant de fois que vous le désirez; cependant, vous ne pouvez en avoir qu’un seul à la fois.
					<div class="line">
							<a class="btn2 cyan3 right" href="changeavatar.php">Changer l'avatar</a>
					</div>
				</div>
			</div>
			</div>
		</div> <!-- .row -->
<?php
	}
	else {
?>
			<div class="frame cols5">
				<div class="hb red3"><h2 class="hb-title">Modifier Trajet</h2></div>
				<div class="frame-content">
					<form method="post" action="#" class="center">
	       				<input type="text" placeholder="Date : dd/MM/yyyy" name="date" id="date" <?php if(isset($error) && $error != "NoError") echo "value=\"$_POST[date2]\""; else echo "value=$dateR" ?> required />
	       				<input type="text" placeholder="Ville départ" name="villedep" id="villedep" class="autocompleteAdr" <?php if(isset($error) && $error != "NoError") echo "value=\"$villedep\""; else echo "value=\"$trajet->villedep\"" ?> required />
	       				<input type="text" placeholder="Ville arrivée" name="villearr" id="villearr" class="autocompleteAdr" <?php if(isset($error) && $error != "NoError") echo "value=\"$villearr\""; else echo "value=\"$trajet->villearr\"" ?> required />
	       				<input type="text" placeholder="Heure départ : hh:mm" name="Hdep" id="Hdep" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[Hdep]"; else echo "value=\"$trajet->heuredep\""?> required />
	       				<input type="text" placeholder="Prix" name="prix" id="prix" <?php if(isset($error) && $error != "NoError") echo "value=\"$_POST[prix]\""; else echo "value=\"$trajet->prix\"" ?> required />
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
				          	<option value="1" <?php if($trajet->nbplace == 1) echo "selected";?>>1</option>
				          	<option value="2" <?php if($trajet->nbplace == 2) echo "selected";?>>2</option>
				          	<option value="3" <?php if($trajet->nbplace == 3) echo "selected";?>>3</option>
				          	<option value="4" <?php if($trajet->nbplace == 4) echo "selected";?>>4</option>
				          	<option value="5" <?php if($trajet->nbplace == 5) echo "selected";?>>5</option>
					    </select>
					    <label>Options</label>
						<div class="line2">
							<label class="sp1" for="music"><div class="icon music"></div></label>
							<input type="checkbox" class="vt-top" id="music" name="music" value="music"<?php 
						if(isset($error) && $error != "NoError") { if ($_POST['music']) echo "checked";}
						else if ($trajet->musique) echo "checked"; ?>/>

							<label class="sp1" for="bag"><div class="icon bag"></div></label>
							<input type="checkbox" class="vt-top" id="bag" name="bag" value="bag" <?php 
						if(isset($error) && $error != "NoError") { if ($_POST['bag']) echo "checked";}
						else if ($trajet->valise) echo "checked"; ?>/>

							<label class="sp1" for="nocig"><div class="icon nocig"></div></label>
							<input type="checkbox" class="vt-top" id="nocig" name="nocig" value="nocig" <?php 
						if(isset($error) && $error != "NoError") { if ($_POST['nocig']) echo "checked";}
						else if ($trajet->nonfumeur) echo "checked"; ?>/>

							<label class="sp1" for="talk"><div class="icon talk"></div></label>
							<input type="checkbox" class="vt-top" id="talk" name="talk" value="talk" <?php 
						if(isset($error) && $error != "NoError") { if ($_POST['talk']) echo "checked";}
						else if ($trajet->bavar) echo "checked"; ?>/>
						</div>
						<div class="line2">
							<label>Commentaire</label>
							<textarea id="com" placeholder="Votre commentaire ici." name="com" <?php if(isset($error) && $error != "NoError") echo " >$_POST[com]"; else echo " >$trajet->com"; ?></textarea>
						</div>
	                	<div class="line2">
	                		<p class="txt-center">En cliquant sur modifier, vous acceptez les <a href="#">conditions générales</a> d'utilisation.</p>
	                	</div>
	                	<input class="btn red3 center" type="submit" value="Modifier" name="trajet" id="send">
					</form>
				</div>
			</div>
<?php
	}
	end_page();
?>