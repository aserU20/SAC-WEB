(function($){


    // FORM LOGIN
    $("#form_login").submit(function(ev){
        $("#inputEmail3").removeClass("is-invalid");
        $("#inputPassword3").removeClass("is-invalid");
        $.ajax({
            url: 'login/validate',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<img src="assets/img/load-2.gif" class="img_load" width="40" height="40" alt="Cargando...">');
            }, 
            success: function(err){
                $(".img_load").remove();
                var json = JSON.parse(err);
                window.location.replace(json.url);
            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.username.length != 0){
                        $(".img_load").remove();
                        $(".msg-1").html(json.username);
                        $("#inputEmail3").addClass("is-invalid");
                    }
                    
                    if(json.password.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.password);
                        $("#inputPassword3").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    $(".img_load").remove();
                    var json = JSON.parse(xhr.responseText);
                    swal.fire(
                        "Error!",
                        json.msg,
                        "error"
                    );
                   
                },
            }
        });
        ev.preventDefault();
    });

    // CLOSE SESSION
    $(".close_session").click(function(ev){
        var base_url= $("#base_url").val();
        
        Swal.fire({ 
            title: "¿Deseas cerrar la sessión?", 
            text: "Esta acción no se puede deshacer!", 
            icon: 'warning', 
            showCancelButton: true, 
            confirmButtonColor: '#3085d6', 
            cancelButtonColor: '#d33', 
            confirmButtonText: 'Si, salir',
            cancelButtonText: 'Cancelar'
        }).then((result) => { 
            if (result.isConfirmed) { 
                window.location = base_url+"login/logout";
            } 
        });
        ev.preventDefault();

    });
})(jQuery);