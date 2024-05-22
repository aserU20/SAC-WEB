// Call the dataTables jQuery plugin
$(document).ready(function() {
    var base_url = $("#base_url").val();
    $('.dataTable').DataTable({
      "language" : {
        "url": base_url+"assets/vendor/datatables/es_es.json"
      }
    });
});

(function(){

    // verificate letra
    $('select#grado').on('change',function(ev){
        var value = $(this).val();
        if(value != ""){
            $("#seccion").attr("disabled", false);
        }
    });
    $('select#seccion').on('change',function(ev){
        var value = $(this).val();
        var grado = $("#grado").val();
        $("#seccion").removeClass("is-invalid");

        $.ajax({
            url: 'secciones/verificate_letra',
            type: 'POST',
            data: {'value' : value, 'grado': grado},
            beforeSend:function(){
            }, 
            success: function(data){
                var json = JSON.parse(data);

                // $("#seccion").empty();
                // $("#seccion").val(json.letra); 
            },
            statusCode: {
                401: function(xhr){
                    $(".img_load").remove();
                    var json = JSON.parse(xhr.responseText);

                    $(".msg-3").empty();
                    $(".msg-3").html('Seleccione una letra diferente a: ');

                    json.seccions.forEach(element => {
                        $(".msg-3").append(element.seccion + " ");
                     });

                    $("#seccion").addClass("is-invalid");

                    Swal.fire(
                        "Error!",
                        json.msg,
                        "error",
                    );
                },
            }
    
        });
        ev.preventDefault();
    });

    // CREATE
    $("#create_seccion").submit(function(ev){

        $("#grado").removeClass("is-invalid");
        $("#turno").removeClass("is-invalid");
        $("#seccion").removeClass("is-invalid");
        $("#capacidad").removeClass("is-invalid");
        $(".img_load").remove();

        $.ajax({
            url: 'secciones/store',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="img_load">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#create_seccion")[0].reset();
                $("#table-data").empty();
                $("#table-data").html(json.view);

                var base_url = $("#base_url").val();
                $('.dataTable').DataTable({
                  "language" : {
                    "url": base_url+"assets/vendor/datatables/es_es.json"
                  }
                });
                $("footer").append("<script src='"+json.js+"' id='js_resource'></script>");
                $(".img_load").remove();
                
                Swal.fire(
                    'Proceso Exitoso!',
                    json.msg,
                    'success'
                );
            }, 
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.grado.length != 0){
                        $(".img_load").remove();
                        $(".msg-1").html(json.grado);
                        $("#grado").addClass("is-invalid");
                    }
                    
                    if(json.seccion.length != 0){
                        $(".img_load").remove();
                        $(".msg-3").html(json.seccion);
                        $("#seccion").addClass("is-invalid");
                    }

                    if(json.turno.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.turno);
                        $("#turno").addClass("is-invalid");
                    }

                    if(json.capacidad.length != 0){
                        $(".img_load").remove();
                        $(".msg-4").html(json.capacidad);
                        $("#capacidad").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.seccion.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.seccion);
                        $("#seccion").addClass("is-invalid");
                    }

                    if(json.turno.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.turno);
                        $("#turno").addClass("is-invalid");
                    }
                },
                500: function(xhr){
                    $(".img_load").remove();
                    var json = JSON.parse(xhr.responseText);
                    Swal.fire(
                        "Error!",
                        json.msg,
                        "error",
                    );
                },
            }
        });

        ev.preventDefault();
    });
})();
