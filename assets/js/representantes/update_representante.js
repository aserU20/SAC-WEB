(function(){
    // BTN
    $("#btn_update_alumno").click(function(ev){

        // HABILITAR EDICION
        $("form select").attr("disabled", false);
        $("#ci").attr("readonly", false);
        $("#nombre_r").attr("readonly", false);
        $("#apellido_r").attr("readonly", false);
        $("#fecha_n_r").attr("readonly", false);
        $("#edad_r").attr("readonly", false);
        $("#telefono").attr("readonly", false);
        $("#ciudad").attr("readonly", false);
        $("#direccion").attr("readonly", false);
        $("#group-btn").removeClass('d-none');
        $("#btn_update_alumno").attr("disabled", true);
        ev.preventDefault();
    });
    $("#cancel").click(function(ev){

        // DESABILITAR EDICION
        $("form select").attr("disabled", true);
        $("#ci").attr("readonly", true);
        $("#nombre_r").attr("readonly", true);
        $("#apellido_r").attr("readonly", true);
        $("#fecha_n_r").attr("readonly", true);
        $("#edad_r").attr("readonly", true);
        $("#telefono").attr("readonly", true);
        $("#ciudad").attr("readonly", true);
        $("#direccion").attr("readonly", true);
        $("#group-btn").addClass('d-none');
        $("#btn_update_alumno").attr("disabled", false);
        $("#form_representante")[0].reset();
        ev.preventDefault();
    });

    $("#form_representante").submit(function(ev){

        $("#ci").removeClass("is-invalid");
        $("#nombre_r").removeClass("is-invalid");
        $("#apellido_r").removeClass("is-invalid");

        $("#sexo_r").removeClass("is-invalid");
        $("#fecha_n_r").removeClass("is-invalid");
        $("#edad_r").removeClass("is-invalid");

        $("#telefono").removeClass("is-invalid");
        $("#ciudad").removeClass("is-invalid");
        $("#direccion").removeClass("is-invalid");
        $("#parentesco").removeClass("is-invalid");
        $(".img_load").remove();

        $.ajax({
            url: 'representantes/update',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="img_load text-info">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#cancel").click();
                
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

                    if(json.ci.length != 0){
                        $(".img_load").remove();
                        $("#ci").parents(".form-group").find("div:last").html(json.ci);
                        $("#ci").addClass("is-invalid");
                    }

                    if(json.nombre_r.length != 0){
                        $(".img_load").remove();
                        $("#nombre_r").parents(".form-group").find("div:last").html(json.nombre_r);
                        $("#nombre_r").addClass("is-invalid");
                    }

                    if(json.apellido_r.length != 0){
                        $(".img_load").remove();
                        $("#apellido_r").parents(".form-group").find("div:last").html(json.apellido_r);
                        $("#apellido_r").addClass("is-invalid");
                    }

                    if(json.sexo_r.length != 0){
                        $(".img_load").remove();
                        $("#sexo_r").parents(".form-group").find("div:last").html(json.sexo_r);
                        $("#sexo_r").addClass("is-invalid");
                    }

                    if(json.fecha_n_r.length != 0){
                        $(".img_load").remove();
                        $("#fecha_n_r").parents(".form-group").find("div:last").html(json.fecha_n_r);
                        $("#fecha_n_r").addClass("is-invalid");
                    }

                    if(json.edad_r.length != 0){
                        $(".img_load").remove();
                        $("#edad_r").parents(".form-group").find("div:last").html(json.edad_r);
                        $("#edad_r").addClass("is-invalid");
                    }

                    if(json.parentesco.length != 0){
                        $(".img_load").remove();
                        $("#parentesco").parents(".form-group").find("div:last").html(json.parentesco);
                        $("#parentesco").addClass("is-invalid");
                    }
                    
                    if(json.telefono.length != 0){
                        $(".img_load").remove();
                        $("#telefono").parents(".form-group").find("div:last").html(json.telefono);
                        $("#telefono").addClass("is-invalid");
                    }

                    if(json.ciudad.length != 0){
                        $(".img_load").remove();
                        $("#ciudad").parents(".form-group").find("div:last").html(json.ciudad);
                        $("#ciudad").addClass("is-invalid");
                    }

                    if(json.direccion.length != 0){
                        $(".img_load").remove();
                        $("#direccion").parents(".form-group").find("div:last").html(json.direccion);
                        $("#direccion").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.cedula.length != 0){
                        $(".img_load").remove();
                        $("#ci").parents(".form-group").find("div:last").html(json.cedula);
                        $("#ci").addClass("is-invalid");
                    }
                },
                500: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.msg.length != 0){
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

})();