$(document).on('ready',function(){

    $('#inputFecha').on('change',function(){
        var fecha = $("inputFecha").val()
        
        var request = $.ajax
        ({
            url: "../CONTROLADOR/controladorComprobacionCitas.php",
            method: "POST",
            dataType: "json"
        });

        

    }