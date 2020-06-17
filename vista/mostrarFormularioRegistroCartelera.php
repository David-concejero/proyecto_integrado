<div class="col-md-12"> 
  <form action="controlador_administrador.php?panel=cartelera#panel_herramientas" method="post">  
    <h3 id="usuario" style="text-align: center;"> Agregar Película a Cartelera </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img align="center" src="../vista/imagenes/iconos/cartelera_creacion.png"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_registro_pelicartelera">
            <thead>
              <tr>
                <th> Pelicula </th>
                <th> Sala </th>
                <th> Tarifa </th>
                <th> Dia </th>
                <th> Hora </th>
              </tr>
            </thead>
            <tbody>
              <tr> 
                  <td>
                    <select data-live-search="true" title="Selecciona una pelicula" class="form-control selectpicker" name="select_peliCartelera" required>
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

                  <td>
                      <select data-live-search="true" title="Selecciona una sala" class="form-control selectpicker" name="select_salaCartelera" required>
                    <?php
                      $select = "SELECT * FROM SALAS";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      while ($row = $consulta->fetch()){
                        $nombre_sala = $row['NOMBRE_SALA']; 
                        $id_sala = $row['ID_SALA'];
                        ?>
                        <option value="<?php echo $id_sala ?>">
                          <?php echo $nombre_sala ?>
                        </option> <?php
                      } ?>
                    </select>
                  </td>

                  <td>
                      <select data-live-search="true" title="Selecciona una tarifa" class="form-control selectpicker" name="select_tarifaCartelera" required>
                    <?php
                      $select = "SELECT * FROM TARIFAS";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      while ($row = $consulta->fetch()){
                        $nombre_tarifa = $row['TIPO_TARIFA']; 
                        $id_tarifa = $row['ID_TARIFA'];
                        ?>
                        <option value="<?php echo $id_tarifa ?>">
                          <?php echo $nombre_tarifa ?>
                        </option> <?php
                      } ?>
                    </select>
                  </td>

                  <td>
                    <select name="campo_dia_añadir[]" class="selectpicker" multiple required multiple data-live-search="true">
                      <option value="2020-03-16">Lunes 16</option>
                      <option value="2020-03-17">Martes 17</option>
                      <option value="2020-03-18">Miercoles 18</option>
                      <option value="2020-03-19">Jueves 19</option>
                      <option value="2020-03-20">Viernes 20</option>
                      <option value="2020-03-21">Sábado 21</option>
                      <option value="2020-03-22">Domingo 22</option>
                    </select>
                  </td>

                  <td>
                      <input type="time" required name="campo_hora_añadir">
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
              <input type="submit" value="Añadir Pelicula" class="btn btn-warning" name="boton_añadir_pelicartelera">
          </div> 
        </div>
      </div>
    </div>
    </div>
  </form>
</div>
