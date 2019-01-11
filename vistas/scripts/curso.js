var tabla;
//Función que se ejecuta al inicio

function init(){
  mostrarform(false);
  listar();
  $("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);
	});
  $("#imagenmuestra").hide();
}
//Función limpiar
function limpiar(){
  $("#input_curso_id").val("");
  $("#input_name").val("");
  $("#imagenmuestra").attr("src","");
  $("#imagen").val("");
  $("#imagenactual").val("");
  $("#textarea_description").val("");
  $("#input_price").val("");
  $("#input_available").val("");
  $("#input_kindCourse").val("");
  $("#input_offerPrice").val("");
  $("#input_dateAvailable").val("");
  $('#input_dateAvailable').removeAttr("required");
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
      url:'../ajax/curso.php?op=listar',
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
function mostrar(curso_id)
{
    $.post("../ajax/curso.php?op=mostrar",{curso_id : curso_id}, function(data, status)
    {
        data = JSON.parse(data);
        mostrarform(true);
        $("#input_curso_id").val(data.curso_id);
        $("#input_name").val(data.nombres);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/cursos/"+data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#textarea_description").val(data.descripcion);
        $("#input_price").val(data.precio);
        $("#input_available").val(data.disponible);
        $("#input_kindCourse").val(data.tipo_curso);
        $("#input_offerPrice").val(data.precio_promocion);
        $("#input_dateAvailable").val(data.vigencia_promocion);

    })
}

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/curso.php?op=guardaryeditar",
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
//Función para desactivar registros
function desactivar(curso_id)
{
	var result = confirm("¿Está Seguro de quitar el curso al público?");
  if(result){
    $.post("../ajax/curso.php?op=desactivar", {curso_id : curso_id}, function(e){
      alert(e);
      tabla.ajax.reload();
    });
  }
}
//Función para desactivar promoción registros
function desactivar_promocion(curso_id)
{
	var result = confirm("¿Está Seguro de quitar la promoción del curso?");
  if(result){
    $.post("../ajax/curso.php?op=desactivar_promocion", {curso_id : curso_id}, function(e){
      alert(e);
      tabla.ajax.reload();
    });
  }
}
//Función para activar registros
function activar(curso_id)
{
	var result =confirm("¿Está seguro de poner al público el curso?");
		if(result==true){
        	$.post("../ajax/curso.php?op=activar", {curso_id : curso_id}, function(e){
        		alert(e);
	            tabla.ajax.reload();
        	});
        }else{
          alert("Has cancelado la publicación del curso")
        }
}
init();
