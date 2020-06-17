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
                <th> Sexo </th>
  							<th> Correo </th>
  						</tr>
  					</thead>
  					<tbody>
  						<tr> <?php
  							if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){?>
  								<form action="controlador_usuario.php?ver=perfil" method="post">  
  								<?php
  								} ?>
  							<td> 
  								<?php 
  									if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
  										<input type="text" value="<?php echo $row['NOMBRE'] ?>" required minlength="5" name="campo_nombre"/> 
  								<?php
  									}
  									else{ 
  										echo $row['NOMBRE']; 
  									}?>
  							</td>
  							<td> 
  								<?php 
  									if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
  										<input type="text" value="<?php echo $row['APELLIDOS'] ?>" required minlength="5" name="campo_apellidos"/> 
  								<?php
  									}
  									else{ 
  										echo $row['APELLIDOS']; 
  									}?>
  							</td>
  							<td> 
  								<?php 
  									if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?> 
  										<input type="text" value="<?php echo $row['DNI'] ?>" required pattern="^[0-9]{8,}[A-Z]$" title="Recuerda, 8 dígitos y un numero"  name="campo_dni"/> 
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
                    if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ 
                      $id_usuario = $row['ID_USUARIO'];
                        $select1 = "SELECT SEXO FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
                        $consulta1 = conectarBaseDatos::hacerConsulta($select1);
                        while ($row1 = $consulta1->fetch()){
                          $sexo = $row1['SEXO'];
                        } ?>
                      <select name="campo_sexo" class="form-control browser-default custom-select" required> 
                        <?php
                        echo strtoupper($sexo);
                        if(strtoupper($sexo) == "HOMBRE"){?>
                          <option value="HOMBRE"> Hombre </option>
                          <option value="MUJER"> Mujer </option> <?php
                        } 
                        else{ ?>
                          <option value="MUJER"> Mujer </option>
                          <option value="HOMBRE"> Hombre </option> <?php
                        }?>
                      </select>
                  <?php
                    }
                    else{ 
                      echo $row['SEXO']; 
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
  							</td> 
  						</tr>
  					</tbody>
  				</table>
			</div>

			<div class="opciones_disponibles">
				<div class="row">
					<?php
						if(isset($_GET['modificar']) && $_GET['modificar'] == "perfil"){ ?>
							<div class="col-md-6">
								<a href="controlador_usuario.php?ver=perfil"> 
		 							<span class="fa fa-cog icono_tuerca"> Cancelar </span> 
		 						</a>
							</div> 
							<div class="col-md-6">
								<input type="submit" name="modificar_perfil" value="Aceptar cambios" class="btn btn-success"/> 
							</div>
							<?php
						}
						else{ ?>
							<div class="col-md-12">
								<a href="controlador_usuario.php?ver=perfil&modificar=perfil"> 
									<span class="fa fa-cog icono_tuerca"> Modificar perfil </span> 
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