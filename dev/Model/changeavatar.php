<?php
	function changeUrl($id,$url) {
		$BD = new BD('user');
		$BD->update('avatar',$url,'iduser',$id);
	}
?>