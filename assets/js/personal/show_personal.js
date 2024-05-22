(function(){

/*
//
// FILTROS PERSONAL
//
*/
    // DOCENTE
    $("#p-docente").click(function(ev){
        $(".img_load").remove();
        $("#content-details").empty();
        
        $.ajax({
            url: 'return_personal',
            type: 'POST',
            data:{'tipo': $(this).val()},
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#tabla-datos").hide();
                $("#tabla-datos").empty();
                $("#tabla-datos").append(json.view);

                var base_url = $("#base_url").val();
                $('.dataTable').DataTable({
                    "language" : {
                        "url": base_url+"assets/vendor/datatables/es_es.json"
                    }
                });
                $("#tabla-datos").fadeIn();

                $("#js_resource").remove();
                $("footer").append("<script id='js_resource' src='"+json.js+"'></script>");
                $(".img_load").remove();

            },
        });
        ev.preventDefault();
    });

    // ADMIN
    $("#p-admin").click(function(ev){
        $(".img_load").remove();
        $("#content-details").empty();
        
        $.ajax({
            url: 'return_personal',
            type: 'POST',
            data:{'tipo': $(this).val()},
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#tabla-datos").hide();
                $("#tabla-datos").empty();
                $("#tabla-datos").append(json.view);

                var base_url = $("#base_url").val();                

                $('.dataTable').DataTable({
                    "language" : {
                        "url": base_url+"assets/vendor/datatables/es_es.json"
                    }
                });
                $("#tabla-datos").fadeIn();

                $("#js_resource").remove();
                $("footer").append("<script id='js_resource' src='"+json.js+"'></script>");
                $(".img_load").remove();

            },
        });
        ev.preventDefault();
    });

    // OBRERO
    $("#p-obrero").click(function(ev){
        $(".img_load").remove();
        $("#content-details").empty();
        
        $.ajax({
            url: 'return_personal',
            type: 'POST',
            data:{'tipo': $(this).val()},
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#tabla-datos").hide();
                $("#tabla-datos").empty();
                $("#tabla-datos").append(json.view);

                var base_url = $("#base_url").val();
                $('.dataTable').DataTable({
                    "language" : {
                        "url": base_url+"assets/vendor/datatables/es_es.json"
                    }
                });
                $("#tabla-datos").fadeIn();

                $("#js_resource").remove();
                $("footer").append("<script id='js_resource' src='"+json.js+"'></script>");
                $(".img_load").remove();

            },
        });
        ev.preventDefault();
    });

/*
//
// OPCIONES TABLA
//
*/

    // VER
    $("tr td #show_registro").click(function(ev){
        // DATOS
        var cedula = $(this).attr('data-id');
        var base_url = $("#base_url").val();
        $("#content-details").empty();
        $(".img_load").remove();
        
        // AJAX
        $.ajax({
            url: 'detalles_persona',
            type: 'POST',
            data: {'cedula' : cedula},
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                $("#content-details").empty();
                $("#content-details").append(json.view);
                $(".js_resource").remove();
                $("footer").append("<script class='js_resource' src='"+json.js_two+"'></script>");
                $(".img_load").remove();
            }
        });

        ev.preventDefault();
    });

    // EDIT
    $("tr td #edit_registro").click(function(ev){
        // DATOS
        var cedula = $(this).attr('data-id');
        var base_url = $("#base_url").val();
        $(".img_load").remove();
        $("#container-data").empty();
        
        // AJAX
        $.ajax({
            url: 'edit_personal',
            type: 'POST',
            data: {'cedula' : cedula},
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                $("#container-table").hide();
                $("#tabla-datos").empty();
                $("#container-data").empty();
                $("#container-data").append(json.view);
                $(".js_resource").remove();
                $("footer").append("<script class='js_resource' src='"+json.js_two+"'></script>");
                $(".img_load").remove();
            }
        });

        ev.preventDefault();
    });

    // DELETE
    $("tr td #delete_registro").click(function(ev){
        var base_url = $("#base_url").val();
        var cedula = $(this).attr("data-id");
        var persona = $(this).parents("tr").find("td:nth-child(5)").text();
        var tipo = $(this).parents("tr").find("td:nth-child(2)").text();
        var self = this;
        $(".img_load").remove();
    
        Swal.fire({ 
            title: "¿Deseas eliminar a ("+persona+") del sistema?", 
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
                    url: 'delete_personal',
                    data: {'cedula': cedula, 'tipo': tipo},
                    success: function (err){
                        var json = JSON.parse(err);

                        $("#tabla-datos").empty();
                        $("#tabla-datos").append(json.view);
                        
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