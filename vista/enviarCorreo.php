<?php
  $mail = new phpMailer(); 
  $mail->IsSMTP();
  $mail->CharSet = 'UTF-8';
  $mail->setFrom('cineespana99884@gmail.com', 'Equipo CineEspaña');
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = 'tls'; //seguridad
  $mail->Host = "smtp.gmail.com"; // servidor smtp
  $mail->Port = 587; //puerto
  $mail->Username ='cineespana99884@gmail.com'; //nombre usuario
  $mail->Password = 'cineespana123'; //contraseña

  $select1 = "SELECT * FROM USUARIOS WHERE ID_USUARIO=$id_usuario";
  $consulta1 = conectarBaseDatos::hacerConsulta($select1);
  while ($row1 = $consulta1->fetch()){ 
    $correo_usuario = $row1['CORREO_ELECTRONICO'];
  }
  $mail->AddAddress("$correo_usuario");
  $mail->Subject = "Compra Realizada CineEspaña";

  // Adjuntar Ticket
  $file_name = "ticket.pdf";
  $mail->addAttachment("../vista/facturas/".$file_name);
  $mail->Body = "Gracias por confiar en nosotros ! \n\n Te hemos adjuntado el ticket, recuerda llevar el móvil encima para poder entrar en nuestras salas. Disfruta de la pelicula y recuerda hacer una crítica despues en nuestra página, un saludo!";
  // Adjuntar PDF OPCIONAL
  if(isset($_POST['adjuntarFactura'])){
    $file_name = "factura.pdf";
    $mail->addAttachment("../vista/facturas/".$file_name);
    $mail->Body = "Gracias por confiar en nosotros ! \n\n Te hemos adjuntado el ticket y la factura de la compra, recuerda llevar el móvil encima para poder entrar en nuestras salas. Disfruta de la pelicula y recuerda hacer una crítica despues en nuestra página, un saludo!";
  }

  if(!$mail->Send()){
    echo "Message was not sent";
    echo "Mailer Error: " . $mail->ErrorInfo;
  }