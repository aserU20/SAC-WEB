
<div class="row gutters">

    <!-- IZQUIERDA -->
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 p-0">
        <div class="card h-100 rounded-0 bg-dark border-0">
            <div class="card-body">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h4 class="mb-2 text-info text-center">
                        <strong>
                            REPRESENTANTE
                        </strong>
                    </h4>
                </div>
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar text-center" >
                            <img src="<?php echo base_url("/");?>assets/img/representante.png" class="bg-light">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- DERECHA -->
    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 p-0">
        <div class="card h-100 rounded-0 bg-dark border-0">
            <div class="card-body">

                    <!-- PARTE 2 -->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-1 mb-2 text-primary">Datos del representante</h6>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">C&eacute;dula identidad</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-pen-alt"></i>
                                    </span>
                                    <select name="nacionalidad" id="nacionalidad" class="form-control border-0 col-3" required>
                                        <option value="V-" selected class="small">V-</option>
                                        <option value="E-" class="small">E-</option>
                                    </select>
                                    <input type="text" name="ci" id="ci" class="form-control col-9 border-0" placeholder="Ci">
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>  
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-pen-alt"></i>
                                    </span>
                                    <input type="text" name="nombre_r" id="nombre_r" class="form-control" placeholder="Nombres">
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Apellido</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-pen-alt"></i>
                                    </span>
                                    <input type="text" name="apellido_r" id="apellido_r" class="form-control" placeholder="Apellidos">
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Sexo</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-venus-mars"></i>
                                    </span>
                                    <select name="sexo_r" id="sexo_r" title="Sexo" class="form-control border-0">
                                        <option value="" class="small oculto">Sexo</option>
                                        <option value="M" class="small sexo">M</option>
                                        <option value="F" class="small sexo">F</option>
                                    </select>
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>  
                        </div>

                        <!-- FECHA -->
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                    <input type="date" name="fecha_n_r" id="fecha_n_r" class="form-control">
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Edad</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-pen-alt"></i>
                                    </span>
                                    <input type="number" name="edad_r" id="edad_r" class="form-control" placeholder="Edad">
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Parentesco</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-pen-alt"></i>
                                    </span>
                                    <select name="parentesco" id="parentesco" title="Parentesco" class="form-control border-0">
                                        <option value="" class="small oculto">Parentesco</option>
                                        <option value="Abuelo - Abuela" class="small">Abuelo - Abuela</option>
                                        <option value="Madre - Padre" class="small">Madre - Padre</option>
                                        <option value="Primo - Prima" class="small">Primo - Prima</option>
                                        <option value="Tio - Tia" class="small">Tio - Tia</option>
                                    </select>
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>  
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Tel&eacute;fono</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-phone-alt"></i>
                                    </span>
                                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Tel&eacute;fono">
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Ciudad</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-building"></i>
                                    </span>
                                    <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad">
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="">Direcci&oacute;n</label>
                                <div class="input-group">
                                    <span class="input-group-addon d-flex align-items-center ico-form">
                                        <i class="fa fa-route"></i>
                                    </span>
                                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direcci&oacute;n">
                                    <div class="invalid-feedback text-left"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="loading" class="d-inline-block position-absolute"></div>

                    <div class="text-right" id="group-btn">
                        <a href="<?= base_url('dashboard')?>" class="btn btn-danger">CANCELAR</a>
                        <button type="submit" class="btn btn-warning">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  