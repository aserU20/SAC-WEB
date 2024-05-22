(function(){
    // CREATE
    $("#form_user").submit(function(ev){

        // $("#cargo").removeClass("is-invalid");

        $(".img_load").remove();

        $.ajax({
            url: 'store_user',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                $(".img_load").remove();
                $("#form_user")[0].reset();
                
                Swal.fire( 
                    json.msg, 
                    'Los datos han sido guardados correctamente!', 
                    'success' 
                );
            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.rango.length != 0){
                        $(".img_load").remove();
                        $(".msg-1").html(json.rango);
                        $("#rango").addClass("is-invalid");
                    }
                    
                    if(json.cedula.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.cedula);
                        $("#User").addClass("is-invalid");
                    }

                    if(json.password.length != 0){
                        $(".img_load").remove();
                        $(".msg-3").html(json.password);
                        $("#inputPassword3").addClass("is-invalid");
                    }

                    if(json.password_confirm.length != 0){
                        $(".img_load").remove();
                        $(".msg-4").html(json.password_confirm);
                        $("#inputPasswordRepeat").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.msg.length != 0){
                        $(".img_load").remove();
                        Swal.fire( 
                            'Error!', 
                            json.msg, 
                            'error' 
                        );
                    }
                },
                500: function(xhr){
                    $(".img_load").remove();
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

})();