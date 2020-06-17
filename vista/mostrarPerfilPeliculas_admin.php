<?php
if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){?>
<form style="width: 100%" action="controlador_administrador.php?panel=peliculas#panel_herramientas" method="post" enctype="multipart/form-data">  
<?php
} ?>

<div class="col-md-12"> 
<?php
  while ($row = $consulta->fetch()){ ?>
    <h3 id="usuario" style="text-align: center;"> <?php echo "Perfil de la Pelicula ". $row['TITULO'] ?> </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img align="center" width="200px" src="../vista/imagenes/imagenes_portada/<?php echo $row['FOTO_PELICULA']; ?>">
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_perfil_peliculas">
            <thead>
              <tr>
                <th> Titulo </th>
                <th> Año  </th>
                <th> Pais </th>
                <th> Genero </th>
                <th> Duración </th>
                <th> Calificacion </th>
                <th> Fecha estreno </th>
                <th> Trailer URL (embled) </th>
                <th> Sinopsis </th>
              </tr>
            </thead>
            <tbody>
              <tr> 
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
                      <input type="text" minlength="5" value="<?php echo $row['TITULO'] ?>" required name="campo_titulo"/>
                  <?php
                    }
                    else{ 
                      echo $row['TITULO']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
                      <input type="number" value="<?php echo $row['AÑO']?>" min="1900" max="2020"  required name="campo_año"/>
                  <?php
                    }
                    else{ 
                      echo $row['AÑO']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
                      <input type="text" minlength="4" value="<?php echo $row['PAIS'] ?>" required name="campo_pais"/>
                  <?php
                    }
                    else{ 
                      echo $row['PAIS']; 
                    }?>
                </td>
                <td> 
                    <?php
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ 
                      $generos_actuales = explode(",", $row['GENERO']);  ?>
                      <select name="campo_genero[]" class="selectpicker seleccionarGenero" multiple required multiple data-live-search="true">
                      <?php
                      for ($i=0; $i < sizeof($lista_generos); $i++){

                        if(in_array($lista_generos[$i], $generos_actuales)){ ?>
                          <option value="<?php echo $lista_generos[$i] ?>" selected>
                            <?php echo $lista_generos[$i] ?>
                          </option> <?php
                        }
                        else{ ?>
                          <option value="<?php echo $lista_generos[$i] ?>">
                            <?php echo $lista_generos[$i] ?>
                          </option> <?php
                        }
                      } ?>
                      </select>
                  <?php
                    }
                    else{ 
                      echo $row['GENERO']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
                      <input type="number" min="30" max="180" value="<?php echo $row['DURACION'] ?>" required name="campo_duracion"/>
                  <?php
                    }
                    else{ 
                      echo $row['DURACION']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ 
                      $calificacion = substr($row['CALIFICACION'],1);

                      ?>
                      <input type="number" min="1" max="18" value="<?php echo $calificacion?>" required name="campo_calificacion"/>
                  <?php
                    }
                    else{ 
                      echo $row['CALIFICACION']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
                      <input type="date" min="2020-03-16" value="<?php echo $row['FECHA_ESTRENO'] ?>" max="2020-03-22" name="campo_fechaestreno" required/>
                  <?php
                    }
                    else{ 
                      echo $row['FECHA_ESTRENO']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
                      <input type="url" name="campo_trailer" placeholder="Coloca tu video (embed) de youtube" pattern="^(https:\/\/www\.youtube\.com\/embed\/)[A-z-0-9]+$" title="Coloca tu video (embed) de youtube" value="<?php echo $row['TRAILER'] ?>" required>
                  <?php
                    }
                    else{ 
                      echo $row['TRAILER']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
                      <textarea style="width:100%" minlength="50" required rows="5" name="campo_sinopsis" type="text"><?php echo $row['SINOPSIS'] ?></textarea>
                  <?php
                    }
                    else{ ?>
                      <textarea readonly style="width:100%" rows="5" name="campo_sinopsis" type="text"><?php echo $row['SINOPSIS'] ?></textarea> 
                      <?php
                    }?>
                </td>
                <input type="hidden" name="campo_idpelicula" value="<?php echo $row['ID_PELICULA'] ?>"> 
                </td> 
              </tr>
            </tbody>
          </table>
      </div>

      <div class="opciones_disponibles">
        <div class="row">
          <?php
            if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
              <div class="col-6 col-md-6 text-center">
                <a href="controlador_administrador.php?panel=peliculas#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Cancelar </span> 
                </a>
              </div> 
              <div class="col-6 col-md-6 text-center">
                <input type="submit" name="modificar_perfil" value="Aceptar cambios" class="btn btn-success"/> 
              </div>
              <?php
            }
            else{ ?>
              <div class="col-6 col-md-6 text-center">
                <a href="controlador_administrador.php?panel=peliculas#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Volver atrás </span> 
                </a>
              </div> 
              <div class="col-6 col-md-6 text-center">
                <form action="controlador_administrador.php?panel=peliculas&modificar=perfil#usuario" method="post">
                  <input type="submit" value="Modificar Perfil" class="btn btn-warning" name="boton_actualizar">
                  <input type="hidden" name="campo_idpelicula" value="<?php echo $id_pelicula?>">
                </form>
                </a>
              </div> <?php
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
<?php
if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){?>
</form>  
<?php
} ?>