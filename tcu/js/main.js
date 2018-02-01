    $(".nav li").on("click", function() {
      $(".nav li").removeClass("active");
      
      $(this).addClass("active");
     
    });


    function mensaje(tipo,mensaje,duracion = 2000){
  		new $.Zebra_Dialog(mensaje,{
                      'type': tipo,
                      'auto_close': duracion,
                      'buttons':  false,
                      'modal': false,
                      'position': ['right - 20', 'top + 10'],
                    });
}