$(document).ready(function(){
$(function(){
  /* Campo de autocompletado del buscador, mas info en search.php */
    $('#campo_buscarTitulo').autocomplete({
      source: "/proyecto_integrado/vista/search.php",
      minLength: 1,
      select: function(event, ui)
      {
        $('#campo_buscarTitulo').val(ui.item.value);
        $('#almacena_id').val(ui.item.id);
      }
    }).data('ui-autocomplete')._renderItem = function(ul, item){
      return $("<li class='ui-autocomplete-row'></li>")
        .data("item.autocomplete", item)
        .append(item.label)
        .appendTo(ul);
    };
    });
}); 