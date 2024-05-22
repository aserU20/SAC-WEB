(function(){
    // SELECTORES OPTION
    $('select#tipo').on('change',function(ev){
        var value = $(this).val();

        $.ajax({
            url: 'return_cargos',
            type: 'POST',
            data: {'value' : value},
            beforeSend:function(){
            }, 
            success: function(data){
                var json = JSON.parse(data);

                $("#cargo").empty();
                json.forEach(element => {
                   $("#cargo").append("<option value='' class='oculto'>Cargo</option><option data-code='"+element.codigo+"' value='"+element.nombre_cargo+ "'>"+element.nombre_cargo+"</option>"); 
                });
            },
    
        });
        ev.preventDefault();
    });
    $('select#cargo').on('change',function(ev){
        var cargo = $(this).val();

        $.ajax({
            url: 'return_cargos',
            type: 'POST',
            data: {'value' : cargo},
            beforeSend:function(){
            }, 
            success: function(data){
                var json = JSON.parse(data);

                $("#codigo").empty();
                json.forEach(element => {
                    $("#codigo").val(element.codigo);
                    $("#id_cargo").val(element.id);
                });
            },
    
        });

        ev.preventDefault();

    });

    // CREATE
    $("#form_personal").submit(function(ev){
        $("#tipo").removeClass("is-invalid");
        $("#turno").removeClass("is-invalid");
        $("#cargo").removeClass("is-invalid");
        $("#nombre").removeClass("is-invalid");
        $("#apellido").removeClass("is-invalid");
        $("#ci").removeClass("is-invalid");
        $("#fecha_n").removeClass("is-invalid");
        $("#edad").removeClass("is-invalid");
        $("#sexo").removeClass("is-invalid");
        $("#correo").removeClass("is-invalid");
        $("#telefono").removeClass("is-invalid");
        $("#ciudad").removeClass("is-invalid");
        $("#direccion").removeClass("is-invalid");

        $.ajax({
            url: 'store_personal',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                // var json = JSON.parse(err);
                $("#form_personal")[0].reset();

                $(".img_load").remove();

                Swal.fire( 
                    'Proceso Exitoso!', 
                    'Los datos han sido guardados correctamente!', 
                    'success' 
                );
            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.tipo.length != 0){
                        $(".img_load").remove();
                        $("#tipo").parents(".form-group").find("div:last").html(json.tipo);
                        $("#tipo").addClass("is-invalid");
                    }
                    
                    if(json.turno.length != 0){
                        $(".img_load").remove();
                        $("#turno").parents(".form-group").find("div:last").html(json.turno);
                        $("#turno").addClass("is-invalid");
                    }

                    if(json.cargo.length != 0){
                        $(".img_load").remove();
                        $("#cargo").parents(".form-group").find("div:last").html(json.cargo);
                        $("#cargo").addClass("is-invalid");
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

                    if(json.cedula.length != 0){
                        $(".img_load").remove();
                        $("#ci").parents(".form-group").find("div:last").html(json.cedula);
                        $("#ci").addClass("is-invalid");
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

                    if(json.sexo.length != 0){
                        $(".img_load").remove();
                        $("#sexo").parents(".form-group").find("div:last").html(json.sexo);
                        $("#sexo").addClass("is-invalid");
                    }

                    if(json.correo.length != 0){
                        $(".img_load").remove();
                        $("#correo").parents(".form-group").find("div:last").html(json.correo);
                        $("#correo").addClass("is-invalid");
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

                        Swal.fire( 
                            'Error!', 
                            json.cedula, 
                            'error' 
                        );
                    }
                },
                500: function(xhr){
                    var json = JSON.parse(xhr.responseText);
                    $(".img_load").remove();

                    Swal.fire( 
                        'Error!', 
                        json.msg, 
                        'error' 
                    );
                },
            }
        });

        ev.preventDefault();
    });
})();