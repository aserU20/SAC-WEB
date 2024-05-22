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

    //GENERATE CODE RANDOM
    $("#btn-codigo").click(function(ev){
        var longitud = $(this).val();
        long=parseInt(longitud);
        var caracteres = "ABCDEFGHIJKLMNPQRTUVWXYZ2346789";
        var contraseña = "";
        for (i=0; i<long; i++) contraseña += caracteres.charAt(Math.floor(Math.random()*caracteres.length));
        $("#codigo").val(contraseña);
        ev.preventDefault();
    });

    // RETURN DATA
    $("#ci").change(function(ev){
        var nacionalidad = $("#nacionalidad").val();
        var ci = $(this).val();
        var base_url = $("#base_url").val();

        $.ajax({
            url: base_url+'representantes/return_representante',
            type: 'POST',
            data: {'nacionalidad' : nacionalidad, 'ci': ci},
            beforeSend:function(){
            }, 
            success: function(err){
                var json = JSON.parse(err);
                
                if(json.msg.length != 0){
                    $("#nombre_r").empty();
                    $("#apellido_r").empty();
                    $("#sexo_r").empty();
                    $("#fecha_n_r").empty();
                    $("#edad_r").empty();
                    $("#telefono").empty();
                    $("#ciudad").empty();
                    $("#direccion").empty();
                    $("#parentesco").empty();

                    $("#nombre_r").val(json.nombre_r);
                    $("#apellido_r").val(json.apellido_r);
                    if(json.sexo_r == "M"){
                        $("#sexo_r").append('<option value="" class="small oculto">Sexo</option><option value="M" class="small" selected>M</option><option value="F" class="small">F</option>');
                    }else{
                        $("#sexo_r").append('<option value="" class="small oculto">Sexo</option><option value="M" class="small">M</option><option value="F" class="small" selected>F</option>');
                    }
                    $("#fecha_n_r").val(json.fecha_n_r);
                    $("#edad_r").val(json.edad_r);
                    $("#telefono").val(json.telefono);
                    $("#ciudad").val(json.ciudad);
                    $("#direccion").val(json.direccion);
                    if(json.parentesco == 'Abuelo - Abuela'){
                        $("#parentesco").append('<option value="" class="small oculto">Parentesco</option><option value="Abuelo - Abuela" class="small" selected>Abuelo - Abuela</option><option value="Madre - Padre" class="small">Madre - Padre</option><option value="Primo - Prima" class="small">Primo - Prima</option><option value="Tio - Tia" class="small">Tio - Tia</option>');
                    }else if(json.parentesco == 'Madre - Padre'){
                        $("#parentesco").append('<option value="" class="small oculto">Parentesco</option><option value="Abuelo - Abuela" class="small">Abuelo - Abuela</option><option value="Madre - Padre" class="small" selected>Madre - Padre</option><option value="Primo - Prima" class="small">Primo - Prima</option><option value="Tio - Tia" class="small">Tio - Tia</option>');
                    }else if(json.parentesco == 'Primo - Prima'){
                        $("#parentesco").append('<option value="" class="small oculto">Parentesco</option><option value="Abuelo - Abuela" class="small">Abuelo - Abuela</option><option value="Madre - Padre" class="small">Madre - Padre</option><option value="Primo - Prima" class="small" selected>Primo - Prima</option><option value="Tio - Tia" class="small">Tio - Tia</option>');
                    }else if(json.parentesco == 'Tio - Tia'){
                        $("#parentesco").append('<option value="" class="small oculto">Parentesco</option><option value="Abuelo - Abuela" class="small">Abuelo - Abuela</option><option value="Madre - Padre" class="small">Madre - Padre</option><option value="Primo - Prima" class="small">Primo - Prima</option><option value="Tio - Tia" class="small" selected>Tio - Tia</option>');
                    }
                }else{
                    $("#nombre_r").val('');
                    $("#apellido_r").val('');
                    $("#sexo_r").append('<option class="small oculto" selected>Sexo</option>');
                    $("#fecha_n_r").val('');
                    $("#edad_r").val('');
                    $("#parentesco").append('<option class="small oculto" selected>Parentesco</option>');
                    $("#telefono").val('');
                    $("#ciudad").val('');
                    $("#direccion").val('');
                }
            }
        });
        ev.preventDefault();
    });

    // CREATE ALUMNO
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
            url: 'store_alumno',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="img_load text-info">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                
                $("#form_alumno")[0].reset();
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

                    $(".img_load").remove();
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
    });
})();