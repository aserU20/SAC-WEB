(function(){
    // EDIT
    $("tr td #edit_situacion").click(function(ev){
        // DATOS
        var id = $(this).attr('data-id');
        var situacion = $(this).parents("tr").find("td:nth-child(2)").text();
        var base_url = $("#base_url").val();

        $("#title-form-situacion").empty();
        $("#title-form-situacion").append('Actualizar descripci&oacute;n');

        $("#situacion").empty();
        $("#situacion").removeClass('is-invalid');
        $("#situacion").val(situacion);
        
        $("#submit").removeClass('oculto');
        $("#submit").addClass('oculto');
        $("#update_situacion").remove();
        $("#group-btn").append('<button type="button" id="update_situacion" value="'+id+'" class="btn btn-warning">ACTUALIZAR</button>');
        $("footer").append('<script src="'+base_url+'/assets/js/situaciones_laborales/update_situacion.js"></script>');
        ev.preventDefault();
    });
    
    // UPDATE
    $("#update_situacion").click(function(ev){
        var id = $(this).val();
        var situacion = $("#situacion").val();

        
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
                url: 'situacion_laboral_update',
                type: 'POST',
                data: {'id_situacion': id,
                        'situacion': situacion
                },
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

                    $("#js_one").remove();
                    $("#js_resource").remove();
                    $("footer").append("<script src='"+base_url+"/assets/js/situaciones_laborales/update_situacion.js' id='js_resource'></script>");

                    $(".img_load").remove();

                    Swal.fire( 
                        'Proceso Exitoso!', 
                        json.msg, 
                        'success' 
                    );
                    // .then((value) => {
                    //     location.reload();
                    // });
                },
                statusCode: {
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

    // DELETE
    $("tr td #delete_situacion").click(function(ev){
        var base_url = $("#base_url").val();
        var id = $(this).attr("data-id");
        // var situacion = $(this).parents("tr").find("td:nth-child(2)").text();
        var self = this;
    
        Swal.fire({ 
            title: "¿Realmente deseas eliminarla?", 
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
                    url: base_url + 'asistencia/situacion_laboral_delete',
                    data: {'id_situacion':id},
                    success: function (err){
                        var json = JSON.parse(err);

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
                            'Eliminado!', 
                            'El registro fue eliminado correctamente!', 
                            'success' 
                        );
                        // .then((value) => {
                        //     location.reload();
                        // });
                    },
                    statusCode: {
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
        });

        ev.preventDefault();
    });


})();