<div class="row">
<?php
	while ($row = $consulta->fetch()){ ?>
		
		<div class="col-md-4 columna">
			<ul>
				<li class="titulo_tarifa"> 
					<?php echo $row['TIPO_TARIFA'] ?>	
				</li>
				<li class="precio_tarifa">
					<?php echo $row['PRECIO'] . "€" ?>	
				</li>
				<li class="especificaciones">
					<?php echo "*". $row['DESCRIPCION'] ?>
				</li>
				<li class="pie_columna"> </li>
        </div>
        <?php
    }?>
</div>