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
  
    // CHANGE STATUS USER
    $("tr td #change_status_user").click(function(ev){
        var base_url = $("#base_url").val();
        var id = $(this).attr("data-id");
        var status = $(this).val();
        var self = this;

        if(status == 1){
            var text_title = "¿Deseas inhabilitar este usuario?";
            var p = "Este usuario no tendra acceso al sistema!";
        }else{
            var text_title = "¿Deseas habilitar este usuario?";
            var p = "Este usuario podra acceder al sistema!";
        }

        Swal.fire({ 
            title: text_title, 
            text: p, 
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
                    url: base_url + 'users/change_status',
                    data: {'id':id, 'status':status},
                    success: function (err){
                        var json = JSON.parse(err);

                        if(json.status == '0'){
                            $(self).removeClass('btn-success');
                            $(self).addClass('btn-secondary');
                            $(self).empty();
                            $(self).append('<i class="fa fa-user-times"></i>');
                            $(self).val(0);
                        }else{
                            $(self).removeClass('btn-secondary');
                            $(self).addClass('btn-success');
                            $(self).empty();
                            $(self).append('<i class="fa fa-user-check"></i>');
                            $(self).val(1);
                        }

                        // Swal.fire( 
                        //     'Proceso Exitoso!', 
                        //     'El status fue cambiado', 
                        //     'success' 
                        // );
                    },
                    statusCode: {
                        400: function(data){
                            var json = JSON.parse(data.responseText);

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

    // DELETE USER
    $("tr td #delete_user").click(function(ev){
        var base_url = $("#base_url").val();
        var id = $(this).attr("data-id");
        // var nombre = $(this).parents("tr").find("td:first").text();
        var self = this;

        Swal.fire({ 
            title: "¿Deseas eliminar este usuario?", 
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
                    url: base_url + 'users/delete',
                    data: {'id':id},
                    success: function (){

                        $(self).parents("tr").remove();
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
                        }
                    }
        
                });

            } 
        });

        ev.preventDefault();
    });
})();