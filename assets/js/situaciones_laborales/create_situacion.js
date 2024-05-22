(function(){
    
    var base_url = $("#base_url").val();
    $('.dataTable').DataTable({
        "language" : {
            "url": base_url+"assets/vendor/datatables/es_es.json"
        }
    });
    
    //CREATE 
    $("#form_situacion_laboral_create").submit(function(ev){
        var situacion = $("#situacion").val();
        $("#js_resource").remove();

        if(situacion.length == 0){
            $(".img_load").remove();
            $(".msg-1").html('No puede estar vacio');
            $("#situacion").addClass("is-invalid");
            return false;
        }else{
            $(".img_load").remove();
            $(".msg-1").empty();
            $("#situacion").removeClass("is-invalid");

            $.ajax({
                url: 'situacion_laboral_store',
                type: 'POST',
                data: $(this).serialize(),
                beforeSend:function(){
                    $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
                }, 
                success: function(err){
                    var json = JSON.parse(err);
    
                    $("#form_situacion_laboral_create")[0].reset();
                    
                    $("#table-data").empty();
                    $("#table-data").append(json.tabla);

                    var base_url = $("#base_url").val();
                    $('.dataTable').DataTable({
                        "language" : {
                            "url": base_url+"assets/vendor/datatables/es_es.json"
                        }
                    });

                    $("footer").append("<script src='"+base_url+"/assets/js/situaciones_laborales/update_situacion.js' id='js_resource'></script>");
                    
                    $(".img_load").remove();

                    Swal.fire( 
                        'Proceso Exitoso!', 
                        json.msg, 
                        'success' 
                    );
                },
                statusCode: {
                    401: function(xhr){
                        var json = JSON.parse(xhr.responseText);

                        if(json.msg.length != 0){
                            $(".img_load").remove();
                            $(".msg-1").html(json.msg);
                            $("#situacion").addClass('is-invalid');
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
        }

        ev.preventDefault();
    });

})();