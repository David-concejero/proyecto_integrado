<div class="container_formulario">
      <div class="wrap_login">
        <div class="foto_login">
          <img src="../vista/imagenes/iconos/avatar_hombre.png" alt="imagen_login">
        </div>

        <form action="controlador_login.php" method="post">
          <span class="titulo_formulario">
            <?php 
            if(isset($mensaje_error)){
              echo $mensaje_error;
            }
            else{
              echo "Iniciar Sesión de Usuario";
            }?> 
          </span>

          <div class="wrap_efectos">
            <input class="aspecto_input_normal" type="text" name="campo_usuario" placeholder="Usuario" required>
            <span class="efecto_focus"></span>
            <span class="efecto_simbolo_login">
              <i class="iconos fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap_efectos">
            <input class="aspecto_input_normal" type="password" name="campo_contraseña" placeholder="Contraseña" required>
            <span class="efecto_focus"></span>
            <span class="efecto_simbolo_login">
              <i class="iconos fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>
          
          <div class="container_botonSubmit">
            <input type="submit" name="boton_login" value="Iniciar Sesión" class="aspecto_botonSubmit">
          </div>

          <div class="text-center p-t-12">
            <span class="txt1">
              ¿No estas registrado? ¡Puedes hacerlo ahora!
            </span>
          </div>

          <div class="text-center p-t-136">
            <a class="txt2" href="controlador_login.php?&crearCuenta=si">
              Registrarse en la página
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>