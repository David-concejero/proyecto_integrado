<div class="col-md-12"> 
  <form id="formulario" action="controlador_administrador.php?panel=peliculas#panel_herramientas" method="post">  
    <h3 id="usuario" style="text-align: center;"> Eliminar Película de la base de datos </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img align="center" src="../vista/imagenes/iconos/borrar_pelicula.png"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <p class="advertencia"> Ten en cuenta que al eliminar una película de la base de datos, se eliminará también todos los estrenos asociados a esa película de la cartelera. También se eliminarán todas las ventas asociadas a los estrenos de dichas películas, por lo que los usuarios no podrán ver esas compras en sus historiales. </p> 
      <p> Recuerda esto antes de eliminar cualquier película. </p>
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
                      $select = "SELECT * FROM PELICULAS";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      while ($row = $consulta->fetch()){
                        $titulo_pelicula = $row['TITULO']; 
                        $id_pelicula = $row['ID_PELICULA'];
                        ?>
                        <option value="<?php echo $id_pelicula ?>">
                          <?php echo $titulo_pelicula ?>
                        </option> <?php
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
                <a href="controlador_administrador.php?panel=peliculas#panel_herramientas"> 
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
