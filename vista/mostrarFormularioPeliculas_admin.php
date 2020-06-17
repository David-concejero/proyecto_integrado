<div class="col-md-12"> 
  <form action="controlador_administrador.php?panel=peliculas#panel_herramientas" method="post" enctype="multipart/form-data">  
    <h3 id="usuario" style="text-align: center;"> Dar de alta pelicula </h3> <hr>
    <div class="row">
     <div class="col-12 col-md-12 col-lg-3">
      <div class="wrapper" style="text-align: center;">
        <img align="center" src="../vista/imagenes/iconos/pelicula_creacion.png"> 
      </div>
     </div>
     <div id="seccionTabla" class="col-12 col-md-12 col-lg-9">
      <div class="table-bordered table-striped table-condensed">
          <table class="tabla_registro_peliculas">
            <thead>
              <tr>
                <th> Titulo </th>
                <th> Año  </th>
                <th> Pais </th>
                <th> Genero </th>
                <th> Duración </th>
                <th> Calificacion </th>
                <th> Fecha estreno </th>
                <th> Foto Cartelera </th>
                <th> Trailer URL (embled) </th>
                <th> Sinopsis </th>
              </tr>
            </thead>
            <tbody>
              <tr> 
                  <td> <input type="text" name="campo_titulo" minlength="5" required/> </td>
                  <td> <input type="number" name="campo_año" min="1900" max="2020" required/> </td>
                  <td> <input type="text" name="campo_pais" minlength="4" required/> </td>
                  <td>
                      <select name="campo_genero[]" class="selectpicker seleccionarGenero" required multiple data-live-search="true">
                        <?php
                        for ($i=0; $i < sizeof($lista_generos) ; $i++){ ?> 
                          <option><?php echo $lista_generos[$i] ?></option> <?php
                        }?>
                      </select>
                  </td>
                  <td> <input type="number" name="campo_duracion" min="30" max="180" required/>  </td>
                  <td> <input type="number" name="campo_calificacion" min="1" value="7" max="18" required/>  </td>
                  <td> <input type="date" min="2020-03-16" value="2020-03-16" max="2020-03-22" name="campo_fechaestreno" required/>  </td>
                  <td> <input type="file" name="campo_fotopelicula" id="campo_fotopelicula" pattern="" required/>  </td>
                  <!-- Youtube, compartir e insertar video. Copiar el enlace embed -->
                  <td> <input type="url" name="campo_trailer" placeholder="Coloca tu video (embed) de youtube" pattern="^(https:\/\/www\.youtube\.com\/embed\/)[A-z-0-9]+$" title="Coloca tu video (embed) de youtube" required>  </td>
                  <td> <textarea style="width:100%" minlength="50" required rows="5" name="campo_sinopsis" type="text"></textarea></td>
              </tr>
            </tbody>
          </table>
      </div>

			<div class="opciones_disponibles">
        <div class="row">
          <div class="col-md-6 text-center">
                <a href="controlador_administrador.php?panel=peliculas#panel_herramientas"> 
                  <span class="fa fa-cog icono_tuerca"> Volver atrás </span> 
                </a>
              </div>  
          <div class="col-md-6 text-center">
              <input type="submit" value="Crear Pelicula" class="btn btn-warning" name="boton_añadir">
          </div> 
        </div>
      </div>
    </div>
    </div>
  </form>
</div>