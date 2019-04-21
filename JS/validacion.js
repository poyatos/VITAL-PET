//OPCION A

var boton = document.getElementById("logueo");
boton.onclick = function() { Ç

//validacion DNI
var dni = document.getElementById("dni")
var numero
var letra
var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
var exprexion_regunar_2 = /(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))/;
//validacion DNI

//validacion PASS
var contrasena = document.getElementById("pwd")
//validacion PASS

//PABLO:  TEST -> Devuelve un valor booleano que indica si existe un patrón en una cadena buscada. (ER) nombre dada a la variable (expresión regular)
if(expresion_regular_dni.test(dni) === true){
   numero = dni.substr(0,dni.length-1);
   numero = numero.replace('X', 0);
   numero = numero.replace('Y', 1);
   numero = numero.replace('Z', 2);
   let = dni.substr(dni.length-1, 1);
   numero = numero % 23;
   letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
   letra = letra.substring(numero, numero+1);
   if (letra != let) {
       //alert('Dni erroneo, la letra del NIF no se corresponde');
       return false;
   }else{
       //alert('Dni correcto');
       return true;
   }
}else{
   //alert('Dni erroneo, formato no válido');
   return false;
}
 //campos vacios
 if (contrasena.length == 0 || dni.length == 0 ) { 
    alert('Los campos no pueden estar vacios');
 }

 /* POR HACER

 if (contrasena != contrasena(BASE DE DATOS)){
     ALERT( 'contraseña erronea')
 }


 */

} 

