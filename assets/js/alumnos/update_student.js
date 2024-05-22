(function(){
    // SELECTORES OPTION
    $('select#grado').on('change',function(ev){
        var value = $(this).val();
        var base_url = $("#base_url").val();
        $.ajax({
            url: base_url+'secciones/return_secciones',
            type: 'POST',
            data: {'value' : value},
            beforeSend:function(){
            }, 
            success: function(data){
                var json = JSON.parse(data);

                if(json != false){
                    $("#seccion").empty();
                    json.forEach(element => {
                        $("#seccion").append("<option value='' class='oculto'>Secci&oacute;n</option><option value='"+element.id+ "'>"+element.seccion+"</option>"); 
                    });
                }else{
                    $("#seccion").empty();
                    $("#seccion").append("<option value='' class='oculto'>No hay secciones</option>"); 
                }
            },
    
        });
        ev.preventDefault();
    });
    
    // SELECTORES OPTION
    $('select#seccion').on('change',function(ev){
        var value = $(this).val();
        var base_url = $("#base_url").val();
        $.ajax({
            url: base_url+'secciones/return_seccion',
            type: 'POST',
            data: {'value' : value},
            beforeSend:function(){
            }, 
            success: function(data){
                var json = JSON.parse(data);

                $("#turno").empty();
                $("#turno").val(json.turno);
            },
    
        });
        ev.preventDefault();
    });

    // BTN
    $("#btn_update_alumno").click(function(ev){

        // HABILITAR EDICION
        $("form select").attr("disabled", false);
        $("#nombre").attr("readonly", false);
        $("#apellido").attr("readonly", false);
        $("select#sexo_student").attr("disabled", false);
        $("#fecha_n").attr("readonly", false);
        $("#edad").attr("readonly", false);
        $("#group-btn").removeClass('d-none');
        $("#btn_update_alumno").attr("disabled", true);
        ev.preventDefault();
    });
    $("#cancel").click(function(ev){

        // DESABILITAR EDICION
        $("form select").attr("disabled", true);
        $("#nombre").attr("readonly", true);
        $("#apellido").attr("readonly", true);
        $("select#sexo_student").attr("disabled", true);
        $("#fecha_n").attr("readonly", true);
        $("#edad").attr("readonly", true);
        $("#group-btn").addClass('d-none');
        $("#btn_update_alumno").attr("disabled", false);
        $("#form_alumno")[0].reset();
        ev.preventDefault();
    });

    // UPDATE
    $("#form_alumno").submit(function(ev){

        $("#grado").removeClass("is-invalid");
        $("#seccion").removeClass("is-invalid");
        $("#turno").removeClass("is-invalid");

        $("#nombre").removeClass("is-invalid");
        $("#apellido").removeClass("is-invalid");
        $("#sexo_student").removeClass("is-invalid");

        $("#fecha_n").removeClass("is-invalid");
        $("#edad").removeClass("is-invalid");
        $("#codigo").removeClass("is-invalid");

        $.ajax({
            url: 'alumnos/update_alumno',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="img_load text-info">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
				$("#container-table").remove();
				$("#tabla-datos").empty();
				$("#container-data").empty();
				$("#container-data").append(json.view);
				$(".js_resource").remove();
				$("footer").append("<script class='js_resource' src='"+json.js_two+"'></script>");
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
                        $("#grado").addClass("is-invalid");
                    }
                    
                    if(json.seccion.length != 0){
                        $(".img_load").remove();
                        $("#seccion").parents(".form-group").find("div:last").html(json.seccion);
                        $("#seccion").addClass("is-invalid");
                    }

                    if(json.turno.length != 0){
                        $(".img_load").remove();
                        $("#turno").parents(".form-group").find("div:last").html(json.turno);
                        $("#turno").addClass("is-invalid");
                    }

                    if(json.nombre.length != 0){
                        $(".img_load").remove();
                        $("#nombre").parents(".form-group").find("div:last").html(json.nombre);
                        $("#nombre").addClass("is-invalid");
                    }

                    if(json.apellido.length != 0){
                        $(".img_load").remove();
                        $("#apellido").parents(".form-group").find("div:last").html(json.apellido);
                        $("#apellido").addClass("is-invalid");
                    }

                    if(json.sexo_student.length != 0){
                        $(".img_load").remove();
                        $("#sexo_student").parents(".form-group").find("div:last").html(json.sexo_student);
                        $("#sexo_student").addClass("is-invalid");
                    }

                    if(json.fecha_n.length != 0){
                        $(".img_load").remove();
                        $("#fecha_n").parents(".form-group").find("div:last").html(json.fecha_n);
                        $("#fecha_n").addClass("is-invalid");
                    }

                    if(json.edad.length != 0){
                        $(".img_load").remove();
                        $("#edad").parents(".form-group").find("div:last").html(json.edad);
                        $("#edad").addClass("is-invalid");
                    }

                    if(json.codigo.length != 0){
                        $(".img_load").remove();
                        $("#codigo").parents(".form-group").find("div:last").html(json.codigo);
                        $("#codigo").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.codigo.length != 0){
                        $(".img_load").remove();
                        $("#codigo").parents(".form-group").find("div:last").html(json.codigo);
                        $("#codigo").addClass("is-invalid");
                    }

                    if(json.alumno.length != 0){
                        $(".img_load").remove();
                        Swal.fire(
                            'Error!',
                            json.alumno,
                            'error'
                        );
                    }

                    $(".img_load").remove();
                },
                500: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    $(".img_load").remove();

                    Swal.fire(
                        'Error!',
                        json.msg,
                        'error'
                    );
                }
            }
        });
        ev.preventDefault();
    })
})();