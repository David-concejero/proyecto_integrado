<?php
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  require_once("../modelo/BaseDatos.php");

  /* Este IF hace referencia al buscador del menu */
  if(isset($_POST['campo_pelicula'])){
    $id_pelicula = $_POST['campo_pelicula'];
  }
  elseif(isset($_GET['pelicula'])){
    $id_pelicula = $_GET['pelicula'];
  }
  $grafica_votaciones = array( 
      array("y" => 0,"label" => "Puntos 1" ),
      array("y" => 0,"label" => "Puntos 2" ),
      array("y" => 0,"label" => "Puntos 3" ),
      array("y" => 0,"label" => "Puntos 4" ),
      array("y" => 0,"label" => "Puntos 5" ),
      array("y" => 0,"label" => "Puntos 6" ),
      array("y" => 0,"label" => "Puntos 7" ),
      array("y" => 0,"label" => "Puntos 8" ),
      array("y" => 0,"label" => "Puntos 9" ),
      array("y" => 0,"label" => "Puntos 10" )
    ); 
  if(isset($id_pelicula)){
    $select = "SELECT * FROM OPINIONES_PELICULAS WHERE ID_PELICULA='$id_pelicula'";
    $consulta = conectarBaseDatos::hacerConsulta($select);
    /* Generar Gráfica Votaciones */
    while ($row = $consulta->fetch()){
      switch (intval($row['VALORACION'])){
      case 1:
          $grafica_votaciones[0]["y"] = $grafica_votaciones[0]["y"] + 1;
          break;
      case 2:
          $grafica_votaciones[1]["y"] = $grafica_votaciones[1]["y"] + 1;
          break;
      case 3:
          $grafica_votaciones[2]["y"] = $grafica_votaciones[2]["y"] + 1;
          break;
      case 4:
          $grafica_votaciones[3]["y"] = $grafica_votaciones[3]["y"] + 1;
          break;
      case 5:
          $grafica_votaciones[4]["y"] = $grafica_votaciones[4]["y"] + 1;
          break;
      case 6:
          $grafica_votaciones[5]["y"] = $grafica_votaciones[5]["y"] + 1;
          break;
      case 7:
          $grafica_votaciones[6]["y"] = $grafica_votaciones[6]["y"] + 1;
        break;
      case 8:
          $grafica_votaciones[7]["y"] = $grafica_votaciones[7]["y"] + 1;
          break;
      case 9:
          $grafica_votaciones[8]["y"] = $grafica_votaciones[8]["y"] + 1;
          break;  
      case 10:
          $grafica_votaciones[9]["y"] = $grafica_votaciones[9]["y"] + 1;
          break;
      } 
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title> Perfil peliculas </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" >
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- CSS y JS -->
  <link rel="stylesheet" type="text/css" href="../vista/css/controlador_perfilPeliculas.css">
  <script type="text/javascript" src="../vista/js/autocompletar.js" ></script>
  <script type="text/javascript">
    $(document).ready(function(){
    if( $('#chartContainer').length){ // este IF es para comprobar que existe el DIV que contiene el canvas, si existe, crea la gráfica (en caso negativo, aparecen errores en plan, estas intetando añadir la gráfica a un DIV que no existe.)
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
        text: "Puntos Usuarios"
        },
        data: [{
        type: "bar",
        dataPoints: <?php echo json_encode($grafica_votaciones, JSON_NUMERIC_CHECK); ?>
        }]
      });
    chart.render();
    }
  }); 
  </script>
  <!-- jQuery UI library -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</head>
<body>
  <!-- Menu superior -->
  <nav class="navbar navbar-expand-lg ">
    <a class="navbar-brand" href="../index.php"><img class="logotipo_menu" src="../vista/imagenes/varios/logotipo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span style="width: 40px; font-size:30px" class="fa fa-bars"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="../index.php">Página principal</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="controlador_cartelera.php">Cartelera</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="controlador_tarifas.php">Tarifas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="controlador_contactos.php">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="controlador_ubicacion.php">Ubicacion</a>
          </li>
        <li>
          <form class="formulario_buscarPerfil" action="controlador_perfilPeliculas.php" method="post">
            <input type="text" name="campo_texto" id="campo_buscarTitulo" placeholder="Busca tu película" />
            <input type="hidden" name="campo_pelicula" id="almacena_id">
            <input class="boton_buscarPerfil" type="submit" name="submit" value="Buscar Películas"/>
          </form>
        </li>
    </ul>

    <ul class="nav navbar-nav navbar-right ml-auto">
          <?php
          if(!isset($_SESSION["USUARIO"])){ ?>
            <li class="nav-item">
              <a class="nav-link" href="controlador_login.php?&crearCuenta=si"><span class="fa fa-user"></span> Regístrate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="controlador_login.php"><span class="fa fa-sign-in"></span> Iniciar sesión</a>
            </li> <?php
          }
          else{ ?>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle boton_desplegable" type="button" data-toggle="dropdown"> 
                <span> <span class="fa fa-user"> <?php echo $_SESSION["USUARIO"] ?> </span>
              </span>
              <span class="caret"></span></button>
              <span class="separador_menu"> </span>
              <ul class="dropdown-menu menu_opciones">
                <?php
                if($_SESSION["ROL"] == "USER"){ ?>
                  <li><a href="controlador_usuario.php?ver=perfil">Ver datos personales</a></li>
                  <li><a href="controlador_usuario.php?ver=historial">Ver historial de compras</a></li>
                <?php
                }
                else{ ?>
                  <li><a href="controlador_administrador.php">Panel administración</a></li> <?php
                } ?>
                <div class="dropdown-divider"></div>
                <li><a id="opcion_desconectar" href="../index.php?&desconectar=si"> Desconectar</a></li>
              </ul>
            </div>
          <?php
          }
          ?>
      </ul>
    
