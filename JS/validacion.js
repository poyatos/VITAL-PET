//OPCION A

var boton = document.getElementById("logueo");
boton.onclick = function() { Ç

//validacion DNI
var dni = document.getElementById("dni")
var numero
var le
var letra
var expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
//validacion DNI

//validacion PASS
var contrasena = document.getElementById("pwd")
//validacion PASS

//PABLO:  TEST -> Devuelve un valor booleano que indica si existe un patrón en una cadena buscada. (ER) nombre dada a la variable (expresión regular)
if(expresion_regular_dni.test (er) == dni){ //condicional que compara un dni correcto (expresion regular) con el introducido
   numero = er.substr(0,er.length-1);
   le = er.substr(er.length-1,1);
   numero = numero % 23;
   letra='TRWAGMYFPDXBNJZSQVHLCKET'; //letras validas para dni
   letra=letra.substring(numero,numero+1);

  if (letra!=le.toUpperCase()) {
     alert('La letra del Dni no se corresponde');
   }else{
     alert('Dni correcto'); // aqui esta correcto
   }
}else{
   alert('Dni erroneo, formato no válido');
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

