var peticion_http = null;

function crearPeticion() {
    if (window.XMLHttpRequest) {
        peticion_http = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        peticion_http = ActiveXObject("Microsoft.XMLHTTP");
    }
}

function mostrarHorasDisponibles() {

    var fechaActual = new Date();
    var mesActual = fechaActual.getMonth() + 1;
    var diaActual = fechaActual.getDate();
    if(mesActual < 10){
        mesActual = "0" + mesActual;
    }
    if(diaActual < 10){
        diaActual = "0" + diaActual;
    }
    var fecha = fechaActual.getFullYear() + "-" + mesActual + "-" + diaActual;
    var fechaInput = document.getElementById("inputFecha").value;

    if (fechaInput >= fecha){
        crearPeticion();

        if (peticion_http) {
            peticion_http.onreadystatechange = function () {
                if (peticion_http.readyState == 4 && peticion_http.status == 200) {
                    var arrayHorasDisponibles = JSON.parse(peticion_http.responseText);
                    var selectHora = document.getElementById("inputHora");
                    selectHora.innerHTML = "";
                    document.getElementById("inputSala").innerHTML = "";
                    document.getElementById("inputVeterinario").innerHTML = "";
                    if (arrayHorasDisponibles == null || arrayHorasDisponibles.length == 0) {
                        alert("No hay horas disponibles para la fecha elegida. Elige otra fecha porfavor.");
                    } else {
                        for (var hora of arrayHorasDisponibles) {
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
        peticion_http.send("fecha=" + fechaInput + "&accion=comprobarHoras");
    } else {
        document.getElementById("inputFecha").value = "";
        document.getElementById("inputHora").innerHTML = "";
        document.getElementById("inputSala").innerHTML = "";
        document.getElementById("inputVeterinario").innerHTML = "";
        alert("La fecha de la cita no puede ser anterior a la fecha actual.");
    }
}

function mostrarSalasDisponibles() {

    var fechaInput = document.getElementById("inputFecha").value;
    var horaInput = document.getElementById("inputHora").value;

        crearPeticion();

        if (peticion_http) {
            peticion_http.onreadystatechange = function () {
                if (peticion_http.readyState == 4 && peticion_http.status == 200) {
                    var arraySalasDisponibles = JSON.parse(peticion_http.responseText);
                    var selectSala = document.getElementById("inputSala");
                    selectSala.innerHTML = "";
                    document.getElementById("inputVeterinario").innerHTML = "";
                    if (arraySalasDisponibles == null || arraySalasDisponibles.length == 0) {
                        alert("No hay salas disponibles para la fecha y hora elegida. Elige otra fecha y hora porfavor.");
                    } else {
                        for (var sala of arraySalasDisponibles) {
                            var option = document.createElement('option');
                            option.textContent = sala;
                            option.value = sala;
                            selectSala.appendChild(option);
                        }
                    }
                }
            }
        }
        peticion_http.open("POST", "citas.php", true);
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        peticion_http.send("fecha=" + fechaInput + "&hora=" + horaInput + "&accion=comprobarSalas");
}

function mostrarVeterinariosDisponibles() {

    crearPeticion();

    var fecha = document.getElementById("inputFecha").value;
    var hora = document.getElementById("inputHora").value;

    if (peticion_http) {
        peticion_http.onreadystatechange = function () {
            if (peticion_http.readyState == 4 && peticion_http.status == 200) {
                var arrayVeterinariosDisponibles = JSON.parse(peticion_http.responseText);
                var selectVeterinario = document.getElementById("inputVeterinario");
                selectVeterinario.innerHTML = "";
                if (arrayVeterinariosDisponibles == null || arrayVeterinariosDisponibles.length == 0) {
                    alert("No hay veterinarios disponibles para la fecha y hora elegida. Elige otra fecha y hora porfavor.");
                } else {
                    for (var veterinario of arrayVeterinariosDisponibles) {
                        var option = document.createElement('option');
                        option.textContent = veterinario['nombre_usuario'] + " " + veterinario['apellidos_usuario'] + " " + veterinario['dni_usuario'];
                        option.value = veterinario['id_usuario'];
                        selectVeterinario.appendChild(option);
                    }
                }
            }
        }
    }
    peticion_http.open("POST", "citas.php", true);
    peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    peticion_http.send("fecha=" + fecha + "&hora=" + hora + "&accion=comprobarVeterinarios");
}

window.onload = function () {
    document.getElementById("inputFecha").onchange = mostrarHorasDisponibles;
    document.getElementById("inputHora").onchange = mostrarSalasDisponibles;
    document.getElementById("inputSala").onchange = mostrarVeterinariosDisponibles;
}