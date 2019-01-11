<?php require '../inc/header.php';?>
<?php require '../inc/navbar.php';?>
<!--Contenido-->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
      <div class="row justify-content-center">
        <div class="col-md-8">
        <p class="text-center h4 text-body"><b>Datos de generales</b></p>
        <div class="datos_usuario">
          <p><b>Nombre:</b> <span id="dato-nombre"></span></p>
          <p><b>CURP:</b> <span id="dato-CURP"></span> <b>Fecha nacimiento:</b> <span id="dato-fecha_nacimiento"></span> <b>Sexo:</b> <span id="dato-sexo"></span></p>
          <p><b>Ocupación:</b> <span id="dato-ocupacion"></span> </p>
          <p><b>Nivel de estudios:</b> <span id="dato-estudios"></span> </p>
          <p class="text-center h4 text-body"><b>Datos de contacto</b></p>
          <p><b>Correo electrónico:</b> <span id="dato-correo_electronico"></span> </p>
          <p><b>Télefono:</b> <span id="dato-telefono"></span> </p>
          <p><b class="h5 text-primary">Domicilio: </b><b>Colonia</b> <span id="dato-domicilio"></span>, <b>Municipio</b> <span id="dato-municipio"></span>, <b>C.P</b> <span id="dato-cp"></span>.</p>
        </div>
        </div>
        </div>
        </section>
        </div>
<!--Fin-Contenido-->

<?php require '../inc/footer.php';?>
<!--Validaciones-->
<script src="../public/cursoForm.js" charset="utf-8"></script>
<script type="text/javascript" src="./scripts/datos_usuario.js"></script>

<?php
if (isset($_SESSION['usuario_id'])){
  echo "<script>mostrar($_SESSION[usuario_id])</script>";
}
?>
