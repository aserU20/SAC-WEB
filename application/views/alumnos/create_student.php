<div class="content mx-auto">
    <div class="container-fluid">

        <!-- STUDENT -->
        <div class="row gutters">
        
            <!-- IZQUIERDA -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 p-0">
                <div class="card h-100 rounded-0 bg-dark border-0">
                    <div class="card-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h4 class="mb-2 text-info text-center">
                                <strong>
                                    CREAR ALUMNO
                                </strong>
                            </h4>
                        </div>
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar text-center" >
                                    <img src="<?php echo base_url("/");?>assets/img/students.jpg" class="bg-info">
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
                        <form action="<?= base_url("alumnos/store_alumno");?>" method="post" id="form_alumno">

                            <!-- PARTE 1 -->
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 mt-1 text-primary">Opciones de alumno</h6>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="">Grado</label>
                                        <select name="grado" id="grado" title="Grado" class="form-control">
                                            <option value="" class="oculto">Grado</option>
                                            <option value="primero">1<sup>er</sup> - Grado</option>
                                            <option value="segundo">2<sup>do</sup> - Grado</option>
                                            <option value="tercero">3<sup>er</sup> - Grado</option>
                                            <option value="cuarto">4<sup>to</sup> - Grado</option>
                                            <option value="quinto">5<sup>to</sup> - Grado</option>
                                            <option value="sexto">6<sup>to</sup> - Grado</option>
                                        </select>
                                        <div class="invalid-feedback text-left"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="">Secci&oacute;n</label>
                                        <select name="seccion" id="seccion" title="Secci&oacute;n" class="form-control">
                                            <option value="" class="oculto">Secci&oacute;n</option>
                                        </select>
                                        <div class="invalid-feedback text-left"></div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="">Turno</label>
                                        <input type="text" name="turno" id="turno" class="form-control" placeholder="Turno" readonly>
                                        <div class="invalid-feedback text-left"></div>
                                    </div>
                                </div>
                         
                            </div>

                            <!-- PARTE 2 -->
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Datos del alumno</h6>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <div class="input-group">
                                            <span class="input-group-addon d-flex align-items-center ico-form">
                                                <i class="fa fa-pen-alt"></i>
                                            </span>
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres">
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
                                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos">
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
                                            <select name="sexo_student" id="sexo_student" title="Sexo" class="form-control border-0">
                                                <option value="" selected class="oculto small">Sexo</option>
                                                <option value="M" class="small">M</option>
                                                <option value="F" class="small">F</option>
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
                                        <label for="">C&oacute;digo</label>
                                        <div class="input-group">
                                            <span class="input-group-addon d-flex align-items-center ico-form">
                                                <i class="fa fa-hashtag"></i>
                                            </span>
                
                                            <input type="text" name="codigo" id="codigo" class="form-control" 
                                            id="codigo" placeholder="C&oacute;digo" readonly>
                
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary btn-sm" type="button" id="btn-codigo" value="6">
                                                    Generar
                                                </button>
                                            </div>
                                            <div class="invalid-feedback msg-4 text-left"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        <!-- </form> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- REPRESENTANTE -->
        <?= $representante_form ;?>
    </div>
</div>

