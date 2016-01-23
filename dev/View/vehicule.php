<?php
	start_page("Enregistrer un vehicule",1);
?>
		<div class="row">
			<div class="frame cols5">
				<div class="hb green2"><h2 class="hb-title">Nouveau véhicule</h2></div>
				<div class="frame-content">
					<form method="post" action="#" class="center">
	       				<input type="text" list="marques" placeholder="Marque du vehicule" name="marque" id="marque" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[marque]" ?> required />
						<datalist id="marques">
							<option value="Alfa Roméo">
							<option value="Audi">
							<option value="BMW">
							<option value="Chevrolet">
							<option value="Chrysler">
							<option value="Citroën">
							<option value="Dacia">
							<option value="Ford">
							<option value="Honda">
							<option value="Hyundaï">
							<option value="KIA">
							<option value="Lancia">
							<option value="Land Rover">
							<option value="Mazda">
							<option value="Mercedes-Benz">
							<option value="Mini">
							<option value="Mitsubishi">
							<option value="Nissan">
							<option value="Opel">
							<option value="Peugeot">
							<option value="Porsche">
							<option value="Renault">
							<option value="Seat">
							<option value="Skoda">
							<option value="Smart">
							<option value="Subaru">
							<option value="Suzuki">
							<option value="Toyota">
							<option value="Volkswagen">
							<option value="Volvo">
						</datalist>
	       				<input type="text" placeholder="Modèle du vehicule" list="modeles" name="modele" id="modele" <?php if(isset($error) && $error != "NoError") echo "value=$_POST[modele]" ?> required />
	       				<datalist id="modeles">
							<option value="A1">
							<option value="A3">
							<option value="A4">
							<option value="A6">
							<option value="R8">
							<option value="TT">
							<option value="Q7">

							<option value="Serie 1">
							<option value="Serie 2">
							<option value="Serie 3">
							<option value="i3">
							<option value="i8">

							<option value="C1">
							<option value="C2">
							<option value="C3">
							<option value="C4">
							<option value="DS3">
							<option value="DS5">
							<option value="Xsara">
							<option value="Xsara Picasso">

							<option value="Clio I">
							<option value="Clio II">
							<option value="Clio III">
							<option value="Clio IV">
							<option value="Espace">
							<option value="Megane">
							<option value="Modus">
							<option value="Scenic">
							<option value="Twingo I">
							<option value="Twingo II">
							<option value="Twingo III">

							<option value="Sandero">
							<option value="Logan">
							<option value="Duster">

							<option value="106">
							<option value="206">
							<option value="306">
							<option value="406">
							<option value="107">
							<option value="207">
							<option value="307">
							<option value="407">
							<option value="108">
							<option value="208">
							<option value="308">
							<option value="408">

							<option value="Uno">
							<option value="Punto">
							<option value="500">
							<option value="Stilo">

							<option value="Picanto">
							<option value="Rio">

							<option value="Corsa">
							<option value="Astra">

							<option value="Focus">
							<option value="Mondeo">
							<option value="Ka">

							<option value="Yaris">
							<option value="Aygo">	
						</datalist>
	       				<label>Nombre de places (Sans le conducteur)</label>
	       				<select name="places">
				          	<option value="1">1</option>
				          	<option value="2">2</option>
				          	<option value="3">3</option>
				          	<option value="4">4</option>
				          	<option value="5">5</option>
					    </select>
	                	<div class="line2">
	                		<p class="txt-center">En cliquant sur ajouter, vous acceptez les <a href="#">conditions générales</a> d'utilisation.</p>
	                	</div>
	                	<div class="line2">
	                		<?php if ($nbvehicule <= 3) {?>
	                		<input class="btn green2 center" type="submit" value="Ajouter" name="send" id="send">
	                		<?php } ?>
	                	</div>
					</form>
				</div>
			</div>
			<div class="g1"></div>
			<div class="frame cols5">
				<div class="hb cyan0"><h2 class="hb-title">Conditions</h2></div>
				<div class="frame-content">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea dolores praesentium saepe, unde quisquam, porro temporibus iusto nesciunt dicta quae rem et sapiente mollitia consequuntur autem laboriosam, rerum fugiat qui?</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum soluta hic ducimus dolores ratione officia deserunt dignissimos consequatur illo? Illum laborum vel magnam. Laudantium delectus, enim vel facilis, quibusdam explicabo.</p>
				</div>
			</div>
		</div> <!-- .row -->
<?php
	end_page();
?>