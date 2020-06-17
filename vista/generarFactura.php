<?php
date_default_timezone_set('Europe/Madrid');
setlocale(LC_TIME, 'es_ES.UTF-8');
setlocale(LC_TIME, 'spanish');
$fecha = strftime("%A, %d de %B %Y", strtotime(date(DATE_RFC2822)));

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
$select = "SELECT * FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
$consulta = conectarBaseDatos::hacerConsulta($select);
while ($row = $consulta->fetch()){ 
    $nombre_usuario = $row['NOMBRE'];
    $apellidos = $row['APELLIDOS'];
    $dni = $row['DNI'];
}
$select = "SELECT * FROM TARIFAS WHERE ID_TARIFA=$tarifa";
$consulta = conectarBaseDatos::hacerConsulta($select);
while ($row = $consulta->fetch()){ 
    $nombre_tarifa = $row['TIPO_TARIFA'];
    $precio_tarifa = $row['PRECIO'];
}

$aleatorio = rand();
$numero_aleatorio = substr($aleatorio,0,4);

$html = '
<html>
<head>
<style type="text/css">
    .header{
        background: #fa405c;
        position: absolute;
        left:0;
        right: 0; 
        top: 0; 
        bottom: 0;
        height:85px;
        width: 500px;
    }
    .titulo_header{
        position: absolute;
        left:20px;
        top:-25px;
        margin-top:50px;
        width: 150px;
        font-size: 30px;
        color: white;
    }
    .datos_empresa1{
        position: absolute;
        padding-left: 100px;
        margin-top: -30px;
        width: 500px;
        font-size: 9px;
        color: white;
    }
    .datos_empresa2{
        position: absolute;
        padding-left: 270px;
        margin-top: -30px;
        width: 500px;
        font-size: 9px;
        color: white;
    }
    .datos_cliente{
        position: absolute;
        width: 500px;
        font-size: 10px;
        margin-top: 70px;
        padding-left: -20px;
    }

    .datos_factura{
        position: absolute;
        width: 500px;
        font-size: 12px;
        margin-top: 70px;
        padding-left: 150px;
    }

    .precio_factura{
        position: absolute;
        width: 200px;
        font-size: 12px;
        margin-top: 70px;
        padding-left: 200px;
        text-align: right;
    }

    .letraGris{
        color: #959494;
        font-size: 12px;
    }
    .letraGris2{
        color: #959494;
        font-size: 8px;
    }
    .usuario, .nombre, .apellidos, .dni{
        font-size: 8px;
        padding-bottom: 7px;
    }
    .letraPrecio_factura{
        color: #fa405c;
        font-size: 32px;
    }
    .separador1{
        position: absolute;
        left:30;
        right: 700;
        width: 600px;
        margin-top: 150px;
        margin-right: 160px;
        border-bottom: 2px solid #fa405c;
    }
    .separador2{
        position: absolute;
        left:30;
        right: 700;
        width: 600px;
        margin-top: 240px;
        margin-right: 160px;
        border-bottom: 1px solid #d4d4d4;
    }

    .contenido_factura{
        width:440px;
        position: absolute;
        left:30;
        right: 700;
        top: 250;
    }
    .descripcion{
        width:440px;
        position: absolute;
        left:30;
        right: 700;
        top: 250;
        color:#fa405c;
        font-weight: bold;
    }
    .descripcion_texto{
        width:270px;
        position: absolute;
        margin-top: 10px;
        font-size: 14px;
    }
    .unidades{
        width:90px;
        position: absolute;
        margin-top:-47px;
        margin-left: 270px;
        color:#fa405c;
        font-weight: bold;
    }
    .unidades_texto{
        width: 70px;
        position: absolute;
        margin-top: 10px;
        margin-left: 270px;
        font-size: 14px;
        text-align: right;
    }
    .precio{
        width:440px;
        position: absolute;
        margin-top:-47px;
        margin-left: 380px;
        color:#fa405c;
        font-weight: bold;
    }
    .precio_texto{
        width:290px;
        position: absolute;
        margin-top: 10px;
        margin-left: 360px;
        padding-right: 14px;
        font-size: 14px;
        text-align: right;
    }

    .subtotal{
        position: absolute;
        left:30;
        right: 700;
        width: 600px;
        margin-top: 270px;
        margin-right: 170px;
        color: #fa405c;
        text-align: right;
        font-size: 15px;
    }

    
</style>
</head>
<body>
    <div class="header">
    </div>
    <div class="datos_empresa1"> 
        Teléfono: <br>
        954 516 558 (17:30 a 23:00) <br>
        954 999 850 (9:00 a 22:00) Zona Este
    </div>
    <div class="datos_empresa2"> 
        Detalles empresa: <br>
        CineEspaña Calle Luis de Morales, 3 <br> 41005 Sevilla
    </div>
    <div class="titulo_header"> Factura </div>
    <div class="datos_cliente"> <span class="letraGris"> Facturado a </span> 
        <div class="usuario"> 
            <span class="letraGris2"> Usuario: </span> 
            ' . $_SESSION['USUARIO'] . '
        </div>
        <div class="nombre"> 
            <span class="letraGris2"> Nombre: </span> 
            ' . $nombre_usuario . '
        </div>
        <div class="apellidos"> 
            <span class="letraGris2"> Apellidos: </span> 
            ' . $apellidos . '
        </div>
        <div class="dni"> 
            <span class="letraGris2"> Dni: </span> 
            ' . $dni . '
        </div>
    </div>
    <div class="datos_factura"> <span class="letraGris"> Número de factura </span> <br>
       '. $numero_aleatorio .' <br> <br>
       <span class="letraGris"> Fecha compra </span> <br>
       '. $fecha .'
    </div>
    <div class="precio_factura"> 
        <span class="letraGris"> Precio Total </span> <br>
        <span class="letraPrecio_factura"> '. $precio_entradas .'€ </span> 
    </div>
    <div class="separador1"> &nbsp; </div>
    <div class="contenido_factura"> 
        <div class="descripcion"> Descripción </div>
            <div class="descripcion_texto"> '. $nombre_pelicula .' </div>
        <div class="unidades"> Entradas </div>
            <div class="unidades_texto"> '. $entradas_compradas .' </div>
        <div class="precio"> Precio </div>
            <div class="precio_texto"> '. $precio_tarifa .'€ </div>
    </div>
    <div class="separador2"> &nbsp; </div>
    <div class="subtotal"> Total: '. $precio_entradas .'€</div>
</body>
</html>
';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [130, 100]]);
$mpdf->WriteHTML($html);
$mpdf->Output('../vista/facturas/factura.pdf','F');
chmod("../vista/facturas/factura.pdf", 0666);
?>