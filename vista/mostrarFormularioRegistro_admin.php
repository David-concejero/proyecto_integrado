<div class="col-md-12"> 
  <form action="controlador_administrador.php?panel=usuarios#panel_herramientas" method="post">  
    <h3 id="usuario" style="text-align: center;"> Creación de Usuario</h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img align="center" src="../vista/imagenes/iconos/avatar_creacion.png"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_registro">
            <thead>
              <tr>
                <th> Usuario </th>
                <th> Rol  </th>
                <th> Nombre </th>
                <th> Apellidos </th>
                <th> Dni </th>
                <th> Edad </th>
                <th> Correo </th>
                <th> Contraseña </th>
                <th> Sexo </th>
              </tr>
            </thead>
            <tbody>
              <tr> 
                  <td> <input type="text" name="campo_usuario" minlength="5" required/> </td>
                  <td>
                    <select id="opcionesSelect" name="campo_rol" class="browser-default custom-select" required> 
                      <option value="USER"> User </option>
                      <option value="ADMIN"> Admin </option>
                    </select>
                  </td>
                  <td> <input type="text" name="campo_nombre" minlength="5" required/> </td>
                  <td> <input type="text" name="campo_apellidos" minlength="5" required/> </td>
                  <td> <input type="text" name="campo_dni" pattern="^[0-9]{8,}[A-Z]$" title="Recuerda, 8 dígitos y un numero" required/>  </td>
                  <td>  <input type="number" min=18 max=99 value="18" name="campo_edad" required/> </td>
                  <td>  <input type="email" name="campo_correo" required/> </td> 
                  <td>  <input type="password" name="campo_contraseña" minlength="5" required/> </td> 
                  <td> 
                    <select id="opcionesSelect" name="campo_sexo" class="browser-default custom-select" required> 
                      <option value="HOMBRE"> Hombre </option>
                      <option value="MUJER"> Mujer </option>
                  </select>
              </tr>
            </tbody>
          </table>
      </div>

			<div class="opciones_disponibles">
        <div class="row">
          <div class="col-md-6 text-center">
                <a href="controlador_administrador.php?panel=usuarios#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Volver atrás </span> 
                </a>
              </div>  
          <div class="col-md-6 text-center">
              <input type="submit" value="Crear Usuario" class="btn btn-warning" name="boton_añadir">
          </div> 
        </div>
      </div>
    </div>
    </div>
  </form>
</div>