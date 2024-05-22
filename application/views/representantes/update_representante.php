
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
                    <button type="button" id="btn_update_alumno" class="btn btn-outline-primary mt-3">ACTUALIZAR DATOS</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DERECHA -->
<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 p-0">
    <div class="card h-100 rounded-0 bg-dark border-0">
        <div class="card-body">
            <form action="<?= base_url("representantes/update_representante");?>" method="post" id="form_representante">

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
                                <select name="nacionalidad" id="nacionalidad" disabled class="form-control border-0 col-3" required>
                                    <option value="V-" <?php if(isset($data) AND !empty($data->cedula_r) AND $nacionalidad == "V-"){ echo "selected";}?> class="small">V-</option>
                                    <option value="E-" <?php if(isset($data) AND !empty($data->cedula_r) AND $nacionalidad == "E-"){ echo "selected";}?> class="small">E-</option>
                                </select>
                                <input type="text" name="ci" id="ci" class="form-control col-9 border-0" placeholder="Ci" value="<?php if(isset($data) AND !empty($data->cedula_r)){ echo $cedula;}?>" readonly>
                                <div class="invalid-feedback text-left"></div>
                            </div>
                        </div>  
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="">Nombres</label>
                            <div class="input-group">
                                <span class="input-group-addon d-flex align-items-center ico-form">
                                    <i class="fa fa-pen-alt"></i>
                                </span>
                                <input type="text" name="nombre_r" id="nombre_r" class="form-control" placeholder="Nombres" value="<?php if(isset($data) AND !empty($data->nombres_r)){ echo $data->nombres_r;}?>" readonly>
                                <div class="invalid-feedback text-left"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-addon d-flex align-items-center ico-form">
                                    <i class="fa fa-pen-alt"></i>
                                </span>
                                <input type="text" name="apellido_r" id="apellido_r" class="form-control" placeholder="Apellidos" value="<?php if(isset($data) AND !empty($data->apellidos_r)){ echo $data->apellidos_r;}?>" readonly>
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
                                <select name="sexo_r" id="sexo_r" disabled class="form-control border-0">
                                    <option value="" class="oculto small">Sexo</option>
                                    <option value="M"  <?php if(isset($data) AND !empty($data->sexo_r) AND $data->sexo_r == "M"){ echo "selected";}?> class="small">M</option>
                                    <option value="F" <?php if(isset($data) AND !empty($data->sexo_r) AND $data->sexo_r == "F"){ echo "selected";}?> class="small">F</option>
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
                                <input type="date" name="fecha_n_r" id="fecha_n_r" class="form-control" value="<?php if(isset($data) AND !empty($data->f_nacimiento_r)){ echo $data->f_nacimiento_r;}?>" readonly>
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
                                <input type="number" name="edad_r" id="edad_r" class="form-control" placeholder="Edad" value="<?php if(isset($data) AND !empty($data->edad_r)){ echo $data->edad_r;}?>" readonly>
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
                                <select name="parentesco" id="parentesco" disabled class="form-control border-0">
                                    <option value="" class="small oculto">Parentesco</option>
                                    <option value="Abuelo - Abuela" <?php if(isset($data) AND !empty($data->parentesco) AND $data->parentesco == "Abuelo - Abuela"){ echo "selected";}?> class="small">Abuelo - Abuela</option>
                                    <option value="Madre - Padre" <?php if(isset($data) AND !empty($data->parentesco) AND $data->parentesco == "Madre - Padre"){ echo "selected";}?> class="small">Madre - Padre</option>
                                    <option value="Primo - Prima" <?php if(isset($data) AND !empty($data->parentesco) AND $data->parentesco == "Primo - Prima"){ echo "selected";}?> class="small">Primo - Prima</option>
                                    <option value="Tio - Tia" <?php if(isset($data) AND !empty($data->parentesco) AND $data->parentesco == "Tio - Tia"){ echo "selected";}?> class="small">Tio - Tia</option>
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
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Tel&eacute;fono" value="<?php if(isset($data) AND !empty($data->telefono_r)){ echo $data->telefono_r;}?>" readonly>
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
                                <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" value="<?php if(isset($data) AND !empty($data->ciudad_r)){ echo $data->ciudad_r;}?>" readonly>
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
                                <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direcci&oacute;n" value="<?php if(isset($data) AND !empty($data->direccion_r)){ echo $data->direccion_r;}?>" readonly>
                                <div class="invalid-feedback text-left"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="loading" class="d-inline-block position-absolute"></div>

                <div class="text-right d-none" id="group-btn">
                    <button type="button" id="cancel" class="btn btn-danger">CANCELAR</button>
                    <button type="submit" class="btn btn-warning">ACTUALIZAR</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
