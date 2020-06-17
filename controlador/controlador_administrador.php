<?php
  session_start();
  if(!isset($_SESSION["ROL"]) || $_SESSION["ROL"] != "ADMIN"){
    header('Location: /proyecto_integrado/index.php');
    die();
  }
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
  <title> Perfil de Administrador </title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <!-- CSS y JS -->
  <link rel="stylesheet" type="text/css" href="../vista/css/controlador_administrador.css">
  <script type="text/javascript" src="../vista/js/autocompletar.js" ></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="../vista/js/confirmarAccion.js"></script>

  <!-- jQuery UI library -->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 

<script type="text/javascript">

  $(document).ready(function(){
  $('.seleccionarGenero').selectpicker({
      maxOptions:3
  });
}); 

  
</script>

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

<!-- Opciones Administrador (aparecen siempre arriba) -->
<div class="container">
  <div class="row opciones_administracion">
    <?php require_once("../vista/mostrar_opcionesAdmin.php"); ?>
  </div>

  <!-- Dependiendo de que opcion eliga, se carga un contenido u otro -->
  <div class="row opcion_elegida contenido">
    <?php


    // PELICULAS
    //
    //
    //
    //
    //
    //
    //
    //
    // PANEL DE PELICULAS, MUESTRA INFO DE LAS PELICULAS

      if(isset($_GET["panel"]) && $_GET["panel"] == "peliculas"){
        $lista_generos = ['Thriller','Guerra','Bélico','Fantástico','Terror','Superhéroes','Acción','Drogas','Crimen','Drama','Intriga','Comedia','Remake','Monstruos'];
        //echo "has pulsado modificar peliculas";
        if(isset($_POST['boton_añadir'])){ //modificar esto
          /* CODIGO QUE SUBE UN ARCHIVO SUBIDO POR EL USUARIO Y LO MUEVE A LA CARPETA
          DE IMAGENES. Si existe dos veces la misma imagen en el directorio de imagenes,
          no se inserta la pelicula OJO. APARECE UN PEQUEÑO MENSAJE QUE TE ADVIERTE DE
          ELLO */
          $target_dir = "../vista/imagenes/imagenes_portada/";
          $target_file = $target_dir . basename($_FILES["campo_fotopelicula"]["name"]);
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          $status = 1;

          if (file_exists($target_file)){ ?>
            <div class="col-md-12 alert alert-warning alert-dismissible fade show" role="alert">
              <strong>ERROR</strong> La imagen que has utilizado ya ha sido introducida o pertenece a otra película. No se ha introducido la película
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <?php
            $status = 0;
          } 
          if($status==1){
            move_uploaded_file($_FILES["campo_fotopelicula"]["tmp_name"], $target_file);
            chmod($target_file, 0666); // cambio de permisos al fichero subido.
            $titulo = $_POST['campo_titulo'];
            $año = $_POST['campo_año'];
            $pais = $_POST["campo_pais"];
            $campo_genero = $_POST["campo_genero"];
            $concat = "";
            for ($i=0; $i < sizeof($campo_genero) ; $i++) { 
              $concat = $concat . $campo_genero[$i] . ",";
            }
            $genero = substr($concat,0,-1);
            $duracion = $_POST["campo_duracion"];
            $campo_calificacion = $_POST["campo_calificacion"];
            $calificacion = "+".$campo_calificacion;
            $fecha_formulario = $_POST["campo_fechaestreno"];
            $nombre_foto = $_FILES["campo_fotopelicula"]["name"];
            $sinopsis = $_POST['campo_sinopsis'];
            $trailer = $_POST['campo_trailer'];
            $select = "INSERT INTO PELICULAS VALUES(NULL,'$titulo',$año,'$pais','$genero',$duracion,'$calificacion','$fecha_formulario','$nombre_foto','$sinopsis','$trailer')";
            $consulta = conectarBaseDatos::hacerConsulta($select);
            
          }
        }
        if(isset($_POST['modificar_perfil'])){ //modificar esto
          $id_pelicula = $_POST['campo_idpelicula'];
          $titulo = $_POST['campo_titulo'];
          $select = "SELECT * FROM PELICULAS WHERE TITULO = '$titulo' AND ID_PELICULA != $id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $numero_filas_afectadas = $consulta->rowCount();
          if($numero_filas_afectadas <= 0){
            $campo_genero = $_POST['campo_genero'];
            $concat = "";
            for ($i=0; $i < sizeof($campo_genero) ; $i++) { 
              $concat = $concat . $campo_genero[$i] . ",";
            }
            $genero = substr($concat,0,-1);
            $año = $_POST['campo_año'];
            $pais = $_POST["campo_pais"];
            $duracion = $_POST["campo_duracion"];
            $campo_calificacion = $_POST["campo_calificacion"];
            $calificacion = "+".$campo_calificacion;
            $fecha_formulario = $_POST["campo_fechaestreno"];
            $sinopsis = $_POST['campo_sinopsis'];
            $id_pelicula = $_POST['campo_idpelicula'];
            $trailer = $_POST['campo_trailer'];
            $select = "UPDATE PELICULAS SET TITULO='$titulo', AÑO=$año,PAIS='$pais',GENERO='$genero',DURACION=$duracion,CALIFICACION='$calificacion', FECHA_ESTRENO='$fecha_formulario', SINOPSIS='$sinopsis', TRAILER='$trailer' WHERE ID_PELICULA=$id_pelicula;";
            $consulta = conectarBaseDatos::hacerConsulta($select);
          }
        }

        // Borrar pelicula, varia un poco porque la accion de 
        // enviar el formulario lo hago con js. Borra también
        // la imagen de portada con unlink
        if(isset($_POST['campo_idpelicula_eliminar'])){
          $id_pelicula = $_POST['campo_idpelicula_eliminar'];

          $select = "SELECT * FROM PELICULAS WHERE ID_PELICULA = $id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          while ($row = $consulta->fetch()){
            $titulo_foto = $row['FOTO_PELICULA']; 
          }
          $ruta_base = "../vista/imagenes/imagenes_portada/";
          $ruta_completa = $ruta_base . $titulo_foto;
          unlink($ruta_completa);
          $select = "DELETE FROM OPINIONES_PELICULAS WHERE ID_PELICULA=$id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $select = "DELETE FROM CARTELERA WHERE ID_PELICULA=$id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $select = "DELETE FROM VENTA_ENTRADAS WHERE ID_PELICULA=$id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $select = "DELETE FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select);
        }

        if(isset($_GET["ver"]) && $_GET["ver"] == "perfil"){
          $id_pelicula = $_POST['campo_idpelicula'];
          $select = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select); 
          require_once("../vista/mostrarPerfilPeliculas_admin.php"); // aki
        }
        elseif(isset($_GET["accion"]) && $_GET["accion"] == "añadir"){
          require_once("../vista/mostrarFormularioPeliculas_admin.php");
        }
        elseif(isset($_GET["accion"]) && $_GET["accion"] == "eliminar"){
          require_once("../vista/mostrarFormularioEliminarPeliculas.php");
        }
        elseif(isset($_GET["modificar"]) && $_GET["modificar"] == "perfil"){
          $id_pelicula = $_POST['campo_idpelicula'];
          $select = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select); 
          require_once("../vista/mostrarPerfilPeliculas_admin.php");
        }
        else{
          require_once("../vista/mostrar_opcionesAdmin_peliculas.php");
        }
      }

    // CARTELERA
    //
    //
    //
    //
    //
    //
    //
    //
    // PANEL DE CARTELERA, MUESTRA INFO DE LA CARTELERA
      elseif(isset($_GET["panel"]) && $_GET["panel"] == "cartelera"){
       
        

        // Borrar pelicula, varia un poco porque la accion de 
        // enviar el formulario lo hago con js. Borra también
        // la imagen de portada con unlink
        if(isset($_POST['campo_idpelicula_eliminar'])){
          $id_pelicula = $_POST['campo_idpelicula_eliminar'];
          $select = "DELETE FROM CARTELERA WHERE ID_PELICULA=$id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $select = "DELETE FROM VENTA_ENTRADAS WHERE ID_PELICULA=$id_pelicula";
          $consulta = conectarBaseDatos::hacerConsulta($select);
        }

        /* aqui la idea es que al darle al boton de modificar, aparezcan
        los input y un boton de confirmar. Despues todo sigue.
        */
        if(isset($_POST['boton_ir_estreno'])){
            $dia_cartelera = $_POST['campo_dia'];
            $pelicula_elegida = $_POST['campo_pelicula'];
            //echo $dia_cartelera . " " . $pelicula_elegida;
            $select = "SELECT DISTINCT ID_SALA FROM CARTELERA WHERE DIA='$dia_cartelera' AND ID_PELICULA=$pelicula_elegida ORDER BY ID_SALA ASC";
            $consulta = conectarBaseDatos::hacerConsulta($select);
            require_once("../vista/mostrarPerfilCarteleraPelicula_admin.php");
        }

        elseif(isset($_POST['modificar_campo']) || isset($_POST['eliminar_campo']) ){
            $hora_cartelera = $_POST['campo_horacartelera'];
            $sala_cartelera = $_POST['campo_salacartelera'];
            $dia_cartelera = $_POST['campo_dia'];
            $pelicula_elegida = $_POST['campo_pelicula'];
            //echo $dia_cartelera . " " . $pelicula_elegida;
            $select = "SELECT DISTINCT ID_SALA FROM CARTELERA WHERE DIA='$dia_cartelera' AND ID_PELICULA=$pelicula_elegida ORDER BY ID_SALA ASC";
            $consulta = conectarBaseDatos::hacerConsulta($select);
            require_once("../vista/mostrarPerfilCarteleraPelicula_admin.php");
        }

        elseif(isset($_POST['confirmar_modificar_campo'])){
          $hora_cartelera = $_POST['campo_horacartelera'];
          $sala_cartelera = $_POST['campo_salacartelera'];
          $dia_cartelera = $_POST['campo_dia'];
          $pelicula_elegida = $_POST['campo_pelicula'];
          
          $sala = $_POST['campo_sala_modificar'];
          $tarifa = $_POST['campo_tarifa_modificar'];
          $dia = $_POST['campo_dia_modificar'];
          $hora = $_POST['campo_hora_modificar'];
          $select = "UPDATE CARTELERA SET DIA='$dia', HORA='$hora', ID_SALA=$sala, ID_TARIFA=$tarifa WHERE ID_PELICULA=$pelicula_elegida AND DIA='$dia_cartelera' AND HORA='$hora_cartelera' AND ID_SALA=$sala_cartelera ";
          $consulta = conectarBaseDatos::hacerConsulta($select);

          $numero_filas_afectadas = $consulta->rowCount();
          if($numero_filas_afectadas > 0){
            $mensaje = "Se ha modificado correctamente el estreno";
            require_once("../vista/mostrarMensajeConfirmacion.php");  
          }
          else{
            $mensaje = "No se ha modificado el estreno, causa conflicto con otros estrenos. Comprueba que esa película no se estrena el mismo dia, en la misma sala y a la misma hora que otras películas.";
            require_once("../vista/mostrarMensajeError.php");  
          }

          $select = "SELECT DISTINCT ID_SALA FROM CARTELERA WHERE DIA='$dia_cartelera' AND ID_PELICULA=$pelicula_elegida ORDER BY ID_SALA ASC";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          require_once("../vista/mostrarPerfilCarteleraPelicula_admin.php"); 
        }

        elseif(isset($_POST['confirmar_eliminar_campo'])){
          $hora_cartelera = $_POST['campo_horacartelera'];
          $sala_cartelera = $_POST['campo_salacartelera'];
          $dia_cartelera = $_POST['campo_dia'];
          $pelicula_elegida = $_POST['campo_pelicula'];
          $select = "DELETE FROM CARTELERA WHERE ID_PELICULA=$pelicula_elegida AND DIA='$dia_cartelera' AND HORA='$hora_cartelera' AND ID_SALA=$sala_cartelera";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $numero_filas_afectadas = $consulta->rowCount();

          $select = "SELECT DISTINCT ID_SALA FROM CARTELERA WHERE DIA='$dia_cartelera' AND ID_PELICULA=$pelicula_elegida ORDER BY ID_SALA ASC";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          // alerta confirmación-error eliminación del estreno
          if($numero_filas_afectadas > 0){
            $mensaje = "Se ha borrado correctamente el estreno";
            require_once("../vista/mostrarMensajeConfirmacion.php");  
          }
          else{
            $mensaje = "No se ha llegado a eliminar nada, cuidado con recargar la página, se quedan datos en la cache y puede que estes intentando borrar un estreno que no exista.";
            require_once("../vista/mostrarMensajeError.php");  
          }
          require_once("../vista/mostrarPerfilCarteleraPelicula_admin.php");  
        }

        // Formulario añadir peli a cartelera. Ejecuta los Inserts
        elseif(isset($_POST['boton_añadir_pelicartelera'])){
          $id_pelicula = $_POST['select_peliCartelera'];
          $id_sala = $_POST['select_salaCartelera'];
          $id_tarifa = $_POST['select_tarifaCartelera'];
          $fecha = $_POST['campo_dia_añadir'];
          $hora = $_POST['campo_hora_añadir'];
          $status = 0;

          for ($i=0; $i < sizeof($fecha) ; $i++) { 
            $select = "SELECT * FROM CARTELERA WHERE DIA='$fecha[$i]' AND HORA='$hora' AND ID_SALA=$id_sala";
            $consulta = conectarBaseDatos::hacerConsulta($select); 
            $numero_filas_afectadas = $consulta->rowCount();
            if($numero_filas_afectadas>0){
              $status = 1;
            }
          }

          if($status == 1){
            $mensaje = "No se ha introducido la película, causa conflicto con otros estrenos. Comprueba que la pelicula que has introducido no se estrena el mismo dia, en la misma sala y en la misma hora que otras películas";
            require_once("../vista/mostrarMensajeError.php");  
          }
          else{
            $mensaje = "Se ha introducido correctamente.";
            require_once("../vista/mostrarMensajeConfirmacion.php");  

            for ($i=0; $i < sizeof($fecha) ; $i++) { 
              $select = "INSERT INTO CARTELERA VALUES ($id_pelicula,$id_sala,$id_tarifa,'$fecha[$i]','$hora')";
              $consulta = conectarBaseDatos::hacerConsulta($select); 
            }
          }
          require_once("../vista/mostrar_opcionesAdmin_cartelera.php");
        }

        elseif(isset($_GET["ver"]) && $_GET["ver"] == "perfil"){
          $dia_cartelera = $_POST['campo_diacartelera'];
          $select = "SELECT DISTINCT ID_PELICULA FROM CARTELERA WHERE DIA='$dia_cartelera'";
          $consulta = conectarBaseDatos::hacerConsulta($select); 
          require_once("../vista/mostrarPerfilCartelera_admin.php");
        }

        elseif(isset($_GET["accion"]) && $_GET["accion"] == "añadir"){
          //Pinchas en el enlace de añadir pelis a cartelera y te muestra el formulario
          require_once("../vista/mostrarFormularioRegistroCartelera.php");
        }

        elseif(isset($_GET["accion"]) && $_GET["accion"] == "eliminar"){
          require_once("../vista/mostrarFormularioEliminarCartelera.php");
        }

    
        else{
          require_once("../vista/mostrar_opcionesAdmin_cartelera.php");
        }

      }

    // USUARIOS
    //
    //
    //
    //
    //
    //
    //
    //
    // PANEL DE USUARIOS, MUESTRA INFO DE LOS USUARIOS

      // OPCIONES POSIBLES (AÑADIR O MODIFICAR USUARIOS)
      elseif(isset($_GET["panel"]) && $_GET["panel"] == "usuarios"){  
        if(isset($_POST['boton_añadir'])){
          $usuario = $_POST['campo_usuario'];
          $rol = $_POST['campo_rol'];
          $nombre = $_POST["campo_nombre"];
          $apellidos = $_POST["campo_apellidos"];
          $dni = $_POST["campo_dni"];
          $edad = $_POST["campo_edad"];
          $correo = $_POST["campo_correo"];
          $contraseña = md5($_POST["campo_contraseña"]);
          $sexo = $_POST['campo_sexo'];
          $select = "INSERT INTO USUARIOS VALUES(NULL,'$usuario','$rol','$nombre','$apellidos','$dni',$edad,'$correo','$contraseña','$sexo')";
          $consulta = conectarBaseDatos::hacerConsulta($select);
        }
        if(isset($_POST['modificar_perfil'])){
          $usuario = $_POST['campo_usuario'];
          $nombre = $_POST["campo_nombre"];
          $apellidos = $_POST["campo_apellidos"];
          $dni = $_POST["campo_dni"];
          $edad = $_POST["campo_edad"];
          $correo = $_POST["campo_correo"];
          $id_usuario = $_POST['campo_idusuario'];
          $rol = $_POST['campo_rol'];
          $select = "UPDATE USUARIOS SET USUARIO='$usuario', NOMBRE='$nombre',APELLIDOS='$apellidos',DNI='$dni',EDAD='$edad',CORREO_ELECTRONICO='$correo', ROL='$rol' WHERE ID_USUARIO=$id_usuario;";
          $consulta = conectarBaseDatos::hacerConsulta($select);
        }

        if(isset($_POST['campo_idusuario_eliminar'])){
          $id_usuario = $_POST['campo_idusuario_eliminar'];
          $select = "DELETE FROM VENTA_ENTRADAS WHERE ID_USUARIO=$id_usuario";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $select = "DELETE FROM OPINIONES_PELICULAS WHERE ID_USUARIO=$id_usuario";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $select = "DELETE FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
          $consulta = conectarBaseDatos::hacerConsulta($select);
        }

        if(isset($_GET["ver"]) && $_GET["ver"] == "perfil"){
          $id_usuario = $_POST['campo_idusuario'];
          $select = "SELECT * FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
          $consulta = conectarBaseDatos::hacerConsulta($select); 
          require_once("../vista/mostrarPerfilUsuario_admin.php");
        }
        elseif(isset($_GET["accion"]) && $_GET["accion"] == "añadir"){
          require_once("../vista/mostrarFormularioRegistro_admin.php");
        }
        elseif(isset($_GET["accion"]) && $_GET["accion"] == "eliminar"){
          require_once("../vista/mostrarFormularioEliminarUsuario.php");
        }
        elseif(isset($_GET["modificar"]) && $_GET["modificar"] == "perfil"){
          $id_usuario = $_POST['campo_idusuario'];
          $select = "SELECT * FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
          $consulta = conectarBaseDatos::hacerConsulta($select); 
          require_once("../vista/mostrarPerfilUsuario_admin.php");
        }
        else{
          require_once("../vista/mostrar_opcionesAdmin_usuarios.php");
        }
      }


    // TARIFAS
    //
    //
    //
    //
    //
    //
    //
    //
    // PANEL DE TARIFAS, MUESTRA INFO DE LAS TARIFAS

      // OPCIONES POSIBLES (AÑADIR O MODIFICAR TARIFAS)
      elseif(isset($_GET["panel"]) && $_GET["panel"] == "tarifas"){

        if(isset($_POST['boton_añadir'])){
          $nombre_tarifa = $_POST['campo_nombreTarifa'];
          $select = "SELECT * FROM TARIFAS WHERE TIPO_TARIFA = '$nombre_tarifa'";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $numero_filas_afectadas = $consulta->rowCount();
          if($numero_filas_afectadas <= 0){
            $precio = $_POST['campo_precio'];
            $descripcion = $_POST['campo_descripción'];
            $select = "INSERT INTO TARIFAS VALUES(NULL,'$nombre_tarifa',$precio,'$descripcion')";
            $consulta = conectarBaseDatos::hacerConsulta($select);  
          }
        }
       
        if(isset($_POST['modificar_perfil'])){
          $id_tarifa = $_POST['campo_idtarifa'];
          $nombre_tarifa = $_POST['campo_nombreTarifa'];
          $select = "SELECT * FROM TARIFAS WHERE TIPO_TARIFA = '$nombre_tarifa' AND ID_TARIFA !=$id_tarifa";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $numero_filas_afectadas = $consulta->rowCount();
          if($numero_filas_afectadas <= 0){
            $precio = $_POST['campo_precio'];
            $descripcion = $_POST['campo_descripción'];
            $select = "UPDATE TARIFAS SET TIPO_TARIFA='$nombre_tarifa', PRECIO=$precio,DESCRIPCION='$descripcion' WHERE ID_TARIFA=$id_tarifa";
            $consulta = conectarBaseDatos::hacerConsulta($select);  
          }
        }

        if(isset($_POST['campo_idtarifa_eliminar'])){
          $id_tarifa = $_POST['campo_idtarifa_eliminar'];
          $select = "DELETE FROM CARTELERA WHERE ID_TARIFA=$id_tarifa";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $select = "DELETE FROM VENTA_ENTRADAS WHERE ID_TARIFA=$id_tarifa";
          $consulta = conectarBaseDatos::hacerConsulta($select);
          $select = "DELETE FROM TARIFAS WHERE ID_TARIFA=$id_tarifa";
          $consulta = conectarBaseDatos::hacerConsulta($select);
        }

        if(isset($_GET["ver"]) && $_GET["ver"] == "perfil"){
          $id_tarifa = $_POST['campo_idtarifa'];
          $select = "SELECT * FROM TARIFAS WHERE ID_TARIFA=$id_tarifa";
          $consulta = conectarBaseDatos::hacerConsulta($select); 
          require_once("../vista/mostrarPerfilTarifa_admin.php");
        }

        elseif(isset($_GET["accion"]) && $_GET["accion"] == "añadir"){
          require_once("../vista/mostrarFormularioTarifas_admin.php");
        }

        elseif(isset($_GET["accion"]) && $_GET["accion"] == "eliminar"){
          require_once("../vista/mostrarFormularioEliminarTarifa.php");
        }
      
        elseif(isset($_GET["modificar"]) && $_GET["modificar"] == "perfil"){
          $id_tarifa = $_POST['campo_idtarifa'];
          $select = "SELECT * FROM TARIFAS WHERE ID_TARIFA=$id_tarifa";
          $consulta = conectarBaseDatos::hacerConsulta($select); 
          require_once("../vista/mostrarPerfilTarifa_admin.php");
        }

        else{
          require_once("../vista/mostrar_opcionesAdmin_tarifas.php");
        }
      }
      ?>
  </div>
</div>
</body>
</html>