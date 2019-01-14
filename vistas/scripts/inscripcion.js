function inscribir(curso_id){
  $.post("../ajax/cursos_usuarios.php?op=guardar",{curso_id: curso_id }, function(data, status){
    $("#resultado").html(data);
  })
}
