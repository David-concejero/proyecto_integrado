<?php
	while ($row = $consulta->fetch()){ ?>

    <div class="col-md-12 ficha_tecnica">
        <h3> <?php echo $row['TITULO'] ?> </h3> <br>
        <ul class="ntabs">
            <li class="<?php if(isset($_GET['ver']) && $_GET['ver']=='ficha'){ echo 'active'; }?>"> 
                <a href="controlador_perfilPeliculas.php?ver=ficha<?php echo '&pelicula='.$id_pelicula; ?>"> Ficha </a> 
            </li> &nbsp;
            <li class="<?php if(isset($_GET['ver']) && $_GET['ver']=='criticas'){echo 'active';}?>"> 
                <a href="controlador_perfilPeliculas.php?ver=criticas<?php echo '&pelicula='.$id_pelicula; ?>"> Críticas </a> 
            </li>
        </ul>
        <br>

        <div class="row">
            <div class="col-12 col-md-2 contenedor_imagen">
                <img class="foto_critica" width="160px" height="238" src="../vista/imagenes/imagenes_portada/<?php echo $row['FOTO_PELICULA']?>">   
            </div>

            <div class="col-md-10">

                <div class="contenedor_votacionesCritica">
                    <?php
                        $id_pelicula = $_GET['pelicula'];
                        $select1 = "SELECT * FROM OPINIONES_PELICULAS WHERE ID_PELICULA='$id_pelicula'";
                        $consulta1 = conectarBaseDatos::hacerConsulta($select1);
                        $numero_filas_afectadas = $consulta1->rowCount();
                        $votaciones = 0;
                        while ($row1 = $consulta1->fetch()){ 
                            $votaciones = $votaciones + $row1['VALORACION'];
                        }
                        if($votaciones == 0){
                            $nota_media = 0;
                        }
                        else{
                            $nota_media = $votaciones / $numero_filas_afectadas;
                        } ?>
                    <div class="media_votos"> <?php echo $nota_media ?> </div>
                    <div class="cantidad_votos"> <?php echo $numero_filas_afectadas ?> </div>
                    <div class="cantidad_votosTexto"> votos </div>
                </div>

                <dl class="informacion_pelicula">
                    <dt> Título original </dt>
                        <dd> <?php echo $row['TITULO'] ?> </dd>
                    <dt> Año </dt>
                        <dd> <?php echo $row['AÑO'] ?> </dd>
                    <dt> Duración </dt>
                        <dd> <?php echo $row['DURACION'] ?> </dd>
                    <dt> Pais </dt>
                        <dd> <?php echo $row['PAIS'] ?> </dd>
                    <dt> Genero </dt>
                        <dd> <?php echo $row['GENERO'] ?> </dd>
                    <dt> Sinopsis </dt>
                        <dd> <?php echo $row['SINOPSIS'] ?> </dd>
                </dl>
            </div>
        </div>
        </div>
	</div>
    <?php		
    }
?>