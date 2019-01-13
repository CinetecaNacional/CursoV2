<?php
require_once '../modelos/Cursos_Usuarios.php';
require_once '../modelos/Curso.php';
require_once '../modelos/Referencia.php';
$Cursos_Usuarios = new Cursos_Usuarios();
$Curso = new Curso();
//Activamos el almacenamiento en el buffer
ob_start();
session_start();
$usuario_id = isset($_SESSION['usuario_id'])? limpiarCadena($_SESSION['usuario_id']):"";
$matricula = isset($_SESSION['matricula'])? limpiarCadena($_SESSION['matricula']):"";
$curso_id = isset($_POST["curso_id"])? limpiarCadena($_POST["curso_id"]):"";
$cursos_usuarios_id = isset($_POST["cursos_usuarios_id"])? limpiarCadena($_POST["cursos_usuarios_id"]):"";

switch ($_GET["op"]){
  case 'guardar':
    if(empty($usuario_id)){
      echo "Debe iniciar sesión para poder inscribirse al curso!";
    }else{
      $inscripcion_previa =  $Cursos_Usuarios->verificar_inscripciones_pasadas($curso_id, $usuario_id);
      if($inscripcion_previa){
        echo "Ya te has registrado previamente a este curso, dirígete al apartado de mis cursos si quieres ver los detalles de pago.";
      }else{
        $datos_curso = $Curso->mostrar($curso_id);
        if($datos_curso['promocion_disponible'] =='1'){
          $precio = $datos_curso['precio_promocion'];
        }else{
          $precio = $datos_curso['precio'];
        }
        $Referencia = new Referencia($matricula,$curso_id,$precio);
        $referencia = $Referencia-> get_referencia();
        $fecha_limite_pago = $Referencia-> get_fecha_limite_pago();
        $year = date("Y", $fecha_limite_pago);
        $month= date("m", $fecha_limite_pago);
        $day = date("j", $fecha_limite_pago);
        $fecha_limite_pago02 = $year.'-'.$month.'-'.$day;
        $estatus = '0';
        $response = $Cursos_Usuarios -> insertar($curso_id,$usuario_id, $estatus, $fecha_limite_pago02, $precio, $referencia);
        echo $response ? "Se registro con éxito al curso": "No se pudo registrar al curso";
      }
    }
    break;
}
?>
