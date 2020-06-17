<?php
/* Este IF hace referencia al buscador del menu */
  if(isset($_POST['campo_pelicula'])){
    $id_pelicula = $_POST['campo_pelicula'];
  }
  elseif(isset($_GET['pelicula'])){
    $id_pelicula = $_GET['pelicula'];
  }
	while ($row = $consulta->fetch()){ 
        $fecha_estreno = substr($row['FECHA_ESTRENO'],5)?>

    <div class="col-md-12 ficha_tecnica">
        <h3> <?php echo $row['TITULO'] ?> </h3> <br>
        <ul class="ntabs">
            <li class="<?php if(isset($_GET['ver']) && $_GET['ver']=='ficha' || isset($_POST['campo_pelicula'])){ echo 'active'; }?>"> 
                <a href="controlador_perfilPeliculas.php?ver=ficha<?php echo '&pelicula='.$id_pelicula; ?>"> Ficha </a> 
            </li> &nbsp;
            <li class="<?php if(isset($_GET['ver']) && $_GET['ver']=='criticas'){echo 'active';}?>"> 
                <a href="controlador_perfilPeliculas.php?ver=criticas<?php echo '&pelicula='.$id_pelicula; ?>"> Críticas </a> 
            </li>
        </ul>
        <br>

        <div class="row">
            <div class="col-md-9">
                <dl class="informacion_pelicula">
                    <dt> Título original </dt>
                        <dd> <?php echo $row['TITULO'] ?> </dd>
                    <dt> Año </dt>
                        <dd> <?php echo $row['AÑO'] . " (" . $fecha_estreno . ")" ?> </dd>
                    <dt> Duración </dt>
                        <dd> <?php echo $row['DURACION'] ?> </dd>
                    <dt> Pais </dt>
                        <dd> <?php echo $row['PAIS'] ?> </dd>
                    <dt> Genero </dt>
                        <dd> <?php echo $row['GENERO'] ?> </dd>
                    <dt> Sinopsis </dt>
                        <dd> <?php echo $row['SINOPSIS'] ?> </dd>
                    <dt> &nbsp;  </dt>
                        <dd> &nbsp; </dd>
                    <dt> Trailer </dt>
                        <dd>  
                            <iframe width="704" height="345" src="<?php echo $row['TRAILER']?>"> </iframe>  
                        </dd>
                </dl>
            </div>

            <div class="col-12 col-md-3 contenedor_imagen">
                <img width="160px" height="238" src="../vista/imagenes/imagenes_portada/<?php echo $row['FOTO_PELICULA']?>">

                <div class="contenedor_valoraciones">
                    <div class="valora_pelicula">
                        <a href="controlador_perfilPeliculas.php?ver=criticas<?php echo '&pelicula='.$id_pelicula; ?>"> Votar esta película </a> 
                    </div>
                </div> <br>

                <div class="contenedor_valoraciones">
                    <div class="valora_pelicula">
                        Votaciones de Usuarios
                        <div class="row">
                            <div class="col-6 col-md-6 text-center">
                                <?php
                                //$id_pelicula = $_GET['pelicula'];
                                $select = "SELECT * FROM OPINIONES_PELICULAS WHERE ID_PELICULA='$id_pelicula'";
                                $consulta = conectarBaseDatos::hacerConsulta($select);
                                $numero_filas_afectadas = $consulta->rowCount();
                                $votaciones = 0;
                                while ($row = $consulta->fetch()){ 
                                    $votaciones = $votaciones + $row['VALORACION'];
                                }
                                if($votaciones == 0){
                                    $nota_media = 0;
                                }
                                else{
                                    $nota_media = $votaciones / $numero_filas_afectadas;
                                }
                                ?>
                                <span class="votacion_usuarios"> 
                                    <?php echo $nota_media ?> 
                                </span>
                            </div>

                            <div class="col-6 col-md-6">
                                <span class="recuento_votos"> <?php echo $numero_filas_afectadas ?> votos </span>
                            </div>
                            
                            <div id="chartContainer" class="grafica_usuarios" style="height: 200px; width: 200px;"></div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
    <?php		
    }
?>
