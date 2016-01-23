$(function (){  



  $.fn.changeBackground = function () {



    if ($(document).width() > 960) {



        var horaire = new Date();

        var heures = horaire.getHours();



        var urlImg = 'http://62.210.110.24/S2go/dev/webroot/img/bg-7h.jpg';



        if (heures >= 0)

          urlImg = 'http://62.210.110.24/S2go/dev/webroot/img/bg-4h.jpg';

        

        if (heures >= 7)

          urlImg = 'http://62.210.110.24/S2go/dev/webroot/img/bg-7h.jpg';

        

        if (heures >= 10)

          urlImg = 'http://62.210.110.24/S2go/dev/webroot/img/bg-10h.jpg';





        if (heures >= 14)

          urlImg = 'http://62.210.110.24/S2go/dev/webroot/img/bg-14h.jpg';



        if (heures >= 19)

          urlImg = 'http://62.210.110.24/S2go/dev/webroot/img/bg-19h.jpg';



        if (heures >= 21)

          urlImg = 'http://62.210.110.24/S2go/dev/webroot/img/bg-21h.jpg';





        document.body.style.backgroundImage = "url('"+urlImg+"')";



        setTimeout(function(){

          $(document).changeBackground();

          console.log(heures);

        }, 45000);



    }

    else{

      document.body.style.backgroundImage = "none";

    }

    

  }// changeBackground()



});