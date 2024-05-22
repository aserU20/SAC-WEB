<div class="content mx-auto">
    <div class="container-fluid">
        <div class="row gutters">

            <!-- IZQUIERDA -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 p-0 izquierda">
                <div class="card h-100 rounded-0 bg-dark border-0">
                    <div class="card-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h4 class="mb-2 text-info text-center">
                                <strong>
                                    CREAR PERSONAL
                                </strong>
                            </h4>
                        </div>
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar text-center" >
                                    <img src="<?php echo base_url("/");?>assets/img/escuela-virtual.png" class="bg-info">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- DERECHA -->
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 p-0 derecha">
                <div class="card h-100 rounded-0 bg-dark border-0">
                    <div class="card-body">
                        <form action="<?= base_url("personal/store_personal");?>" method="post" id="form_personal">
                            <input type="hidden" name="primer_uso" value="NO">

                            <!-- PARTE 1 -->
                            <div class="row gutters pt-1">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 mt-1 text-primary">Opciones de Personal</h6>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="">Tipo</label>
                                        <select name="tipo" id="tipo" title="Tipo" class="form-control">
                                            <option value="" class="oculto">Tipo</option>
                                            <option value="Docente">Docente</option>
                                            <option value="Administrativo">Administrativo</option>
                                            <option value="Obrero">Obrero</option>
                                        </select>
                                        <div class="invalid-feedback text-left"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="">Turno</label>
                                        <select name="turno" id="turno" title="Turno" class="form-control">
                                            <option value="" class="oculto">Turno</option>
                                            <option value="Mañana">Mañana</option>
                                            <option value="Tarde">Tarde</option>
                                        </select>
                                        <div class="invalid-feedback text-left"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12" id="select-cargo">
                                    <div class="form-group">
                                        <label for="">Cargo</label>
                                        <select name="cargo" id="cargo" title="Cargo" class="form-control">
                                            <option value="" class="oculto">Cargo</option>
                                        </select>
                                        <div class="invalid-feedback text-left"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="">C&oacute;digo</label>
                                        <input type="text" name="codigo" id="codigo" class="custom-input form-control rounded-0 text-light" placeholder="Ej. 1A34B6" readonly>
                                        <input type="hidden" name="id_cargo" id="id_cargo" value="">
                                    </div>
                                </div>
                            </div>

                            <!-- PARTE 2 -->
                            <div class="row gutters pt-2">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Datos Personales</h6>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <div class="input-group">
                                            <span class="input-group-addon d-flex align-items-center ico-form">
                                                <i class="fa fa-pen-alt"></i>
                                            </span>
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
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
                                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido">
                                            <div class="invalid-feedback text-left"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="">C&eacute;dula identidad</label>
                                        <div class="input-group">
                                            <span class="input-group-addon d-flex align-items-center ico-form">
                                                <i class="fa fa-pen-alt"></i>
                                            </span>
                                            <select name="nacionalidad" id="nacionalidad" class="form-control selectpicker border-0 col-3" required>
                                                <option value="V-" selected class="small">V-</option>
                                                <option value="E-" class="small">E-</option>
                                            </select>
                                            <input type="text" name="ci" id="ci" class="form-control col-9 border-0" placeholder="Ci">
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
                                            <input type="date" name="fecha_n" id="fecha_n" class="form-control">
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
                                            <input type="number" name="edad" id="edad" class="form-control" placeholder="Edad">
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
                                            <select name="sexo" id="sexo" class="form-control border-0">
                                                <option value="" selected class="oculto small">Sexo</option>
                                                <option value="M" class="small">M</option>
                                                <option value="F" class="small">F</option>
                                            </select>
                                            <div class="invalid-feedback text-left"></div>
                                        </div>
                                    </div>  
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <div class="input-group">
                                            <span class="input-group-addon d-flex align-items-center ico-form">
                                                <i class="fa fa-at"></i>
                                            </span>
                                            <input type="mail" name="correo" id="correo" class="form-control" placeholder="Correo">
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

                            <!-- PARTE 3 -->
                            <div class="row gutters pt-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class=" mb-2 text-primary">Observaci&oacute;n (Opcional)</h6>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                       <textarea name="observacion" class="form-control" id="" cols="10" rows="4"></textarea>
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
    </div>
</div>

