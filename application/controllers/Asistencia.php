<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistencia extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session', 'form_validation', 'pagination', 'pdf'));
		$this->load->helper(array('asistencia/asistencia_rules', 'url', 'file', 'download'));
        $this->load->model(array('ModelsAsistencia', 'ModelsPersonal'));
	}
    public function index() /* listado de asistencia */
    {
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...
			$datos = $this->ModelsAsistencia->getAsistencias();

            $resources = array(
                'js_one' => base_url('assets/js/asistencia/show_asistencias.js'),
                'js_two' => ''
            );
            $view = $this->load->view('asistencia/show_asistencias', compact('datos'), TRUE);
            
            $this->getTemplate($view, $resources);

        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
    }
	public function return_asistencias() /* retorna todas las asistencias */
	{
        if ($this->input->server('REQUEST_METHOD') === "POST") {
			$datos = $this->ModelsAsistencia->getAsistencias();

			$data = Array();

            foreach($datos as $i => $reg){
                $data[] = array(
					"0"=>$reg->codigo_persona,
					"1"=>$reg->fecha,
					"2"=>$reg->fecha,
					"3"=>$reg->fecha,
					"4"=>$reg->fecha,
					"5"=>$reg->fecha,
					"6"=>$reg->fecha,
                    "7"=>$reg->fecha,
                    "8"=>$reg->fecha,
                    "9"=>$reg->fecha,
                    "10"=>$reg->fecha,
                    "11"=>$reg->fecha,
                    "12"=>$reg->fecha,
                    "13"=>$reg->fecha,
                    "14"=>$reg->fecha,
                    "15"=>$reg->fecha,
                    "16"=>$reg->fecha,
                    "17"=>$reg->fecha,
                    "18"=>$reg->fecha,
                    "19"=>$reg->fecha,
                    "20"=>$reg->fecha,
                    "21"=>$reg->fecha,
                    "22"=>$reg->fecha,
                    "23"=>$reg->fecha  
                
                );
            }
	
			$results = array(
				"sEcho"=>1,//info para datatables
				"iTotalRecords"=>count($data),//enviamos el total de registros al datatable
				"iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
				"aaData"=>$data
			); 
	
            echo json_encode($results);
        }else{
            
            show_404();
        }

	}
    public function store_asistencia() /* Metodo para validar y guardar asistencias */
    {
        if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getAsistenciaRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					'ci' => form_error('ci'),
				);
				echo json_encode($errors);
			}else{

				$nacionalidad = $this->input->post('nacionalidad');
				$codigo_persona = $nacionalidad . " " . $this->input->post('ci');
				$day = $this->input->post('dia');
				$date = date('Y-m-d H:i:s');
				$date_array = explode(" ", $date);
				$fecha = $date_array[0];
				$hora = $date_array[1];
                
                //DIAS
                $monday = date('Y-m-d', strtotime( 'monday this week' ));
                $tuesday = date('Y-m-d', strtotime( 'tuesday this week' ));
                $wednesday = date('Y-m-d', strtotime( 'wednesday this week' ));
                $thursday = date('Y-m-d', strtotime( 'thursday this week' ));
                $friday = date('Y-m-d', strtotime( 'friday this week' ));
                $saturday = date('Y-m-d', strtotime( 'saturday this week' ));
                $sunday = date('Y-m-d', strtotime( 'sunday this week' ));

                // verificar personal
				if(!$verify = $this->ModelsPersonal->getPersona($codigo_persona)){
					
					echo json_encode(array(
						'ci' => 'El titular de la c&eacute;dula de identidad, no se ecuentra registrado!'  
					));
					$this->output->set_status_header(401);

				}else{

					// lunes
					if($day == "Lunes"){
                        
                        $campo = "lu_fecha";
                        
						$lunes = array(
							'codigo_persona'  => $codigo_persona,
							'lu_fecha'        => $fecha,
							'lu_entrada'      => $hora,
							'fecha'           => $fecha,
                            'fin_semana'      => $sunday,
                            
                            //DIAS
                            'ma_fecha' => $tuesday,
                            'mi_fecha' => $wednesday,
                            'ju_fecha' => $thursday,
                            'vi_fecha' => $friday,
                            'sa_fecha' => $saturday,
                            'do_fecha' => $sunday,
						);

                        
						if(!$asistencia = $this->ModelsAsistencia->verificar_asistencia($codigo_persona, $campo, $fecha)) {
							// Insert
							if(!$result = $this->ModelsAsistencia->save($lunes)){
								$this->output->set_status_header(500);
								echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
							}else{

								$this->output->set_status_header(200);
								$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado a trabajar!";
								$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

								echo json_encode(array(
									'day' => 'Lunes',
									'tipo' => 'store', 
									'msg' => $msg,
									'asistencia' => $allregistros,
								));
								exit;
							}

						}else{
                            
                            if($fecha > $asistencia->fin_semana){
                                // Insert
                                if(!$result = $this->ModelsAsistencia->save($lunes)){
                                    $this->output->set_status_header(500);
                                    echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                                }else{

                                    $this->output->set_status_header(200);
                                    $msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado a trabajar!";
                                    $allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

                                    echo json_encode(array(
                                        'day' => 'Lunes',
                                        'tipo' => 'store', 
                                        'msg' => $msg,
                                        'asistencia' => $allregistros,
                                    ));
                                    exit;
                                }
                                exit;
                            }
                            
							$datos = array(
								'lu_salida' => $hora,
							);
							// update
							if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
								$this->output->set_status_header(500);
								echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
							}else{
								$this->output->set_status_header(200);
								$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha salido de trabajar!";
								$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

								echo json_encode(array(
									'day' => 'Lunes',
									'tipo' => 'update', 
									'msg' => $msg,
									'asistencia' => $allregistros,
								));
							}
						}
						exit;
					}

					// martes
					if($day == "Martes"){

                        $campo = "ma_fecha";
                        
						$dayy = array(
							'codigo_persona'  => $codigo_persona,
							'ma_fecha'        => $fecha,
							'ma_entrada'      => $hora,
							'fecha'           => $fecha,
                            'fin_semana'      => $sunday,
                            
                            //DIAS
                            'lu_fecha' => $monday,
                            'mi_fecha' => $wednesday,
                            'ju_fecha' => $thursday,
                            'vi_fecha' => $friday,
                            'sa_fecha' => $saturday,
                            'do_fecha' => $sunday,
						);

						if(!$asistencia = $this->ModelsAsistencia->verificar_asistencia($codigo_persona, $campo, $fecha)) {
							// Insert
							if(!$result = $this->ModelsAsistencia->save($dayy)){
								$this->output->set_status_header(500);
								echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
							}else{

								$this->output->set_status_header(200);
								$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
								$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

								echo json_encode(array(
									'day' => 'Martes',
									'tipo' => 'store', 
									'msg' => $msg,
									'asistencia' => $allregistros,
								));
								exit;
							}

						}else{
                            
                            if($fecha > $asistencia->fin_semana){
                                // Insert
                                if(!$result = $this->ModelsAsistencia->save($dayy)){
                                    $this->output->set_status_header(500);
                                    echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                                }else{

                                    $this->output->set_status_header(200);
                                    $msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
                                    $allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

                                    echo json_encode(array(
                                        'day' => 'Martes',
                                        'tipo' => 'store', 
                                        'msg' => $msg,
                                        'asistencia' => $allregistros,
                                    ));
                                    exit;
                                }
                                exit;
                            }

							if(empty($asistencia->ma_entrada)){
								// Entrada
								$datos = array(
									'ma_fecha'    => $fecha,
									'ma_entrada'  => $hora,
									'fecha'       => $fecha,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado a trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Martes',
										'tipo' => 'store', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}

							}else{
								// Salida
								$datos = array(
									'ma_salida' => $hora,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha salido de trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Martes',
										'tipo' => 'update', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}
							}
						}
						exit;
					}

					// miercoles
					if($day == "Miércoles"){
                        
                        $campo = "mi_fecha";

						$dayy = array(
							'codigo_persona'  => $codigo_persona,
							'mi_fecha'        => $fecha,
							'mi_entrada'      => $hora,
							'fecha'           => $fecha,
                            'fin_semana'      => $sunday,
                            
                            //DIAS
                            'ma_fecha' => $tuesday,
                            'lu_fecha' => $monday,
                            'ju_fecha' => $thursday,
                            'vi_fecha' => $friday,
                            'sa_fecha' => $saturday,
                            'do_fecha' => $sunday,
						);

						if(!$asistencia = $this->ModelsAsistencia->verificar_asistencia($codigo_persona, $campo, $fecha)) {
							// Insert
							if(!$result = $this->ModelsAsistencia->save($dayy)){
								$this->output->set_status_header(500);
								echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
							}else{

								$this->output->set_status_header(200);
								$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
								$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

								echo json_encode(array(
									'day' => 'Miercoles',
									'tipo' => 'store', 
									'msg' => $msg,
									'asistencia' => $allregistros,
								));
								exit;
							}

						}else{

                            if($fecha > $asistencia->fin_semana){
                                // Insert
                                if(!$result = $this->ModelsAsistencia->save($dayy)){
                                    $this->output->set_status_header(500);
                                    echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                                }else{

                                    $this->output->set_status_header(200);
                                    $msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
                                    $allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

                                    echo json_encode(array(
                                        'day' => 'Miercoles',
                                        'tipo' => 'store', 
                                        'msg' => $msg,
                                        'asistencia' => $allregistros,
                                    ));
                                    exit;
                                }
                                exit;
                            }
                            
							if(empty($asistencia->mi_entrada)){
								// Entrada
								$datos = array(
									'mi_fecha'    => $fecha,
									'mi_entrada'  => $hora,
									'fecha'       => $fecha,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado a trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Miercoles',
										'tipo' => 'store', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}

							}else{
								// Salida
								$datos = array(
									'mi_salida' => $hora,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha salido de trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Miercoles',
										'tipo' => 'update', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}
							}
						}
						exit;
					}
                    
                    // jueves
					if($day == "Jueves"){

                        $campo = "ju_fecha";
                        
						$dayy = array(
							'codigo_persona'  => $codigo_persona,
							'ju_fecha'        => $fecha,
							'ju_entrada'      => $hora,
							'fecha'           => $fecha,
                            'fin_semana'      => $sunday,
                            
                            //DIAS
                            'ma_fecha' => $tuesday,
                            'mi_fecha' => $wednesday,
                            'lu_fecha' => $monday,
                            'vi_fecha' => $friday,
                            'sa_fecha' => $saturday,
                            'do_fecha' => $sunday,
						);

						if(!$asistencia = $this->ModelsAsistencia->verificar_asistencia($codigo_persona, $campo, $fecha)) {
							// Insert
							if(!$result = $this->ModelsAsistencia->save($dayy)){
								$this->output->set_status_header(500);
								echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
							}else{

								$this->output->set_status_header(200);
								$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
								$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

								echo json_encode(array(
									'day' => 'Jueves',
									'tipo' => 'store', 
									'msg' => $msg,
									'asistencia' => $allregistros,
								));
								exit;
							}

						}else{
                            
                            if($fecha > $asistencia->fin_semana){
                                // Insert
                                if(!$result = $this->ModelsAsistencia->save($dayy)){
                                    $this->output->set_status_header(500);
                                    echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                                }else{

                                    $this->output->set_status_header(200);
                                    $msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
                                    $allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

                                    echo json_encode(array(
                                        'day' => 'Jueves',
                                        'tipo' => 'store', 
                                        'msg' => $msg,
                                        'asistencia' => $allregistros,
                                    ));
                                    exit;
                                }
                                exit;
                            }

							if(empty($asistencia->ju_entrada)){
								// Entrada
								$datos = array(
									'ju_fecha'    => $fecha,
									'ju_entrada'  => $hora,
									'fecha'       => $fecha,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado a trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Jueves',
										'tipo' => 'store', 
										'msg' => $msg,
										'asistencia' => $allregistros,
                                        'campo' => $asistencia
									));
								}

							}else{
								// Salida
								$datos = array(
									'ju_salida' => $hora,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha salido de trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Jueves',
										'tipo' => 'update', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}
							}
						}
						exit;
					}

					// viernes
					if($day == "Viernes"){
                        
                        $campo = "vi_fecha";

						$dayy = array(
							'codigo_persona'  => $codigo_persona,
							'vi_fecha'        => $fecha,
							'vi_entrada'      => $hora,
							'fecha'           => $fecha,
                            'fin_semana'      => $sunday,
                            
                            //DIAS
                            'ma_fecha' => $tuesday,
                            'mi_fecha' => $wednesday,
                            'ju_fecha' => $thursday,
                            'lu_fecha' => $monday,
                            'sa_fecha' => $saturday,
                            'do_fecha' => $sunday,
						);

						if(!$asistencia = $this->ModelsAsistencia->verificar_asistencia($codigo_persona, $campo, $fecha)) {
							// Insert
							if(!$result = $this->ModelsAsistencia->save($dayy)){
								$this->output->set_status_header(500);
								echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
							}else{

								$this->output->set_status_header(200);
								$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
								$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

								echo json_encode(array(
									'day' => 'Viernes',
									'tipo' => 'store', 
									'msg' => $msg,
									'asistencia' => $allregistros,
								));
								exit;
							}

						}else{
                            
                            if($fecha > $asistencia->fin_semana){
                                // Insert
                                if(!$result = $this->ModelsAsistencia->save($dayy)){
                                    $this->output->set_status_header(500);
                                    echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                                }else{

                                    $this->output->set_status_header(200);
                                    $msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
                                    $allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

                                    echo json_encode(array(
                                        'day' => 'Viernes',
                                        'tipo' => 'store', 
                                        'msg' => $msg,
                                        'asistencia' => $allregistros,
                                    ));
                                    exit;
                                }
                                exit;
                            }
                            
							if(empty($asistencia->vi_entrada)){
								// Entrada
								$datos = array(
									'vi_fecha'    => $fecha,
									'vi_entrada'  => $hora,
									'fecha'       => $fecha,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado a trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Viernes',
										'tipo' => 'store', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}

							}else{
								// Salida
								$datos = array(
									'vi_salida' => $hora,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha salido de trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Viernes',
										'tipo' => 'update', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}
							}
						}
						exit;
					}

					// sabado
					if($day == "Sabado"){

                        $campo = "sa_fecha";
                        
						$dayy = array(
							'codigo_persona'  => $codigo_persona,
							'sa_fecha'        => $fecha,
							'sa_entrada'      => $hora,
							'fecha'           => $fecha,
                            'fin_semana'      => $sunday,
                            
                            //DIAS
                            'ma_fecha' => $tuesday,
                            'mi_fecha' => $wednesday,
                            'ju_fecha' => $thursday,
                            'vi_fecha' => $friday,
                            'lu_fecha' => $monday,
                            'do_fecha' => $sunday,
						);

						if(!$asistencia = $this->ModelsAsistencia->verificar_asistencia($codigo_persona, $campo, $fecha)) {
							// Insert
							if(!$result = $this->ModelsAsistencia->save($dayy)){
								$this->output->set_status_header(500);
								echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
							}else{

								$this->output->set_status_header(200);
								$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
								$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

								echo json_encode(array(
									'day' => 'Sabado',
									'tipo' => 'store', 
									'msg' => $msg,
									'asistencia' => $allregistros,
								));
								exit;
							}

						}else{
                            
                            if($fecha > $asistencia->fin_semana){
                                // Insert
                                if(!$result = $this->ModelsAsistencia->save($dayy)){
                                    $this->output->set_status_header(500);
                                    echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                                }else{

                                    $this->output->set_status_header(200);
                                    $msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
                                    $allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

                                    echo json_encode(array(
                                        'day' => 'Sabado',
                                        'tipo' => 'store', 
                                        'msg' => $msg,
                                        'asistencia' => $allregistros,
                                    ));
                                    exit;
                                }
                                exit;
                            }
                            
							if(empty($asistencia->sa_entrada)){
								// Entrada
								$datos = array(
									'sa_fecha'    => $fecha,
									'sa_entrada'  => $hora,
									'fecha'       => $fecha,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado a trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Sabado',
										'tipo' => 'store', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}

							}else{
								// Salida
								$datos = array(
									'sa_salida' => $hora,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha salido de trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Sabado',
										'tipo' => 'update', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}
							}
						}
						exit;
					}

					// domingo
					if($day == "Domingo"){
                        
                        $campo = "do_fecha";

						$dayy = array(
							'codigo_persona'  => $codigo_persona,
							'do_fecha'        => $fecha,
							'do_entrada'      => $hora,
							'fecha'           => $fecha,
                            'fin_semana'      => $sunday,
                            
                            //DIAS
                            'ma_fecha' => $tuesday,
                            'mi_fecha' => $wednesday,
                            'ju_fecha' => $thursday,
                            'vi_fecha' => $friday,
                            'sa_fecha' => $saturday,
                            'lu_fecha' => $monday,
						);

						if(!$asistencia = $this->ModelsAsistencia->verificar_asistencia($codigo_persona, $campo, $fecha)) {
							// Insert
							if(!$result = $this->ModelsAsistencia->save($dayy)){
								$this->output->set_status_header(500);
								echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
							}else{

								$this->output->set_status_header(200);
								$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
								$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

								echo json_encode(array(
									'day' => 'Domingo',
									'tipo' => 'store', 
									'msg' => $msg,
									'asistencia' => $allregistros,
								));
								exit;
							}

						}else{
                            
                            if($fecha > $asistencia->fin_semana){
                                // Insert
                                if(!$result = $this->ModelsAsistencia->save($dayy)){
                                    $this->output->set_status_header(500);
                                    echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                                }else{

                                    $this->output->set_status_header(200);
                                    $msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado ha trabajar!";
                                    $allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);

                                    echo json_encode(array(
                                        'day' => 'Domingo',
                                        'tipo' => 'store', 
                                        'msg' => $msg,
                                        'asistencia' => $allregistros,
                                    ));
                                    exit;
                                }
                                exit;
                            }
                            
							if(empty($asistencia->do_entrada)){
								// Entrada
								$datos = array(
									'do_fecha'    => $fecha,
									'do_entrada'  => $hora,
									'fecha'       => $fecha,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha entrado a trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Domingo',
										'tipo' => 'store', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}

							}else{
								// Salida
								$datos = array(
									'do_salida' => $hora,
								);
								// update
								if(!$update = $this->ModelsAsistencia->update($codigo_persona, $campo, $fecha, $datos)){
									$this->output->set_status_header(500);
									echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
								}else{
									$this->output->set_status_header(200);
									$msg = $verify['nombre'] . " " . $verify['apellido'] . " ha salido de trabajar!";
									$allregistros = $this->ModelsAsistencia->asistencia_diaria($campo, $fecha);
	
									echo json_encode(array(
										'day' => 'Domingo',
										'tipo' => 'update', 
										'msg' => $msg,
										'asistencia' => $allregistros,
									));
								}
							}
						}
						exit;
					}

				}
            }
        }else{
            show_404();
        }
    }
	public function filter_asistencia() /* Metodo para filtrar asistencias */
	{
        if ($this->input->server('REQUEST_METHOD') === "POST") {

            $date = date('Y-m-d H:i:s');
            $date_array = explode(" ", $date);
            $fecha = $date_array[0];
            $hora = $date_array[1];
            
            $nacionalidad = $this->input->post('nacionalidad'); 
            $ci = $this->input->post('ci');     
            $cedula = $this->input->post('ci'); 
            if(!empty($ci)){
                $ci = $nacionalidad . " " . $ci;
            }
            
            $fecha_i = $this->input->post('fecha_i'); 
            $fecha_f = $this->input->post('fecha_f');

            $dias = array('Lunes','Martes','Miércoles','Jueves','Viernes','Sabado','Domingo');
            $day_i = $dias[(date('N', strtotime($fecha_i))) - 1];
            $day_f = $dias[(date('N', strtotime($fecha_f))) - 1];
            
            
            //param 1
            if($day_i == 'Lunes'){
                $param1 = "lu_fecha >=";
            }
            if($day_i == 'Martes'){
                $param1 = "ma_fecha >=";
            }
            if($day_i == 'Miércoles'){
                $param1 = "mi_fecha >=";
            }
            if($day_i == 'Jueves'){
                $param1 = "ju_fecha >=";
            }
            if($day_i == 'Viernes'){
                $param1 = "vi_fecha >=";
            }
            if($day_i == 'Sabado'){
                $param1 = "sa_fecha >=";

            }
            if($day_i == 'Domingo'){
                $param1 = "do_fecha >=";
            }
            
            //param 2
            if($day_f == 'Lunes'){
                $param2 = "lu_fecha <=";
            }
            if($day_f == 'Martes'){
                $param2 = "ma_fecha <=";
            }
            if($day_f == 'Miércoles'){
                $param2 = "mi_fecha <=";
            }
            if($day_f == 'Jueves'){
                $param2 = "ju_fecha <=";
            }
            if($day_f == 'Viernes'){
                $param2 = "vi_fecha <=";
            }
            if($day_f == 'Sabado'){
                $param2 = "sa_fecha <=";
            }
            if($day_f == 'Domingo'){
                $param2 = "do_fecha <=";
            }
            
            $datos = $this->ModelsAsistencia->getFilter($param1, $param2, $fecha_i, $fecha_f, $ci);
            
            $view = $this->load->view('asistencia/show_asistencias', compact('datos', 'fecha_i', 'fecha_f', 'cedula'), TRUE);
            echo json_encode(array(
                'result' => $view,
                'js' => base_url('assets/js/asistencia/show_asistencias.js')
            ));
            
        }else{
            
            show_404();
        }
        
        
        
		
	}
	public function asistencia_diaria() /* Metodo retorna las asistencias por dia*/
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$day = $this->input->post('dia');
		
			$date = date('Y-m-d H:i:s');
			$date_array = explode(" ", $date);
			$fecha = $date_array[0];
            
            if($day == 'Lunes'){
                $filter = "lu_fecha";
            }
            if($day == 'Martes'){
                $filter = "ma_fecha";
            }
            if($day == 'Miércoles'){
                $filter = "mi_fecha";
            }
            if($day == 'Jueves'){
                $filter = "ju_fecha";
            }
            if($day == 'Viernes'){
                $filter = "vi_fecha";
            }
            if($day == 'Sabado'){
                $filter = "sa_fecha";

            }
            if($day == 'Domingo'){
                $filter = "do_fecha";
            }
            
			$result = $this->ModelsAsistencia->asistencia_diaria($filter, $fecha);
            $sunday = date('Y-m-d', strtotime( 'sunday this week' ));

			$this->output->set_status_header(200);
			echo json_encode(array(
				'day' => $day,
				'asistencia' => $result,
			));

		}else{
			show_404();
		}
	}
    public function justificar() /*load form justify asistencia*/
	{
		if ($this->session->userdata('is_logged') AND $this->session->userdata('rango') == 'Admin') {
			# PANEL ADMIN...

			$resource = array(
				'js_one' => base_url('assets/js/asistencia/justify_asistencia.js'),
				'js_two' => '',
			);
			$situaciones = $this->ModelsAsistencia->get_situaciones_laborales();
			$vista = $this->load->view('asistencia/justify_asistencia', compact('situaciones'), TRUE);
			$this->getTemplate($vista, $resource);

        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
        
	}
    public function justify_store() /* Metodo para validar y guardar asistencias justificas */
    {
           
        if ($this->input->server('REQUEST_METHOD') === "POST") {
            
			$this->form_validation->set_error_delimiters('', '');
			$rules = getJustifyAsistenciaRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
                    'dia'       => form_error('dia'),
                    'fecha'     => form_error('fecha'),
                    'condicion' => form_error('condicion'),
					'ci'        => form_error('ci'),
				);
				echo json_encode($errors);
			}else{
                
                $date = date('Y-m-d H:i:s');
                $date_array = explode(" ", $date);
                $fecha = $date_array[0];
                $hora = $date_array[1];
                
                $day = $this->input->post('dia');

                $cedula = $this->input->post('nacionalidad') . " " . $this->input->post('ci');
                
                $data = array(
                    'codigo_persona'     => $cedula,
                    'fecha'              => $this->input->post('fecha'),
                );
                
                $data['fin_semana'] = $fin_semana = date('Y-m-d', strtotime('sunday this week'.$data['fecha']));
                
                $data['lu_fecha'] = $fin_semana = date('Y-m-d', strtotime('monday this week'.$data['fecha']));
                $data['ma_fecha'] = $fin_semana = date('Y-m-d', strtotime('tuesday this week'.$data['fecha']));
                $data['mi_fecha'] = $fin_semana = date('Y-m-d', strtotime('wednesday this week'.$data['fecha']));
                $data['ju_fecha'] = $fin_semana = date('Y-m-d', strtotime('thursday this week'.$data['fecha']));
                $data['vi_fecha'] = $fin_semana = date('Y-m-d', strtotime('friday this week'.$data['fecha']));
                $data['sa_fecha'] = $fin_semana = date('Y-m-d', strtotime('saturday this week'.$data['fecha']));
                $data['do_fecha'] = $fin_semana = date('Y-m-d', strtotime('sunday this week'.$data['fecha']));

                if($day == 'Lunes'){
                    $filter = "lu_fecha";
                    $entrada = "lu_entrada";
                    $data['lu_condicion'] = $this->input->post('condicion');
                    $data['lu_fecha'] = $this->input->post('fecha');
                }
                if($day == 'Martes'){
                    $filter = "ma_fecha";
                    $entrada = "ma_entrada";
                    $data['ma_condicion'] = $this->input->post('condicion');
                    $data['ma_fecha'] = $this->input->post('fecha');
                }
                if($day == 'Miércoles'){
                    $filter = "mi_fecha";
                    $entrada = "mi_entrada";
                    $campo = "mi_condicion";
                    $data['mi_condicion'] = $this->input->post('condicion');
                    $data['mi_fecha'] = $this->input->post('fecha');
                }
                if($day == 'Jueves'){
                    $filter = "ju_fecha";
                    $entrada = "ju_entrada";
                    $campo = "ju_condicion";
                    $data['ju_condicion'] = $this->input->post('condicion');
                    $data['ju_fecha'] = $this->input->post('fecha');
                }
                if($day == 'Viernes'){
                    $filter = "vi_fecha";
                    $entrada = "vi_entrada";
                    $campo = "vi_condicion";
                    $data['vi_condicion'] = $this->input->post('condicion');
                    $data['vi_fecha'] = $this->input->post('fecha');

                }
                if($day == 'Sabado'){
                    $filter = "sa_fecha";
                    $entrada = "sa_entrada";
                    $campo = "sa_condicion";
                    $data['sa_condicion'] = $this->input->post('condicion');
                    $data['sa_fecha'] = $this->input->post('fecha');

                }
                if($day == 'Domingo'){
                    $filter = "do_fecha";
                    $entrada = "do_entrada";
                    $campo = "do_condicion";
                    $data['do_condicion'] = $this->input->post('condicion');
                    $data['do_fecha'] = $this->input->post('fecha');
                }
                
                 // verificar personal
				if(!$verify = $this->ModelsPersonal->getPersona($cedula)){
					
					echo json_encode(array(
						'ci' => 'El titular de la c&eacute;dula de identidad, no se ecuentra registrado!',
					));
					$this->output->set_status_header(401);
                    exit;
                    
				}else{
                    
                    if(!$v = $this->ModelsAsistencia->asistencia_select($cedula, $filter, $data['fecha'])){
                        // Insert
                        if(!$result = $this->ModelsAsistencia->save($data)){
                            $this->output->set_status_header(500);
                            echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                        }else{

                            echo json_encode(array(
                                'msg' => 'Justificado correctamente!',
                            ));
                            $this->output->set_status_header(200);
                            exit;
                        }
                    }else{
                        //update
                        $j = $v->$entrada;

                        if(empty($j)){

                            if(!$update = $this->ModelsAsistencia->justify_update($v->id, $data)){
                                $this->output->set_status_header(500);
                                echo json_encode(array('msg' => 'El servidor no responde, intentalo nuevamente!'));
                            }else{

                                echo json_encode(array(
                                    'msg' => 'Justificado correctamente!',
                                    'id' => $data
                                ));
                                $this->output->set_status_header(200);
                                exit;
                            }

                        }else{

                            echo json_encode(array(
                                'msg' => 'Ya esta justificado!'
                            ));
                            $this->output->set_status_header(401);
                            exit;
                        }
                    }
                }
                
                

            }
            
                
        }else{
            show_404();
        }
    }
	public function consult($offset = 0) /*load view asistencia semanal*/
	{
		if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...
			$resource = array(
				'js_one' => base_url('assets/js/asistencia/filter.js'),
				'js_two' => '',
			);

            $fecha_i = date('Y-m-d');
            $fecha_f = date('Y-m-d', strtotime('sunday this week'.$fecha_i));            
            
            $monday = date('Y-m-d', strtotime('monday this week'.$fecha_i));
            $tuesday = date('Y-m-d', strtotime('tuesday this week'.$fecha_i));
            $wednesday = date('Y-m-d', strtotime('wednesday this week'.$fecha_i));
            $thursday = date('Y-m-d', strtotime('thursday this week'.$fecha_i));
            $friday = date('Y-m-d', strtotime('friday this week'.$fecha_i));
            $saturday = date('Y-m-d', strtotime('saturday this week'.$fecha_i));
            $sunday = date('Y-m-d', strtotime('sunday this week'.$fecha_i));
            
            $fechas = array(
                'lunes'     => $monday,
                'martes'    => $tuesday,
                'miercoles' => $wednesday,
                'jueves'    => $thursday,
                'viernes'   => $friday,
                'sabado'    => $saturday,
                'domingo'   => $sunday
            );
            $dias = array('Lunes','Martes','Miércoles','Jueves','Viernes','Sabado','Domingo');
 
            $day = $dias[(date('N', strtotime($fecha_i))) - 1];

            if($day == 'Lunes'){
                $filter = "lu_fecha >=";
            }
            if($day == 'Martes'){
                $filter = "ma_fecha >=";
            }
            if($day == 'Miércoles'){
                $filter = "mi_fecha >=";
            }
            if($day == 'Jueves'){
                $filter = "ju_fecha >=";
            }
            if($day == 'Viernes'){
                $filter = "vi_fecha >=";
            }
            if($day == 'Sabado'){
                $filter = "sa_fecha >=";

            }
            if($day == 'Domingo'){
                $filter = "do_fecha >=";
            }

			$asistencia_data = $this->ModelsAsistencia->asistencia_filter($filter, $fecha_i, $fecha_f);
			$all = $this->ModelsAsistencia->get_situaciones_laborales();
            
            
            //PAGINATE 2 {

            $config['base_url'] = base_url("asistencia/consult");
            $config['per_page'] = 10;
            $config['total_rows'] = count($asistencia_data);

            $config['full_tag_open'] = '<div class="pagging text-center"><nav class="text-right"><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link rounded-0">';
            $config['cur_tag_close'] = '<span class="sr-only">(Current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&racuo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
            $config['prev_tagl_close'] = '</span></li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
            $config['last_tagl_close'] = '</span></li>';

            $this->pagination->initialize($config);

            $page = $this->ModelsAsistencia->getPaginate($filter, $fecha_i, $fecha_f, $config['per_page'], $offset);
            // } END
            
			$view = $this->load->view('asistencia/filter_content', compact('page', 'fecha_i', 'fechas', 'offset'), TRUE);
			$vista = $this->load->view('asistencia/filter', compact('view', 'all'), TRUE);
            
			$this->getTemplate($vista, $resource);

        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function asistencia_filter() /* Metodo para filtrar asistencias */
	{
		$fecha_i = $this->input->post('fecha_i'); 
		$fecha_f = date('Y-m-d', strtotime('sunday this week'.$fecha_i));
        
        $dias = array('Lunes','Martes','Miércoles','Jueves','Viernes','Sabado','Domingo');
 
        $day = $dias[(date('N', strtotime($fecha_i))) - 1];

        $monday = date('Y-m-d', strtotime('monday this week'.$fecha_i));
        $tuesday = date('Y-m-d', strtotime('tuesday this week'.$fecha_i));
        $wednesday = date('Y-m-d', strtotime('wednesday this week'.$fecha_i));
        $thursday = date('Y-m-d', strtotime('thursday this week'.$fecha_i));
        $friday = date('Y-m-d', strtotime('friday this week'.$fecha_i));
        $saturday = date('Y-m-d', strtotime('saturday this week'.$fecha_i));
        $sunday = date('Y-m-d', strtotime('sunday this week'.$fecha_i));

        $fechas = array(
            'lunes'     => $monday,
            'martes'    => $tuesday,
            'miercoles' => $wednesday,
            'jueves'    => $thursday,
            'viernes'   => $friday,
            'sabado'    => $saturday,
            'domingo'   => $sunday
        );
        
        if($day == 'Lunes'){
            $filter = "lu_fecha >=";
        }
        if($day == 'Martes'){
            $filter = "ma_fecha >=";
        }
        if($day == 'Miércoles'){
            $filter = "mi_fecha >=";
        }
        if($day == 'Jueves'){
            $filter = "ju_fecha >=";
        }
        if($day == 'Viernes'){
            $filter = "vi_fecha >=";
        }
        if($day == 'Sabado'){
            $filter = "sa_fecha >=";

        }
        if($day == 'Domingo'){
            $filter = "do_fecha >=";
        }
        $offset = 0;
		$page = $this->ModelsAsistencia->asistencia_filter($filter, $fecha_i, $fecha_f);
        $view = $this->load->view('asistencia/filter_content', compact('page', 'fecha_i', 'fechas', 'offset'), TRUE);

		echo json_encode(array(
			'view' => $view,
            'js' => base_url('assets/js/asistencia/filter.js')
		));

	}
	public function situacion_laboral() /*load view form situaciones laborales*/
	{
		if ($this->session->userdata('is_logged') AND $this->session->userdata('rango') == 'Admin') {
			# PANEL ADMIN...
			$resource = array(
				'js_one' => base_url('assets/js/situaciones_laborales/create_situacion.js'),
				'js_two' => base_url('assets/js/situaciones_laborales/update_situacion.js'),
			);

			$all = $this->ModelsAsistencia->get_situaciones_laborales();
			$tabla = $this->load->view('situacion_laboral/show_situaciones', compact('all'), TRUE);
			$vista = $this->load->view('situacion_laboral/create_situacion', compact('tabla'), TRUE);
			
			$this->getTemplate($vista, $resource);

        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function situacion_laboral_store() /* Metodo para validar y guardar situaciones laborales */
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$data = array(
				'situacion' => $this->input->post('situacion'),
			);

			// primer dato = (id = 1) = activo
			// if (empty($list = $this->ModelsAsistencia->get_situaciones_laborales())) {
			// 	$situacion = array(
			// 		'situacion' => 'Activo'
			// 	);
			// 	$this->ModelsAsistencia->save_situacion($situacion);
			// }

			if (!$resultt = $this->ModelsAsistencia->get_Situacion($data['situacion'])) {
				# todo bien...
				
			}else{

				$this->output->set_status_header(401);
				echo json_encode(array(
					'msg' => "Ya existe!"
				));
				exit;
			}

			if (!$res = $this->ModelsAsistencia->save_situacion($data)) {
				$this->output->set_status_header(500);
				echo json_encode(array(
					'msg' => "Ocurrio un error inesperado, intenta nuevamente!"
				));
				exit;
			}else{

				$all = $this->ModelsAsistencia->get_situaciones_laborales();
				$tabla = $this->load->view('situacion_laboral/show_situaciones', compact('all'), TRUE);

				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => "Guardado correctamente!",
					'tabla' => $tabla
				));
				exit;
			}

		}else{
			show_404();
		}
	}
	public function situacion_laboral_update() /* Metodo para validar y actualizar situaciones laborales */
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$id_situacion = $this->input->post('id_situacion');
			$data = array(
				'situacion' => $this->input->post('situacion')
			);

			if (!$res = $this->ModelsAsistencia->update_situacion($id_situacion, $data)) {

				$this->output->set_status_header(500);
				echo json_encode(array(
					'msg' => "Ocurrio un error inesperado, intenta nuevamente!"
				));
				exit;

			}else{

				$all = $this->ModelsAsistencia->get_situaciones_laborales();
				$tabla = $this->load->view('situacion_laboral/show_situaciones', compact('all'), TRUE);

				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => "Guardado correctamente!",
					'tabla' => $tabla
				));
				exit;
			}

		}else{
			show_404();
		}
	}
	public function situacion_laboral_delete() /* Metodo para eliminar situaciones laborales */
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$id_situacion = $this->input->post('id_situacion');

			if (!$res = $this->ModelsAsistencia->delete_situacion($id_situacion)) {
				$this->output->set_status_header(500);
				echo json_encode(array(
					'msg' => "Ocurrio un error inesperado, intenta nuevamente!"
				));
				exit;

			}else{

				$all = $this->ModelsAsistencia->get_situaciones_laborales();
				$tabla = $this->load->view('situacion_laboral/show_situaciones', compact('all'), TRUE);

				$this->output->set_status_header(200);
				echo json_encode(array(
					'tabla' => $tabla
				));
				exit;
			}
		}else{
			show_404();
		}
	}
    function reporte_pdf($offset = 0, $fecha_i) {

		// $fecha_i = date('Y-m-d');
		$fecha_f = date('Y-m-d', strtotime('sunday this week'.$fecha_i));            
		
		$monday = date('Y-m-d', strtotime('monday this week'.$fecha_i));
		$tuesday = date('Y-m-d', strtotime('tuesday this week'.$fecha_i));
		$wednesday = date('Y-m-d', strtotime('wednesday this week'.$fecha_i));
		$thursday = date('Y-m-d', strtotime('thursday this week'.$fecha_i));
		$friday = date('Y-m-d', strtotime('friday this week'.$fecha_i));
		$saturday = date('Y-m-d', strtotime('saturday this week'.$fecha_i));
		$sunday = date('Y-m-d', strtotime('sunday this week'.$fecha_i));

		$fechas = array(
			'lunes'     => $monday,
			'martes'    => $tuesday,
			'miercoles' => $wednesday,
			'jueves'    => $thursday,
			'viernes'   => $friday,
			'sabado'    => $saturday,
			'domingo'   => $sunday
		);
		$dias = array('Lunes','Martes','Miércoles','Jueves','Viernes','Sabado','Domingo');

		$day = $dias[(date('N', strtotime($fecha_i))) - 1];

		$meses = array(
			'Enero',
			'Febrero',
			'Marzo',
			'Abril',
			'Mayo',
			'Junio',
			'Julio',
			'Agosto',
			'Septiembre',
			'Obtubre',
			'Noviembre',
			'Diciembre',
		);
		$mes = $meses[(date('m', strtotime($fecha_i))) - 1];
		$date_array = explode("-", $fecha_i);
		$year = $date_array[0];

		if($day == 'Lunes'){
			$filter = "lu_fecha >=";
		}
		if($day == 'Martes'){
			$filter = "ma_fecha >=";
		}
		if($day == 'Miércoles'){
			$filter = "mi_fecha >=";
		}
		if($day == 'Jueves'){
			$filter = "ju_fecha >=";
		}
		if($day == 'Viernes'){
			$filter = "vi_fecha >=";
		}
		if($day == 'Sabado'){
			$filter = "sa_fecha >=";

		}
		if($day == 'Domingo'){
			$filter = "do_fecha >=";
		}

		$asistencia_data = $this->ModelsAsistencia->asistencia_filter($filter, $fecha_i, $fecha_f);

		//PAGINATE 2 {

		$config['base_url'] = base_url("asistencia/reporte_pdf");
		$config['per_page'] = 10;
		$config['total_rows'] = count($asistencia_data);

		$config['full_tag_open'] = '<div class="pagging text-center"><nav class="text-right"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav></div>';
		$config['num_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
		$config['num_tag_close'] = '</span></li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link rounded-0">';
		$config['cur_tag_close'] = '<span class="sr-only">(Current)</span></span></li>';
		$config['next_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
		$config['next_tagl_close'] = '<span aria-hidden="true">&racuo;</span></span></li>';
		$config['prev_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
		$config['prev_tagl_close'] = '</span></li>';
		$config['first_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open'] = '<li class="page-item"><span class="page-link rounded-0">';
		$config['last_tagl_close'] = '</span></li>';

		$this->pagination->initialize($config);

		$page = $this->ModelsAsistencia->getPaginate($filter, $fecha_i, $fecha_f, $config['per_page'], $offset);

		// PDF
		$paper = 'a4';
		$orientation = 'landscape';

        //Set folder to save PDF to
        $this->pdf->folder('assets/pdf/');

        //Set the filename to save/download as
        $filename = "asistencia " . $fecha_i.'-'.$fecha_f.'.pdf';
        $this->pdf->filename($filename);

        //Set the paper defaults portrait/landscape
        $this->pdf->paper($paper, $orientation);

        //Load html view
        $data = array(
            'margin' => '40px',
            'title' => 'Asistencia semanal personal',
            'data' => $page,
            'fechas' => $fechas,
            'actual' => $fecha_i,
            'mes' => $mes, 
            'year' => $year,
        );
        $this->pdf->html($this->load->view('asistencia/pdf', $data, true));

        //PDF was successfully download and view
        if($this->pdf->create('download')) {
            redirect();
        }
    }
    public function getTemplate($view, $resource) /* Metodo para construir view!*/
	{
		$data = array(
			'head' => $this->load->view("layout/head", '', TRUE),
			'nav' => $this->load->view("layout/nav", '', TRUE),
			'carousel' => $this->load->view("layout/carousel", '', TRUE),
			'content' => $view,
			'footer' => $this->load->view("layout/footer", $resource, TRUE),
		);
		$this->load->view('dashboard', $data);
	}
}