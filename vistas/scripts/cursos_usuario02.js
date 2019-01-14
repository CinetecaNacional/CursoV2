var tabla;
//Función que se ejecuta al inicio

function init(){
  mostrarform(false);
  listar();
  $("#formulario").on("submit",function(e){
		guardaryeditar(e);
	})
}
//Función limpiar
function limpiar(){
  $("#input_descuento_id").val("");
  $("#input_name").val("");
  $("#input_porcentaje").val("");
  $("#input_available").val("");
}
//Función mostrat formulario
function mostrarform(flag){
  limpiar();
  if(flag){
    $("#listadoregistros").hide();
    $("#formularioregistros").show();
    $("#btnGuardar").prop("disabled",false);
    $("#btnagregar").hide();
  }else{
    $("#listadoregistros").show();
    $("#formularioregistros").hide();
    $("#btnGuardar").prop("disabled",true);
    $("#btnagregar").show();
  }
}

//Función cancelar formulario
function cancelarform(){
  limpiar();
  mostrarform(false);
}

//Función listar
function listar(){
  tabla = $("#tbllistado").dataTable({
    "aProcessing":true, //Activamos el procesamiento del datatables
    "aServerSide":true, //Paginación y filtrado realizados por el servidor
    dom:'Bfrtip',
    buttons:[
      'copyHtml5',
      'excelHtml5',
      'csvHtml5',
      'pdf'
    ],
    "ajax":{
      url:'../ajax/descuento.php?op=listar',
      type:"get",
      dataType: "json",
      error: function(e){
        console.log(e.responseText);
      },
      "bDestroy": true,
      "iDisplayLength": 15,//Paginación
      "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    }
  }).DataTable();
}
function mostrar(descuento_id)
{
    $.post("../ajax/descuento.php?op=mostrar",{descuento_id : descuento_id}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#input_descuento_id").val(data.descuento_id);
        $("#input_name").val(data.nombre);
        $("#input_porcentaje").val(data.porcentaje);
        $("#input_available").val(data.disponible);
    })
}

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/descuento.php?op=guardaryeditar",
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

init();
