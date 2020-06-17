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
              <button class="btn btn-link" data-toggle="collapse" data-target="#informacionPeliculas" aria-expanded="true" aria-controls="collapseOne">
               Información Peliculas
              </button>
            </h5>
          </div>

          <!-- 
            ACORDEON VER INFORMACION DE PELICULAS. ES UN DESPLEGABLE QUE MUESTRA
            CUANTOS PELICULAS HAY REGISTRADOS EN LA PAGINA. CUALES DE ELLOS ESTAN
            EN CARTELERA Y PELICULA MAS VISTA
          -->

          <div id="informacionPeliculas" class="accordion-body collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th colspan="2"> Apartado Peliculas Registradas </th>
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
                    <th> Última pelicula añadida </th>
                    <?php
                    $select = "SELECT * FROM PELICULAS WHERE ID_PELICULA = (SELECT MAX(ID_PELICULA) FROM PELICULAS)";
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
                    <th> Añadir Pelicula </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=peliculas&accion=añadir#usuario">
                        Añadir Pelicula
                      </a> 
                    </th>
                  </tr>
                  <tr>
                    <th> Modificar Peliculas </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=peliculas&accion=modificar#panel_herramientas">
                        Modificar Peliculas
                      </a> 
                    </th>
                  </tr>
                  <tr>
                    <th> Eliminar Pelicula </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=peliculas&accion=eliminar#usuario">
                        Eliminar Pelicula
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
      <h3 align="center" > Lista Peliculas </h3>
      <p>  Listado de peliculas registrados en el sistema: </p> 
      <hr>
      <div class ="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th> * </th>
            <th> Foto </th>
            <th> Titulo </th>
          </tr>
        </thead>
        <?php
        $contador = 1;
        $select = "SELECT * FROM PELICULAS";
        $consulta = conectarBaseDatos::hacerConsulta($select);
        while ($row = $consulta->fetch()){ ?>
          <tr> 
            <th> <?php echo $contador; ?> </th>
            <th> <img width="60px" src="../vista/imagenes/imagenes_portada/<?php echo $row['FOTO_PELICULA']; ?>"> </th>
            <th> <?php echo $row['TITULO']; ?> 
            <?php
              if(isset($_GET["accion"]) && $_GET["accion"] == "modificar"){ ?>
                <form action="controlador_administrador.php?panel=peliculas&ver=perfil#usuario" method="post">
                  <span style="position: relative;top:20px;" class="separacion">
                    <input type="submit" value="Modificar" class="btn btn-warning" name="boton_modificar">
                    <input type="hidden" name="campo_idpelicula" value="<?php echo $row['ID_PELICULA']?>">
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