<h3 id="comprar" style="text-align: center">Proceso de compra de entradas</h3> 
<hr>
<?php
$select3 = "SELECT * FROM SALAS WHERE ID_SALA=$sala_elegida";
$consulta3 = conectarBaseDatos::hacerConsulta($select3);
  while ($row3 = $consulta3->fetch()){ 
    $nombre_sala = $row3['NOMBRE_SALA'];
      $capacidad_maxima = $row3['AFORO_MAXIMO'];
  }
$select4 = "SELECT * FROM VENTA_ENTRADAS WHERE ID_PELICULA=$id_pelicula AND DIA='$dia_pelicula' AND HORA='$hora_pelicula' AND ID_SALA=$sala_elegida";
$consulta4 = conectarBaseDatos::hacerConsulta($select4);
$num_reservas = 0;
  while ($row4 = $consulta4->fetch()){
    $num_reservas =  $num_reservas + $row4['NUMERO_ENTRADAS'];
  }
  if($num_reservas>0){
    $asientos_libres = $capacidad_maxima - $num_reservas;  
  }
  else{
    $asientos_libres=$capacidad_maxima;
  } ?>
  <p> 
    Bienvenido al proceso de compra, seleccione el número de entradas que quiera comprar, hay un total de  <?php echo $asientos_libres ?> sitios libres en esta sala
  </p>
<div class="table-responsive">
    <table class="table table-striped table-responsive-stack">
    <thead>
        <tr>
            
            <th scope="col">Sala</th>
            <th scope="col">Tarifa</th>
            <th scope="col"> Número de entradas </th>
            <th scope="col"> Precio Total </th>
            <th scope="col"> ¿Adjuntar Factura? </th>
        </tr>
    </thead>  
<?php
  while ($row = $consulta->fetch()){ ?>
        <tr> <?php
          $select1 = "SELECT * FROM CARTELERA WHERE ID_PELICULA=$id_pelicula AND DIA='$dia_pelicula' AND HORA='$hora_pelicula' AND ID_SALA=$sala_elegida";
          $consulta1 = conectarBaseDatos::hacerConsulta($select1);
          while ($row1 = $consulta1->fetch()){ 
            $id_tarifa = $row1['ID_TARIFA'];
          }
          $select2 = "SELECT * FROM TARIFAS WHERE ID_TARIFA=$id_tarifa";
          $consulta2 = conectarBaseDatos::hacerConsulta($select2);
          while ($row2 = $consulta2->fetch()){ 
            $precio_entrada = $row2['PRECIO'];
            $nombre_tarifa = $row2['TIPO_TARIFA'];
          }
          ?>
         <td> <?php echo $nombre_sala ?> </td>
         <td> <?php echo $nombre_tarifa ?> </td>
         <td>  
          <form action="controlador_compraEntradas.php" method="post">
            <input id="entradasComprar" class="form-control" type="number" min="1" max="<?php echo $asientos_libres?>" name="numeroEntradas" required value="1" id="example-number-input">
         </td>

         <td>  
          <form action="controlador_compraEntradas.php" method="post">
            <span class="hidden"> <?php echo $precio_entrada ?> </span>
            <input id="PrecioEntradas" name="precioEntradas" class="form-control" type="text" readonly value>
         </td>
         <td>
          <div class="custom-control form-control-lg custom-checkbox">
            <input type="checkbox" name="adjuntarFactura" checked class="custom-control-input" id="customCheck1" value="si">
            <label class="custom-control-label" for="customCheck1"></label>
          </div>
         </td>
       </table>
     </div>
     <div class="row">      
        <div class="col-1 contenedor_comprarEntradas" >
          <input type="hidden" name="campo_idpelicula" value="<?php echo $id_pelicula ?>">
          <input type="hidden" name="campo_dia_cartelera" value="<?php echo $dia_pelicula ?>">
          <input type="hidden" name="campo_hora" value="<?php echo $hora_pelicula ?>">
          <input type="hidden" name="campo_idsala" value="<?php echo $sala_elegida ?>">
          <input type="hidden" name="campo_idtarifa" value="<?php echo $id_tarifa ?>">
          <input type="submit" name="comprarEntradas" value="Comprar" class="btn btn-success reservarEntradas'"/>
        </div>
      </form>

        <div class="col-1 contenedor_volverAtras">
          <form action="controlador_reservaEntradas.php#horario" method="post">
            <input type="hidden" name="campo_dia_cartelera" value="<?php echo $dia_pelicula ?>">
            <input type="hidden" name="campo_idpelicula" value="<?php echo $id_pelicula ?>">
            <input type="submit" name="reservar_entradas" value="Volver atrás" class="btn btn-danger reservarEntradas'"/>
          </form>
        </div>
      </div>
  </div> <?php
}
?>