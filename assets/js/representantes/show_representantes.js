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

	// EDIT
	$("tr td #edit_registro").click(function(ev){
		// DATOS
		var cedula = $(this).attr('data-id');
		var base_url = $("#base_url").val();
		$(".img_load").remove();
		$("#container-data").empty();
		
		// AJAX
		$.ajax({
			url: 'representantes/edit_representante',
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
		var persona = $(this).parents("tr").find("td:nth-child(3)").text();
		var self = this;
		var texto = "Esto eliminara tambien los alumnos que representa, esta acción no se puede deshacer!";

		$(".img_load").remove();
	
		Swal.fire({ 
			title: "¿Deseas eliminar a ("+persona+") del sistema?", 
			text: texto, 
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
					url: 'representantes/delete',
					data: {'cedula': cedula},
					success: function (err){
						var json = JSON.parse(err);

						$("#container-table").hide();
						$("#container-table").remove();
						
						$("#container-data").hide();
						$("#container-data").empty();
						$("#container-data").append(json.view);
						
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
									'pdf',
							],
							
							"bDestroy":true,
							"iDisplayLength":10,//paginacion
							"order":[[0,"desc"]]//ordenar (columna, orden)
								
						}).DataTable();

						$("footer").append("<script src='"+json.js+"' id='js_resource'></script>");
						$(".img_load").remove();
						$("#container-data").fadeIn();

						Swal.fire( 
							'Eliminado!', 
							'El registro fue eliminado correctamente!', 
							'success' 
						);
					},
					statusCode: {
						400: function(xhr){
							var json = JSON.parse(xhr.responseText);

							Swal.fire( 
								'Error!', 
								json.msg, 
								'error' 
							);
						},
						500: function(xhr){
							$(".img_load").remove();
							var json = JSON.parse(xhr.responseText);
							Swal.fire(
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