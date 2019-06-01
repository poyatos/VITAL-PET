function validarPass() {
    var pass = document.getElementById("id_pass").value;
    var pass2 = document.getElementById("id_pass2").value;
    if (pass != pass2) {
      alert("Las contraseñas tienen que ser iguales.");
      return false;
    } 
    return true;
  }