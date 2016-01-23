<?php
	start_page("Mot de passe oublier",3);
?>
		<div class="row">
			<div class="g3"></div>
			<div class=" cols3">
				<img src=<?= "" . Img . "/logo.png"?> width="100%" alt="logo-Share2Go">
			</div>
			<div class="g3"></div>
		</div>
		<div class="clear"></div>
		<div class="row">
			<?php 
				if (!$_GET['tok']) {
			?>
			<div class="frame cols6">
				<div class="hb green3"><h2 class="hb-title">Demande changement mot de passe</h2></div>
				<div class="frame-content">
					<form method="post" action="#" class="center">
	       				<input type="email" placeholder="Email" name="email" id="email">
	                	<input class="btn green3 center" type="submit" value="Envoyer" name="send" id="send">
					</form>
				</div>
			</div>
			<?php
				}
				else {
			?>
			<div class="frame cols5">
				<div class="hb green3"><h2 class="hb-title">Changement mot de passe</h2></div>
				<div class="frame-content">
					<form method="post" action="#" class="center">
						<input type="password" placeholder="Mot de passe" name="password" id="password">
						<input type="password" placeholder="Validation mot de passe" name="password2" id="password">
	                	<input class="btn green3 center" type="submit" value="Changer" name="change" id="send">
					</form>
				</div>
			</div>
			<?php
				}
			?>
		</div>

<?php
	end_page();
?>