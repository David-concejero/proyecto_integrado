<div class="col-md-12"> 
<?php
  while ($row = $consulta->fetch()){ ?>
    <h3 id="usuario" style="text-align: center;"> <?php echo "Perfil del Usuario ". $row['USUARIO'] ?> </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <?php
        if(strtoupper($row['SEXO']) == "HOMBRE"){?>
          <img style=" position: relative;top: -30px" align="center" src="../vista/imagenes/iconos/avatar_hombre.png"> <?php
        }
        else{ ?>
          <img align="center" src="../vista/imagenes/iconos/avatar_mujer.png"> <?php
        } ?>
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_perfil">
            <thead>
              <tr>
                <th> Nombre </th>
                <th> Apellidos  </th>
                <th> Dni </th>
                <th> Edad </th>
                <th> Rol </th>
                <th> Correo </th>
              </tr>
            </thead>
            <tbody>
              <tr> <?php
                if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){?>
                  <form action="controlador_administrador.php?panel=usuarios#panel_herramientas" method="post">  
                  <?php
                  } ?>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                      <input type="text" required minlength="5" value="<?php echo $row['USUARIO'] ?>" name="campo_usuario"/>
                  <?php
                    }
                    else{ 
                      echo $row['USUARIO']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                      <input type="text" required minlength="5" value="<?php echo $row['NOMBRE'] ?>" name="campo_nombre"/> 
                  <?php
                    }
                    else{ 
                      echo $row['NOMBRE']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                      <input type="text" required minlength="5" value="<?php echo $row['APELLIDOS'] ?>" name="campo_apellidos"/> 
                  <?php
                    }
                    else{ 
                      echo $row['APELLIDOS']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                      <input type="text" value="<?php echo $row['DNI'] ?>" required pattern="^[0-9]{8,}[A-Z]$" title="Recuerda, 8 dígitos y un numero" name="campo_dni"/> 
                  <?php
                    }
                    else{ 
                      echo $row['DNI']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                      <input type="text" value="<?php echo $row['EDAD'] ?>" required min=18 max=99 name="campo_edad"/> 
                  <?php
                    }
                    else{ 
                      echo $row['EDAD']; 
                    }?>
                </td>
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
                      <select id="opcionesSelect" name="campo_rol" class="browser-default custom-select" required> 
                        <?php
                        if($row['ROL'] == "USER"){ ?>
                           <option value="USER"> User </option>
                           <option value="ADMIN"> Admin </option> <?php
                        }
                        else{ ?>
                          <option value="ADMIN"> Admin </option>
                          <option value="USER"> User </option> <?php
                        } ?>
                      </select>
                  <?php
                    }
                    else{ 
                      echo $row['ROL']; 
                    }?>
                </td>
                
                <td> 
                  <?php 
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
                      <input type="email" value="<?php echo $row['CORREO_ELECTRONICO'] ?>" required name="campo_correo"/> 
                  <?php
                    }
                    else{ 
                      echo $row['CORREO_ELECTRONICO']; 
                    }?>
                    <input type="hidden" name="campo_idusuario" value="<?php echo $row['ID_USUARIO'] ?>"> 
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
                <a href="controlador_administrador.php?panel=usuarios#panel_herramientas"> 
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
                <a href="controlador_administrador.php?panel=usuarios#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Volver atrás </span> 
                </a>
              </div> 
              <div class="col-md-6 text-center">
                <form action="controlador_administrador.php?panel=usuarios&modificar=perfil#usuario" method="post">
                  <input type="submit" value="Modificar Perfil" class="btn btn-warning" name="boton_actualizar">
                  <input type="hidden" name="campo_idusuario" value="<?php echo $id_usuario?>">
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