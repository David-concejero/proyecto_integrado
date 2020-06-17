<div class="col-md-12"> 
  <form id="formulario" action="controlador_administrador.php?panel=cartelera#panel_herramientas" method="post">  
    <h3 id="usuario" style="text-align: center;"> Eliminar Película de la Cartelera </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img align="center" src="../vista/imagenes/iconos/borrar_cartelera.png"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <p class="advertencia"> Ten en cuenta que al eliminar una película de la  
        cartelera se eliminará también del historial de compras del usuario. Si
        quieres eliminar una sesión en concreto tienes la opción de modificar a tu
        disposición.
      <p> Recuerda esto antes de eliminar cualquier película de la cartelera. </p>
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_eliminar_pelicula">
            <thead>
              <tr>
                <th> Pelicula </th>
              </tr>
            </thead>
            <tbody>
              <tr> 
                  <td>
                    <select data-live-search="true" title="Selecciona una pelicula" class="form-control selectpicker" name="campo_idpelicula_eliminar" required>
                    <?php
                      $select = "SELECT DISTINCT ID_PELICULA FROM CARTELERA";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      while ($row = $consulta->fetch()){ 
                        $id_pelicula = $row['ID_PELICULA']; 
                        $select2 = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
                        $consulta2 = conectarBaseDatos::hacerConsulta($select2);
                        while ($row2 = $consulta2->fetch()){ 
                          $titulo_pelicula = $row2['TITULO']; 
                        } ?>
                        <option value="<?php echo $id_pelicula ?>">
                          <?php echo $titulo_pelicula ?>
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
                <a href="controlador_administrador.php?panel=cartelera#panel_herramientas"> 
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