</div></nav>

<!-- Contenido pagina -->
<div class="container">
  <div class="row">
    <?php

    if(isset($_POST['campo_pelicula'])){
      $id_pelicula = $_POST['campo_pelicula'];
      $select = "SELECT * FROM PELICULAS WHERE ID_PELICULA='$id_pelicula'";
      $consulta = conectarBaseDatos::hacerConsulta($select);
      $numero_filas_afectadas = $consulta->rowCount();
      if($numero_filas_afectadas>0){
        require_once("../vista/mostrar_fichaPelicula.php");
      }
      else{
        require_once("../vista/mostrar_errorfichaPelicula.php");
      }
    }
    elseif(isset($_GET['ver']) && $_GET['ver']=='ficha'){
      $id_pelicula = $_GET['pelicula'];
      $select = "SELECT * FROM PELICULAS WHERE ID_PELICULA='$id_pelicula'";
      $consulta = conectarBaseDatos::hacerConsulta($select);
      require_once("../vista/mostrar_fichaPelicula.php");
    }

    elseif(isset($_GET['ver']) && $_GET['ver']=='criticas'){

      /* Modificar critica */
      if(isset($_POST['boton_modificar_critica'])){
        $id_pelicula = $_GET['pelicula'];
        $id_usuario = $_SESSION['ID_USUARIO'];
        $puntuacion_usuario_modificar = $_POST['campo_puntuacion_modificar'];
        $campo_titulo_reseña = $_POST['campo_titulo_reseña'];
        $campo_texto_reseña = $_POST['campo_texto_reseña'];

        $select = "UPDATE OPINIONES_PELICULAS SET TITULO_RESEÑA='$campo_titulo_reseña', OPINION_MENSAJE='$campo_texto_reseña', VALORACION=$puntuacion_usuario_modificar WHERE ID_PELICULA=$id_pelicula AND ID_USUARIO=$id_usuario";
        
        $consulta = conectarBaseDatos::hacerConsulta($select);
      }

      /* Eliminar critica */
      if(isset($_POST['boton_borrar_critica'])){
        $id_pelicula = $_GET['pelicula'];
        $id_usuario = $_SESSION['ID_USUARIO'];
        $select = "DELETE FROM OPINIONES_PELICULAS WHERE ID_PELICULA=$id_pelicula AND ID_USUARIO=$id_usuario";
        $consulta = conectarBaseDatos::hacerConsulta($select);
      }

      /* Agregar critica */
      if(isset($_POST['boton_escribir_critica'])){
        $id_pelicula = $_GET['pelicula'];
        $id_usuario = $_SESSION['ID_USUARIO'];
        $puntuacion_usuario_añadir = $_POST['campo_puntuacion_añadir'];
        $campo_titulo_reseña = $_POST['campo_titulo_reseña'];
        $campo_texto_reseña = $_POST['campo_texto_reseña'];

        $select = "INSERT INTO OPINIONES_PELICULAS VALUES ($id_pelicula,$id_usuario,'$campo_titulo_reseña','$campo_texto_reseña','$puntuacion_usuario_añadir')";
        $consulta = conectarBaseDatos::hacerConsulta($select);
      }

      if(isset($_GET['reseña']) && $_GET['reseña']=='editar' || isset($_GET['reseña']) && $_GET['reseña']=='escribir'){
        $id_pelicula = $_GET['pelicula'];
        $id_usuario = $_SESSION['ID_USUARIO'];
        $select = "SELECT * FROM PELICULAS WHERE ID_PELICULA='$id_pelicula'";
        $consulta = conectarBaseDatos::hacerConsulta($select);
        require_once("../vista/mostrar_perfilCritica.php");
        require_once("../vista/mostrar_formularioCritica.php");
      }
      else{
        $id_pelicula = $_GET['pelicula'];
        $select = "SELECT * FROM PELICULAS WHERE ID_PELICULA='$id_pelicula'";
        $consulta = conectarBaseDatos::hacerConsulta($select);
        require_once("../vista/mostrar_perfilCritica.php");
        require_once("../vista/mostrarComentarios.php");
      }
    }

    else{
        require_once("../vista/mostrar_errorfichaPelicula.php");?>
      <footer id="pie_pagina">
        <div id="inner-footer">
          <h2 class="autor">Página realizada por David Concejero Hernández</h2>
          <div class="copyright">
          Curso 2018-20
          <p>IESPOLIGONO SUR, Sevilla </p>
          </div>
        </div>  
      </footer> <?php
    } 

    if(isset($_GET['ver']) && $_GET['ver']=='criticas'){ ?>
      <footer id="pie_pagina">
        <div id="inner-footer">
          <h2 class="autor">Página realizada por David Concejero Hernández</h2>
          <div class="copyright">
          Curso 2018-20
          <p>IESPOLIGONO SUR, Sevilla </p>
          </div>
        </div>  
      </footer> <?php
    } ?>
  </div> <?php

  if(isset($_GET['ver']) && $_GET['ver']=='ficha' || isset($_POST['campo_pelicula'])){ ?>
      <footer id="pie_pagina">
        <div id="inner-footer">
          <h2 class="autor">Página realizada por David Concejero Hernández</h2>
          <div class="copyright">
          Curso 2018-20
          <p>IESPOLIGONO SUR, Sevilla </p>
          </div>
        </div>  
      </footer> <?php
    } ?>
     
</div>
</body>
</html>