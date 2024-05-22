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
                                    GESTION CARGOS
                                </strong>
                            </h4>
                        </div>
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="<?php echo base_url("/");?>assets/img/create-personal.jpg">
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
                            <form action="<?=base_url("cargos/store_cargos");?>" method="post" id="form_cargos">
    
                                <!-- PARTE 1 -->
                                <div class="row gutters">
                                    <div class="mt-1 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <h6 class=" mb-2 text-primary">Nuevo cargo</h6>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="">Categor&iacute;a</label>
                                            <select name="categoria" id="categoria" title="Categoria" class="form-control">
                                                <option value="" class="oculto">Categoria</option>
                                                <option value="Docente">Docente</option>
                                                <option value="Administrativo">Administrativo</option>
                                                <option value="Obrero">Obrero</option>
                                            </select>
                                            <div class="invalid-feedback msg-3 text-left"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="">Cargo</label>
                                            <input type="text" name="cargo" id="cargo" class="custom-input form-control text-light rounded-0" placeholder="Ej. DOCENTE">
                                            <div class="invalid-feedback msg-1 text-left"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                        <div class="form-group">
                                            <label for="">C&oacute;digo</label>
                                            <input type="text" name="codigo" id="codigo" class="custom-input form-control text-light rounded-0" placeholder="Ej. 1A34B6">
                                            <div class="invalid-feedback msg-2 text-left"></div>
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
                            <?php if(isset($show)): ?>
                            <?= $show;?>
                            <?php endif; ?>
                        </div>
                         

                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
