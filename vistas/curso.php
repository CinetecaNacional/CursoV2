<?php require '../inc/header.php';?>
<?php require '../inc/navbar.php';?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title text-center">Cursos <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead class="thead-dark">
                            <th>Clave curso</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Disponible</th>
                            <th>Tipo de curso</th>
                            <th>Precio de promoción</th>
                            <th>Vigencia de la promoción</th>
                            <th>Promoción disponible</th>
                            <th>Opciones</th>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                      <div class="row justify-content-center mt-2">
                        <div class="col-md-5 align-self-center">
                            <form name="formulario" id="formulario" method="POST">
                            <div class="form-group">
                              <label for="name">Nombre del curso:</label>
                              <input type="hidden" name="curso_id" id="input_curso_id">
                              <input type="text" name="nombre" class="form-control" id="input_name" placeholder="Ingrese un nombre de curso" required autocomplete="off" maxlength="55">
                            </div>
                            <div class="form-group">
                              <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="150px" id="imagenmuestra" alt="este curso no tiene imagen registrado">
                            </div>
                            <div class="form-group">
                              <label for="description">Descripción del curso</label>
                              <textarea name="descripcion" rows="8" cols="80" class="form-control" id="textarea_description" autocomplete="off"></textarea>

                            </div>
                            <div class="form-group">
                              <label for="price">Precio:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">$</div>
                                </div>
                                <input type="number" name="precio" step=".01" min="0" class="form-control" id="input_price" placeholder="Ingrese un precio" required autocomplete="off">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="avalaible">Curso disponible:</label>
                              <select id="input_available" name="disponible" class="form-control" aria-describedby="avalaibleHelp" required>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                              </select>
                              <small id="avalaibleHelp" class="form-text text-muted">El curso estará disponible al público actualmente</small>
                            </div>
                            <div class="form-group">
                              <label for="kindCourse">Tipo de curso:</label>
                              <select id="input_kindCourse" name="tipo_curso" class="form-control" required>
                                <option value="Online">Online</option>
                                <option value="Presencial">Presencial</option>
                                <option value="Maestría">Maestría</option>
                              </select>
                            </div>
                            <div class="form-group" id="form-group-offerPrice">
                              <label for="offerPrice">Precio promoción:</label>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">$</div>
                                </div>
                                <input type="number" name="precio_promocion" step=".01" min="0" class="form-control" id="input_offerPrice" placeholder="Ingrese un precio de promoción" autocomplete="off">
                              </div>
                              <small id="avalaibleHelp" class="form-text text-muted">Ingrese un precio de promoción solo si este tiene una</small>
                            </div>
                            <div class="form-group" id="form-group-dateAvailable">
                              <label for="dateAvailable">Promoción valida hasta:</label>
                              <?php
                              ini_set('date.timezone',"America/Mexico_City");
                              $fecha = getdate();
                              $mes = str_pad($fecha['mon'], 2, "0", STR_PAD_LEFT);
                              $hoy = $fecha['year']."-".$mes."-".$fecha['mday'];
                              echo '<input type="date" name="vigencia_promocion" id="input_dateAvailable" class="form-control" min="'.$hoy.'">';
                              ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button class="btn btn-danger" onclick="cancelarform()" type="button">Cancelar</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

<?php require '../inc/footer.php';?>
<!--Validaciones-->
<script src="../public/cursoForm.js" charset="utf-8"></script>
<script type="text/javascript" src="scripts/curso.js"></script>
