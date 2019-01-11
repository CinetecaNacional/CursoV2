<?php require '../inc/header.php';?>
<?php require '../inc/navbar.php';?>
<!--Contenido-->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="alert alert-warning" role="alert">
        Cursos a los que estoy en proceso de inscripción
        </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Descuento</th>
                <th scope="col">fecha límite de pago</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">002</th>
                <td>Akira Kurosawa</td>
                <td>2,000.00 Mx</td>
                <td>Sin descuento</td>
                <td>20 de enero de 2019</td>
                <td>
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-primary">Detalles de pago</button>
                    <button type="button" class="btn btn-success">Ya he realizado mi pago</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        <div class="alert alert-success" role="alert">
        Cursos a los que estoy inscrito
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Clave</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Vigencia del curso</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">001</th>
              <td>William Shakespeare</td>
              <td>2,300.00 Mx</td>
              <td>1 de marzo de 2019</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-primary">Solicitar factura</button>
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
