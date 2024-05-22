(function(){
    // EDIT
    $("tr td #edit_cargo").click(function(ev){
        // DATOS
        var id = $(this).attr('data-id');
        var base_url = $("#base_url").val();
        $(".img_load").remove();
        
        // AJAX
        $.ajax({
            url: 'cargos/return_views',
            type: 'POST',
            data: {'id_cargo' : id},
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                $("#form").hide();
                $("#form2").empty();
                $("#form2").append(json.success);
                $("footer").append("<script src='"+json.js+"'></script>");
                $(".img_load").remove();
            }
        });

        ev.preventDefault();
    });

    // CANCEL EDIT
    $("#cancel").click(function(ev){

        $("#form").show();
        $("#form2").empty();

        ev.preventDefault();

    });

    // UPDATE
    $("#form_update").submit(function(ev){
        $("#cargo_id").removeClass("is-invalid");
        $("#codigo_id").removeClass("is-invalid");
        $(".img_load").remove();

        $.ajax({
            url: 'cargos/update_cargo',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading2").append('<p class="mt-1 text-info img_load">Actualizando datos...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#form_update")[0].reset();
                $("#form").show();
                $("#form2").empty();
                
                $("#table-data").empty();
                $("#table-data").append(json.success);
                
                var base_url = $("#base_url").val();
                $('.dataTable').DataTable({
                    "language" : {
                        "url": base_url+"assets/vendor/datatables/es_es.json"
                    }
                });
                $("footer").append("<script src='"+json.js+"' id='js_resource'></script>");
                $(".img_load").remove();

                Swal.fire( 
                    'Proceso Exitoso!', 
                    'Los datos han sido modificados correctamente!', 
                    'success' 
                );
            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.cargo.length != 0){
                        $(".img_load").remove();
                        $(".msg-1").html(json.cargo);
                        $("#cargo_id").addClass("is-invalid");
                    }
                    
                    if(json.codigo.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.codigo);
                        $("#codigo_id").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.codigo.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.codigo);
                        $("#codigo_id").addClass("is-invalid");
                    }
                },
                500: function(xhr){
                    $(".img_load").remove();
                    var json = JSON.parse(xhr.responseText);
                    swal({
                        title: "Error!",
                        text: json.msg,
                        icon: "error",
                    });
                }
            }
        });
        ev.preventDefault();
       
    });

    // DELETE
    $("tr td #delete_cargo").click(function(ev){
        var base_url = $("#base_url").val();
        var id = $(this).attr("data-id");
        var cargo = $(this).parents("tr").find("td:nth-child(2)").text();
        var self = this;
    
        Swal.fire({ 
            title: "¿Deseas eliminar el cargo de "+cargo+"?", 
            text: "Esta acción no se puede deshacer!", 
            icon: 'warning', 
            showCancelButton: true, 
            confirmButtonColor: '#3085d6', 
            cancelButtonColor: '#d33', 
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => { 
            if (result.isConfirmed) { 

                // Ajax
                $.ajax({
                    type : 'POST',
                    url: base_url + 'cargos/delete',
                    data: {'id':id},
                    success: function (err){
                        var json = JSON.parse(err);

                        $("#table-data").empty();
                        $("#table-data").append(json.success);
                        
                        var base_url = $("#base_url").val();
                        $('.dataTable').DataTable({
                            "language" : {
                                "url": base_url+"assets/vendor/datatables/es_es.json"
                            }
                        });
                        $("footer").append("<script src='"+json.js+"' id='js_resource'></script>");
                        $(".img_load").remove();
        
                        Swal.fire( 
                            'Eliminado!', 
                            'El registro fue eliminado correctamente!', 
                            'success' 
                        );
                    },
                    statusCode: {
                        400: function(data){
                            var json = JSON.parse(data.responseText);

                            Swal.fire( 
                                'Error!', 
                                json.msg, 
                                'error' 
                            );
                        },
                        500: function(xhr){
                            $(".img_load").remove();
                            var json = JSON.parse(xhr.responseText);
                            swal({
                                title: "Error!",
                                text: json.msg,
                                icon: "error",
                            });
                        }
                    }
        
                });

            } 
        });

        ev.preventDefault();
    });
})();