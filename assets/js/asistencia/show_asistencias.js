(function(){
 	var tabla;
	var base_url = $("#base_url").val();

    //DATATABLE CONFIG
	tabla = $('#tbllistado').dataTable({
		"info": false,
		"language": {
			'url': base_url+"assets/vendor/datatables/es_es.json"
		},
		"aProcessing": true,//activamos el procedimiento del datatable
		"aServerSide": true,//paginacion y filrado realizados por el server
		dom: 'Bfrtip',//definimos los elementos del control de la tabla
		buttons: [
				// 'copyHtml5',
				'excelHtml5',
				// 'csvHtml5',
				// 'pdf',
		],
//        "ajax":
//		{
//			url: base_url+'asistencia/return_asistencias',
//			type: "post",
//			dataType : "json",
//            success: function(err){
//                console.log(err.responseText);
//            },
//			error:function(e){
//				console.log(e.responseText);
//			}
//		},
		"bDestroy":true,
		"iDisplayLength":10,//paginacion
		"order":[[0,"desc"]]//ordenar (columna, orden)
			
	}).DataTable();
    
    //FILTER
    $("#submit_filter").click(function(e){
        var nacionalidad = $("#nacionalidad").val();
        var ci = $("#ci").val();
        var fecha_i = $("#fecha_i").val();
        var fecha_f = $("#fecha_f").val();
        
        $.ajax({
            url: base_url+'asistencia/filter_asistencia',
            type: 'POST',
            data: {'ci' : ci,
                   'fecha_i' : fecha_i,
                   'fecha_f' : fecha_f,
                   'nacionalidad' : nacionalidad
            },
            beforeSend:function(){
                //$("#loading").append('<p class="img_load">Espere un momento</p>');
            }, 
            success: function(err){
                var json = JSON.parse(err);
                $("#view_list").empty();    
                $("#view_list").html(json.result);
                $("footer").append("<script src='"+json.js+"' id='js_resource'></script>");
                
                $('#nacionalidad').selectpicker().ajax.reload();
            }
        });
        
        e.preventDefault();
    });

})();