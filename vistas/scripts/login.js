/*$("#frmRegistro").on("submit",function(e){
    guardaryeditar(e);
});*/

$("#frmAcceso").on('submit',function(e){
    e.preventDefault();
    boleta=$("#input_login_boleta").val();
    password=$("#input_login_password").val();
    $.post("../ajax/usuario.php?op=verificar",
    {"boleta":boleta,"password":password},
    function(data){
      if (data!="null"){
        data = JSON.parse(data);
        alert('Bienvendo '+ data.nombres +'!');
        $(location).attr("href","index.php");
      }
      else{
        alert("Usuario y/o Password incorrectos");
      }
    });
  });
  $("#frmRegistro").on('submit',function(e){
      e.preventDefault();
      apellido_paterno=$("#input_apellido_paterno").val();
      apellido_materno=$("#input_apellido_materno").val();
      nombre=$("#input_nombre").val();
      curp=$("#input_curp").val();
      sexo=$("#input_sexo").val();
      fecha_nacimiento=$("#input_fecha_nacimiento").val();
      ocupacion=$("#input_ocupacion").val();
      estudios=$("#input_estudios").val();
      codigo_postal=$("#input_codigo_postal").val();
      correo_electronico=$("#input_correo_electronico").val();
      telefono=$("#input_telefono").val();
      tipo_usuario=$("#input_tipo_usuario").val();
      password=$("#input_password").val();
      $.post("../ajax/usuario.php?op=guardaryeditar",
      {'nombre':nombre, 'apellido_paterno':apellido_paterno, 'apellido_materno':apellido_materno, 'correo_electronico':correo_electronico, 'telefono':telefono, 'codigo_postal':codigo_postal, 'curp':curp, 'password':password,'sexo':sexo,'ocupacion':ocupacion, 'estudios':estudios, 'fecha_nacimiento':fecha_nacimiento,'tipo_usuario':tipo_usuario},
      function(data){
        if (data!="null"){
          $.post("../ajax/usuario.php?op=mostrar",
          {"usuario_id":data},
          function(data){
            if (data!="null"){
              data = JSON.parse(data);
              alert('Usuario registrado exitosamente!'+ '\n Su número de matrícula para el sistema es: '+data.boleta);
              $.post("../ajax/usuario.php?op=verificar",
              {"boleta":data.boleta,"password":data.password},
              function(data){
                if (data!="null"){
                  data = JSON.parse(data);
                  alert('Bienvendo '+ data.nombres +'!');
                  $(location).attr("href","index.php");
                }
                else{
                  alert("Usuario y/o Password incorrectos");
                }
              });
            }
            else{
              alert("No se ha registrado el usuario");
            }
          });
        }
        else{
          alert("No se ha registrado el usuario");
        }
      });
    });
  /*function guardaryeditar(e){
      e.preventDefault(); //No se activará la acción predeterminada del evento
      apellido_paterno=$("#input_apellido_paterno").val();
      apellido_materno=$("#input_apellido_materno").val();
      nombre=$("#input_nombre").val();
      curp=$("#input_curp").val();
      sexo=$("#input_sexo").val();
      fecha_nacimiento=$("#input_fecha_nacimiento").val();
      ocupacion=$("#input_ocupacion").val();
      estudios=$("#input_estudios").val();
      codigo_postal=$("#input_codigo_postal").val();
      correo_electronico=$("#input_correo_electronico").val();
      telefono=$("#input_telefono").val();
      tipo_usuario=$("#input_tipo_usuario").val();
      password=$("#input_password").val();
      $.ajax({
          url: "../ajax/usuario.php?op=guardaryeditar",
          type: "POST",
          data: {'nombre':nombre, 'apellido_paterno':apellido_paterno, 'apellido_materno':apellido_materno, 'correo_electronico':correo_electronico, 'telefono':telefono, 'codigo_postal':codigo_postal, 'curp':curp, 'password':password,'sexo':sexo,'ocupacion':ocupacion, 'estudios':estudios, 'fecha_nacimiento':fecha_nacimiento,'tipo_usuario':tipo_usuario},
          contentType: false,
          processData: false,
          success: function(datos){
                alert(datos);
          }
      });
  }*/
