<?php
require '../config/Conexion.php';
/*
----Tabla de 'cursos_usuarios'----
Descripción en esta tabla se almacenan los datos necesarios del curso que se toma y el usuario
que lo toma, con algunos otros datos para realizar el pago de inscripción en el banco.
----Campos----
->cursos_usuarios_id
->curso_id
->usuario_id
->comprobante_pago
->contrasena
->estatus
->experiencia
->fecha_limite_pago
->link_curso
->pago
->precio
->referencia
*/
class Cursos_Usuarios{
  function __construct(){
  }
  //Implementamos nuestro método para registrar un nuevo usuario en X curso
  public function insertar($curso_id, $usuario_id, $estatus, $fecha_limite_pago, $precio, $referencia){
    $sql = "INSERT INTO cursos_usuarios (curso_id, usuario_id, estatus, fecha_limite_pago, precio, referencia)
    VALUES('$curso_id', '$usuario_id', $estatus , '$fecha_limite_pago', '$precio', '$referencia')";
    return ejecutarConsulta($sql);
  }
  //Implementamos este método cuando la persona nos notifica que ha realizado su pago.
  public function notificar_pago($cursos_usuarios_id){
    $sql = "UPDATE cursos_usuarios SET estatus = 1
    WHERE cursos_usuarios_id = '$cursos_usuarios_id'";
    return ejecutarConsulta($sql);
  }
  //Implementamos este método cuando corroboramos que la persona ha realizado su pago y le asignamos credenciales de acceso.
  public function notificar_credenciales($cursos_usuarios_id, $contrasena, $link_curso, $pago){
    $sql = "UPDATE cursos_usuarios SET contrasena = '$contrasena', link_curso = '$link_curso', pago = '$pago'
    WHERE cursos_usuarios_id = '$cursos_usuarios_id'";
    return ejecutarConsulta($sql);
  }
  //Implementamos este método cuando la persona indica cual ha sido su experiencia en el proceso
  public function notificar_experiencia($cursos_usuarios_id, $experiencia){
    $sql = "UPDATE cursos_usuarios SET experiencia = '$experiencia'
    WHERE cursos_usuarios_id = '$cursos_usuarios_id'";
    return ejecutarConsulta($sql);
  }
  //Implementamos este método para solicitar una nueva fecha de pago si ya ha vencido.
  public function solicitar_referencia($cursos_usuarios_id, $curso_id, $usuario_id, $fecha_limite_pago, $precio, $referencia){
    $sql = "UPDATE cursos_usuarios SET curso_id = '$curso_id',usuario_id = '$usuario_id', estatus = 0 , fecha_limite_pago='$fecha_limite_pago', precio='$precio', referencia ='$referencia'
    WHERE cursos_usuarios_id = '$cursos_usuarios_id'";
    return ejecutarConsulta($sql);
  }
  public function mostrar($cursos_usuarios_id){
    $sql = "SELECT * FROM cursos_usuarios WHERE cursos_usuarios_id = '$cursos_usuarios_id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function verificar_inscripciones_pasadas($curso_id, $usuario_id){
    $sql = "SELECT * FROM cursos_usuarios WHERE curso_id = '$curso_id' AND usuario_id = '$usuario_id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function listar(){
    $sql = "SELECT * FROM cursos_usuarios";
    return ejecutarConsulta($sql);
  }
  public function listar_notificaciones_pago(){
    $sql = "SELECT * FROM cursos_usuarios WHERE estatus=1 AND pago=0";
    return ejecutarConsulta($sql);
  }
  public function listar_credenciales($usuario_id){
    $sql = "SELECT * FROM cursos_usuarios WHERE estatus=1 AND pago=1";
    return ejecutarConsulta($sql);
  }
}
?>
