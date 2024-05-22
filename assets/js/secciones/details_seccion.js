(function(){

    // ASIGNATE TEACHER
    $("#asignar_docente").click(function(ev){
        var cedula = $("#docente_asig").val();
        var id_seccion = $("#id_seccion").val();
        
        $.ajax({
            url: 'secciones/asignate_docente',
            type: 'POST',
            data: { 'cedula' : cedula, 
                    'id_seccion': id_seccion
            },
            beforeSend:function(){
                $("#loading").append('<p class="img_load">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("footer").append("<script src='"+json.js+"' id='js_resource'></script>");
                $(".img_load").remove();

                $("#docente_asig").attr('disabled','true');
                $("#asignar_docente").attr('disabled','true');

                Swal.fire(
                    'Proceso Exitoso!',
                    json.msg,
                    'success'
                );
            },
            statusCode: {
                500: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    Swal.fire(
                        'Error!',
                        json.msg,
                        'error'
                    );
                }
            }
        });

        ev.preventDefault();
    });

    // CHANGE
    $("#btn-change").click(function(ev){

        $("form select").attr('disabled', false);
        $("#capacidad").attr('readonly', false);
        $("#btn-change").addClass('d-none');
        $("#btn-update").removeClass('d-none').fadeIn();
        $("#asignar_docente").attr('disabled', false);

        if($("#docente_asig").val() == ""){

            var text2 = $('#docente_asig').find("option:last").text();
    
            if(text2 == 'No hay docentes para este turno!'){
                $("#docente_asig").attr('disabled', true);
                $("#asignar_docente").attr('disabled', true);
            }

        }

        if($("#grado").val() != ""){
            $("#seccion").attr("disabled", false);
        }else{
            $("#seccion").attr("disabled", true);
        }

        ev.preventDefault();
    });

    $("#btn-cancel").click(function(ev){

        $("form select").attr('disabled', true);
        $("#capacidad").attr('readonly', true);
        $("#btn-change").removeClass('d-none');
        $("#btn-update").addClass('d-none');

        $("#asignar_docente").attr('disabled', true);

        if($("#docente_asig").val() == ""){

            var text1 = $('#docente_asig').find("option:first").text();
            var text2 = $('#docente_asig').find("option:last").text();
    
            if(text2 == 'No hay docentes para este turno!'){
                $("#docente_asig").attr('disabled', true);
                $("#asignar_docente").attr('disabled', true);
            }else if(text1 == 'Sin asignar'){
                $("#docente_asig").attr('disabled', false);
                $("#asignar_docente").attr('disabled', false);
            }
        }

        ev.preventDefault();
    });

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
        var id_seccion = $("#id_seccion").val();

        $("#seccion").removeClass("is-invalid");

        $.ajax({
            url: 'secciones/verificate_letra',
            type: 'POST',
            data: {'value' : value, 'grado': grado, 'id': id_seccion},
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
                    
                    if(json.letra != value){

                        $(".msg-3").empty();
                        $(".msg-3").html('Seleccione una letra diferente a: ');

                        json.seccions.forEach(element => {
                            if(json.letra != element.seccion){
                                $(".msg-3").append(element.seccion + " ");
                            }
                        });
    
                        $("#seccion").addClass("is-invalid");
    
                        Swal.fire(
                            "Error!",
                            json.msg,
                            "error",
                        );
                    }

                },
            }
    
        });
        ev.preventDefault();
    });

    // UPDATE
    $("#update_seccion").submit(function(ev){

        $("#grado").removeClass("is-invalid");
        $("#turno").removeClass("is-invalid");
        $("#seccion").removeClass("is-invalid");
        $("#capacidad").removeClass("is-invalid");
        $(".img_load").remove();

        $.ajax({
            url: 'secciones/update',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="img_load">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#update_seccion")[0].reset();

                $("#table-data").empty();
                $("#table-data").html(json.students);

                $("#form").remove();
                $("#form2").empty();
                $("#form2").html(json.view);

                // Call the dataTables jQuery plugin
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
                        $("#grado").parents(".form-group").find("div:last").html(json.grado);
                        // $(".msg-1").html(json.grado);
                        $("#grado").addClass("is-invalid");
                    }
                    
                    if(json.seccion.length != 0){
                        $(".img_load").remove();
                        // $(".msg-3").html(json.seccion);
                        $("#seccion").parents(".form-group").find("div:last").html(json.seccion);
                        $("#seccion").addClass("is-invalid");
                    }

                    if(json.turno.length != 0){
                        $(".img_load").remove();
                        // $(".msg-2").html(json.turno);
                        $("#turno").parents(".form-group").find("div:last").html(json.turno);
                        $("#turno").addClass("is-invalid");
                    }

                    if(json.capacidad.length != 0){
                        $(".img_load").remove();
                        // $(".msg-4").html(json.capacidad);
                        $("#capacidad").parents(".form-group").find("div:last").html(json.capacidad);
                        $("#capacidad").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.seccion.length != 0){
                        $(".img_load").remove();
                        // $(".msg-2").html(json.seccion);
                        $("#seccion").parents(".form-group").find("div:last").html(json.seccion);
                        $("#seccion").addClass("is-invalid");
                    }

                    if(json.turno.length != 0){
                        $(".img_load").remove();
                        // $(".msg-2").html(json.turno);
                        $("#turno").parents(".form-group").find("div:last").html(json.turno);
                        $("#turno").addClass("is-invalid");
                    }
                },
                500: function(xhr){
                    var json = JSON.parse(xhr.responseText);
                    $(".img_load").remove();
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

    // ASIGNAR
    $("tr td #btn-sin-asignar").click(function(ev){
        var id = $(this).val();
        var id_seccion = $("#id_seccion").val();
        var proceso = "Asignar";

        $.ajax({
            url: 'secciones/asignate_alumnos',
            type: 'POST',
            data: {'id' : id, 'id_seccion': id_seccion, 'proceso': proceso},
            beforeSend:function(){
                $("#loading").append('<p class="img_load text-info">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#table-data").empty();
                $("#table-data").html(json.students);

                $("#form").remove();
                $("#form2").empty();
                $("#form2").html(json.view);

                // Call the dataTables jQuery plugin
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
                500: function(xhr){
                    var json = JSON.parse(xhr.responseText);
                    if(json.msg != 0){
                        $(".img_load").remove();

                        Swal.fire(
                            'Error!',
                            json.msg,
                            'error'
                        );
                    }
                }
            }
        });

        ev.preventDefault();
    });
    // QUITAR
    $("tr td #btn-asignados").click(function(ev){
        var id = $(this).val();
        var id_seccion = $("#id_seccion").val();
        var proceso = "quitar";

        $.ajax({
            url: 'secciones/asignate_alumnos',
            type: 'POST',
            data: {'id' : id, 'id_seccion': id_seccion, 'proceso': proceso},
            beforeSend:function(){
                $("#loading").append('<p class="img_load text-info">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#table-data").empty();
                $("#table-data").html(json.students);

                $("#form").remove();
                $("#form2").empty();
                $("#form2").html(json.view);

                // Call the dataTables jQuery plugin
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
                500: function(xhr){
                    console.log(xhr);
                    var json = JSON.parse(xhr.responseText);
                    if(json.msg != 0){
                        Swal.fire(
                            'Error!',
                            json.msg,
                            'error'
                        );
                    }
                }
            }
        });


        ev.preventDefault();
    });
    //VER
    $("tr td #ver").click(function(ev){
        var code = $(this).val();
        var base_url = $("#base_url").val();
        $("#content-details").empty();
        $(".img_load").remove();
        
        // AJAX
        $.ajax({
            url: 'alumnos/detalles_alumno',
            type: 'POST',
            data: {'code' : code},
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                $("#content-details").empty();
                $("#content-details").append(json.view);
                // $(".js_resource").remove();
                // $("footer").append("<script class='js_resource' src='"+json.js_two+"'></script>");
                $(".img_load").remove();
            }
        });
        ev.preventDefault();
    });
})();