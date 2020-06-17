<?php
	$array = [];
	while ($row = $consulta->fetch()){
		if(!in_array($id_pelicula, $array)){
			$select2 = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
      		$consulta2 = conectarBaseDatos::hacerConsulta($select2);
      		while ($row2 = $consulta2->fetch()){ ?>
                <div style="margin-top: 20px;" class="row">
                    <div class="col-md-2">
                        <img class="img-fluid" src="../vista/imagenes/imagenes_portada/<?php echo $row2['FOTO_PELICULA']?>" alt="foto pelicula">
                    </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-10">
                                <h3> <?php echo $row2['TITULO']; ?> </h3>
                            </div>
                            <p>
                                Año <?php echo $row2['AÑO']?> |
                                <?php echo $row2['DURACION']?> min
                                | <?php echo $row2['PAIS']?> 
                                | <?php echo $row2['GENERO']?> 
                                | <?php echo $row2['CALIFICACION']?> <br>
                                <?php echo $row2['SINOPSIS']?>
                            </p>
                        </div>
			         </div>
                 </div>
			<?php
		}
		array_push($array, $id_pelicula);
	}
}
?>