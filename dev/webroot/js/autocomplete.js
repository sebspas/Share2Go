$(function (){  
  
 $.fn.googleMapAuocompleteAddress = function(opt) {  
    var options = $.extend({}, {  
    }, opt);  
   // each : si le plugin est énumérer tous les éléments du selector     
         return this.each(function(i, e){  
             //l’élément a qui s’applique le plugin ne peut etre qu un champs input  
              if(! $(this).is("input"))return ;  
         var autocomplete = new google.maps.places.Autocomplete($(this).get(0));  
         //Définir le champs comme autocomplete  
       //Attacher un évènement chaque fois que l’adresse saisie change     
       google.maps.event.addListener(autocomplete, 'place_changed', function() {  
          //Récupérer les lieux correspondants a l adresse saisie   
           var place = autocomplete.getPlace();  
   //Récupérer les composants de l adresse      
    var componenents=place.address_components||[];  
    var ln=componenets.length;  
     for (var i=0 ; i<ln;i++) {   
            var editor=$("[data-role|="+componenets[i].types[0]+"]");   
  
             //Regarder tous les elements html dont l'attribut data-role  
             // ressemble a street_number, route,locality,postal_code,country ...  
  
   if(editor.is("input")){  
       editor.val(componenets[i].long_name);  
                     //si l'element est un champs on rempli sa valeur  
   }else{  
                     //sinon son html   
      editor.html(componenets[i].long_name);  
   }//end if   
   }//end for   
          
 });//end addListener   
     });//end each    
   };//end googleMapAuocompleteAddress  
});