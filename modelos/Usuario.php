<?php
require '../config/Conexion.php';
class Usuario{
  function __construct(){

  }
  //Implementamos nuestro método para insertar registros
  public function insertar($nombre, $apellido_paterno, $apellido_materno, $correo_electronico, $telefono, $codigo_postal, $curp, $password,$sexo, $ocupacion, $estudios, $fecha_nacimiento,$boleta,$tipo_usuario){
    $sql = "INSERT INTO usuarios (nombres, apellido_paterno, apellido_materno, correo_electronico, telefono, codigo_postal, curp, password, sexo, ocupacion, estudios, fecha_nacimiento, boleta, tipo_usuario)
    VALUES('$nombre', '$apellido_paterno', '$apellido_materno', '$correo_electronico', '$telefono', '$codigo_postal', '$curp','$password','$sexo', '$ocupacion', '$estudios', '$fecha_nacimiento','$boleta','$tipo_usuario')";
    return ejecutarConsulta_retornar_ID($sql);
  }
  //Implementamos nuestro método para actualizar registros
  public function editar($usuario_id, $nombre, $apellido_paterno, $apellido_materno, $correo_electronico, $telefono, $codigo_postal, $curp,$sexo,$ocupacion, $estudios, $fecha_nacimiento, $boleta, $tipo_usuario){
    $sql = "UPDATE usuarios SET nombres = '$nombre', apellido_paterno = '$apellido_paterno', apellido_materno = '$apellido_materno', correo_electronico = '$correo_electronico', telefono = '$telefono', codigo_postal ='$codigo_postal', curp = '$curp',sexo = '$sexo',ocupacion ='$ocupacion', estudios='$estudios',
    fecha_nacimiento = '$fecha_nacimiento', boleta = '$boleta', tipo_usuario = '$tipo_usuario'
    WHERE usuario_id = '$usuario_id'";
    return ejecutarConsulta($sql);
  }
  //Implementamos nuestro método para actualizar registros
  public function editar_password($usuario_id, $password){
    $sql = "UPDATE usuarios SET pass = '$password' WHERE usuario_id = '$usuario_id'";
    return ejecutarConsulta($sql);
  }
  public function mostrar($usuario_id){
    $sql = "SELECT * FROM usuarios WHERE usuario_id = '$usuario_id'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function mostrar_curp($usuario_id){
    $sql = "SELECT * FROM usuarios WHERE curp = '$curp'";
    return ejecutarConsultaSimpleFila($sql);
  }
  public function listar(){
    $sql = "SELECT * FROM usuarios";
    return ejecutarConsulta($sql);
  }
    //Función para verificar el acceso al sistema
    public function verificar($boleta,$password){
        $sql="SELECT * FROM usuarios WHERE boleta='$boleta' AND password='$password'";
        return ejecutarConsulta($sql);
    }
}
?>
