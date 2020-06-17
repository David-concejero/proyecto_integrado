<div class="container_formulario">
  <div class="wrap_registro">
    <span class="titulo_formulario"> 
    <?php if(isset($mensaje_error)){echo $mensaje_error;}else{echo "Formulario de Registro";}?>
    </span>
    <form action="controlador_login.php" method="post">
    <div class="row">
      <div class="col-12 col-md-6">
        <span class="subtitulo"> Nombre </span> 
        <div class="wrap_efectos">
          <input class="aspecto_input_normal" type="text" name="campo_nombre" placeholder="Nombre" minlength="5" required>
          <span class="efecto_focus"></span>
          <span class="efecto_simbolo_registro"> 
            <span class="iconos fa fa-address-card"> </span> 
          </span>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <span class="subtitulo"> Apellidos </span>
        <div class="wrap_efectos">
          <input class="aspecto_input_normal" type="text" name="campo_apellidos" placeholder="Apellidos" minlength="5" required>
          <span class="efecto_focus"></span>
          <span class="efecto_simbolo_registro"> 
            <span class="iconos fa fa-address-card"> </span> 
          </span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-md-6">
        <span class="subtitulo"> DNI </span> 
        <div class="wrap_efectos">
          <input class="aspecto_input_normal" type="text" name="campo_dni" placeholder="Campo Dni" pattern="^[0-9]{8,}[A-Z]$" title="Recuerda, 8 dígitos y un numero" required>
          <span class="efecto_focus"></span>
          <span class="efecto_simbolo_registro"> 
            <span class="iconos fa fa-address-card"> </span> 
          </span>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <span class="subtitulo"> Edad </span>
        <div class="wrap_efectos">
          <input class="aspecto_input_normal" type="number" min="18" value="18" max="99" name="campo_edad" placeholder="Edad" required>
          <span class="efecto_focus"></span>
          <span class="efecto_simbolo_registro"> 
            <span class="iconos fa fa-address-card"> </span> 
          </span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <span class="subtitulo campo_usuario"> Usuario </span>
        <div class="wrap_efectos">
          <input class="aspecto_input_normal" type="text" name="campo_usuario" placeholder="Usuario" minlength="5" required>
          <span class="efecto_focus"></span>
          <span class="efecto_simbolo_registro"> 
            <span class="iconos fa fa-user"> </span> 
          </span>
        </div>
      </div>

      <div class="col-12">
        <span class="subtitulo"> Correo electrónico </span>
        <div class="wrap_efectos">
          <input class="aspecto_input_normal" type="email" name="campo_correo" placeholder="Correo" required>
          <span class="efecto_focus"></span>
          <span class="efecto_simbolo_registro"> 
            <span class="iconos fa fa-at"> </span> 
          </span>
        </div>
      </div>

      <div class="col-12">
        <span class="subtitulo"> Contraseña </span>
        <div class="wrap_efectos">
          <input class="aspecto_input_normal" type="password" name="campo_contraseña" placeholder="Contraseña" minlength="5" required>
          <span class="efecto_focus"></span>
          <span class="efecto_simbolo_registro"> 
            <span class="iconos fa fa-key"> </span> 
          </span>
        </div>
      </div>

      <div class="col-12">
        <span class="subtitulo"> Sexo </span>
        <div class="wrap_efectos">
          <select id="opcionesSelect" name="sexo_usuario" class="browser-default custom-select aspecto_input_select" required> 
            <option value="HOMBRE"> Hombre </option>
            <option value="MUJER"> Mujer </option>
          </select>
          <span class="efecto_focus"></span>
          <span class="efecto_simbolo_registro"> 
            <span class="iconos fa fa-hand-pointer-o"> </span>
          </span>
        </div>
      </div>
    </div>
      <div class="container_botonSubmit">
        <input type="submit" name="boton_registro" value="Registrarse" class="aspecto_botonSubmit">
      </div>
    </form>
  </div>
</div>