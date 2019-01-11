<?php
require '../config/Conexion.php';
class Curso{
  function __construct(){
  }
  //Implementamos nuestro método para insertar registros
  public function insertar($nombre, $imagen,$descripcion, $precio, $disponible, $tipo_curso,$precio_promocion, $vigencia_promocion,$promocion_disponible){
    if(empty($precio_promocion)){
      $precio_promocion = Null;
      $vigencia_promocion = Null;
      $promocion_disponible=0;
      $sql = "INSERT INTO cursos (nombre, imagen, descripcion, precio, disponible, tipo_curso, promocion_disponible)
      VALUES('$nombre', '$descripcion', '$imagen','$precio', '$disponible', '$tipo_curso','$promocion_disponible')";
    }else{
      $promocion_disponible=1;
      $sql = "INSERT INTO cursos (nombre, imagen,descripcion, precio, disponible, tipo_curso, precio_promocion, vigencia_promocion, promocion_disponible)
      VALUES('$nombre', '$imagen','$descripcion', '$precio', '$disponible', '$tipo_curso', '$precio_promocion', '$vigencia_promocion','$promocion_disponible')";
    }
    return ejecutarConsulta($sql);
  }
  //Implementamos nuestro método para actualizar registros
  public function editar($curso_id, $nombre, $imagen ,$descripcion, $precio, $disponible, $tipo_curso, $precio_promocion, $vigencia_promocion, $promocion_disponible){
    if($promocion_disponible==1){
      $sql = "UPDATE cursos SET nombre = '$nombre', imagen= '$imagen',descripcion = '$descripcion', precio = '$precio', disponible = '$disponible', tipo_curso = '$tipo_curso', precio_promocion = '$precio_promocion', vigencia_promocion = '$vigencia_promocion', promocion_disponible = '$promocion_disponible'
      WHERE curso_id = '$curso_id'";
      return ejecutarConsulta($sql);
    }else{
      $sql = "UPDATE cursos SET nombre = '$nombre', imagen= '$imagen',descripcion = '$descripcion', precio = '$precio', disponible = '$disponible', tipo_curso = '$tipo_curso', precio_promocion = Null, vigencia_promocion = Null, promocion_disponible = '$promocion_disponible'
      WHERE curso_id = '$curso_id'";
      return ejecutarConsulta($sql);
    }
  }
  public function desactivar($curso_id){
    $sql = "UPDATE cursos SET disponible = '0' WHERE curso_id = '$curso_id'";
    return ejecutarConsulta($sql);
  }
  public function desactivar_promocion($curso_id){
    $sql = "UPDATE cursos SET promocion_disponible = '0', precio_promocion = Null, vigencia_promocion = Null  WHERE curso_id = '$curso_id'";
    return ejecutarConsulta($sql);
  }
  public function activar($curso_id){
    $sql = "UPDATE cursos SET disponible = '1' WHERE curso_id = '$curso_id'";
    return ejecutarConsulta($sql);
  }
  public function mostrar($curso_id){
    $sql = "SELECT * FROM cursos WHERE curso_id = '$curso_id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function listar(){
    $sql = "SELECT * FROM cursos";
    return ejecutarConsulta($sql);
  }
  public function listar_disponibles(){
    $sql = "SELECT * FROM cursos WHERE disponible='1' AND tipo_curso='Online'";
    return ejecutarConsulta($sql);
  }
}
?>
