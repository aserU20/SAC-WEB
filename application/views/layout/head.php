<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S.A.C - Software de Administración y Control</title>
    <!-- LIBS -->
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/font-awesome/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/animated/animate.css">
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/select/css/bootstrap-select.css">
    <link rel="stylesheet" href="<?php echo base_url('/'); ?>assets/vendor/sweetalert2/sweetalert2.min.css">
    
    <!-- DATATABLES -->
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/datatables/dataTables.bootstrap4.min.css">
    <link href="<?= base_url('assets/vendor/datatables_plugin/buttons.dataTables.min.css');?>" rel="stylesheet"/>

    <!-- CUSTOM -->
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/css/responsive.css">

</head>
<body>
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url("/");?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 col-md-12 col-sm-12 mx-auto p-0">
                <header id="header">
                    <!-- HEADER -->
                    <div class="header col-lg-12 col-sm-12 col-md-12">
                        <div class="row gutters">
                            <div class="img-content col-lg-4 col-sm-4 col-md-4 p-0 col-4">
                                <a href="<?php echo base_url("/");?>dashboard">
                                    <img src="<?php echo base_url("/");?>assets/img/C.A.P simple.png" class="logo" 
                                    width="150" height="100" >
                                </a>
                            </div>
                            <div class="title-content col-lg-8 col-sm-8 col-md-8 col-8">
                                <div class="section-header">
                                    <h6 class="title" style="font-size: 20px;">
                                        ESCUELA BASICA NACIONAL VICTOR
                                        JULIO GONZALES "LAS DELICIAS"
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END HEADER -->

                    <!-- HEADER MOVIL-->
                    <!-- <div class="row"> -->
                        <div class="header-movil col-lg-12 col-sm-12 col-md-12 col-12 ">
                            <div class="col-lg-10 col-sm-10 col-md-10 col-10 title-sm">
                                <div>
                                    ESCUELA BASICA NACIONAL VICTOR
                                    JULIO GONZALES "LAS DELICIAS"
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-2 ico-menu">
                                <button type="button" id="btn-menu"><i class="fa fa-bars"></i></button>
                            </div>
                        </div>
                        <div class="menu-sm h-100 ">
                            <div class="d-flex justify-content-center border-0 shadow-lg" style="height: 70px;">
                                <div class="row align-items-center">
                                    <div class="col small">
                                        <?= $this->session->userdata('nombre') . " " . $this->session->userdata('apellido') ;?>
                                    </div>
                                </div>
                            </div>
                            <!-- Divider -->
                            <hr class="sidebar-divider my-0">
                            <ul class="small w-100 h-70">
                                <li><i class="fa fa-cog"></i> Personal
                                    <ul class="small">
                                        <li><a href="<?= base_url("personal/create");?>">Nuevo</a></li>
                                        <li><a href="<?= base_url("personal/show");?>">Consultar</a></li>
                                        <?php if ($this->session->userdata('rango') == 'Admin'):?>
                                        <li><a href="<?= base_url("cargos");?>">Cargos</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <hr class="sidebar-divider my-0">

                                <li><i class="fa fa-cog"></i> Estudiantes
                                    <ul class="small">
                                        <li><a href="<?= base_url("alumnos/create");?>">Nuevo</a></li>
                                        <li><a href="<?= base_url("alumnos");?>">Consultar</a></li>
                                        <li><a href="<?= base_url("representantes");?>">Representantes</a></li>
                                    </ul>
                                </li>
                                <hr class="sidebar-divider my-0">

                                <li><i class="fa fa-cog"></i> Asistencia
                                    <ul class="small">
                                        <li><a href="<?= base_url("dashboard");?>">Asistencia personal</a></li>
                                        <li><a href="<?= base_url("asistencia");?>">Listado de asistencia</a></li>
                                        <li><a href="<?= base_url("asistencia/consult");?>">Consultar asistencia</a></li>
                                        <?php if ($this->session->userdata('rango') == 'Admin'):?>
                                        <li><a href="<?= base_url("asistencia/justificar");?>">Justificar</a></li>
                                        <li><a href="<?= base_url("asistencia/situacion_laboral");?>">Situaciones laborales</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                                <hr class="sidebar-divider my-0">

                                <?php if ($this->session->userdata('rango') == 'Admin'):?>
                                <li><i class="fa fa-cog"></i> Usuarios
                                    <ul class="small">
                                        <li><a href="<?= base_url("users/create");?>">Nuevo</a></li>
                                        <li><a href="<?= base_url("users");?>">Consultar</a></li>
                                    </ul>
                                </li>
                                <hr class="sidebar-divider my-0">
                                <?php endif; ?>

                                <li class="d-none"><a href="<?= base_url("users/configuration");?>"><i class="fa fa-cogs"></i> Configuraci&oacute;n</a></li>
                                <hr class="sidebar-divider my-0">

                                <li><a href="#" class="close_session"><i class="fa fa-sign-out-alt"></i> Cerrar sesi&oacute;n</a></li>
                            </ul>
                        </div>
                    <!-- </div> -->
                    <!-- END HEADER MOVIL-->