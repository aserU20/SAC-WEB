<div class="bg-dark mx-auto general">

    <div class="container">
        <!-- <div class="card"> -->
            <!-- <div class="card-body"> -->
                <div class="row justify-content-lg-center">
                    <div class="col-lg-11 my-5">
                        <!-- TITLE -->
                        <div class="section-header">
                            <h6 style="font-size: 1.3rem;">
                                <strong>
                                    Nuevo Usuario
                                </strong>
                            </h6>
                        </div>
                        <!-- FORM EN CODIGNITER -->
                        <?php echo validation_errors(); ?>
                        <?php echo form_open('users/store_user', array("method" => 'POST', "id" => 'form_user'));?>
                            <?php 
            
                                echo form_input(array(
                                    "type" => "hidden", 
                                    "name" => "primer_uso", 
                                    "class" => "form-control border-0", 
                                    "id" => "", 
                                    "placeholder" => "",
                                    "value" => "NO",
                                ));
                                
                            ?>

                        <div class="card text-dark alert-dark">
                            <div class="card-body">
                                <div class="row">
                                    <!-- INPUT -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <?php 
                                                $atr = array(
                                                    'name' => 'rango',
                                                    'id' => 'rango',
                                                    'class' => 'selectpicker form-control',
                                                    'data-container' => 'body', 
                                                    'data-live-search' => 'false', 
                                                    'title' => 'Rango', 
                                                    'data-hide-disabled' => 'true', 
                                                    'data-actions-box' => 'true', 
                                                    'data-virtual-scroll' => 'false'
                                                );
                                                $options = array(
                                                    'Admin' => 'Admin',
                                                    'Estandar' => 'Estandar',
                                                );
                        
                                                if(isset($rango)){
                        
                                                    echo form_label('Rango:');
                                                    echo form_dropdown('rango', $options, $rango, $atr);
                        
                                                }else{
                                                    
                                                    echo form_label('Rango:');
                                                    echo form_dropdown('rango', $options, 'Admin', $atr);
                                                }
                        
                                            ?>
                                            <div class="invalid-feedback msg-1 text-left"></div>
                                        </div>
                                    </div>
                                    <!-- INPUT -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <?= form_label('C&eacute;dula:');?>
                                            <div class="input-group">
                                                <span class="input-group-append ico-form">
                                                    <i class="fa fa-pen-alt"></i>
                                                </span>
                                                <select name="nacionalidad" id="nacionalidad" class="form-control selectpicker border-0 col-3" required>
                                                    <option value="V-" class="small">V-</option>
                                                    <option value="E-" class="small">E-</option>
                                                </select>
                                                <?php 
                                                if(isset($cedula)){
                            
                                                    echo form_input(array(
                                                        "type" => "text", 
                                                        "name" => "cedula", 
                                                        "class" => "User form-control border-0", 
                                                        "id" => "User", 
                                                        "placeholder" => "C.I",
                                                        "value" => $cedula,
                                                    ));
                            
                                                }else{
                            
                                                    echo form_input(array(
                                                        "type" => "text", 
                                                        "name" => "cedula", 
                                                        "class" => "User form-control border-0", 
                                                        "id" => "User", 
                                                        "placeholder" => "C.I",
                                                    ));
                                                }
                                                ?>
                                                <div class="invalid-feedback msg-2 text-left"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="card text-dark alert-dark my-3">
                            <div class="card-body">
                                <div class="row">
                                    <!-- INPUT -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <?= form_label('Contraseña:');?>
                                            <div class="input-group">
                                                <span class="input-group-append ico-form">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                <?php 
                                                    echo form_password(
                                                        'password', 
                                                        "", 
                                                        "class='form-control' id='inputPassword3' placeholder='Password'"
                                                    );
                                                ?>
                                                <div class="invalid-feedback msg-3 text-left"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- INPUT -->
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <?php echo form_label('Repetir contraseña:');?>
                                            <div class="input-group">
                                                <span class="input-group-append ico-form">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                                                <?php 
                                                    echo form_password(
                                                        "password_confirm", 
                                                        "", 
                                                        "class='form-control' id='inputPasswordRepeat' placeholder='Password'"
                                                    );
                                                ?>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-secondary btn-sm" id="btn-password">
                                                        <i class="fas fa-eye ico-pass"></i>
                                                    </button>
                                                </div>
                                                <div class="invalid-feedback msg-4 text-left"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="loading" class="d-inline-block position-absolute"></div>
                         
                        <div class="form-group text-right" id="group-btn">
                            <a href="<?= base_url('dashboard')?>" class="btn btn-danger">CANCELAR</a>

                            <?php 
                                echo form_submit(
                                    "submit", 
                                    "GUARDAR", 
                                    "class='btn btn-warning' id='Submit'"
                                );
                            ?>
                        </div>
                        <?php  echo form_close(); ?>
        
                        <!-- MENSAJE ALERTA -->
                        <?php if(!empty($error)): ?>
                            <div class="alert alert-danger small">
                                <?= $error; ?>
                            </div>
                        <?php endif; ?>
        
                        <?php if(!empty($msg)): ?>
                            <div class="alert alert-success small">
                                <?= $msg; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>