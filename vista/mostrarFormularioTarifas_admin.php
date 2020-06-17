<div class="col-md-12"> 
  <form action="controlador_administrador.php?panel=tarifas#panel_herramientas" method="post">  
    <h3 id="usuario" style="text-align: center;"> Creación de Tarifa</h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img width="251px" height="253px" align="center" src="../vista/imagenes/iconos/creacion_tarifa.png"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_registro_tarifa">
            <thead>
              <tr>
                <th> Nombre Tarifa </th>
                <th> Precio  </th>
                <th> Descripción </th>
              </tr>
            </thead>
            <tbody>
              <tr> 
                  <td> <input type="text" name="campo_nombreTarifa" minlength="3" required/> </td>
                  <td> <input type="number" name="campo_precio" min="1" value="1" required/> </td>
                  <td>
                    <textarea style="width:100%" minlength="10" maxlength="100" required rows="5" name="campo_descripción" type="text"></textarea>
                  </td>
              </tr>
            </tbody>
          </table>
      </div>

			<div class="opciones_disponibles">
        <div class="row">
          <div class="col-md-6 text-center">
                <a href="controlador_administrador.php?panel=tarifas#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Volver atrás </span> 
                </a>
              </div>  
          <div class="col-md-6 text-center">
              <input type="submit" value="Crear Tarifa" class="btn btn-warning" name="boton_añadir">
          </div> 
        </div>
      </div>
    </div>
    </div>
  </form>
</div>