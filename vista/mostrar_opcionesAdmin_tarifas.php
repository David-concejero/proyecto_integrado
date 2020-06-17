<div class="col-md-12">
  <div class="row">

    <div class="col-md-6">
      <h3 id="panel_herramientas" align="center"> Herramientas </h3>
      <p> Bienvenido administrador al panel de tarifas, tienes a tu disposición
      una serie de herramientas que te permitirán administrar la página de la forma 
      más simple posible. Aquí abajo tienes un listado de ellas: </p>

      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0 text-center">
              <button class="btn btn-link" data-toggle="collapse" data-target="#informacionTarifas" aria-expanded="true" aria-controls="collapseOne">
               Información Tarifas
              </button>
            </h5>
          </div>

          <!-- 
            ACORDEON VER INFORMACION DE TARIFAS. ES UN DESPLEGABLE QUE MUESTRA
            CUANTOS TARIFAS HAY ASIGNADAS EN LA PAGINA. SU PRECIO.
          -->

          <div id="informacionTarifas" class="accordion-body collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th colspan="2"> Información Tarifas </th>
                    </tr>
                  </thead>
                  <tr>
                    <th> Tarifas Totales </th>
                    <?php
                    $select = "SELECT * FROM TARIFAS";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    $numero_filas_afectadas = $consulta->rowCount();
                    ?>
                    <th class="informacion"> <?php echo $numero_filas_afectadas ?> </th>
                  </tr>
                  <tr>
                    <th> De las cuales, la más aplicada </th>
                    <?php
                    $select = "SELECT ID_TARIFA FROM CARTELERA GROUP BY ID_TARIFA ORDER BY COUNT(ID_TARIFA) DESC LIMIT 1";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    while ($row = $consulta->fetch()){ 
                      $id_tarifa = $row['ID_TARIFA'];
                    }
                    $select1 = "SELECT * FROM TARIFAS WHERE ID_TARIFA=$id_tarifa";
                    $consulta1 = conectarBaseDatos::hacerConsulta($select1);
                    while ($row1 = $consulta1->fetch()){ 
                      $nombre_tarifa = $row1['TIPO_TARIFA'];
                    }
                    ?>
                    <th class="informacion"> <?php echo $nombre_tarifa ?> </th>
                  </tr>
                  <tr>
                    <tr>
                      <th> De los cuales, la más cara </th>
                      <?php
                      $select3 = "SELECT * FROM TARIFAS WHERE PRECIO = (SELECT MAX(PRECIO) FROM TARIFAS)";
                      $consulta3 = conectarBaseDatos::hacerConsulta($select3);
                      while ($row3 = $consulta3->fetch()){ 
                      $nombre_tarifa = $row3['TIPO_TARIFA'];
                      }
                      ?>
                      <th class="informacion"> <?php echo $nombre_tarifa ?> </th>
                    </tr>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 
            ACORDEON HERRAMIENTAS ADMINISTRADOR
          -->

      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0 text-center">
              <button class="btn btn-link" data-toggle="collapse" data-target="#herramientasAdmin" aria-expanded="true" aria-controls="collapseOne">
              Herramientas administrador
              </button>
            </h5>
          </div>
          <div id="herramientasAdmin" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th colspan="2"> Herramientas disponibles </th>
                    </tr>
                  </thead>
                  <tr>
                    <th> Añadir Tarifa </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=tarifas&accion=añadir#usuario">
                        Añadir Tarifa
                      </a> 
                    </th>
                  </tr>
                  <tr>
                    <th> Modificar Tarifa </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=tarifas&accion=modificar#panel_herramientas">
                        Modificar Tarifa
                      </a> 
                    </th>
                  </tr>
                  <tr>
                    <th> Eliminar Tarifa </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=tarifas&accion=eliminar#usuario">
                        Eliminar Tarifa
                      </a> 
                    </th>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>

    <div class="col-md-6">
      <h3 align="center" > Lista Tarifas </h3>
      <p>  Listado de tarifas registrados en el sistema: </p> 
      <hr>
      <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th> * </th>
            <th> Nombre </th>
            <th> Precio </th>
          </tr>
        </thead>
        <?php
        $contador = 1;
        $select = "SELECT * FROM TARIFAS";
        $consulta = conectarBaseDatos::hacerConsulta($select);
        while ($row = $consulta->fetch()){ ?>
          <tr> 
            <th> <?php echo $contador; ?> </th>
            <th> <?php echo $row['TIPO_TARIFA']; ?> </th>
            <th> <?php echo $row['PRECIO']; ?> 
            <?php
              if(isset($_GET["accion"]) && $_GET["accion"] == "modificar"){ ?>
                <form action="controlador_administrador.php?panel=tarifas&ver=perfil#usuario" method="post">
                  <span style="position: relative;top:4px;" class="separacion">
                    <input type="submit" value="Modificar" class="btn btn-warning" name="boton_modificar">
                    <input type="hidden" name="campo_idtarifa" value="<?php echo $row['ID_TARIFA']?>">
                  </span>
                </form>  <?php
              } ?>
              </th>
          </tr> <?php $contador = $contador + 1;
        } ?>
      </table>
    </div>
    </div>
  </div>
</div>