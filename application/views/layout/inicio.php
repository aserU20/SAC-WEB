<div class="container-fluid bg-dark">
    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-3 col-12 mx-auto alert-secondary" style=" overflow-y: scroll;">
            <div class="h5 col-12">
                <strong>Entradas</strong>
            </div>

            <ul id="list-entradas">
                <!-- entradas por ajax -->
            </ul>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mx-auto bg-secondary shadow-lg p-0" id="asistencia-content">
            
            <div class="asistencia-content h-100">
            
                <div class="text-center text-light">
                    <h4 >
                        <strong>
                            ASISTENCIA
                        </strong>
                    </h4>
                </div> 

                <div class="mx-auto text-center text-light mt-5">
                    <div class="date my-5">
                        <span id="weekDay" class="weekDay"></span>, 
                        <span id="day" class="day"><?= $day; ?></span> de
                        <span id="month" class="month"></span> del
                        <span id="year" class="year"></span>
                    </div>

                    <form action="<?= base_url('asistencia/confirm');?>" method="post" id="confirm_asistencia">

                        <div class="form-group mx-auto col-sm-8" id="">
                            <div class="input-group">
                                <span class="input-group-addon d-flex align-items-center p-2 bg-light text-dark border-0">
                                    <i class="fa fa-clock"></i>
                                </span>

                                <select name="nacionalidad" id="nacionalidad" class="form-control selectpicker border-0 col-3" required>
                                    <option value="V-" selected class="small">V-</option>
                                    <option value="E-" class="small">E-</option>
                                </select>

                                <input type="text" name="ci" class="form-control form-input border-0" 
                                id="ci" placeholder="Ingresar c&eacute;dula" autocomplete="off">

                                <div class="input-group-append">
                                    <button class="btn btn-light btn-sm" type="submit">
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>

                                <div class="invalid-feedback msg-1 text-left"></div>
                                <div id="loading" class="w-100 text-danger text-center"></div>

                            </div>
                        </div>
                        <div id="messages" class="mx-auto form-group col-sm-8 mt-2 oculto">

                        </div>
                    </form>

                </div>
            
            </div>
            

            <br><br><br>

        </div>


        <div class="col-lg-3 col-md-3 col-sm-3 col-12 mx-auto alert-secondary" style=" overflow-y: scroll;">
            <div class="h5 col-12">
                <strong>Salidas</strong>
            </div>

            <ul id="list-salidas">
                <!-- salidas por ajax -->
            </ul>
        </div>

    </div>
</div>

