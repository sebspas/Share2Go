<?php
	start_page("Changement de l'avatar",1);
?>	
		<div class="frame cols5">
				<div class="hb green3"><h2 class="hb-title">Changement de l'avatar</h2></div>
				<div class="frame-content">
					<form method="post" action="#" enctype="multipart/form-data" class="center">
						<label for="avatar">Fichier du format (.jpg,.png,.jpeg,.gif | max. 10 mo)</label>
						<input type="file" name="avatar" id="avatar" />
	                	<input class="btn green3 center" type="submit" value="Changer" name="change" id="send">
					</form>
				</div>
			</div>
<?php
	end_page();
?>