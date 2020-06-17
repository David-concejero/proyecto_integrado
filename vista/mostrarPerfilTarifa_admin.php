<div class="col-md-12"> 
<?php
  while ($row = $consulta->fetch()){ ?>
    <h3 id="usuario" style="text-align: center;"> <?php echo "Perfil de ". $row['TIPO_TARIFA'] ?> </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
          <img width="251px" height="253px" style=" position: relative;top: -30px" align="center" src="../vista/imagenes/iconos/icono_tarifa.png">
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_perfil_tarifa">
            <thead>
              <tr>
                <th> Nombre Tarifa </th>
                <th> Precio  </th>
                <th> Descripción </th>
              </tr>
            </thead>
            <tbody>
              <tr> <?php
                if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){?>
                  <form action="controlador_administrador.php?panel=tarifas#panel_herramientas" method="post">  
                  <?php
                  } ?>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                      <input type="text" value="<?php echo $row['TIPO_TARIFA'] ?>" minlength="5" required name="campo_nombreTarifa"/>
                  <?php
                    }
                    else{ 
                      echo $row['TIPO_TARIFA']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                      <input type="number" min="1" value="<?php echo $row['PRECIO'] ?>" required name="campo_precio"/> 
                  <?php
                    }
                    else{ 
                      echo $row['PRECIO']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                    <textarea style="width:100%" required rows="5" name="campo_descripción" type="text" minlength="10"><?php echo $row['DESCRIPCION'];?></textarea>
                  <?php
                    }
                    else{ ?>
                      <textarea style="width:100%" rows="5" name="campo_descripción" type="text" readonly><?php echo $row['DESCRIPCION'];?></textarea> <?php
                    }?>
                </td>
                
                  <input type="hidden" name="campo_idtarifa" value="<?php echo $row['ID_TARIFA'] ?>"> 
              </tr>
            </tbody>
          </table>
      </div>

			<div class="opciones_disponibles">
        <div class="row">
          <?php
            if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
              <div class="col-md-6 text-center">
                <a href="controlador_administrador.php?panel=tarifas#panel_herramientas"> 
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
                <a href="controlador_administrador.php?panel=tarifas#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Volver atrás </span> 
                </a>
              </div> 
              <div class="col-md-6 text-center">
                <form action="controlador_administrador.php?panel=tarifas&modificar=perfil#usuario" method="post">
                  <input type="submit" value="Modificar Perfil" class="btn btn-warning" name="boton_actualizar">
                  <input type="hidden" name="campo_idtarifa" value="<?php echo $id_tarifa?>">
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