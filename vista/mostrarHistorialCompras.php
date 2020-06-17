<h3 id="usuario" style="text-align: center;"> Historial de Compras </h3> <hr>
<div class="row">
<?php

  $numero_filas_afectadas = $consulta->rowCount();
  if($numero_filas_afectadas <= 0){?>
  <p style="margin-left:30px;"> Al parecer aún no has realizado ninguna compra, deberías echarle un vistazo <a href="/proyecto_integrado/controlador/controlador_cartelera.php"> a la cartelera </a> </p> <?php
  }
  $array = [];
  while ($row = $consulta->fetch()){ 

    if(!in_array($row['DIA'],$array)){ ?>
      <div class="col-md-6">
        <h4 style="text-align: center;"> Dia <?php echo $row['DIA'] ?> </h4>
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0 text-center">
                <button class="btn btn-link" data-toggle="collapse" data-target="<?php echo "#P" . $row['DIA']?>" aria-expanded="true" aria-controls="collapseOne">
                  Ver Historial completo
                </button>
              </h5>
            </div>
            <div id="<?php echo "P" . $row['DIA']?>" class="accordion-body collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body"> 
                <?php
            $dia_actual = $row['DIA'];
            $select1 = "SELECT * FROM VENTA_ENTRADAS WHERE DIA='$dia_actual' AND ID_USUARIO=$id_usuario ORDER BY HORA ASC";
            $consulta1 = conectarBaseDatos::hacerConsulta($select1);
            while ($row1 = $consulta1->fetch()){ 
              $id_pelicula = $row1['ID_PELICULA'];
              $id_sala = $row1['ID_SALA'];
              $id_tarifa = $row1['ID_TARIFA'];

              // obtener nombre_pelicula
              $select2 = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
              $consulta2 = conectarBaseDatos::hacerConsulta($select2);
              while ($row2 = $consulta2->fetch()){ 
                $titulo_pelicula = $row2['TITULO'];
                $foto_pelicula = $row2['FOTO_PELICULA'];
              }
              // obtener nombre_sala
              $select3 = "SELECT * FROM SALAS WHERE ID_SALA=$id_sala";
              $consulta3 = conectarBaseDatos::hacerConsulta($select3);
              while ($row3 = $consulta3->fetch()){ 
                $nombre_sala = $row3['NOMBRE_SALA'];
              } 
              // obtener Tarifa y precio total entradas
              // En el caso de ser la tarifa del 2x1, se cobra 1 entrada en
              // vez de 2 siempre y cuando solo compre 2 entradas como maximo.
              $select4 = "SELECT * FROM TARIFAS WHERE ID_TARIFA=$id_tarifa";
              $consulta4 = conectarBaseDatos::hacerConsulta($select4);
              while ($row4 = $consulta4->fetch()){ 
                $nombre_tarifa = $row4['TIPO_TARIFA'];
                $precio_tarifa = $row4['PRECIO'];
              } 

              if(strpos($nombre_tarifa,"2x1") && $row1['NUMERO_ENTRADAS'] == 2){
                $precio_final = $precio_tarifa;
              }
              else{
                $precio_final = $row1['NUMERO_ENTRADAS'] * $precio_tarifa;
              } ?>
              <div class="table-bordered table-striped table-condensed">
                <table class="tabla_historial">
                  <tr>
                    <th> <?php echo $titulo_pelicula ?> </th>
                    <td colspan="2"> 
                      <img src="<?php echo '../vista/imagenes/imagenes_portada/'. $foto_pelicula?>"> 
                    </td>
                    <td> <?php echo $nombre_sala?>  </td>
                    <td> <?php echo $row1['HORA']?> </td>
                    <td> <?php echo $row1['NUMERO_ENTRADAS'] ?> </td>
                    <td> <?php echo $nombre_tarifa . " ($precio_tarifa €)" ?> </td>
                    <td> <?php echo $precio_final ."€" ?> </td>
                  </tr>
                </table>
              </div>
            <?php
            } 
            ?>    
              </div>
            </div>
          </div>
        </div>
    </div>
  <?php
  }
  array_push($array, $row['DIA']);
  }
?>
</div>
