<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.A.C - Login</title>
    <!-- LIBS -->
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/font-awesome/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/animated/animate.css">
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/select/css/bootstrap-select.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/vendor/sweetalert2/sweetalert2.min.css">

    <!-- CUSTOM -->
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/css/responsive.css">

</head>
<body style="background-color: #232323 !important;">

    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url("/");?>">
    <?php echo form_error('email'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-12 col-sm-12 mx-auto p-0">
                
                <!-- LOGO PRINCIPAL -->
                <div id="cont-login" class=""> 
                    <div class="text-center" id="cont-1">

                        <img src="assets/img/verificado.png" id="img-btn" 
                            style="width: 270px; height: 260px; cursor: pointer;">
                    </div>
                </div>
                <!-- LOGIN -->
                <div class="content oculto" style="background:none !important;" 
                id="LoginContent">
                    <br>
                    <br>
                    <br>
                    <div class="section-header my-4">
                        <h3>Login</h3>
                    </div>

                    <div class="login mx-auto text-center">

                        <div class="col-lg-10 col-md-10 col-sm-10 col-10 figure 
                            mx-auto my-5">
                            <div class="section-header my-4">
                                <h6>Iniciar Sesi&oacute;n</h6>
                            </div>
                            <!-- FORM -->
                            <form action="<?php echo base_url("/")?>login/validate" method="POST" id="form_login">
                                <div class="row">

                                    <div class="col-lg-11 col-md-11 col-sm-11 mx-auto">
                                        <div class="form-group" id="email">
                                            <div class="input-group">
                                                <span class="input-group-addon d-flex align-items-center ico-form">
                                                    <i class="fa fa-user"></i>
                                                </span>
                                                <select name="nacionalidad" id="nacionalidad" class="form-control selectpicker border-0 col-3">
                                                    <option value="V-" selected class="small">V-</option>
                                                    <option value="E-" class="small">E-</option>
                                                </select>
                                                <input type="text" name="username" class="form-control form-input" 
                                                id="inputEmail3" placeholder="CI" autocomplete="off">
                    
                                                <div class="invalid-feedback msg-1 text-left" style="font-size: 11px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-11 col-md-11 col-sm-11 mx-auto">
                                        <div class="form-group" id="password">
                                            <div class="input-group">
                                                <span class="input-group-addon d-flex align-items-center ico-form">
                                                    <i class="fa fa-lock"></i>
                                                </span>
                    
                                                <input type="password" name="password" class="form-control form-input" 
                                                id="inputPassword3" placeholder="Contraseña" autocomplete="off">
                    
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary btn-sm" type="button" id="btn-password">
                                                        <i class="fas fa-eye ico-pass"></i>
                                                    </button>
                                                </div>
                                                <div class="invalid-feedback msg-2 text-left" style="font-size: 11px;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-11 col-md-11 col-sm-11 mx-auto">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning">
                                                Iniciar Sesi&oacute;n
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- ALERTAS -->
<!--
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 small mx-auto my-1 text-center" id="error-alert">
                            <div class="alert bg-danger alert-sm small">
                                Los datos ingresados son incorrectos
                            </div>
                        </div>
-->
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12 mx-auto my-1 text-center" id="loading"></div>

                    </div>

                    <div class="text-center my-4">
                        <p class="small">E.B.N <br> 
                            VICTOR JULIO GONZALES <br> 
                            "LAS DELICIAS"
                        </p>
                    </div>
                </div>

                <footer class="footer">
                    <!-- LIBS JS -->
                     <script src="<?php echo base_url("/")?>assets/vendor/jquery/jquery.min.js"></script>
                     <script src="<?php echo base_url('/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
                     <script src="<?php echo base_url('/'); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
                     <script src="<?php echo base_url('/'); ?>assets/vendor/font-awesome/fontawesome.min.js"></script>
                     <script src="<?php echo base_url('/'); ?>assets/vendor/sweetalert/sweetalert.js"></script>
                     <script src="<?php echo base_url('/'); ?>assets/vendor/sweetalert2/sweetalert2.min.js"></script>
                     <script src="<?php echo base_url('/'); ?>assets/vendor/select/js/bootstrap-select.js"></script>

                     <!-- CUSTOM -->
                     <script src="<?php echo base_url('/'); ?>assets/js/menu.js"></script>
                     <script src="<?php echo base_url('/'); ?>assets/js/custom.js"></script>
                     <script src="<?php echo base_url("/")?>assets/js/auth/login.js"></script>
                </footer>

            </div>  
        </div>  
    </div>  
</body>
</html>