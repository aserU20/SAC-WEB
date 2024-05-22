(function(){
    
    //SEARCH
    $("#search_situaciones").keyup(function(){
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($(".aqui .item"), function() {
            if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
            $(this).hide();
            else
            $(this).show();
        });
    });
    
    $("#btn_filter").click(function(ev){

        // DATOS
        var fecha_i = $("#fecha_i").val();

        // AJAX
        $.ajax({
            url: 'asistencia_filter',
            type: 'POST',
            data: { 'fecha_i': fecha_i
                    
            },
            beforeSend:function(){
            }, 
            success: function(err){
                var json = JSON.parse(err);

                $("#filter-content").empty();
                $("#filter-content").html(json.view);
                
                $("footer").append("<script src='"+json.js+"' id='js_resource'></script>");

            },
        });

        ev.preventDefault();
    });
})();