<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('users/users_rules'));
        $this->load->model("ModelsUsers");
	}
	
	public function index() /* Metodo para mostrar listado de users!*/
	{
        if ($this->session->userdata('is_logged') AND $this->session->userdata('rango') == 'Admin') {

			// Datos de usuarios
			$list_users = $this->ModelsUsers->getUsers();

			$search = $this->input->post('view');

			# LOAD VISTA...
			$resource = array(
				'js_one' => base_url("assets/js/users/show_user.js"),
			);
			$vista = $this->load->view("users/show_users", array('list_users' => $list_users), TRUE);
			
			if(empty($search)){
				$this->getTemplate($vista, $resource);
			}else{
				echo json_encode(array('success' => $vista));
			}

        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function configuration()
	{
        if ($this->session->userdata('is_logged')) {
			# LOAD VISTA...
			$resource = array(
				'js_one' => base_url('assets/js/users/update_password.js'),
				'js_two'
			);
			$vista = $this->load->view("users/configuration", '', TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
    public function update_password()
    {
        if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getUpdatePasswordRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					'password' => form_error('password'),
					'password_confirm' => form_error('password_confirm')
				);
				echo json_encode($errors);
                
            }else{
                #todo bien
                $id = $this->session->userdata('id');
                $data = array(
                    'password' => md5($this->input->post('password'))
                );
                
                if(!$this->ModelsUsers->updatePassword($id, $data)){
                    echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
                    $this->output->set_status_header(500);
                    exit;
                    
                }else{
                    echo json_encode(array('msg' => 'Actualizada Correctamente!'));
                    $this->output->set_status_header(200);
                    exit;
                }
            }
            
            }else{
                show_404();
            }
    }
	public function create() /* Metodo para cargar form registro user!*/
	{
		if ($this->session->userdata('is_logged') AND $this->session->userdata('rango') == 'Admin') {
			# LOAD VISTA...
			$resource = array(
				'js_one' => base_url("assets/js/users/create.js"),
			);
			$vista = $this->load->view("users/registro", '', TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function store_user() /* Metodo para validar y guardar datos form registro user!*/
	{
        if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getUserRules();
			$this->form_validation->set_rules($rules);

			// DATOS
			$rango = $this->input->post('rango');
			$nacionalidad = $this->input->post('nacionalidad');
			$cedula = $this->input->post('cedula');
			$data = $nacionalidad . " " . $cedula ;
			$password = md5($this->input->post('password'));
			$password_confirm = md5($this->input->post('password_confirm'));

			if($this->input->post('primer_uso') == 'YES'){
				if($password != $password_confirm){
					$this->session->set_flashdata('error', 'Error! las contraseñas son diferentes!');
					header('Location: '.base_url('configuration/finish_installation/'. $nacionalidad . "/" . $cedula));
					exit;
				}
			}

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					'rango' => form_error('rango'),
					'cedula' => form_error('cedula'),
					'password' => form_error('password'),
					'password_confirm' => form_error('password_confirm')
				);
				echo json_encode($errors);
			}else{

				// VERIFICATE PERSONA
				if (!$res = $this->ModelsUsers->verificate($data)) {

					#alert error
					echo json_encode(array(
						'msg' => 'El titular de la c&eacute;dula 
								'.$nacionalidad. ' <b>'.$cedula.'</b>, 
								o no se encuentra registrado,
								o su area de trabajo no corresponde.<br>
								Solo se permite <b>personal administrativo</b>!'
					));

					$this->output->set_status_header(401);
					exit;
				}else{

					# verificar si es administrativo
					if ($res->tipo != 'Administrativo') {
						# error...
						echo json_encode(array(
							'msg' => 'El titular de la c&eacute;dula 
									'.$nacionalidad. ' <b>'.$cedula.'</b>, 
									o no se encuentra registrado,
									o su area de trabajo no corresponde.<br>
									Solo se permite <b>personal administrativo</b>!'
						));
						$this->output->set_status_header(401);
						exit;
					}
					
					#verficar que no se repita
					if (!$result = $this->ModelsUsers->verificate_user($res->id)) {
						
						$datos = array(
							'id_persona' => $res->id,
							'password' => $password,
							'status' => "1",
							'range' => $rango,
						);

						if (!$res = $this->ModelsUsers->save($datos)) {
							echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
							$this->output->set_status_header(500);
							exit;
						}else{
							
							if($this->input->post('primer_uso') == 'YES'){
								header('Location: '.base_url('login'));
							}else{
								echo json_encode(array('msg' => 'Proceso Exitoso!'));
								$this->output->set_status_header(200);
								exit;
							}
						}
					}else{
						# error...
						echo json_encode(array('msg' => 'El usuario ya existe!'));
						$this->output->set_status_header(401);
						exit;
					}

				}

			}

		}

	}
	public function change_status() /* Metodo para act status de user!*/
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$id = $this->input->post('id');
			$status = $this->input->post('status');
			
			// CHANGE STATUS
			if ($status == 1) {
				$status = 0;
			}else{
				$status = 1;
			}
			$data = array(
				'status' => $status,
			);
			
			if(empty($id)){
				$this->output->set_status_header(400)->set_output(json_encode(array('msg' => 'El id no puede ser vacio!')));
			}else{
				$this->ModelsUsers->change_status($id, $data);
				$this->output->set_status_header(200);
				echo json_encode(array('status' => $status));
			}
		}
	}
	public function delete() /* Metodo para eliminar user!*/
    {
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			
			$_id = $this->input->post('id');
	
			if(empty($_id)){
				$this->output->set_status_header(400)->set_output(json_encode(array('msg' => 'El id no puede ser vacio!')));
			}else{
				$this->ModelsUsers->deleteUser($_id);
				$this->output->set_status_header(200);
			}
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