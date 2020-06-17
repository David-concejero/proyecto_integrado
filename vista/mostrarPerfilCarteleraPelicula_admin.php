<?php
  // Si el administrador borra todos los estrenos en las salas y no hay nada que mostrar, aparece un mensaje
  // diciendo que no hay nada que mostrar debido a que se ha eliminado recientemente todos los estrenos.
  $numero_filas_afectadas = $consulta->rowCount();
  if($numero_filas_afectadas <= 0){ ?>

  <div class="col-md-12">
    <h3 id="usuario" style="text-align: center;"> Ups, no hay estrenos asignados </h3> 
    <p> Se ha modificado o eliminado recientemente todos los estrenos de la película asociados a este dia, te recomiendo
        volver a la pantalla principal de administrador pinchando en la imagen de arriba o <a href="controlador_administrador.php?panel=cartelera#panel_herramientas"> en el siguiente enlace </a>.
    <hr>
  </div>
  <?php
  }
  else{ ?>

<div class="col-md-12">
  <h3 id="usuario" style="text-align: center;"> Modificar pelicula Cartelera </h3> 
  <hr>
</div>
  <div class="row col-md-12">
  <?php
  while ($row = $consulta->fetch()){ // Se repite por cada sala disponible
  $sala_actual = $row['ID_SALA'];
  $select2 = "SELECT * FROM CARTELERA WHERE DIA='$dia_cartelera' AND ID_SALA=$sala_actual AND ID_PELICULA=$pelicula_elegida";
  $consulta2 = conectarBaseDatos::hacerConsulta($select2); ?> 

  <div class="col-md-12"> 
    <h3> SALA <?php echo $row['ID_SALA']; ?> </h3>
    <div class="table-responsive">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th> Pelicula </th>
              <th> Sala </th>
              <th> Tarifa </th>
              <th> Dia </th>
              <th colspan="3"> Hora </th>
              </tr>
          </thead>
          <?php
          while ($row2 = $consulta2->fetch()){ 
              $hora_cartelera = $row2['HORA'];
              $sala_cartelera = $row['ID_SALA']?>
              <form action="controlador_administrador.php?panel=cartelera&modificar=perfil#usuario" method="post">
                  <tr>
                    <th> 
                      <?php
                      $select3 = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$pelicula_elegida";
                      $consulta3 = conectarBaseDatos::hacerConsulta($select3);
                      while ($row3 = $consulta3->fetch()){
                        $titulo_pelicula = $row3['TITULO'];
                      } ?>
                      <?php echo $titulo_pelicula ?> 
                    </th>


                    <th> 
                      <?php
                      $select3 = "SELECT * FROM SALAS WHERE ID_SALA=$sala_actual";
                      $consulta3 = conectarBaseDatos::hacerConsulta($select3);
                      while ($row3 = $consulta3->fetch()){
                        $nombre_sala = $row3['NOMBRE_SALA'];
                      }
                      if(isset($_POST['modificar_campo']) && $sala_cartelera == $_POST['campo_salacartelera'] && $hora_cartelera == $_POST['campo_horacartelera'] ){?>
                        <select id="opcionesSelect" name="campo_sala_modificar" class="browser-default custom-select" style="width: 160px">
                        <option value="<?php echo $sala_actual?>">
                              <?php echo $nombre_sala ?></option>
                          <?php
                          $select3 = "SELECT * FROM SALAS WHERE ID_SALA != $sala_actual ORDER BY ID_SALA ASC";
                          $consulta3 = conectarBaseDatos::hacerConsulta($select3);
                          while ($row3 = $consulta3->fetch()){ ?>
                            <option value="<?php echo $row3['ID_SALA'] ?>">
                              <?php echo $row3['NOMBRE_SALA']; ?></option> <?php  
                          } ?>
                        </select>
                        <?php
                      }
                      else{
                        echo $nombre_sala;
                      } ?>
                    </th>


                    <th> 
                      <?php
                      $tarifa_actual = $row2['ID_TARIFA'];
                      $select3 = "SELECT * FROM TARIFAS WHERE ID_TARIFA=$tarifa_actual";
                      $consulta3 = conectarBaseDatos::hacerConsulta($select3);
                      while ($row3 = $consulta3->fetch()){
                        $tipo_tarifa = $row3['TIPO_TARIFA'];
                      }
                      if(isset($_POST['modificar_campo']) && $sala_cartelera == $_POST['campo_salacartelera'] && $hora_cartelera == $_POST['campo_horacartelera'] ){?>
                        <select id="opcionesSelect" name="campo_tarifa_modificar" class="browser-default custom-select" style="width: 160px">
                        <option value="<?php echo $tarifa_actual ?>">
                              <?php echo $tipo_tarifa ?></option>
                          <?php
                          $select3 = "SELECT * FROM TARIFAS WHERE ID_TARIFA != $tarifa_actual ORDER BY ID_TARIFA ASC";
                          $consulta3 = conectarBaseDatos::hacerConsulta($select3);
                          while ($row3 = $consulta3->fetch()){ ?>
                            <option value="<?php echo $row3['ID_TARIFA'] ?>">
                              <?php echo $row3['TIPO_TARIFA']; ?></option> <?php  
                          } ?>
                        </select>
                        <?php
                      }
                      else{
                        echo $tipo_tarifa;
                      } ?>
                    </th>


                    <th> 
                      <?php
                      if(isset($_POST['modificar_campo']) && $sala_cartelera == $_POST['campo_salacartelera'] && $hora_cartelera == $_POST['campo_horacartelera'] ){?>

                        <input type="date" required value="<?php echo $row2['DIA'] ?>" min="2020-03-16" max="2020-03-22" name="campo_dia_modificar">

                        <?php
                      }
                      else{
                        echo $row2['DIA'];
                      } ?>
                    </th>


                    <th> 
                      <?php
                      $hora = substr($row2['HORA'],0, 5);
                      if(isset($_POST['modificar_campo']) && $sala_cartelera == $_POST['campo_salacartelera'] && $hora_cartelera == $_POST['campo_horacartelera'] ){?>

                        <input type="time" required value="<?php echo $hora ?>" name="campo_hora_modificar">
                        <?php
                      }
                      else{
                        echo $hora;
                      } ?>
                    </th>


                    <?php
                      if(isset($_POST['modificar_campo']) && $sala_cartelera == $_POST['campo_salacartelera'] && $hora_cartelera == $_POST['campo_horacartelera'] ){?>
                        <th colspan="2" style="text-align: center;">
                          <input type="submit" value="Aceptar" name="confirmar_modificar_campo">
                        </th>
                        <?php
                      }
                      elseif(isset($_POST['eliminar_campo']) && $sala_cartelera == $_POST['campo_salacartelera'] && $hora_cartelera == $_POST['campo_horacartelera'] ){?>
                        <th colspan="2" style="text-align: center;">
                          <input type="submit" value="Aceptar" name="confirmar_eliminar_campo">
                        </th>
                        <?php
                      }
                      else{ ?>
                        <th> 
                          <input type="submit" value="Modificar" name="modificar_campo">
                        </th>
                        <th> 
                          <input type="submit" value="Eliminar" name="eliminar_campo">
                        </th>
                        <?php
                      } ?>


                  </tr>
                  <input type="hidden" name="campo_dia" value="<?php echo $dia_cartelera ?>">
                  <input type="hidden" name="campo_pelicula" value="<?php echo $pelicula_elegida ?>">
                  <input type="hidden" name="campo_horacartelera" value="<?php echo $hora_cartelera ?>">
                  <input type="hidden" name="campo_salacartelera" value="<?php echo $sala_cartelera ?>">
              </form>

           <?php  
          } ?>
        </table>
      </div> <hr> 
  </div>
    <?php
  } ?>  
  </div>

  <?php
}
?>