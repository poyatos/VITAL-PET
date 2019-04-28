function fechaSeleccionada(fecsel) {
    var fecsel = true;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var fechaSelec = document.getElementById("inputFecha").value;
           }

           if (fechaSelec != ""){
               alert ("esta fecha no esta disponible");
               return fecsel;
           }else{
                fecsel = false;
                return fecsel;
           }

         };
         xhttp.open("POST", "../../CONTROLADOR/controladorCitasDisponibles.php", true);
         xhttp.send();


        }