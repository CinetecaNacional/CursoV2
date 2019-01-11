<?php
require '../inc/header.php';
require '../inc/navbar.php';
/*if ($_SESSION['privilegios']==1){*/
if (true){
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title text-center">Usuarios <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)" hidden><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Matrícula</th>
                            <th>Nombre(s)</th>
                            <th>CURP</th>
                            <th>Sexo</th>
                            <th>Fecha de nacimiento</th>
                            <th>Código postal</th>
                            <th>Correo electrónico</th>
                            <th>Teléfono</th>
                            <th>Contraseña</th>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center">
                      <div class="col-md-7">
                      <div class="panel-body" id="formularioregistros">
                      <form name="formulario" id="formulario" method="POST">
                        <div class="form-group">
                          <label for="avalaible">Tipo de usuario<b class="text-danger">(*)</b>:</label>
                          <select id="input_available" name="tipo_usuario" class="form-control" required>
                            <option value="Presencial">Presencial</option>
                            <option value="Online">En línea</option>
                            <option value="Maestria">Maestría</option>
                            <option value="Administrador linea" disabled>Administrador en línea</option>
                            <option value="Administrador presencial" disabled>Administrador en presencial</option>
                            <option value="Administrador finanzas" disabled>Administrador finanzas</option>
                          </select>
                        </div>
                        <p class="h3"> Datos generales</p>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="name">Apellido paterno<b class="text-danger">(*)</b>:</label>
                              <input type="text" name="apellido_paterno" class="form-control" id="input_apellido_paterno" placeholder="Ingrese su apellido paterno" required autocomplete="off" minlength="2" maxlength="50" required pattern="[A-Za-záéíóúÁÉÍÓÚ ]+" title="Ingrese solo letras" oninput="upperCase(this);">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="name">Apellido materno<b class="text-danger">(*)</b>:</label>
                              <input type="text" name="apellido_materno" class="form-control" id="input_apellido_materno" placeholder="Ingrese su apellido materno" required autocomplete="off" minlength="2" maxlength="50" required pattern="[A-Za-záéíóúÁÉÍÓÚ ]+" title="Ingrese solo letras" oninput="upperCase(this);" >
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name">Nombre(s)<b class="text-danger">(*)</b>:</label>
                          <input type="text" name="nombre" class="form-control" id="input_nombre" placeholder="Ingrese su(s) nombre(s)" required autocomplete="off" minlength="2" maxlength="50" required pattern="[A-Za-záéíóúÁÉÍÓÚ ]+" title="Ingrese solo letras" oninput="upperCase(this);" >
                        </div>
                        <div class="form-group">
                          <label for="name">CURP<b class="text-danger">(*)</b>:</label>
                          <input type="text" name="curp" class="form-control" id="input_curp" placeholder="Ingrese su CURP" required autocomplete="off" maxlength="18" oninput="validarInput(this);">
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="name">Sexo:</label>
                              <input type="text" name="sexo" class="form-control" id="input_sexo" required disabled>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="name">Fecha de nacimiento:</label>
                              <input type="date" name="fecha_nacimiento" class="form-control" id="input_fecha_nacimiento" required disabled>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="avalaible">Ocupación<b class="text-danger">(*)</b>:</label>
                              <select id="input_ocupacion" name="ocupacion" class="form-control" required>
                                <option value="Estudiante">Estudiante</option>
                                <option value="Empleado institución pública">Empleado institución pública</option>
                                <option value="Empleado institución de gobierno">Empleado institución de gobierno</option>
                                <option value="Ama de casa">Ama de casa</option>
                                <option value="Pensionado">Pensionado</option>
                                <option value="Sin empleo">Sin empleo</option>
                              </select>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="avalaible">Nivel de estudios<b class="text-danger">(*)</b>:</label>
                              <select id="input_estudios" name="estudios" class="form-control" required>
                                <option value="Educación básica">Educación básica</option>
                                <option value="Bachillerato sin carrera técnica">Bachillerato sin carrera técnica</option>
                                <option value="Bachillerato con carrera técnica">Bachillerato con carrera técnica</option>
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestría">Maestría</option>
                                <option value="Doctorado">Doctorado</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name">Código postal<b class="text-danger">(*)</b>:</label>
                          <input type="text" name="codigo_postal" pattern="[0-9]{5}" title="El código postal debe de tener 5 dígitos" class="form-control" id="input_codigo_postal" placeholder="Ingrese su código postal" required autocomplete="off">
                        </div>
                        <p class="h3"> Datos de contacto</p>
                        <div class="form-group">
                          <label for="name">Correo electrónico<b class="text-danger">(*)</b>:</label>
                          <input type="text" name="correo_electronico" class="form-control" id="input_correo_electronico" placeholder="Ingrese su correo electrónico" required autocomplete="off" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="user@dominio.extension">
                        </div>
                        <div class="form-group">
                          <label for="name">Teléfono:</label>
                          <input type="tel" name="telefono" class="form-control" id="input_telefono" placeholder="Ingrese un número de contacto" autocomplete="off">
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="name">Contraseña<b class="text-danger">(*)</b>:</label>
                              <input type="password" name="password" class="form-control" id="input_password" placeholder="Ingrese su contraseña" required autocomplete="off">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="name">Confirmar contraseña<b class="text-danger">(*)</b>:</label>
                              <input type="password" name="password_confirm" class="form-control" id="input_password_comfirm" placeholder="Ingrese su contraseña" required autocomplete="off">
                            </div>
                          </div>
                        </div>
                        <div class="alert alert-danger" role="alert" id="mensaje" hidden></div>
                        <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                        <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </div>
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
<?php
require '../inc/footer.php';
?>

<script type="text/javascript" src="scripts/usuario.js"></script>
<?php
}
ob_end_flush();
?>
