$(document).ready(function() {
	/*
	  Recorre todos los select de la página, despues cada uno de sus hijos
	  comprueba si estan todos desactivados, si lo estan, elimina el select
	  y lo sustituye por una text de disculpandose y avisando de que la sala 
	  esta llena.
	*/
	$("select").each(function() {
      var longitud_select = $(this).children().length;
      var contador = longitud_select;
      $("option", this).each(function(){
        var check_disabled = $(this).attr("disabled");
        if(check_disabled == "disabled"){
          contador = contador - 1;
        }
      });
      if(contador==0){
        $(this).parent().append("Todas las salas completas, disculpe las molestias");
        $(this).parent().parent().parent().next().children().remove();
        $(this).remove();
      }
    });
});   