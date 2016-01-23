<?php
	function updateCo($online,$Mail) {
		$BD = new BD("user");
		$BD->update("online",$online,"mail",$Mail);	
	}
?>