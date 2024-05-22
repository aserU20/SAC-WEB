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

	// SELECTORES OPTION
	$('select#grado').on('change',function(ev){
		var value = $(this).val();
		var base_url = $("#base_url").val();
		$.ajax({
			url: base_url+'secciones/return_secciones',
			type: 'POST',
			data: {'value' : value},
			beforeSend:function(){
			}, 
			success: function(data){
				var json = JSON.parse(data);

                if(json != false){
                    $("#seccion").empty();
                    json.forEach(element => {
                        $("#seccion").append("<option value='' class='oculto'>Secci&oacute;n</option><option value='"+element.id+ "'>"+element.seccion+"</option>"); 
                    });
                }else{
                    $("#seccion").empty();
                    $("#seccion").append("<option value='' class='oculto'>No hay secciones</option>"); 
                }
			},
	
		});
		ev.preventDefault();
	});
	
	// EDIT
	$("tr td #edit_registro").click(function(ev){
		// DATOS
		var codigo = $(this).attr('data-id');
		var base_url = $("#base_url").val();
		$(".img_load").remove();
		$("#container-data").empty();
		
		// AJAX
		$.ajax({
			url: 'alumnos/edit_alumno',
			type: 'POST',
			data: {'codigo' : codigo},
			beforeSend:function(){
				$("#loading").append('<p class="mt-1 text-info img_load">Espere un momento...</p>');
			}, 
			success: function(err){
				var json = JSON.parse(err);
				$("#container-table").remove();
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
		var codigo = $(this).attr("data-id");
		var persona = $(this).parents("tr").find("td:nth-child(5)").text();
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
					url: 'alumnos/delete_student',
					data: {'codigo': codigo},
					success: function (err){
						var json = JSON.parse(err);

						$("#container-table").remove();
						
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

						$("footer").append("<script src='"+json.js+"' id='js_resource'></script>");
						$(".img_load").remove();
		
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