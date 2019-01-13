<?php
require_once '../modelos/Curso.php';
$curso = new Curso();
$response = $curso -> listar_disponibles();?>
  <div class="row justify-content-center mb-2">
  <div class="col-sm-10">
    <div class="row justify-content-center mb-2">
  <?php
  setlocale(LC_TIME, 'spanish');
  while ($registro = $response->fetch_object()){
    $fecha = $registro->vigencia_promocion;
    $fechaFormato = strftime("%d de %B de %Y", strtotime($fecha));
    if($registro->imagen){
      $imagen_curso = '<img src="../files/cursos/'.$registro->imagen.'" class="mx-auto d-block" height="250px" width="250px" >';
    }else{
      $imagen_curso = '';
    }
    echo '
    <div class="col-md-4 mb-4">
    <div class="card" style="width: 19rem;">
    <div class="card-body">
    <h5 class="card-title">'.$registro->nombre.'</h5>
    <h6 class="card-subtitle mb-2 text-muted">Curso '.$registro->tipo_curso.'</h6>
    <p class="card-text"></p>';
    if($registro->promocion_disponible==1){
      echo'<p class="card-text"><b>Precio de promocion</b>: $ '.number_format($registro->precio_promocion,2,".",",").' MXN vigente hasta el <b>'.$fechaFormato.'</b></p>
      <button type="button" class="btn btn-primary" onclick="inscribir('.$registro->curso_id.')">Registrarme</button>
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#Curso'.$registro->curso_id.'" >Más información</button>
      </div>
      </div>
      </div>
      <div class="modal fade" id="Curso'.$registro->curso_id.'" tabindex="-1" role="dialog" aria-labelledby="Curso'.$registro->curso_id.'Title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Curso'.$registro->curso_id.'Title">'.$registro->nombre.'</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Curso '.$registro->tipo_curso.'</p>
              <p class="text-justify">'.$registro->descripcion.'</p>
              <p><b>Precio de promocion</b>: $ '.number_format($registro->precio_promocion,2,".",",").' MXN vigente hasta el <b>'.$fechaFormato.'</b></p>
              <p id="conversion"></p>
              <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-light" onclick="conversiondolar('.$registro->precio_promocion.')">$USD</button>
              <button type="button" class="btn btn-light" onclick="conversioneuro('.$registro->precio_promocion.')">€Euros</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Inscribir</button>
            </div>
          </div>
        </div>
      </div>';
    }else{
      echo'<p class="card-text"><b>Precio</b>: $ '.number_format($registro->precio,2,".",",").' MXN</p>
      <button type="button" class="btn btn-primary" onclick="inscribir('.$registro->curso_id.')">Registrarme</button>
      <button type="button" class="btn btn-link" data-toggle="modal" data-target="#Curso'.$registro->curso_id.'" >Más información</button>
      </div>
      </div>
      </div>
      <div class="modal fade" id="Curso'.$registro->curso_id.'" tabindex="-1" role="dialog" aria-labelledby="Curso'.$registro->curso_id.'Title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Curso'.$registro->curso_id.'Title">'.$registro->nombre.'</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Curso '.$registro->tipo_curso.'</p>
              '.$imagen_curso.'
              <p class="text-justify mt-lg-4 mt-2">'.$registro->descripcion.'</p>
              <p class="card-text"><b>Precio</b>: $ '.number_format($registro->precio,2,".",",").' MXN</p>
              <p id="conversion'.$registro->curso_id.'"></p>
              <div class="btn-group" role="group" aria-label="Basic example">
              <button type="button" class="btn btn-light" onclick="conversiondolar('.$registro->precio.','.$registro->curso_id.')">$USD</button>
              <button type="button" class="btn btn-light" onclick="conversioneuro('.$registro->precio.','.$registro->curso_id.')">€Euros</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary">Inscribir</button>
            </div>
          </div>
        </div>
      </div>';
    }
  }
  ?>
  </div>
  </div>
  </div>
