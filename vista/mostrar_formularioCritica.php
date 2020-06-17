<form action="controlador_perfilPeliculas.php?ver=criticas&<?php echo 'pelicula='.$_GET['pelicula'] ?>" method="post"> 
<?php
$select = "SELECT * FROM OPINIONES_PELICULAS WHERE ID_PELICULA=$id_pelicula AND ID_USUARIO=$id_usuario";
$consulta = conectarBaseDatos::hacerConsulta($select);

/* Editar critica ya hecha por el usuario */
if(isset($_GET['reseña']) && $_GET['reseña']=='editar'){

while ($row = $consulta->fetch()){
    $puntuacion_usuario = $row['VALORACION'];
    $titulo_reseña = $row['TITULO_RESEÑA'];
    $titulo_reseña = $row['TITULO_RESEÑA'];
    $usuario_reseña = $row['OPINION_MENSAJE']; 

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
                <div class="puntuacion_usuario_modificar">
                    <select width="200px" name="campo_puntuacion_modificar" class="browser-default custom-select" required> 
                        <?php
                        for ($i=1; $i < 11 ; $i++){
                            if($i != $puntuacion_usuario){?>
                                <option value="<?php echo $i ?>"> <?php echo $i ?> </option> <?php
                            }
                            else{ ?>
                                <option selected value="<?php echo $puntuacion_usuario; ?>"> <?php echo $puntuacion_usuario; ?> </option> <?php
                            }
                        } ?>
                    </select>
                </div> 
                <hr style="border-bottom: 1px solid #727980;"> 
            </div>

            <div class="col-md-12 reseña">
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="text-align: center"> Título de tu crítica </h4>
                        <input style="width:100%" type="text" name="campo_titulo_reseña" required value="<?php if(isset($_GET['reseña']) && $_GET['reseña']=='editar'){echo $titulo_reseña;}?>">
                    </div>

                    <div class="col-md-12">
                        <h4 style="text-align: center"> Escribe tu critica </h4>
                        <textarea style="width:100%" rows="5" name="campo_texto_reseña" type="text" minlength="10" required><?php if(isset($_GET['reseña']) && $_GET['reseña']=='editar'){echo $usuario_reseña;}?></textarea>
                    </div>
                </div>    
            </div>
            <div class="col-md-12 text-center">
                <input class="boton_agregar_critica" style="text-align:center" type="submit" value="Enviar" name="boton_modificar_critica">
                <input class="boton_borrar_critica" type="submit" value="Borrar Critica" name="boton_borrar_critica">
            </div>
        </div>  
    </div> <?php
} ?>
</form> <?php
}
/* Escribir nueva critica */
else{
    $id_usuario = $_SESSION['ID_USUARIO'];
    $select1 = "SELECT * FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
    $consulta1 = conectarBaseDatos::hacerConsulta($select1);
    while ($row1 = $consulta1->fetch()){ 
        $nombre_usuario = $row1['USUARIO'];
        $nombre_real = $row1['NOMBRE'];
        $apellidos = $row1['APELLIDOS'];
        $sexo = $row1['SEXO'];
    }?>
    <form action="controlador_perfilPeliculas.php?ver=criticas&<?php echo 'pelicula='.$_GET['pelicula'] ?>" method="post">
        <div class="col-md-12 comentarios_usuarios">
            <div class="row comentarios_usuarios_sombras">
                <div class="col-md-12 informacion_usuario"> 
                <img width="40" height="40" src="../vista/imagenes/iconos/<?php if($sexo == 'HOMBRE'){echo 'avatar_hombre.png';}else{echo 'avatar_mujer.png';} ?>">
                <span class="texto_usuario"> <?php echo $nombre_real . " " . $apellidos ?> 
                </span>
                <div class="puntuacion_usuario_modificar">
                    <select width="200px" name="campo_puntuacion_añadir" class="browser-default custom-select" required> 
                        <?php
                        for ($i=1; $i < 11 ; $i++){ ?>
                            <option value="<?php echo $i ?>"> <?php echo $i ?> </option> <?php
                        } ?>
                    </select>
                </div> 
                <hr style="border-bottom: 1px solid #727980;"> 
            </div>

                <div class="col-md-12 reseña">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="text-align: center"> Título de tu crítica </h4>
                            <input style="width:100%" type="text" name="campo_titulo_reseña" required>
                        </div>

                        <div class="col-md-12">
                            <h4 style="text-align: center"> Escribe tu critica </h4>
                            <textarea style="width:100%" rows="5" name="campo_texto_reseña" minlength="10" required type="text"></textarea>
                        </div>
                    </div>    
                </div>
                <div class="col-md-12 text-center">
                    <input class="boton_escribir_critica" style="text-align:center" type="submit" value="Enviar" name="boton_escribir_critica">
                </div>
            </div>
        </div>
    </form>
    <?php
} ?>