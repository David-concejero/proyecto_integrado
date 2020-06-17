  <div class="col-md-12 informacion_index">
    <div style="" class="row contenedor_cartelera">
      <?php
      $contador = 1;
      $select = "SELECT DISTINCT ID_PELICULA FROM CARTELERA;";
      $consulta = conectarBaseDatos::hacerConsulta($select);
      while ($row = $consulta->fetch()){
        $id_pelicula = $row['ID_PELICULA'];

        $select2 = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$id_pelicula;";
        $consulta2 = conectarBaseDatos::hacerConsulta($select2);
        while ($row2 = $consulta2->fetch()){ 
          $foto = $row2['FOTO_PELICULA'];
          $titulo = $row2['TITULO'];
          $año = $row2['AÑO'];

          ?>
        <div class="<?php if($contador<=6){echo 'trailer_poster';}else{echo 'trailer_poster_hidden';} ?> col-4col-xs-4 col-sm-4 col-md-2">
            <div class="poster_wrap">
                <a href="controlador/controlador_perfilPeliculas.php?ver=ficha&pelicula=<?php echo $id_pelicula ?>" class="enlace_portada">
                <div class="poster_back">
                  <div class="poster_back_inner">
                    <div class="trailer_info">
                      <div class="guru_name"> Pelicula <br>
                        <?php echo $titulo ?>
                      </div>
                      <div class="year"> <?php echo $año ?> </div>
                    </div>
                  </div>
                </div>
                <img class="poster_art img-fluid" src="vista/imagenes/imagenes_portada/<?php echo $foto?>">
                </a>
            </div>     
        </div>
          <?php
        }
        $contador = $contador + 1;
      }
      ?>
  </div>
</div>

<div class="options">
    <div class="mostrar_mas">MOSTRAR MÁS</div>
    <a style="display: none; text-decoration: none; color: white" class="ir_cartelera" href="controlador/controlador_cartelera.php">VER CARTELERA</a>
  </div>