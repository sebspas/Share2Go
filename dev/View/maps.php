<?php
	start_page("Test maps");
?>
<iframe width="425" 
	height="350" 
	frameborder="0" 
	scrolling="no" 
	marginheight="0" 
	marginwidth="0" 
	src="https://maps.google.fr/maps?f=d&amp;source=s_d&amp;saddr=<?php echo $source; ?>&amp;daddr=<?php echo $dest; ?>&amp;hl=fr&amp;geocode=FRSWlAIdOPtUACnLJqXwM6PJEjG8woyx4SGNLA%3BFQWdngIdmFNJACkHnbw5h-u1EjE2ex36bptC5g&amp;aq=&amp;sll=43.949318,4.805529&amp;sspn=0.001634,0.001124&amp;vpsrc=0&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=43.637317,5.209932&amp;spn=0.692203,0.822113&amp;output=embed">
</iframe>
<br />
<small>
<a href="https://maps.google.fr/maps?f=d&amp;source=embed&amp;saddr=<?php echo $source; ?>&amp;daddr=<?php echo $dest; ?>&amp;hl=fr&amp;geocode=FRSWlAIdOPtUACnLJqXwM6PJEjG8woyx4SGNLA%3BFQWdngIdmFNJACkHnbw5h-u1EjE2ex36bptC5g&amp;aq=&amp;sll=43.949318,4.805529&amp;sspn=0.001634,0.001124&amp;vpsrc=0&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=43.637317,5.209932&amp;spn=0.692203,0.822113" style="color:#0000FF;text-align:left">Agrandir le plan</a></small>
<?php
	echo $token;
	end_page();
?>