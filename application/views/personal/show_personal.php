<div class="container-fluid bg-dark mx-auto" id="container-table">
    <div class="row gutters" id="row-list">

        <!-- OPCIONES -->
        <div class="col-lg-12 col-md-12 col-sm-12 list-optiones" id="list-optiones">
            <div class="row">
                <div class="col-3 my-5 mx-auto" id="item-1">
                    <div class="text-center">
                        <button type="button" class="btn shadow-lg bg-dark text-light btn-option" id="p-docente" value="Docente">
                            <i class="fa fa-chalkboard-teacher text-light option-ico"></i>
                            <br>
                            <br>
                            Docente
                        </button>
                    </div>  
                    <hr class="mx-auto"> 
                </div>
                <div class="col-3 my-5 mx-auto" id="item-2">
                    <div class="text-center">
                        <button type="button" class="btn shadow-lg bg-dark text-light btn-option" id="p-admin" value="Administrativo">
                            <i class="fa fa-user-tie text-light option-ico"></i>
                            <br>
                            <br>
                            Administrativo
                        </button>
                    </div>   
                    <hr class="mx-auto">
                </div>
                <div class="col-3 my-5 mx-auto" id="item-3">
                    <div class="text-center">
                        <button type="button" class="btn shadow-lg bg-dark text-light btn-option" id="p-obrero" value="Obrero">
                            <i class="fa fa-tools text-light option-ico"></i>
                            <br>
                            <br>
                            Obrero
                        </button>
                    </div>   
                    <hr class="mx-auto">
                </div>

            </div>
        </div>

        <!-- TABLA DATOS -->
        <div class="col-lg-12 col-md-12 col-sm-12 mx-auto p-0" id="tabla-datos"></div> 
        
        <div class="col-lg-11 col-md-11 col-sm-11 mx-auto">
            <div id="loading"></div>
        </div>
    </div><br>
</div>

<!-- view return ajax -->
<div id="container-data"></div>