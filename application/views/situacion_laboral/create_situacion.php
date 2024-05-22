<div class="content mx-auto bg-dark">
    <div class="container">
        <div class="row gutters">

            <!-- IZQUIERDA -->
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 p-0">
                <div class="card h-100 rounded-0 bg-dark border-0">
                    <div class="card-body">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0">
                            <h4 class="mb-2 text-info text-center">
                                <strong>
                                    SITUACIONES <!--LABORALES-->
                                </strong>
                            </h4>
                        </div>
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="<?php echo base_url("/");?>assets/img/reposo3.png" class="bg-info">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- DERECHA -->
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 p-0">
                <div class="card h-100 rounded-0 bg-dark border-0" id="card">
                    <div class="card-body" id="card-body">
                        <div id="form">
                            <form action="#" method="post" id="form_situacion_laboral_create">
    
                                <!-- PARTE 1 -->
                                <div class="row gutters">
                                    <div class="mt-1 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class=" mb-2 text-primary" id="title-form-situacion">Nueva situaci&oacute;n</h6>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="text" name="situacion" id="situacion" class="form-control" placeholder="Descripci&oacute;n">
                                            <div class="invalid-feedback msg-1 text-left"></div>
                                        </div> 
                                    </div>
                                </div>
    
                                <div id="loading" class="d-inline-block position-absolute"></div>
    
                                <div class="text-right" id="group-btn">
                                    <a href="<?= base_url('dashboard')?>" class="btn btn-danger">CANCELAR</a>
                                    <button type="submit" id="submit" class="btn btn-warning">GUARDAR</button>
                                </div>
                            </form>
                        </div>
                        <div id="form2"></div>

                        <!-- TABLA DE DATOS -->
                        <div id="table-data">
                            <?php if(isset($tabla)): ?>
                                <?= $tabla; ?>
                            <?php endif; ?>
                        </div>
                         

                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
