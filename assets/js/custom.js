$(document).ready(function(){
    var base_url = $("#base_url").val();
    
    // ACTUALIZAR PASSWORD
    $("#update-password").click(function(){
        if($(this).hasClass("default")){
            // REMOVER, ASIGNAR NUEVA CLASE
            $(this).removeClass('default');
            $(this).addClass('show-input');
            $("#update_password").addClass('d-none');
            
            // CREAR INPUTS DE PASSWORD
            // PARA ACTUALIZAR PASSWORD
            //$("#inputPassword3").attr("type", "password");
            //$("#inputPasswordRepeat").attr("type", "password");
            //$(".group-password").removeClass('d-none');
        
        }else if($(this).hasClass('show-input')){
            // REMOVER, ASIGNAR NUEVA CLASE
            $(this).removeClass('show-input');
            $(this).addClass('default');
            $("#update_password").removeClass('d-none');

            // ELIMINAR INPUTS DE PASSWORD
            //$(".group-password").addClass('d-none');
            //$("#inputPassword3").attr("type", "hidden");
            //$("#inputPasswordRepeat").attr("type", "hidden");
        }
    });

    // BTN VER CONTRASEÑA
    $("#btn-password").click(function(){
        if($(".ico-pass").hasClass("fa-eye")){

            $(".ico-pass").removeClass("fa-eye");
            $(".ico-pass").addClass("fa-eye-slash");
            $("#inputPassword3").attr("type", "text");
            $("#inputPasswordRepeat").attr("type", "text");

        }else if($(".ico-pass").hasClass("fa-eye-slash")){

            $(".ico-pass").removeClass("fa-eye-slash");
            $(".ico-pass").addClass("fa-eye");
            $("#inputPassword3").attr("type", "password");
            $("#inputPasswordRepeat").attr("type", "password");
        }
    });
    
});
