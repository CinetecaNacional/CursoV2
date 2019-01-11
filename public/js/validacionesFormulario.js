function pesos(input){
  if(input.value){
    input.value = parseFloat(input.value).toFixed(2);
  }
}

function upperCase(input){
  if(input.value){
    input.value = input.value.toUpperCase();
  }
}

//Función para validar una CURP
function curpValida(curp) {
    var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
        validado = curp.match(re);

    if (!validado)  //Coincide con el formato general?
    	return false;

    //Validar que coincida el dígito verificador
    function digitoVerificador(curp17) {
        //Fuente https://consultas.curp.gob.mx/CurpSP/
        var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
            lngSuma      = 0.0,
            lngDigito    = 0.0;
        for(var i=0; i<17; i++)
            lngSuma = lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
        lngDigito = 10 - lngSuma % 10;
        if (lngDigito == 10) return 0;
        return lngDigito;
    }

    if (validado[2] != digitoVerificador(validado[1]))
    	return false;

    return true; //Validado
}


//Handler para el evento cuando cambia el input
//Lleva la CURP a mayúsculas para validarlo
function validarInput(input) {
    var curp = input.value.toUpperCase();
        input.value= input.value.toUpperCase();
        input.addEventListener("keyup", function (event) {
          if (curpValida(curp)) {
            input.setCustomValidity("");
            if(input.value[10]=='M'){
              document.getElementById('input_sexo').value = 'MUJER';
            }else{
              document.getElementById('input_sexo').value = 'HOMBRE';
            }
            var year ='';
            var actual_year = (new Date()).getFullYear();
            var noventas =parseInt('19'+input.value[4]+input.value[5]),
            dosmils = parseInt('20'+input.value[4]+input.value[5]);
            if(dosmils<=actual_year){
              year = dosmils;
            }else{
              year = noventas;
            }
            var fecha_nacimiento = year+'-'+input.value[6]+input.value[7]+'-'+input.value[8]+input.value[9];
            document.getElementById('input_fecha_nacimiento').value = fecha_nacimiento;
          } else {
            input.setCustomValidity("Ingrese un CURP válido");
            document.getElementById('input_sexo').value = '';
            document.getElementById('input_fecha_nacimiento').value = ''
          }
        });
}
function conversiondolar(precio, curso) {
  var donde = 'conversion'+curso;
  document.getElementById(donde).innerHTML= "Aproximadamente $" + (precio*0.052).toFixed(2)+" USD";

}
function conversioneuro(precio, curso) {
  var donde = 'conversion'+curso;
  document.getElementById(donde).innerHTML= "Aproximadamente " + (precio*0.044).toFixed(2)+" EUR";
}

var input_password = document.getElementById('input_password'),
    input_password_comfirm = document.getElementById('input_password_comfirm');
input_password_comfirm.addEventListener("blur", function( event ){
  if(input_password.value!==input_password_comfirm.value){
    input_password.setCustomValidity('Las contraseñas no coinciden');
  }else{
    input_password.setCustomValidity("");
  }
});
