var tabla;

//Función que se ejecuta al inicio
function init(){
    mostrarform(false);
    listar();

    $("#formulario").on("submit",function(e)
    {
        guardaryeditar(e);
    })
}

//Función limpiar
function limpiar()
{
    $("#nombre").val("");
    $("#num_documento").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#email").val("");
    $("#cargo").val("");
    $("#login").val("");
    $("#clave").val("");
    $("#imagenmuestra").attr("src","");
    $("#imagenactual").val("");
    $("#idusuario").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
    limpiar();
    if (flag)
    {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);
        $("#btnagregar").hide();
    }
    else
    {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función cancelarform
function cancelarform()
{
    limpiar();
    mostrarform(false);
}

//Función Listar
function listar()
{
    tabla=$('#tbllistado').dataTable(
    {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "ajax":
                {
                  url: '../ajax/usuario.php?op=listar',
                  type : "get",
                  dataType : "json",
                  error: function(e){
                      console.log(e.responseText);
                  }
              },
      "bDestroy": true,
      "iDisplayLength": 15,//Paginación
      "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
  }).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled",true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function(datos)
        {
              alert(datos);
              mostrarform(false);
              tabla.ajax.reload();
        }

    });
    limpiar();
}

function mostrar(idusuario)
{
    $.post("../ajax/usuario.php?op=mostrar",{idusuario : idusuario}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);

        $("#nombre").val(data.nombre);
        $("#tipo_documento").val(data.tipo_documento);
        $("#tipo_documento").selectpicker('refresh');
        $("#num_documento").val(data.num_documento);
        $("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
        $("#email").val(data.email);
        $("#cargo").val(data.cargo);
        $("#login").val(data.login);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/usuarios/"+data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#idusuario").val(data.idusuario);

    });
    $.post("../ajax/usuario.php?op=permisos&id="+idusuario,function(r){
            $("#permisos").html(r);
    });
}

init();