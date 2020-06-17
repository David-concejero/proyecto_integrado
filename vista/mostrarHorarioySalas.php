<?php $horas = []; ?>  
            
<h3 id="horario" style="text-align: center;"> 
    Horarios día <?php echo substr($dia_cartelera, 8)?>
</h3> <hr>

<div class="table-responsive">
    <table class="table table-striped table-responsive-stack">
    <thead>
        <tr>
            <th scope="col">Hora</th>
            <th scope="col">Salas disponibles</th>
            <th scope="col"></th>
        </tr>
    </thead> <?php
	while ($row = $consulta->fetch()){
        $hora = $row['HORA'];
        if(!in_array($hora, $horas)){ ?>
            <tr>
                <td> <?php echo $hora ?></td>
                <td>
                    <form action="controlador_compraEntradas.php#comprar" method="post">
                        <div class="form-group">
                            <select id="opcionesSelect" name="sala_elegida" class="form-control" required> 
                            <?php
                                $select2 = "SELECT * FROM CARTELERA WHERE DIA='$dia_cartelera' AND ID_PELICULA='$id_pelicula' AND HORA='$hora'";
                                $consulta2 = conectarBaseDatos::hacerConsulta($select2);
                                while ($row2 = $consulta2->fetch()){ 
                                    $id_sala = $row2['ID_SALA'];
                                    $select3 = "SELECT * FROM SALAS WHERE ID_SALA=$id_sala";
                                    $consulta3 = conectarBaseDatos::hacerConsulta($select3);
                                    while ($row3 = $consulta3->fetch()){ 
                                        $nombre_sala = $row3['NOMBRE_SALA'];
                                    }

                                    // (*) Comprueba que existen salas con asientos disponibles para reservar. En caso negativo se pone la opción como DISABLED
                                    $select4 = "SELECT * FROM SALAS WHERE ID_SALA=$id_sala";
                                    $consulta4 = conectarBaseDatos::hacerConsulta($select4);
                                    while ($row4 = $consulta4->fetch()){ 
                                        $capacidad_maxima = $row4['AFORO_MAXIMO'];
                                    }
                                    $select5 = "SELECT * FROM VENTA_ENTRADAS WHERE ID_PELICULA=$id_pelicula AND DIA='$dia_cartelera' AND HORA='$hora' AND ID_SALA=$id_sala";
                                    $consulta5 = conectarBaseDatos::hacerConsulta($select5);
                                    $num_reservas = 0;
                                    while ($row5 = $consulta5->fetch()){
                                        $num_reservas =  $num_reservas + $row5['NUMERO_ENTRADAS'];
                                    }
                                    $reservas_posibles = $capacidad_maxima - $num_reservas;
                                    if($reservas_posibles>0){ ?>
                                        <option value="<?php echo $row2['ID_SALA']?>"><?php echo $nombre_sala ?></option>
                                    <?php
                                    }
                                    else{ ?>
                                        <option disabled value="<?php echo $row2['ID_SALA']?>"><?php echo $nombre_sala . " (sala llena)" ?></option>
                                    <?php
                                    }
                                    // (*)
                                }
                            ?>
                            </select>
                            <input type="hidden" name="campo_idpelicula" value="<?php echo $id_pelicula ?>">
                            <input type="hidden" name="campo_diapelicula" value="<?php echo $row['DIA'] ?>">
                            <input type="hidden" name="campo_horapelicula" value="<?php echo $row['HORA'] ?>">
                </td>
                <td> 
                    <input type="submit" name="reservarEntradas" value="Reservar" class="btn btn-success reservarEntradas'"/>
                </td>
                        </div>
                    </form>
            </tr>            
            <?php
            array_push($horas,$row['HORA']);
        }
    }
?>
</table>
</div>