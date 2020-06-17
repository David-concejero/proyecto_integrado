<div class="col-md-12"> 
  <form id="formulario" action="controlador_administrador.php?panel=usuarios#panel_herramientas" method="post">  
    <h3 id="usuario" style="text-align: center;"> Eliminar Usuario de la Base de datos </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img align="center" src="../vista/imagenes/iconos/borrar_usuario.png"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <p class="advertencia"> Ten en cuenta que al eliminar un usuario de la  
        base de datos también eliminará todo el historial de compras que haya realizado en
        el cine y sus correspondientes críticas de películas.
      <p> Recuerda esto antes de eliminar cualquier Usuario. </p>
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_eliminar_usuario">
            <thead>
            </thead>
            <tbody>
              <tr> 
                  <td>
                    <select data-live-search="true" title="Selecciona un usuario" class="form-control selectpicker" name="campo_idusuario_eliminar" required>
                    <?php
                      $select = "SELECT * FROM USUARIOS";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      while ($row = $consulta->fetch()){
                        $id_usuario = $row['ID_USUARIO'] ;
                        $nombre_usuario = $row['USUARIO']; ?>
                        <option value="<?php echo $id_usuario ?>">
                          <?php echo $nombre_usuario ?>
                        </option>
                         <?php
                      } ?>
                    </select>
                  </td>
              </tr>
            </tbody>
          </table>
      </div>

      <div class="opciones_disponibles">
        <div class="row">
          <div class="col-md-6 text-center">
                <a href="controlador_administrador.php?panel=usuarios#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Volver atrás </span> 
                </a>
              </div>  
          <div class="col-md-6 text-center">
              <input type="button" class="btn btn-danger" value="Eliminar Pelicula" id="boton_eliminar">
          </div> 
        </div>
      </div>
    </div>
    </div>
  </form>
</div>
