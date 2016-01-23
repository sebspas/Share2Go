<?php
	start_page("Login",3);
?>
		<div class="row">
			<div class="g3"></div>
			<div class="cols3 logoS2GO">
				<img src=<?= "" . Img . "/logo.png"?> alt="logo-Share2Go">
			</div>
			<div class="g3"></div>
		</div>
		<div class="clear"></div>
		<div class="row">
			<div class="frame cols4">
				<div class="hb blue2"><h2 class="hb-title">Se connecter</h2></div>
				<div class="frame-content">
					<form method="post" action="#" class="center">
	       				<input type="email" placeholder="Email" name="email" id="email">
	            		<input type="password" placeholder="Mot de passe" name="password" id="password">
	                	<input class="btn blue2 center" type="submit" value="Ok" name="send" id="send">
					</form>
				</div>
				<a  class="bb" href="changepass.php">Mot de passe oublié ?</a>
			</div>
			<div class="g1"></div>
			<div class="frame cols6">
				<div class="hb blue2"><h2 class="hb-title">Découverte</h2></div>
				<div class="frame-content">
					<p class="txt-center">Vous ne connaissez pas encore Share2Go ?</p>
					<p class="txt-center">Venez découvrir dès maintenant le réseau étudiant de covoiturage Aix-Marseille Université.</p>
					
				</div>
				<a  class="bb" href="#decouvrir">Découvrir</a>
			</div>
		</div>

<?php
	end_page();
?>