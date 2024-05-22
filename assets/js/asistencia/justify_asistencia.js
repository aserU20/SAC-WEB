(function(){

    //Justificar
    $("#justify_asistencia").submit(function(ev){

        $("#ci").removeClass("is-invalid");
        $("#dia").removeClass("is-invalid");
        $("#fecha").removeClass("is-invalid");
        $("#condicion").removeClass("is-invalid");
        $(".img_load").remove();

        $.ajax({
            url: 'justify_store',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<img src="assets/img/load-2.gif" class="img_load mt-3" width="40" height="40" alt="Cargando...">');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                
                $("#justify_asistencia")[0].reset();
                
                if(json.msg.length != 0){
                    $("#messages").html('<div class="alert bg-success small p-2 text-left" id="alert-msg"><button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">x</span></button>'+json.msg+'</div>');
                }
                $(".img_load").remove();
                $("#messages").removeClass('oculto');

            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.dia.length != 0){
                        $(".img_load").remove();
                        $(".msg-1").html(json.dia);
                        $("#dia").addClass("is-invalid");
                    }
                    
                    if(json.fecha.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.fecha);
                        $("#fecha").addClass("is-invalid");
                    }    
                    
                    if(json.condicion.length != 0){
                        $(".img_load").remove();
                        $(".msg-3").html(json.condicion);
                        $("#condicion").addClass("is-invalid");
                    }
                    
                    if(json.ci.length != 0){
                        $(".img_load").remove();
                        $(".msg-4").html(json.ci);
                        $("#ci").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    $(".img_load").remove();
                    var json = JSON.parse(xhr.responseText);
                    
                    if(json.ci.length != 0){
                      
                        $("#messages").html('<div class="alert bg-danger small p-2 text-left" id="alert-msg"><button class="close" type="button" data-dismiss="alert" aria-label="close"><span aria-hidden="true">x</span></button>'+json.ci+'</div>');
                        
                        $("#messages").removeClass('oculto');
                    }
                },
                500: function(xhr){
                    $(".img_load").remove();
                    var json = JSON.parse(xhr.responseText);
                    Swal.fire(
                        "Error!",
                        json.msg,
                        "error"
                    );
                }
            }
        });
        ev.preventDefault();
    });
})();