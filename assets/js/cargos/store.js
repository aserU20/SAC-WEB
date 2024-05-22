// Call the dataTables jQuery plugin
$(document).ready(function() {
    var base_url = $("#base_url").val();
    $('.dataTable').DataTable({
      "language" : {
        "url": base_url+"assets/vendor/datatables/es_es.json"
      }
    });
});

(function(){
    // CREATE
    $("#form_cargos").submit(function(ev){
        // DATOS
        var cargo = $("#cargo").val();
        var codigo = $("#codigo").val();
        var categoria = $("#categoria").val();

        $("#cargo").removeClass("is-invalid");
        $("#codigo").removeClass("is-invalid");
        $("#categoria").removeClass("is-invalid");
        $(".img_load").remove();

        $.ajax({
            url: 'cargos/store_cargo',
            type: 'POST',
            data: $(this).serialize(),
            beforeSend:function(){
                $("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#form_cargos")[0].reset();
                
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
                    'Los datos han sido guardados correctamente!', 
                    'success' 
                );
            },
            statusCode: {
                400: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.cargo.length != 0){
                        $(".img_load").remove();
                        $(".msg-1").html(json.cargo);
                        $("#cargo").addClass("is-invalid");
                    }
                    
                    if(json.codigo.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.codigo);
                        $("#codigo").addClass("is-invalid");
                    }

                    if(json.categoria.length != 0){
                        $(".img_load").remove();
                        $(".msg-3").html(json.categoria);
                        $("#categoria").addClass("is-invalid");
                    }
                },
                401: function(xhr){
                    var json = JSON.parse(xhr.responseText);

                    if(json.codigo.length != 0){
                        $(".img_load").remove();
                        $(".msg-2").html(json.codigo);
                        $("#codigo").addClass("is-invalid");
                    }

                    if(json.cargo.length != 0){
                        $(".img_load").remove();
                        $(".msg-1").html(json.cargo);
                        $("#cargo").addClass("is-invalid");
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


})();