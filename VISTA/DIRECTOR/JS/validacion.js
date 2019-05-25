function validarContrato() {
    var puno = document.getElementById("inputPassword").value;
    var pdos = document.getElementById("inputRePassword").value;
    var dni = document.getElementById("inputDni").value;
    var expresionRegularDni = /^[XYZ]?\d{5,8}[A-Z]$/;
    if (puno != pdos) {
      alert("Las contraseñas tienen que ser iguales.");
      return false;
    } 
    if (preg_match(expresionRegularDni, dni)) {
      alert("El dni no es válido.");
      return false;
    }
    return true;
  }

