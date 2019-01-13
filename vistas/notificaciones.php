<?php require '../inc/header.php';?>
<?php require '../inc/navbar.php';?>
<!--Contenido-->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="alert alert-warning" role="alert">
        Personas que han notificado realizar el pago
        </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Curso</th>
                <th scope="col">Monto</th>
                <th scope="col">N° referencia</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Carlos</th>
                <td>Akira Kurosawa</td>
                <td>2,000.00 Mx</td>
                <td>123423423423423</td>
                <!--<td><input type="text" name="link_curso" value="https://cursosenlinea.cinetecanacional.net"></td>
                <td><input type="text" name="password" value="" disabled></td>-->
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary">Asignar credenciales</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        <div class="alert alert-success" role="alert">
        Personas que han solicitado factura
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Razon social</th>
              <th scope="col">Correo electronico</th>
              <th scope="col">RFC</th>
              <th scope="col">Dirección</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Carlos</td>
              <td>Persona física</td>
              <td>josecarlos19979@hotmail.com </td>
              <td>HECC970929CL0</td>
              <td>Av. Morelos 577 </td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary">Notificar envio a email</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        </div>
        </div>
        </section>
        </div>
<!--Fin-Contenido-->

<?php require '../inc/footer.php';?>
<!--Validaciones-->
<script src="../public/cursoForm.js" charset="utf-8"></script>
<script type="text/javascript" src="scripts/descuento.js"></script>
