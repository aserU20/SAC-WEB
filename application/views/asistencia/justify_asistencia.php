<div class="container-fluid bg-dark">
    <div class="row">

        <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-12 mx-auto alert-secondary" style="contain: size; overflow-y: scroll;">
            <div class="h5 col-12">
                <strong>Trabajando</strong>
            </div>

            <ul id="list-entradas"></ul>
        </div> -->

        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mx-auto bg-secondary shadow-lg p-0" id="asistencia-content">
            <div class="asistencia-content h-100">
                <div class="text-center text-light">
                    <h4>
                        <strong>
                            JUSTIFICAR
                        </strong>
                    </h4>
                </div> 
                
                <div class="mx-auto text-center text-light mt-5">
                    
                    <form action="<?= base_url('asistencia/justificar');?>" method="post" id="justify_asistencia">

                        <div class="form-group col-sm-8 mx-auto text-left">
                            <label for="">Fecha a justificar:</label>
                            <select name="dia" id="dia" title="D&iacute;a" data-live-search="true" class="form-control rounded-0">
                                <option value="" class="oculto" selected>D&iacute;a</option>
                                <option value="Domingo" class="small">Domingo</option>
                                <option value="Lunes" class="small">Lunes</option>
                                <option value="Martes" class="small">Martes</option>
                                <option value="Miércoles" class="small">Miércoles</option>
                                <option value="Jueves" class="small">Jueves</option>
                                <option value="Viernes" class="small">Viernes</option>
                                <option value="Sabado" class="small">Sabado</option>
                            </select>
                            <div class="invalid-feedback msg-1 text-left"></div>
                        </div>
                        
                        <div class="form-group col-sm-8 mx-auto text-left">
                            <input type="date" name="fecha" id="fecha" class="form-control rounded-0">
                            <div class="invalid-feedback msg-2 text-left"></div>
                        </div>

                        <div class="form-group col-sm-8 mx-auto text-left">
                            <label for="">Info. de justificaci&oacute;n:</label>

                            <select name="condicion" id="condicion" title="Condici&oacute;n" data-live-search="true" class="form-control rounded-0">
                                <option value="" class="oculto" selected>Condici&oacute;n</option>
                                <?php if(isset($situaciones)): ?>
                                    <?php foreach ($situaciones as $item): ?>
                                        <option value="<?= $item->id; ?>" class="small"><?= "n-" . $item->id . " " . $item->situacion; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                            <div class="invalid-feedback msg-3 text-left"></div>

                        </div>

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

                                <div class="invalid-feedback msg-4 text-left"></div>
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


        <!-- <div class="col-lg-3 col-md-3 col-sm-3 col-12 mx-auto alert-secondary" style="contain: size; overflow-y: scroll;">
            <div class="h5 col-12">
                <strong>Salidas</strong>
            </div>

            <ul id="list-salidas"></ul>
        </div> -->

    </div>
</div>

