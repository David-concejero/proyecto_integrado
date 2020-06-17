<?php
    if(isset($_SESSION['USUARIO'])){
        $id_usuario = $_SESSION['ID_USUARIO'];
        $select = "SELECT * FROM VENTA_ENTRADAS WHERE ID_USUARIO=$id_usuario AND ID_PELICULA=$id_pelicula";
        $consulta = conectarBaseDatos::hacerConsulta($select);
        $numero_filas_afectadas = $consulta->rowCount();
        if($numero_filas_afectadas <= 0){ ?>
            <div style="width: 294px;" class="escribir_reseña">
                <a href="controlador_cartelera.php"> Compra una entrada para reseñar 
                    <img width="40" height="40" src="../vista/imagenes/iconos/escribir_reseña.png">
                </a> 
            </div> <?php
        }
        else{
            $select = "SELECT * FROM OPINIONES_PELICULAS WHERE ID_USUARIO=$id_usuario AND ID_PELICULA=$id_pelicula";
            $consulta = conectarBaseDatos::hacerConsulta($select);
            $numero_filas_afectadas = $consulta->rowCount();
            if($numero_filas_afectadas > 0){ ?>
                <div style="width: 156px" class="escribir_reseña">
                    <a href="controlador_perfilPeliculas.php?ver=criticas&<?php echo 'pelicula='.$_GET["pelicula"]?>&reseña=editar"> Editar reseña 
                        <img width="40" height="40" src="../vista/imagenes/iconos/escribir_reseña.png">
                    </a>
                </div> <?php
            }
            else{ ?>
                <div style="width: 156px;" class="escribir_reseña">
                    <a href="controlador_perfilPeliculas.php?ver=criticas&<?php echo 'pelicula='.$_GET["pelicula"]?>&reseña=escribir"> 
                        Escribir reseña
                        <img width="40" height="40" src="../vista/imagenes/iconos/escribir_reseña.png">
                    </a> 
                </div> <?php
            }        
        }
    }
    else{ ?>
        <div class="escribir_reseña">
            <a href="controlador_login.php"> Logeate
                <img width="40" height="40" src="../vista/imagenes/iconos/escribir_reseña.png">
            </a> 
        </div> <?php
    }
?>
<h3 style="text-align: center;"> Opiniones de Usuarios </h3>
<hr style="border-bottom: 1px solid #4682B4;"> <br>

<?php
//$id_usuario = $_SESSION['ID_USUARIO'];
$select = "SELECT * FROM OPINIONES_PELICULAS WHERE ID_PELICULA=$id_pelicula";
$consulta = conectarBaseDatos::hacerConsulta($select);
$numero_filas_afectadas = $consulta->rowCount();
if($numero_filas_afectadas>0){
    while ($row = $consulta->fetch()){
        $puntuacion_usuario = $row['VALORACION'];
        $titulo_reseña = $row['TITULO_RESEÑA'];
        $titulo_reseña = $row['TITULO_RESEÑA'];
        $usuario_reseña = $row['OPINION_MENSAJE'];
        $id_usuario = $row['ID_USUARIO'];

        $select1 = "SELECT * FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
        $consulta1 = conectarBaseDatos::hacerConsulta($select1);
        while ($row1 = $consulta1->fetch()){ 
            $nombre_usuario = $row1['USUARIO'];
            $nombre_real = $row1['NOMBRE'];
            $apellidos = $row1['APELLIDOS'];
            $sexo = $row1['SEXO'];
        }?>
        <div class="col-md-12 comentarios_usuarios">
            <div class="row comentarios_usuarios_sombras">
                <div class="col-md-12 informacion_usuario"> 
                    <img width="40" height="40" src="../vista/imagenes/iconos/<?php if($sexo == 'HOMBRE'){echo 'avatar_hombre.png';}else{echo 'avatar_mujer.png';} ?>">
                    <span class="texto_usuario"> <?php echo $nombre_real . " " . $apellidos ?> 
                    </span>
                    <div class="puntuacion_usuario">
                        <?php echo $puntuacion_usuario; ?>
                    </div> 
                    <hr style="border-bottom: 1px solid #727980;"> 
                </div>

                <div class="col-md-12 reseña"> 
                   <h4> <?php echo $titulo_reseña ?> </h4> 
                   <p> <?php echo $usuario_reseña ?>
                </div>    
            </div>
    </div>  <?php
    }
}
else{ ?>

    <div class="col-md-12 comentarios_usuarios">
            <div class="row comentarios_usuarios_sombras">
                <div class="col-md-12 informacion_usuario"> 
                    <p> Nadie ha reseñado esta película, ¿te animas a ser el primero? </p>
                </div>   
            </div>
    </div>
<?php
}