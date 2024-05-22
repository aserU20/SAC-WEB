<div class="content mx-auto bg-dark">
    <div class="container">
        <div class="row gutters">

            <!-- IZQUIERDA -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 p-0">
                <div class="card h-100 rounded-0 bg-dark border-0">
                    <div class="card-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h4 class="mb-2 text-info text-center">
                                <strong>
                                    SECCIONES
                                </strong>
                            </h4>
                        </div>
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="<?php echo base_url("/");?>assets/img/secciones.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- DERECHA -->
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 p-0" id="derecha">
                <div class="card h-100 rounded-0 bg-dark border-0" id="card">
                    <div class="card-body" id="card-body">
                        <div id="form">
                            <form action="#" method="post" id="create_seccion">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class="mt-1 text-primary">Crear nueva</h6>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <!-- <label for="">Grado</label> -->
                                            <select name="grado" id="grado" title="Grado" class="form-control">
                                                <option value="" class="oculto">Grado</option>
                                                <option value="primero">1<sup>er</sup> - Grado</option>
                                                <option value="segundo">2<sup>do</sup> - Grado</option>
                                                <option value="tercero">3<sup>er</sup> - Grado</option>
                                                <option value="cuarto">4<sup>to</sup> - Grado</option>
                                                <option value="quinto">5<sup>to</sup> - Grado</option>
                                                <option value="sexto">6<sup>to</sup> - Grado</option>
                                            </select>
                                            <div class="invalid-feedback msg-1 text-left"></div>
                                        </div>
                                    </div>
                    
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <select name="seccion" id="seccion" disabled class="form-control">
                                                <option value="" class="oculto">Secci&oacute;n</option>
                                                <?php if(!empty($letras)): ?>
                                                <?php foreach($letras as $i => $item): ?>
                                                    <option value="<?= $item; ?>"><?= $item; ?></option>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                            <div class="invalid-feedback msg-3 text-left"></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <!-- <label for="">Turno</label> -->
                                            <select name="turno" id="turno" title="Turno" class="form-control">
                                                <option value="" class="oculto">Turno</option>
                                                <option value="Mañana">Mañana</option>
                                                <option value="Tarde">Tarde</option>
                                            </select>
                                            <div class="invalid-feedback msg-2 text-left"></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                        <div class="form-group">
                                            <!-- <label for="">Turno</label> -->
                                            <input type="number" name="capacidad" id="capacidad" class="form-control" placeholder="Capacidad" value="30">  
                                            <div class="invalid-feedback msg-4 text-left"></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="group-btn">
                                        <div class="form-group text-right">
                                            <button type="button" class="btn btn-danger">CANCELAR</button>
                                            <button type="submit" class="btn btn-warning">GUARDAR</button>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12" id="group-btn">
                                        <div class="form-group">
                                            <div id="loading" class="text-info"></div>
                                        </div>
                                    </div>

                                </div>


                            </form>
                        </div>
                        <div id="form2"></div>

                        <!-- TABLA DE DATOS -->
                        <div id="table-data">
                            <?php if(isset($list)): ?>
                            <?= $list;?>
                            <?php endif; ?>

                        </div>
                         

                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
