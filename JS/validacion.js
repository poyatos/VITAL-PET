function validarSesion() {
    var puno = document.getElementById("inputPassword").value
    var pdos = document.getElementById("inputRePassword").value;
    var dni = document.getElementById("dni").value;
    var telefono = document.getElementById("telefono_id").value;
    var expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;
    submitOK = "true";
  
    if (puno != pdos) {
      alert("La contraseña tiene que ser igual");
      submitOK = "false";
    } 
  
    if (dni != expresion_regular_dni) {
      alert("El dni no es válido");
      submitOK = "false";
    }
  
    if (telefono.length != 9) {
      alert("Telefono incorrecto");
      submitOK = "false";
    }
  
    if (submitOK == "false") {
      return false;
    }
  }

