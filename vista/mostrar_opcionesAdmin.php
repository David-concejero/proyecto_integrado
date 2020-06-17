<!--
  La idea es que te aparezcan las tres opciones disponibles que puede hacer
  el administrador. Al pinchar sobre una de ellas, el resto desaparece y 
  tanto él como una opción para volver atrás ocupan la mitad de la pantalla 
  cada uno.
-->

<div class="col-md-12 opciones_disponibles">
  <h3 class="titulo_panelAdministracion" align="center"> Panel Administración </h3> <hr>
  <div class="row">
      <?php
      if(!isset($_GET["panel"])){ ?>
        <div class="col-md-4">
          <h3 align="center"> Control de Peliculas </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php?panel=peliculas"> 
              <img width="300px" height="150px" src="../vista/imagenes/iconos/peliculas_cine.png">
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <h3 align="center"> Control de Cartelera </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php?panel=cartelera">
              <img width="300px" height="150px" src="../vista/imagenes/iconos/cartelera_cine.png">
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <h3 align="center"> Control de Usuarios </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php?panel=usuarios">
              <img width="300px" height="150px" src="../vista/imagenes/iconos/avatar_hombre.png">
            </a>
          </div>
        </div> 

        <div class="col-md-4">
          <h3 align="center"> Control de Tarifas </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php?panel=tarifas">
              <img width="300px" height="150px" src="../vista/imagenes/iconos/icono_tarifa.png">
            </a>
          </div>
        </div> 

        <?php
      }
      if(isset($_GET["panel"]) && $_GET["panel"] == "peliculas"){ ?>
        <div class="col-md-6">
          <h3 align="center"> Control de Peliculas </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php?panel=peliculas">
              <img width="300px" height="150px" src="../vista/imagenes/iconos/peliculas_cine.png">
            </a>
          </div>
        </div>  <?php
      } 
      if(isset($_GET["panel"]) && $_GET["panel"] == "cartelera"){ ?>
        <div class="col-md-6">
          <h3 align="center"> Control de Cartelera </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php?panel=cartelera">
              <img width="300px" height="150px" src="../vista/imagenes/iconos/cartelera_cine.png">
            </a>
          </div>
        </div>  <?php
      } 
      if(isset($_GET["panel"]) && $_GET["panel"] == "usuarios"){ ?>
        <div class="col-md-6">
          <h3 align="center"> Control de Usuarios </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php?panel=usuarios">
              <img width="300px" height="150px" src="../vista/imagenes/iconos/avatar_hombre.png">
            </a>
          </div>
        </div>  <?php

        }
        if(isset($_GET["panel"]) && $_GET["panel"] == "tarifas"){ ?>
        <div class="col-md-6">
          <h3 align="center"> Control de Tarifas </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php?panel=tarifas">
              <img width="300px" height="150px" src="../vista/imagenes/iconos/icono_tarifa.png">
            </a>
          </div>
        </div>
                <?php
      } 
      if(isset($_GET["panel"])){ ?>
        <div class="col-md-6">
          <h3 align="center"> Volver atrás </h3> <hr>
          <div class="text-center">
            <a href="controlador_administrador.php">
              <img width="300px" height="150px" src="../vista/imagenes/iconos/icono_volver.png">
            </a>
          </div>
        </div> <?php
      } ?>
  </div>
  <hr>
</div>