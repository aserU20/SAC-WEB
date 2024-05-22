(function(){
    // EDIT
    $("tr td #edit_seccion").click(function(ev){
        // DATOS
        var id = $(this).val();

        $.ajax({
            url: 'secciones/return_form_update',
            type: 'POST',
            data: {'id' : id},
            beforeSend:function(){
                $("#loading").append('<p class="img_load text-info">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#table-data").empty();
                $("#table-data").html(json.students);

                $("#grado").remove();
                $("#seccion").remove();
                $("#form").remove();
                $("#form2").empty();
                $("#form2").html(json.view);

                // Call the dataTables jQuery plugin
                var base_url = $("#base_url").val();
                $('.dataTable').DataTable({
                "language" : {
                    "url": base_url+"assets/vendor/datatables/es_es.json"
                }
                });

                $("footer").append("<script src='"+json.js+"' id='js_resource'></script>");
                $(".img_load").remove();
            }
        });

        ev.preventDefault();
    });

    // DELETE
    $("tr td #delete_seccion").click(function(ev){
        // DATOS
        var id = $(this).val();

        Swal.fire({ 
            title: "¿Deseas eliminar la sección?", 
            text: "Esta acción no se puede deshacer!", 
            icon: 'warning', 
            showCancelButton: true, 
            confirmButtonColor: '#3085d6', 
            cancelButtonColor: '#d33', 
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => { 
            if (result.isConfirmed) { 

                // AJAX
                $.ajax({
                    url: 'secciones/delete',
                    type: 'POST',
                    data: {'id' : id},
                    beforeSend:function(){
                        $("#loading").append('<p class="img_load">Espere un momento</p>');
                    }, 
                    success: function(err){
                        var json = JSON.parse(err);

                        $("#table-data").empty();
                        $("#table-data").html(json.view);
        
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
                            json.msg,
                            'success'
                        );
                    },
                    statusCode: {
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

            }
        });


        ev.preventDefault();
    });

})();