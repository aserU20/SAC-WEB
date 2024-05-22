(function(){
    // UPDATE PASSWORD
    $("#update_password").submit(function(ev){
        $("#inputPassword3").removeClass("is-invalid");
        $("#inputPasswordRepeat").removeClass("is-invalid");
        $(".img_load").remove();

        $.ajax({
            url: 'update_password',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                $(".img_load").remove();
                $("#update_password")[0].reset();
                
                Swal.fire( 
                    'Proceso Exitoso!', 
                    json.msg, 
                    'success' 
                );
            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

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