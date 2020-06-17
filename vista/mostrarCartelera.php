<?php
  $array = [];
  while ($row = $consulta->fetch()){
    $ID_PELICULA = $row['ID_PELICULA'];
    if(!in_array($ID_PELICULA, $array)){
      $select2 = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$ID_PELICULA";
          $consulta2 = conectarBaseDatos::hacerConsulta($select2);
          while ($row2 = $consulta2->fetch()){ ?>
            <div class="col-12 fondo_cartelera">
              <div style="margin-top: 20px;" class="row">
                <div class="col-md-2">
                  <img class="img-fluid" src="../vista/imagenes/imagenes_portada/<?php echo $row2['FOTO_PELICULA']?>" alt="foto pelicula">
                </div>
                <div class="col-md-10">
                    <?php  
                      $select1 = "SELECT * FROM OPINIONES_PELICULAS WHERE ID_PELICULA='$ID_PELICULA'";
                      $consulta1 = conectarBaseDatos::hacerConsulta($select1);
                      $numero_filas_afectadas = $consulta1->rowCount();
                      $votaciones = 0;
                      while ($row1 = $consulta1->fetch()){ 
                        $votaciones = $votaciones + $row1['VALORACION'];
                      }
                      if($votaciones == 0){
                        $nota_media = 0;
                      }
                      else{
                        $nota_media = $votaciones / $numero_filas_afectadas;
                      } 
                      ?>
                    <div class="row">
                      <div class="col-10">
                        <h3> <?php echo $row2['TITULO']; ?> </h3>
                      </div>

                      <div class="col-2">
                        <div class="contenedor_votacionesCritica <?php if($nota_media >=  7){echo 'buena';}elseif($nota_media >= 5 AND $nota_media < 7){echo 'regular';}else{echo'mala';} ?>">
                            <div class="media_votos"> <?php echo $nota_media ?> </div>
                        </div>
                      </div>
                    </div>
                  


                    <p>
                        Año <?php echo $row2['AÑO']?> |
                        <?php echo $row2['DURACION']?> min
                        | <?php echo $row2['PAIS']?> 
                        | <?php echo $row2['GENERO']?> 
                        | <?php echo $row2['CALIFICACION']?> <br>
                        <?php echo $row2['SINOPSIS']?>
                    </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <h3 align="center"> Sesiones </h3> 
                  <hr style="border-bottom: 1px solid #4682B4;">
                  <div class="wrapper text-center">
                  <?php
                    $select3 = "SELECT DISTINCT HORA FROM CARTELERA WHERE ID_PELICULA=$ID_PELICULA AND DIA='$dia_cartelera'";
                    $consulta3 = conectarBaseDatos::hacerConsulta($select3);
                    while ($row3 = $consulta3->fetch()){?>
                        <span style="display: inline-block" class="horario_pelicula">
                          <?php echo $row3['HORA']; ?>
                        </span><?php
                    } ?>
                  </div>
                </div>
              <div class="col-md-12">
                <div class="row text-center">
                  <div style="text-align: right" class="col-6">
                    <a class="boton_verPerfil" href="controlador_perfilPeliculas.php?ver=ficha<?php echo '&pelicula='.$ID_PELICULA ?>"> Ver perfil película </a>
                  </div>
                  <div style="text-align: left" class="col-6">
                    <form style="display: inline-block" action="controlador_reservaEntradas.php#horario" method="post">
                        <input type="submit" name="reservar_entradas" value="Reservar Entradas" class="boton_reservarEntradas"/>
                        <input type="hidden" name="campo_idpelicula" value="<?php echo $ID_PELICULA ?>">
                        <input type="hidden" name="campo_dia_cartelera" value="<?php echo $dia_cartelera ?>">
                      </form>
                    </div>
                </div>
                </div>
              </div>
            </div>
            <?php
            }
            array_push($array, $ID_PELICULA);
            ?> <div style="width: 100%;background: #b76969;" class="separacion"> &nbsp; </div> <?php 
    }
} ?>