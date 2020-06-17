<?php
date_default_timezone_set('Europe/Madrid');
setlocale(LC_TIME, 'es_ES.UTF-8');
setlocale(LC_TIME, 'spanish');
$fecha = strftime("%A, %d de %B %Y", strtotime(date($dia_pelicula)));

$dia_estreno = substr($dia_pelicula, 8);

$select = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
$consulta = conectarBaseDatos::hacerConsulta($select);
while ($row = $consulta->fetch()){ 
    $nombre_pelicula = $row['TITULO'];
    $nombre_imagen = $row['FOTO_PELICULA'];
}

$select = "SELECT * FROM PELICULAS WHERE ID_PELICULA=$id_pelicula";
$consulta = conectarBaseDatos::hacerConsulta($select);
while ($row = $consulta->fetch()){ 
    $nombre_pelicula = $row['TITULO'];
}
$select = "SELECT * FROM SALAS WHERE ID_SALA=$sala_elegida";
$consulta = conectarBaseDatos::hacerConsulta($select);
while ($row = $consulta->fetch()){ 
    $nombre_sala = $row['NOMBRE_SALA'];
}
$select = "SELECT * FROM TARIFAS WHERE ID_TARIFA=$tarifa";
$consulta = conectarBaseDatos::hacerConsulta($select);
while ($row = $consulta->fetch()){ 
    $nombre_tarifa = $row['TIPO_TARIFA'];
    $precio_tarifa = $row['PRECIO'];
}

if(intval($entradas_compradas) <= 5){
    $nombre_entrada = "Entrada Individual";
    $precio_ticket = $precio_tarifa;
}
else{
    $nombre_entrada = "Entrada de Grupo";
    $precio_ticket = intval($entradas_compradas)*intval($precio_tarifa);
}


$html = '
<html>
<head>
<style type="text/css">
/* bd = bloque derecho, bi = bloque izquierdo */
    .rounded {
        border-radius: 50%;
        background: #007db7;
        padding: 5spx;
        width: 40px;
        text-align: center;
        display: inline;
        font-size: 10px;
        color: white;
        text-transform: uppercase;
    }
    .bloque_izquierdo{
        position: absolute;
        left:121;
        right: 0; 
        top: 0; 
        bottom: 0;
    }
    .tituloSuperior_bi{
        width: 180px;
        font-size:12px;
        margin-top:20px;
        margin-left:30px;
        text-align: left;
    }
    .tituloinferior_bi{
        width: 150px;
        font-size:20px;
        margin-left:30px;
        text-align: left;
        color:#007db7;
        overflow:hidden;  word-break: break-all;
    }

    .titulo_tarifa_bi{
        font-size: 10px;
        margin-left: 15px;
        margin-left:30px;
        padding: 3px;
        text-align: left;
    }

    .tarifa_pi{
        font-size: 10px;
        margin-left: 110px;
        margin-top: -19.5px;
        padding: 3px;
        text-align: left;
    }

    .titulo_precio_bi{
        font-size: 10px;
        margin-top: 2px;
        margin-left:30px;
        padding: 3px;
        text-align: left;
        color: #007db7;
    }

    .precio_bi{
        font-size: 10px;
        margin-left: 110px;
        margin-top: -19.5px;
        padding: 3px;
        text-align: right;
        width: 65px;
        color: #007db7;
    }
    .separador_bi{
        margin-left: 32px;
        margin-top: -15px;
        width: 155px;
        border-bottom: 1px solid #007db7;;
    }

    .bloque_derecho{
        position: absolute; left:325; right: 0; top: 0; bottom: 0;
        background-color: white;
        border-width:1px;  
        border-left-style:dotted;
        border-color: gray;
        height: 220px;
    }
    .titulo_bd{
        background: #007db7;
        width: 110px;
        color:white;
        font-size:10px;
        margin-top:20px;
        margin-left:10px;
        padding: 3px;
        text-align: center;
    }
    .tarifa_bd, .precio_bd, .dia_bd, .codigo_barras{
        font-size: 8px;
        margin-left:10px;
        padding: 3px;
        text-align: left;
    }
    
</style>
</head>
<body>

<div style="position: absolute; left:0; right: 0; top: 0; bottom: 0;">
    <img src="../vista/imagenes/imagenes_portada/'.$nombre_imagen.'" style="width: 210mm; height: 297mm; margin: 0;" />
</div>
<div style="position: absolute; left:90; right: 0; top: 50; bottom: 0;">
    <div class="rounded"> '. $dia_estreno .' <br> marzo <br> 2020 </div>
</div>

<div class="bloque_izquierdo">
    <div class="tituloSuperior_bi"> ' . $nombre_entrada . ' </div>
    <div class="tituloinferior_bi"> ' . $nombre_pelicula . ' </div>
    <div class="titulo_precio_bi"> Precio </div>
        <div class="precio_bi"> ' . $precio_ticket . '€ </div>
    <div class="titulo_tarifa_bi"> Tarifa </div>
        <div class="tarifa_pi"> ' . $nombre_tarifa . ' </div>
    <div class="separador_bi"> &nbsp; </div>
    <div class="titulo_precio_bi"> Sesión </div>
        <div class="precio_bi"> ' . $hora_pelicula . ' </div>
    <div class="titulo_tarifa_bi"> Sala </div>
        <div class="tarifa_pi"> ' . $nombre_sala . '</div>
</div>

<div class="bloque_derecho">
    <div class="titulo_bd"> Ticket de Cine </div>
    <div class="contenido_bd"> 
        <div class="tarifa_bd"> Tarifa: ' . $nombre_tarifa . '</div>
        <div class="precio_bd"> Precio: ' . $precio_ticket . '€</div>
        <div class="dia_bd"> Dia:  ' . $fecha . ' </div>
        <div class="codigo_barras"> 
            <img src="../vista/imagenes/varios/codigo_barras.png" style="width: 120px; height: 20px; margin: 0;" />
        </div>
    </div>
</div>
</body>
</html>
';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [120, 40]]);

if(intval($entradas_compradas) <= 5){
    for ($i=0; $i < intval($entradas_compradas) ; $i++){ 
        $mpdf->AddPage();    
        $mpdf->WriteHTML($html);
    }
}
else{
    $mpdf->AddPage();    
    $mpdf->WriteHTML($html);
}
$mpdf->Output('../vista/facturas/ticket.pdf','F');
chmod("../vista/facturas/ticket.pdf", 0666);
?>