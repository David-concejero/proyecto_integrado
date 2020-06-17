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
              <button class="btn btn-link" data-toggle="collapse" data-target="#informacionUsuario" aria-expanded="true" aria-controls="collapseOne">
               Información Usuarios
              </button>
            </h5>
          </div>

          <!-- 
            ACORDEON VER INFORMACION DE USUARIO. ES UN DESPLEGABLE QUE MUESTRA
            CUANTOS USUARIOS HAY REGISTRADOS EN LA PAGINA. CUALES DE ELLOS SON
            USUARIOS Y CUALES ADMINISTRADORES.

            DESPUES TE DICE QUE USUARIO ES MAS HABITUAL (MAS COMPRAS REALIZADAS),
            INDEPENDIENTEMENTE DE LA CANTIDAD DE ENTRADAS QUE COMPRE Y EL QUE 
            MAYOR DINERO HA GASTADO EN EL CINE (PRECIO ENTRADAS)
          -->

          <div id="informacionUsuario" class="accordion-body collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th colspan="2"> Apartado Cuentas Usuarios </th>
                    </tr>
                  </thead>
                  <tr>
                    <th> Cuentas Totales </th>
                    <?php
                    $select = "SELECT * FROM USUARIOS";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    $numero_filas_afectadas = $consulta->rowCount();
                    ?>
                    <th class="informacion"> <?php echo $numero_filas_afectadas ?> </th>
                  </tr>
                  <tr>
                    <th> De los cuales, Administradores </th>
                    <?php
                    $select = "SELECT * FROM USUARIOS WHERE ROL='ADMIN'";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    $numero_filas_afectadas = $consulta->rowCount();
                    ?>
                    <th class="informacion"> <?php echo $numero_filas_afectadas ?> </th>
                  </tr>
                  <tr>
                    <tr>
                      <th> De los cuales, Usuarios </th>
                      <?php
                      $select = "SELECT * FROM USUARIOS WHERE ROL='USER'";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      $numero_filas_afectadas = $consulta->rowCount();
                      ?>
                      <th class="informacion"> <?php echo $numero_filas_afectadas ?> </th>
                    </tr>
                  <thead class="thead-dark">
                    <tr>
                      <th colspan="2"> Apartado Compras </th>
                    </tr>
                  </thead>
                    <tr>
                    <th> Usuario que mas veces ha visitado el cine </th>
                    <?php
                    $select = "SELECT ID_USUARIO FROM VENTA_ENTRADAS GROUP BY ID_USUARIO ORDER BY COUNT(ID_USUARIO) DESC LIMIT 1";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    while ($row = $consulta->fetch()){ 
                      $id_usuario = $row['ID_USUARIO'];
                    }
                    if(isset($id_usuario)){
                      $select = "SELECT USUARIO FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      while ($row = $consulta->fetch()){ 
                        $nombre_persona = $row['USUARIO'];
                      }  
                    }
                    ?>
                    <th class="informacion"> <?php if(isset($nombre_persona)){echo $nombre_persona; }else{echo "nadie todavía";}  ?> </th>
                  </tr>
                  <tr>
                    <th> Usuario que más entradas ha comprado </th>
                    <?php
                    $select = "SELECT ID_USUARIO FROM VENTA_ENTRADAS GROUP BY ID_USUARIO ORDER BY SUM(NUMERO_ENTRADAS) DESC LIMIT 1";
                    $consulta = conectarBaseDatos::hacerConsulta($select);
                    while ($row = $consulta->fetch()){ 
                      $id_usuario = $row['ID_USUARIO'];
                    }
                    if(isset($id_usuario)){
                      $select = "SELECT USUARIO FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
                      $consulta = conectarBaseDatos::hacerConsulta($select);
                      while ($row = $consulta->fetch()){ 
                        $nombre_persona = $row['USUARIO'];
                      }
                    }
                    ?>
                    <th class="informacion"> <?php if(isset($nombre_persona)){echo $nombre_persona; }else{echo "nadie todavía";}?> </th>
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
                    <th> Añadir Usuario </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=usuarios&accion=añadir#usuario">
                        Añadir Usuario
                      </a> 
                    </th>
                  </tr>
                  <tr>
                    <th> Modificar Usuarios </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=usuarios&accion=modificar#panel_herramientas">
                        Modificar Usuario
                      </a> 
                    </th>
                  </tr>
                  <tr>
                    <th> Eliminar Usuarios </th>
                    <th> 
                      <a href="controlador_administrador.php?panel=usuarios&accion=eliminar#usuario">
                        Eliminar Usuario
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
      <h3 align="center" > Lista Usuarios </h3>
      <p>  Listado de usuarios registrados en el sistema: </p> 
      <hr>
      <div class="table-wrapper-scroll-y my-custom-scrollbar">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th> * </th>
            <th> Usuario </th>
            <th> Rol </th>
          </tr>
        </thead>
        <?php
        $contador = 1;
        $select = "SELECT * FROM USUARIOS";
        $consulta = conectarBaseDatos::hacerConsulta($select);
        while ($row = $consulta->fetch()){ ?>
          <tr> 
            <th> <?php echo $contador; ?> </th>
            <th> <?php echo $row['USUARIO']; ?> </th>
            <th> <?php echo $row['ROL']; ?> 
            <?php
              if(isset($_GET["accion"]) && $_GET["accion"] == "modificar"){ ?>
                <form action="controlador_administrador.php?panel=usuarios&ver=perfil#usuario" method="post">
                  <span style="position: relative;top:4px;" class="separacion">
                    <input type="submit" value="Modificar" class="btn btn-warning" name="boton_modificar">
                    <input type="hidden" name="campo_idusuario" value="<?php echo $row['ID_USUARIO']?>">
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