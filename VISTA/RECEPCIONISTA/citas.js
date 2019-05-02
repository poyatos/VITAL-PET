var peticion_http = null;

function crearPeticion() {
    if (window.XMLHttpRequest) {
        peticion_http = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        peticion_http = ActiveXObject("Microsoft.XMLHTTP");
    }
}

function mostrarHorasDisponibles() {

    crearPeticion();

    var fecha = document.getElementById("inputFecha").value;

    if (peticion_http) {
        peticion_http.onreadystatechange = function () {
            if (peticion_http.readyState == 4 && peticion_http.status == 200) {
                var selectHora = document.getElementById("inputHora");
                var arrayHorasDisponibles = JSON.parse(peticion_http.responseText);
                selectHora.innerHTML = "";
                if (arrayHorasDisponibles == null || arrayHorasDisponibles.length == 0) {
                    document.getElementById("inputHora").innerHTML = "<option value='0' selected></option>";
                    alert("No hay horas disponibles para la fecha elegida. Elige otra fecha porfavor.");
                } else {
                    for (var hora of arrayHorasDisponibles) {
                        var selectHora = document.getElementById("inputHora");
                        var option = document.createElement('option');
                        option.textContent = hora;
                        option.value = hora;
                        selectHora.appendChild(option);
                    }
                }
            }
        }
    }
    peticion_http.open("POST", "citas.php", true);
    peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    peticion_http.send("fecha=" + fecha + "&accion=comprobarHoras");
}

window.onload = function () {
    document.getElementById("inputFecha").onchange = mostrarHorasDisponibles;
}