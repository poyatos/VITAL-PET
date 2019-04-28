function validarContrato() {
    var puno = document.getElementById("inputPassword").value;
    var pdos = document.getElementById("inputRePassword").value;
    var dni = document.getElementById("inputDni").value;
    var expresionRegularDni = /^[XYZ]?\d{5,8}[A-Z]$/;
    if (puno != pdos) {
      alert("La contraseña tiene que ser igual");
      return false;
    } 
    if (dni != expresionRegularDni) {
      alert("El dni no es válido");
      return false;
    }
    return true;
  }

