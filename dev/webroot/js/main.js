$(document).ready(function(){

	$(document).changeBackground();

	$(window).resize(function() {
		$(document).changeBackground();
	});


	//$('.row').hide();

	$('.disabled2').hide();
	
	$('.js-menu-btn').click(function(e) {
		e.preventDefault();
		e.stopPropagation();

		if ($('.menu-navigation').is(':hidden')) {
			$('.menu-navigation').velocity("slideDown", {duration: 200});
		}
		else {
			$('.menu-navigation').velocity("slideUp", {duration: 200});
		}
	}); // $('.menu-btn').click()


	$('.error').click(function(e) {
		e.preventDefault();
		e.stopPropagation();

		$(this).velocity("fadeOut", {delay: 30, duration: 250});
	}); // $('.error').click()

	$('.success').click(function(e) {
		e.preventDefault();
		e.stopPropagation();

		$(this).velocity("fadeOut", {delay: 30, duration: 250});
	}); // $('.success').click()


	// $('.frame').each(function(index){
		
	// });

	$('.row').velocity("fadeIn", {delay: 30, duration: 500});

	$('.disabled2 h2').append('<h2>INDISPONIBLE</h2>');


	//$('.disabled .right').append('<p>EXPIRÉ</p>');


    //$("#autocomplete").googleMapAuocompleteAddress() ;  

    $(".autocompleteAdr").googleMapAuocompleteAddress() ;


    $('#showExpired').click(function(e) {
		//e.preventDefault();
		e.stopPropagation();


		if ($('.disabled2').is(':hidden')) {
			$('.disabled2').fadeIn(350);//.velocity("fadeIn", {delay: 70, duration: 350});
		}
		else {
			$('.disabled2').fadeOut(350);//.velocity("fadeOut", {delay: 70, duration: 350});
		}

		//return false;
	}); // $('.success').click()	


}); // ready()