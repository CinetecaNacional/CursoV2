<?php
require_once '../modelos/Curso.php';
$curso = new Curso();
$curso_id = isset($_POST["curso_id"])? limpiarCadena($_POST["curso_id"]):"";
$nombre = isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$imagen = isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$descripcion = isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$precio = isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
$disponible = isset($_POST["disponible"])? limpiarCadena($_POST["disponible"]):"";
$tipo_curso = isset($_POST["tipo_curso"])? limpiarCadena($_POST["tipo_curso"]):"";
$precio_promocion = isset($_POST["precio_promocion"])? limpiarCadena($_POST["precio_promocion"]):"";
if($precio_promocion){
  $vigencia_promocion = isset($_POST["vigencia_promocion"])? limpiarCadena($_POST["vigencia_promocion"]):"";
  ini_set('date.timezone',"America/Mexico_City");
  $fecha = getdate();
  $hoy = $fecha['year']."-".$fecha['mon']."-".$fecha['mday'];
  if(strtotime($vigencia_promocion)<strtotime($hoy)){
    $promocion_disponible = 0;
  }else{
    $promocion_disponible = 1;
  }
}else{
  $vigencia_promocion = Null;
  $promocion_disponible = Null;
}

switch ($_GET["op"]) {
  case 'guardaryeditar':
  if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])){
    $imagen=$_POST["imagenactual"];
  }
  else{
    $ext = explode(".", $_FILES["imagen"]["name"]);
    if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
      $imagen = round(microtime(true)) . '.' . end($ext);
      move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/cursos/" . $imagen);
    }
  }
    if(empty($curso_id)){
      $response = $curso -> insertar($nombre, $imagen,$descripcion, $precio, $disponible, $tipo_curso, $precio_promocion, $vigencia_promocion,$promocion_disponible);
      echo $response ? "Se registro con éxito el curso $nombre": "No se pudo registrar el curso";
    }else{
      $response = $curso -> editar($curso_id ,$nombre,$imagen, $descripcion, $precio, $disponible, $tipo_curso, $precio_promocion, $vigencia_promocion,$promocion_disponible);
      echo $response ? "Se actualizo con éxito el curso $nombre": "No se pudo actualizar el curso";
    }
    break;
  case 'desactivar':
    $response = $curso -> desactivar($curso_id);
    echo $response ? "Se desactivo con éxito el curso": "No se pudo desactivar el curso";
    break;
  case 'desactivar_promocion':
    $response = $curso -> desactivar_promocion($curso_id);
    echo $response ? "Se desactivo la promocion con éxito del curso": "No se pudo desactivar el curso";
    break;
  case 'activar':
    $response = $curso -> activar($curso_id);
    echo $response ? "Se activo con éxito el curso": "No se pudo activar el curso";
    break;
  case 'mostrar':
    $response = $curso -> mostrar($curso_id);
    //Codificar el resultado utilizando JSON
    echo json_encode($response);
    break;
  case 'listar':
    $response = $curso -> listar();
    //Se declara un array
    $data = Array();
    while ($registro = $response->fetch_object()){
      if($registro->disponible==1){
        $btn_disponible = '<button class="btn btn-danger" onclick="desactivar('.$registro->curso_id.')">Desactivar</button>';
      }else{
        $btn_disponible = '<button class="btn btn-success" onclick="activar('.$registro->curso_id.')">Activar</button>';
      }
      if($registro->promocion_disponible==0 || empty($registro->promocion_disponible)){
        $btn_promocion_disponible = '<div class="alert alert-primary text-center" role="alert">Sin promoción</div>';
      }else{
        $btn_promocion_disponible = '<button class="btn btn-danger" onclick="desactivar_promocion('.$registro->curso_id.')">Desactivar promoción</button>';
      }
      if($registro->imagen){
        $etiqueta_imagen = "<img src='../files/cursos/".$registro->imagen."' height='50px' width='50px' >";
      }else{
        $etiqueta_imagen = "<p>Sin definir<p>";
      }
      $data[]=array(
        "0" => $registro->curso_id,
        "1" => $registro->nombre,
        "2" => $etiqueta_imagen,
        "3" => $registro->descripcion,
        "4" => "$ ".number_format($registro->precio,2,".",",")." MXN",
        "5" => $btn_disponible,
        "6" => $registro->tipo_curso,
        "7" => $registro->precio_promocion ? "$ ".number_format($registro->precio_promocion,2,".",",") ." MXN":" ",
        "8" => $registro->vigencia_promocion,
        "9" => $btn_promocion_disponible,
        "10" => '<button class="btn btn-primary" onclick="mostrar('.$registro->curso_id.')"><i class="fas fa-pencil-alt"></i></button>'
      );
    }
    $results = array(
      "sEcho" => 1, //Información ára el datatables
      "iTotalRecords" => count($data), //enviamos el total de registros al datatables
      "iTotalDisplayRecords" => count($data),//enviamos el total de registros a visualizar
      "aaData"=>$data);
    echo json_encode($results);
    break;
}
?>
