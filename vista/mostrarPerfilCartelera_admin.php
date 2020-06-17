<div class="col-md-12">
  <h3 id="usuario" style="text-align: center;"> Cartelera programada <?php echo $dia_cartelera ?> </h3> <hr>
</div>
<?php
  while ($row = $consulta->fetch()){ ?>
    <div class="col-md-12 expositor_cartelera"> 
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <?php
        $pelicula_cartelera = $row['ID_PELICULA'];
        $select2 = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$pelicula_cartelera";
        $consulta2 = conectarBaseDatos::hacerConsulta($select2);
        while ($row2 = $consulta2->fetch()){
          $nombre_foto = $row2['FOTO_PELICULA'];
          $titulo = $row2['TITULO'];
        } ?>
        <img width="200px" align="center" src="../vista/imagenes/imagenes_portada/<?php echo $nombre_foto?>"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_perfil_cartelera">
            <thead>
              <tr>
                <th> Titulo Pelicula </th>
                <th> Salas donde se estrena  </th>
                <th> Tarifas aplicadas en las diferentes salas </th>
                <th> Horas estreno a lo largo del dia </th>
              </tr>
            </thead>
            <tbody>
              <tr> <?php
                if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){?>
                  <form action="controlador_administrador.php?panel=cartelera#panel_herramientas" method="post">  
                  <?php
                  } ?>
                <td> 
                  <?php echo "$titulo"; ?>
                </td>
                <td>
                  <select id="opcionesSelect" class="browser-default custom-select" style="width: 220px"> 
                  <?php
                    $select2 = "SELECT NOMBRE_SALA FROM SALAS WHERE ID_SALA IN (SELECT ID_SALA FROM CARTELERA WHERE ID_PELICULA = $pelicula_cartelera and DIA='$dia_cartelera')";
                    $consulta2 = conectarBaseDatos::hacerConsulta($select2);
                    while ($row2 = $consulta2->fetch()){ ?>
                      <option><?php echo $row2['NOMBRE_SALA']; ?></option> <?php
                    } ?>
                  </select>
                </td>
                <td>
                  <select id="opcionesSelect" class="browser-default custom-select" style="width: 220px"> 
                  <?php
                    $select2 = "SELECT TIPO_TARIFA FROM TARIFAS WHERE ID_TARIFA IN (SELECT ID_TARIFA FROM CARTELERA WHERE ID_PELICULA = $pelicula_cartelera and DIA='$dia_cartelera')";
                    $consulta2 = conectarBaseDatos::hacerConsulta($select2);
                    while ($row2 = $consulta2->fetch()){ ?>
                      <option><?php echo $row2['TIPO_TARIFA']; ?></option> <?php
                    } ?>
                  </select>
                </td>
                <td> 
                  <select id="opcionesSelect" class="browser-default custom-select" style="width: 220px"> 
                  <?php
                    $select2 = "SELECT DISTINCT HORA FROM CARTELERA WHERE ID_PELICULA = $pelicula_cartelera and DIA='$dia_cartelera'";
                    $consulta2 = conectarBaseDatos::hacerConsulta($select2);
                    while ($row2 = $consulta2->fetch()){ ?>
                      <option><?php echo $row2['HORA']; ?></option> <?php
                    } ?>
                  </select>

                    <input type="hidden" name="dia_cartelera" value="<?php echo $dia_cartelera ?>"> 
                </td>
              </tr>
            </tbody>
          </table>
      </div>

			<div class="opciones_disponibles">
        <div class="row">
          <?php
            if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
              <div class="col-md-6 text-center">
                <a href="controlador_administrador.php?panel=cartelera#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Cancelar </span> 
                </a>
              </div> 
              <div class="col-md-6 text-center">
                <input type="submit" name="modificar_perfil" value="Aceptar cambios" class="btn btn-success"/> 
              </div>
              <?php
            }
            else{ ?>
              <div class="col-md-6 text-center">
                <a href="controlador_administrador.php?panel=cartelera#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Volver atrás </span> 
                </a>
              </div> 
              <div class="col-md-6 text-center">
                <form action="controlador_administrador.php?panel=cartelera&modificar=perfil#usuario" method="post">
                  <input type="submit" value="Ir a Modificar este estreno" class="btn btn-warning" name="boton_ir_estreno">
                  <input type="hidden" name="campo_dia" value="<?php echo $dia_cartelera?>">
                  <input type="hidden" name="campo_pelicula" 
                  value="<?php echo $pelicula_cartelera ?>">
                </form>
                </a>
              </div> <?php
            } ?>
            <?php
                if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){?>
                </form>  
              <?php
            } ?>
        </div>
      </div>
        
      </div>
     </div>
     
    </div>
  <?php
  }
?>
</div>
