<?php
  session_start();
  require_once("../modelo/BaseDatos.php");
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title> Tarifas </title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" >
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <!-- CSS y JS -->
  <link rel="stylesheet" type="text/css" href="../vista/css/controlador_tarifas.css">
  <script type="text/javascript" src="../vista/js/autocompletar.js" ></script>
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
  
<!-- Carousel -->
  <div class="container">
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel" style="width: auto">
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-2" data-slide-to="1"></li>
      <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="view">
             <a style="color: white; text-decoration: none" href="controlador_cartelera.php">
            <img class="d-block w-100 imagen_carousel1" src="../vista/imagenes/varios/banner_joker.jpg"
              alt="First slide"> </a>
            <div class="mask rgba-black-light"></div>
          </div>
         
        </div>
        <div class="carousel-item">
          <!--Mask color-->
          <div class="view">
            <a style="color: white; text-decoration: none" href="controlador_cartelera.php">
            <img class="d-block w-100 imagen_carousel2" src="../vista/imagenes/varios/banner_1917.jpg"
              alt="First slide"> </a>
          </div>
        </div>
        <div class="carousel-item">
          <!--Mask color-->
          <div class="view">
            <a style="color: white; text-decoration: none" href="controlador_cartelera.php">
            <img class="d-block w-100 imagen_carousel3" src="../vista/imagenes/varios/banner_it2.jpg"
              alt="First slide"> </a>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>

<!-- Contenido pagina -->
  <div class="fondo_tarifas">
    <h1 class="section-title"><span class="text">TARIFAS</span></h1>
      <?php
        $select = "SELECT * FROM TARIFAS";
        $consulta = conectarBaseDatos::hacerConsulta($select);
        require_once("../vista/mostrar_tarifas.php"); 
      ?>
  </div>
  <footer id="pie_pagina">
  <div id="inner-footer">
    <h2 class="autor">Página realizada por David Concejero Hernández</h2>
    <div class="copyright">
      Curso 2018-20
      <p>IESPOLIGONO SUR, Sevilla </p>
    </div>
  </div>
</footer>
</div>
</body>
</html>