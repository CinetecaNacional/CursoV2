function mostrar(usuario_id){
    $.post("../ajax/usuario.php?op=mostrar",{usuario_id : usuario_id }, function(data, status){
        data = JSON.parse(data);
        console.log(data.nombres);
        $("#dato-nombre").html(data.nombres +' ' +data.apellido_paterno+' '+data.apellido_materno );
        $("#dato-CURP").html(data.curp);
        $("#dato-fecha_nacimiento").html(data.fecha_nacimiento);
        $("#dato-sexo").html(data.sexo);
        $("#dato-ocupacion").html(data.ocupacion);
        $("#dato-estudios").html(data.estudios);
        $("#dato-correo_electronico").html(data.correo_electronico);
        $("#dato-telefono").html(data.telefono);
        $("#dato-cp").html(data.codigo_postal);
    })
}
