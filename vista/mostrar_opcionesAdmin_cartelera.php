<div class="col-md-12">
  <div class="row">

    <div class="col-md-6">
      <h3 id="panel_herramientas" align="center"> Herramientas </h3>
      <p> Bienvenido administrador al panel de usuarios, tienes a tu disposición
      una serie de herramientas que te permitirán administrar la página de la forma 
      más simple posible. Aquí abajo tienes un listado de ellas: </p>

      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0 text-center">
              <button class="btn btn-link" data-toggle="collapse" data-target="#informacionCartelera" aria-expanded="true" aria-controls="collapseOne">
               Información Cartelera
              </button>
            </h5>
          </div>

          <!-- 
            ACORDEON VER INFORMACION DE CARTELERA. ES UN DESPLEGABLE QUE MUESTRA
            CUANTAS PELICULAS HAY EN CARTELERA E INFORMACION ÚTIL PARA EL ADMINISTRADOR
          -->

          <div id="informacionCartelera" class="accordion-body collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th colspan="2"> Apartado Cartelera Actual </th>
                    </tr>
                  </thead>
                  <tr>
                    <th> Peliculas Totales </th>
                    <?php
                    $select = "SELECT * FROM PELICULAS";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    $numero_filas_afectadas = $consulta->rowCount();
                    ?>
                    <th class="informacion"> <?php echo $numero_filas_afectadas ?> </th>
                  </tr>
                  <tr>
                    <th> De las cuales, en cartelera </th>
                    <?php
                    $select = "SELECT DISTINCT ID_PELICULA FROM CARTELERA";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    $numero_filas_afectadas = $consulta->rowCount();
                    ?>
                    <th class="informacion"> <?php echo $numero_filas_afectadas ?> </th>
                  </tr>
                  <tr>
                    <th> Película mas estrenada </th>
                    <?php
                    $select = "SELECT ID_PELICULA FROM CARTELERA GROUP BY ID_PELICULA ORDER BY COUNT(ID_PELICULA) DESC LIMIT 1";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    while ($row = $consulta->fetch()){ 
                      $id_pelicula = $row['ID_PELICULA'];
                    }
                    $select = "SELECT TITULO FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    while ($row = $consulta->fetch()){ 
                      $titulo_pelicula = $row['TITULO'];
                    }
                    ?>
                    <th class="informacion"> <?php echo $titulo_pelicula ?> </th>
                  </tr> 
                  <tr>
                    <th> Película mas popular entre usuarios </th>
                    <?php
                    $select = "SELECT ID_PELICULA FROM VENTA_ENTRADAS GROUP BY ID_PELICULA ORDER BY COUNT(ID_PELICULA) DESC LIMIT 1";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    while ($row = $consulta->fetch()){ 
                      $id_pelicula = $row['ID_PELICULA'];
                    }
                    $select = "SELECT TITULO FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    while ($row = $consulta->fetch()){ 
                      $titulo_pelicula = $row['TITULO'];
                    }
                    ?>
                    <th class="informacion"> <?php echo $titulo_pelicula ?> </th>
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
                    <th> Añadir a cartelera </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=cartelera&accion=añadir#usuario">
                        Añadir Película a cartelera
                      </a> 
                    </th>
                  </tr>
                  <tr>
                    <th> Modificar Cartelera </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=cartelera&accion=modificar#panel_herramientas">
                        Modificar Cartelera
                      </a> 
                    </th>
                  </tr>
                  <tr>
                    <th> Eliminar Pelicula de la Cartelera </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=cartelera&accion=eliminar#usuario">
                        Eliminar pelicula
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
      <h3 align="center"> Dias Cartelera </h3>
      <p>  Listado de dias elegidos para el estreno de las peliculas en la cartelera: </p> 
      <hr>
      <div class ="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th> * </th>
            <th> Dia </th>
            <th> Peliculas programadas </th>
          </tr>
        </thead>
        <?php
        $contador = 1;
        $select = "SELECT DISTINCT DIA FROM CARTELERA ORDER BY DIA ASC";
        $consulta = conectarBaseDatos::hacerConsulta($select);
        while ($row = $consulta->fetch()){ ?>
          <tr> 
            <th> <?php echo $contador; ?> </th>
            <th> <?php echo $row['DIA'] ?></th>
            <?php
              $dia_actual = $row['DIA'];
              $select2 = "SELECT DISTINCT ID_PELICULA FROM CARTELERA WHERE DIA='$dia_actual'"; // CUANTAS PELICULAS SE ESTRENAN ESE DIA
              $consulta2 = conectarBaseDatos::hacerConsulta($select2);
              $numero_filas_afectadas = $consulta2->rowCount(); ?>
            <th> <?php echo $numero_filas_afectadas ?>
            <?php
              if(isset($_GET["accion"]) && $_GET["accion"] == "modificar"){ ?>
                <form action="controlador_administrador.php?panel=cartelera&ver=perfil#usuario" method="post">
                  <span style="position: relative;top:5px;" class="separacion">
                    <input type="submit" value="Modificar" class="btn btn-warning" name="boton_modificar">
                    <input type="hidden" name="campo_diacartelera" value="<?php echo $row['DIA']?>">
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