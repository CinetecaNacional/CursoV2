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
                          <h1 class="box-title text-center">Descuentos <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right"></div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead class="thead-dark">
                            <th>Clave del descuento</th>
                            <th>Nombre</th>
                            <th>Porcentaje</th>
                            <th>Disponible</th>
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
                              <label for="name">Nombre del descuento:</label>
                              <input type="hidden" name="descuento_id" id="input_descuento_id">
                              <input type="text" name="nombre" class="form-control" id="input_name" placeholder="Ingrese un nombre para la promoción" oninput="upperCase(this);" required autocomplete="off" maxlength="55">
                            </div>
                            <div class="form-group">
                              <label for="porcentaje">Porcentaje de descuento</label>
                              <div class="input-group">
                                <input type="number" name="porcentaje" step=".01" min="0" max="100.00" onblur="pesos(this);" class="form-control" id="input_porcentaje" placeholder="Ingrese porcentaje de descuento" required autocomplete="off">
                                <div class="input-group-prepend">
                                <div class="input-group-text">%</div>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="avalaible">Descuento disponible:</label>
                              <select id="input_available" name="disponible" class="form-control" aria-describedby="avalaibleHelp" required>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                              </select>
                              <small id="avalaibleHelp" class="form-text text-muted">El descuento estará disponible actualmente</small>
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
<script type="text/javascript" src="scripts/descuento.js"></script>
