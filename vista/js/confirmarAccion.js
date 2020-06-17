$(document).ready(function(){
  // Jquery referencia: https://craftpip.github.io/jquery-confirm/#jquery-fn
  // Dependencias
    // <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    // <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js">
  
  $("#boton_eliminar").attr("disabled", "true");
  $(".bootstrap-select").click(function(){
    var frase = $(".bootstrap-select .dropdown-toggle .filter-option-inner-inner").text();
    if(!frase.includes("Selecciona")){
      $("#boton_eliminar").removeAttr("disabled");
    }
  });
  

  $("#boton_eliminar").click(function(){
    $.confirm({
        title: "Advertencia",
        content: '¿Estas seguro?, ¿has leido la advertencia anterior?',
        buttons: {
            Cancelar:{
              btnClass: 'btn-red',
                action: function(){
                  $.alert('Volviendo al panel');
                }
            },
            Continuar: {
                btnClass: 'btn-blue',
                action: function(){
                  $("#formulario").submit();
                }
            },
        }
    });
  });
});