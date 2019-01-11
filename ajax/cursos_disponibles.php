<?php
require_once '../modelos/Descuento.php';
$descuento = new Descuento();
$response = $descuento -> listar_disponibles();
//Se declara un array
$data = Array();
while ($registro = $response->fetch_object()){
  $data[]=array(
    "descuento_id" => $registro->descuento_id,
    "nombre" => $registro->nombre,
    "porcentaje" => $registro->porcentaje,
    "disponible" => $registro->disponible
  );
}
$results = array($data);
  $cursos_disponibles =  json_encode($results);
echo $cursos_disponibles;
?>
