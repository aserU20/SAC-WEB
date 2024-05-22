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

	.card {
		background: none !important;
	}

    .general {
		background: none !important;
    }
	#nacionalidad {
		border-top: 1px solid #ced4da !important;
		border-left: 1px solid #ced4da !important;
		border-bottom: 1px solid #ced4da !important;
	}
	#User {
		border-top: 1px solid #ced4da !important;
		border-right: 1px solid #ced4da !important;
		border-bottom: 1px solid #ced4da !important;
	}
	</style>
</head>
<body>


    <div class="container border">
		<h1>Paso 3: Configuración - Establecer contraseña de acceso!</h1>

		<code>Establesca una contraseña para poder ingresar al sistema:</code>

		<div class="bg-dark mx-auto general">

			<!-- MESAJES EXITO-->
			<div class="form-group mx-auto">
				<div class="mx-auto">
										
					<?php                    
						// mensajes de alerta
						if ($this->session->flashdata('error')){ 
						echo "<div class='text-left alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
						echo $this->session->flashdata('error');
						echo "</div>";
						}      
					?>
				</div>
			</div>

			<div class="row justify-content-lg-center">
				<div class="col-lg-12 ">
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
								"value" => "YES",
							));
							
						?>
						<div class="card text-dark alert-dark d-none">
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
													'data-virtual-scroll' => 'false',
													// 'disabled' => 'true',
													'required' => 'true'
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
												<select name="nacionalidad" id="nacionalidad"  class="form-control border-0 col-3" required>
													<option value="V-" <?php if($nacionalidad == "V-"){ echo "selected";}?> class="small">V-</option>
													<option value="E-" <?php if($nacionalidad == "E-"){ echo "selected";}?> class="small">E-</option>
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
														// "readonly" => "true",
														// "required" => "true"
													));
							
												}else{
							
													echo form_input(array(
														"type" => "text", 
														"name" => "cedula", 
														"class" => "User form-control border-0", 
														"id" => "User", 
														"placeholder" => "C.I",
														"required" => "true"
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
														"class='form-control' id='inputPassword3' placeholder='Password' required='true'"
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
														"class='form-control' id='inputPasswordRepeat' placeholder='Password' required='true'"
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
							<button type="submit" class='btn btn-warning'  id='Submit'>GUARDAR</button>
							
						</div>
					<?php  echo form_close(); ?>
	
					<!-- MENSAJE ALERTA -->
					<?php if(!empty($error)): ?>
						<div class="alert alert-danger small" id="alert-error">
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

		</div>

    </div>




<footer>
	<!-- LIBS JS -->
	<script src="<?php echo base_url("/")?>assets/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url('/'); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
	<script src="<?php echo base_url('/'); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('/'); ?>assets/vendor/font-awesome/fontawesome.min.js"></script>

    <!-- CUSTOM -->
    <script src="<?php echo base_url('/'); ?>assets/js/custom.js"></script>

</footer>
</body>
</html>