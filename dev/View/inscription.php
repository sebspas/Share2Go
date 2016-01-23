<?php 
	start_page("Inscription",2);
?>
		<div class="row">
			<div class="frame cols4">
				<div class="hb red3"><h2 class="hb-title">Inscription</h2></div>
				<div class="frame-content">
					<form method="post" action="#" class="center">
	       				<input type="text" placeholder="Nom" name="nom" id="nom" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[nom]" ?>>
	       				<input type="text" placeholder="Prenom" name="prenom" id="prenom" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[prenom]" ?>>
	       				<input type="email" placeholder="Email" name="email" id="email" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[email]" ?>>
	       				<input type="email" placeholder="Email confirmation" name="email2" id="email2" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[email]" ?>>
	       				<input type="text" placeholder="Date Naissance : 22/11/1995" name="age" id="age" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[age2]" ?>>
	       				<select name="sexe">
				          	<option value="Homme">Homme</option>
				          	<option value="Femme">Femme</option>
					    </select>
					    <input type="text" placeholder="Téléphone" name="tel" id="tel" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[tel]" ?>>
	            		<input type="password" placeholder="Mot de passe" name="password" id="password">
	                	<input type="password" placeholder="Mot de passe confirmation" name="password2" id="password2">
						<label for="permis">Permis B</label><input type="checkbox"  id="permis" name="permis" value="permis" />
	                	<div class="line">
	                		<p>En cliquant sur valider, vous acceptez les <a href="#">conditions générales</a> d'utilisation.</p>
	                	</div>
	                	<input class="btn red3 center" type="submit" value="Valider" name="send" id="send">
					</form>
				</div>
			</div>
			<div class="g1"></div>
			<div class="frame cols6">
				<div class="hb green0"><h2 class="hb-title">About</h2></div>
				<div class="frame-content">
					<p>Vous n'êtes pas encore inscrit ?
					N'attendez plus ! C'est très simple et très rapide.
					</p>
					<br />
					<p>
						Remplissez simplement le formulaire et cliquez sur valider
						pour commencer à profiter du service dès à présent.
					</p>
					<br />
					<h2>Modalités d'inscription</h2>
					<br />
					<p>
						- Vous devez remplir tous les champs.
					</p>
					<br />
					<p>
						- Email : Vous devez posseder une adresse email du type <strong>prenom.nom@etu.univ-amu.fr</strong> ou <strong>prenom.nom@univ-amu.fr</strong>	
					</p>
					<br />
					<p>
						- Mot de passe : 6 caractères minimum
					</p>
					<br />
					<p>
						- Vous devez être majeur pour avoir le permis B.
					</p>
				</div>
			</div>
		</div>
<?php
	end_page();
?>