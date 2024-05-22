<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Instalación S.A.C - Software de Administración y Control</title>
    <!-- LIBS -->
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url("/")?>assets/vendor/font-awesome/fontawesome.min.css">

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	.ico-form {
		padding: 10px 8px;
		background-color: #5a6268;
		color: #fff;
	}
	.izquierda {
		display: none;
	}
	.pt-1 {
		display: none;
	}
	.derecha {
		margin: auto !important;
	}
	.pt-3 {
		display: none;
	}
	.card {
		background: none !important;
	}
	#nacionalidad {
		border-top: 1px solid #ced4da !important;
		border-left: 1px solid #ced4da !important;
		border-bottom: 1px solid #ced4da !important;
	}
	#ci {
		border-top: 1px solid #ced4da !important;
		border-right: 1px solid #ced4da !important;
		border-bottom: 1px solid #ced4da !important;
	}
	#sexo {
		border: 1px solid #ced4da !important;
	}
	</style>
</head>
<body>


    <div class="container border">
		<h1>Paso 2: Configuración - Administrador del sistema!</h1>

        <code>Datos del Director(a) de la institución</code>

        <div class="row gutters">
            <!-- DERECHA -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 p-0 derecha">
                <div class="card border-0 h-100 bg-dark">
                    <div class="card-body">
                        <form action="<?= base_url("personal/store_personal");?>" method="post" id="form_personal">
                                <input type="hidden" name="primer_uso" value="YES">
                            <!-- PARTE 1 -->
                            <div class="row gutters pt-1">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="text-primary">Opciones de Personal</h6>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="">Tipo</label>
                                        <select name="tipo" id="tipo" title="Tipo" class="form-control">
                                            <option value="" class="oculto">Tipo</option>
                                            <option value="Docente">Docente</option>
                                            <option value="Administrativo" selected>Administrativo</option>
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
                                            <option value="Mañana" selected>Mañana</option>
                                            <option value="Tarde">Tarde</option>
                                        </select>
                                        <div class="invalid-feedback text-left"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12" id="select-cargo">
                                    <div class="form-group">
                                        <label for="">Cargo</label>
                                        <select name="cargo" id="cargo" title="Cargo" class="form-control">
                                            <option value="DIRECTOR" class="oculto" selected>Cargo</option>
                                        </select>
                                        <div class="invalid-feedback text-left"></div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                                    <div class="form-group">
                                        <label for="">C&oacute;digo</label>
                                        <input type="text" name="codigo" id="codigo" class="custom-input form-control rounded-0 text-light" placeholder="Ej. 1A34B6" value="0001" readonly>
                                        <input type="hidden" name="id_cargo" id="id_cargo" value="1">
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
                                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
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
                                            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
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
                                            <input type="text" name="ci" id="ci" class="form-control col-9 border-0" placeholder="Ci" required>
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
                                            <input type="date" name="fecha_n" id="fecha_n" class="form-control" required>
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
                                            <input type="number" name="edad" id="edad" class="form-control" placeholder="Edad" required>
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
                                            <select name="sexo" id="sexo" class="form-control border-0" required>
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
                                            <input type="mail" name="correo" id="correo" class="form-control" placeholder="Correo" required>
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
                                            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Tel&eacute;fono" required>
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
                                            <input type="text" name="ciudad" id="ciudad" class="form-control" placeholder="Ciudad" required>
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
                                            <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direcci&oacute;n" required>
                                            <div class="invalid-feedback text-left"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="loading" class="d-inline-block position-absolute"></div>

                            <div class="text-right" id="group-btn">
                                <button type="submit" class="btn btn-info">SIGUIENTE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




<footer>
	<!-- LIBS JS -->
	<script src="<?php echo base_url("/")?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url('/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="<?php echo base_url('/'); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('/'); ?>assets/vendor/font-awesome/fontawesome.min.js"></script>
</footer>
</body>
</html>