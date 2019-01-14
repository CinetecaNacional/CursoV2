<?php require '../inc/header.php';?>
<?php require '../inc/navbar.php';?>
<!--Contenido-->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
      <div class="row justify-content-center">
        <div class="col-sm-7 align-self-center text-center">
          <p class="h1">Mis cursos</p>
        </div>
        <div class="col-md-10">
        <div class="alert alert-warning" role="alert">
        Cursos a los que estoy en proceso de inscripción
        </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Costo</th>
                <th scope="col">fecha límite de pago</th>
              </tr>
            </thead>
            <tbody id="cursos_en_proceso">
            </tbody>
          </table>
        <div class="alert alert-success" role="alert">
        Cursos a los que estoy inscrito
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Costo</th>
              <th scope="col">Vigencia del curso</th>
              <th scope="col">link del curso</th>
              <th scope="col">contraseña</th>
            </tr>
          </thead>
          <tbody id="cursos_inscritos">
          </tbody>
        </table>
        </div>
        </div>
        </section>
        <div id="resultado"></div>
        </div>
<!--Fin-Contenido-->

<?php require '../inc/footer.php';?>
<script src="./scripts/cursos_usuarios.js" charset="utf-8"></script>
<!--Validaciones-->
<script src="../public/cursoForm.js" charset="utf-8"></script>
<script type="text/javascript" src="scripts/descuento.js"></script>
