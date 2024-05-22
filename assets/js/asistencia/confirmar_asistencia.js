(function(){
    var day = $("#weekDay").text();

    $.ajax({
        url: 'asistencia/asistencia_diaria',
        type: 'POST',
        data: { 'dia': day},
        beforeSend:function(){
        }, 
        success: function(err){
            var json = JSON.parse(err);
            
            $("#list-entradas").empty();
            $("#list-salidas").empty();

            // LUNES
            if(json.day == 'Lunes'){

                json.asistencia.forEach(element => {
                    if(element.lu_entrada.length != 0){
                        $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
    
                json.asistencia.forEach(element => {
                    if(element.lu_salida.length != 0){
                        $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
            }

            // MARTES
            if(json.day == 'Martes'){

                json.asistencia.forEach(element => {
                    if(element.ma_entrada.length != 0){
                        $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
    
                json.asistencia.forEach(element => {
                    if(element.ma_salida.length != 0){
                        $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
            }

            // MIERCOLES
            if(json.day == 'Miércoles'){

                json.asistencia.forEach(element => {
                    if(element.mi_entrada.length != 0){
                        $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
    
                json.asistencia.forEach(element => {
                    if(element.mi_salida.length != 0){
                        $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
            }
            
            // JUEVES
            if(json.day == 'Jueves'){

                json.asistencia.forEach(element => {
                    if(element.ju_entrada.length != 0){
                        $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
    
                json.asistencia.forEach(element => {
                    if(element.ju_salida.length != 0){
                        $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
            }
            
            // VIERNES
            if(json.day == 'Viernes'){

                json.asistencia.forEach(element => {
                    if(element.vi_entrada.length != 0){
                        $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });

                json.asistencia.forEach(element => {
                    if(element.vi_salida.length != 0){
                        $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
            }
            
            // SABADO
            if(json.day == 'Sabado'){

                json.asistencia.forEach(element => {
                    if(element.sa.length != 0){
                        $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });

                json.asistencia.forEach(element => {
                    if(element.sa_salida.length != 0){
                        $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
            }
            
            // DOMINGO
            if(json.day == 'Domingo'){

                json.asistencia.forEach(element => {
                    if(element.do_entrada.length != 0){
                        $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });

                json.asistencia.forEach(element => {
                    if(element.do_salida.length != 0){
                        $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                    }
                });
            }

        },
    });


    //Confirm asistencia
    $("#confirm_asistencia").submit(function(ev){

        // DATOS
        var day = $("#weekDay").text();
        var nacionalidad = $("#nacionalidad").val();
        var cedula = $("#ci").val();

        $("#ci").removeClass("is-invalid");
        $(".img_load").remove();
        $("#messages").empty();

        $.ajax({
            url: 'asistencia/store_asistencia',
            type: 'POST',
            data: {'nacionalidad': nacionalidad,
                    'ci'         : cedula,
                    'dia'        : day
            },
            beforeSend:function(){
                $("#loading").append('<img src="assets/img/load-2.gif" class="img_load mt-3" width="40" height="40" alt="Cargando...">');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#confirm_asistencia")[0].reset();
                $(".img_load").remove();

                if(json.tipo == 'store'){
                    $("#messages").html('<div class="alert bg-success small p-2 text-left" id="alert-msg"><button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">x</span></button>'+json.msg+'</div>');
                }else{
                    $("#messages").html('<div class="alert bg-danger small p-2 text-left" id="alert-msg"><button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">x</span></button>'+json.msg+'</div>');
                }
                
                $("#messages").removeClass('oculto');

                $("#list-entradas").empty();
                $("#list-salidas").empty();
                
                console.log(json.ver);
                
                // LUNES
                if(json.day == 'Lunes'){

                    json.asistencia.forEach(element => {
                        if(element.lu_entrada.length != 0){
                            $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
        
                    json.asistencia.forEach(element => {
                        if(element.lu_salida.length != 0){
                            $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
                }

                // MARTES
                if(json.day == 'Martes'){

                    json.asistencia.forEach(element => {
                        if(element.ma_entrada.length != 0){
                            $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
        
                    json.asistencia.forEach(element => {
                        if(element.ma_salida.length != 0){
                            $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
                }

                // MIERCOLES
                if(json.day == 'Miercoles'){

                    json.asistencia.forEach(element => {
                        if(element.mi_entrada.length != 0){
                            $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
        
                    json.asistencia.forEach(element => {
                        if(element.mi_salida.length != 0){
                            $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
                }
                
                // JUEVES
                if(json.day == 'Jueves'){

                    json.asistencia.forEach(element => {
                        if(element.ju_entrada.length != 0){
                            $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });

                    json.asistencia.forEach(element => {
                        if(element.ju_salida.length != 0){
                            $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
                }
                
                // VIERNES
                if(json.day == 'Viernes'){

                    json.asistencia.forEach(element => {
                        if(element.vi_entrada.length != 0){
                            $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });

                    json.asistencia.forEach(element => {
                        if(element.vi_salida.length != 0){
                            $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
                }
                
                // SABADO
                if(json.day == 'Sabado'){

                    json.asistencia.forEach(element => {
                        if(element.sa_entrada.length != 0){
                            $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });

                    json.asistencia.forEach(element => {
                        if(element.sa_salida.length != 0){
                            $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
                }
                
                // DOMINGO
                if(json.day == 'Domingo'){

                    json.asistencia.forEach(element => {
                        if(element.do_entrada.length != 0){
                            $("#list-entradas").append("<li class='text-success'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });

                    json.asistencia.forEach(element => {
                        if(element.do_salida.length != 0){
                            $("#list-salidas").append("<li class='text-danger'>"+element.nombre+ ' ' +element.apellido+"</li>");
                        }
                    });
                }
            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.ci.length != 0){
                        $(".img_load").remove();
                        $(".msg-1").html(json.ci);
                        $("#ci").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.ci.length != 0){
                        $(".img_load").remove();
                        
                        $("#messages").html('<div class="alert bg-danger small p-2 text-left" id="alert-msg"><button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">x</span></button>'+json.ci+'</div>');
                        
                        $("#messages").removeClass('oculto');
                        $("#ci").addClass("is-invalid");
                    }
                },
                500: function(xhr){
                    $(".img_load").remove();
                    var json = JSON.parse(xhr.responseText);
                    swal.fire(
                        "Error!",
                        json.msg,
                        "error",
                    );
                }
            }
        });
        ev.preventDefault();
    });
    
})();