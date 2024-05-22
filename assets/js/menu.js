$(document).ready(function(){

    // MENU MOVIL
    $(window).resize(function() {
        if ($(document).width() > 609) {
            $('.menu-sm').css({'display' : 'none'});
        }
    });
    $("#btn-menu").click(function(){
        $(".menu-sm").toggle(500);
    });

    // LOGIN 
    $("#img-btn").click(function(){
        // OCULTAR CONTENIDO
        $("#cont-login").addClass("oculto");
        $("#LoginContent").removeClass("oculto");
        // APLICAR ANIMACION CONTENEDORES
        $("#LoginContent").addClass("animated fadeIn");
    });
});