<div class="col-md-12"> 
  <form id="formulario" action="controlador_administrador.php?panel=tarifas#panel_herramientas" method="post">  
    <h3 id="usuario" style="text-align: center;"> Eliminar Tarifa de la Base de datos </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img align="center" src="../vista/imagenes/iconos/borrar_tarifa.png"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <p class="advertencia"> Ten en cuenta que al eliminar una tarifa del cine también
        estarás eliminando cualquier estreno que lleve asociado dicha tarifa. También sera
        eliminado cualquier que tenga esa tarifa.
      <p> Recuerda esto antes de eliminar cualquier Tarifa. </p>
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_eliminar_tarifa">
            <thead>
            </thead>
            <tbody>
              <tr> 
                  <td>
                    <select data-live-search="true" title="Selecciona un usuario" class="form-control selectpicker" name="campo_idtarifa_eliminar" required>
                    <?php
                      $select = "SELECT * FROM TARIFAS";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      while ($row = $consulta->fetch()){
                        $id_tarifa = $row['ID_TARIFA'] ;
                        $nombre_tarifa = $row['TIPO_TARIFA']; ?>
                        <option value="<?php echo $id_tarifa ?>">
                          <?php echo $nombre_tarifa ?>
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
                <a href="controlador_administrador.php?panel=tarifas#panel_herramientas"> 
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
