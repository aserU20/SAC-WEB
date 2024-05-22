<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('personal/personal_rules'));
		$this->load->model(array('ModelsPersonal'));
	}
	public function index() /* Metodo no utilizado */
	{
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...

			// $vista = $this->load->view("admin/show_users", '', TRUE);
			// $this->getTemplate($vista);
			header('Location: '.base_url('personal/create'));
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
    public function create() /* Metodo para cargar form registro user!*/
	{
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...
			$resource = array(
				'js_one' => base_url("assets/js/personal/create.js"),
			);
			$vista = $this->load->view("personal/create_personal", '', TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function store_personal() /* Metodo para validar y guardar datos form registro user!*/
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$datos = array(
				// PARTE 1
				'tipo' => $this->input->post('tipo'),
				'turno' => $this->input->post('turno'),
				'id_cargo' => $this->input->post('id_cargo'),
				// PARTE 2
				'nombre' => $this->input->post('nombre'),
				'apellido' => $this->input->post('apellido'),
				'cedula' => $this->input->post('nacionalidad') . " " . $this->input->post('ci'),
				'f_nacimiento' => $this->input->post('fecha_n'),
				'edad' => $this->input->post('edad'),
				'sexo_personal' => $this->input->post('sexo'),
				'correo' => $this->input->post('correo'),
				'telefono' => $this->input->post('telefono'),
				'ciudad' => $this->input->post('ciudad'),
				'direccion' => $this->input->post('direccion'),
				'observacion' => $this->input->post('observacion'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);

			$this->form_validation->set_error_delimiters('', '');
			$rules = getPersonalRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					// PARTE 1
					'tipo' => form_error('tipo'),
					'turno' => form_error('turno'),
					'cargo' => form_error('cargo'),
					// PARTE 2
					'nombre' => form_error('nombre'),
					'apellido' => form_error('apellido'),
					'cedula' => form_error('ci'),
					'fecha_n' => form_error('fecha_n'),
					'edad' => form_error('edad'),
					'sexo' => form_error('sexo'),
					'correo' => form_error('correo'),
					'telefono' => form_error('telefono'),
					'ciudad' => form_error('ciudad'),
					'direccion' => form_error('direccion'),
				);

				echo json_encode($errors);
				exit;
			}

			if (!$result = $this->ModelsPersonal->verificar_personal($datos['cedula'])){

				// TODO BIEN, PROCEDEMOS A GUARDAR
				if (!$res = $this->ModelsPersonal->save($datos)) {
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
					$this->output->set_status_header(500);
					exit;
				}else{
					// Proceso exitoso!
					$this->output->set_status_header(200);
				}

			}else{
				$errors['cedula'] = "La persona ya esta registrada!";
				$this->output->set_status_header(401);
				echo json_encode($errors);
				exit;
			}

			if($this->input->post('primer_uso') == 'YES'){
				header('Location: '.base_url('configuration/finish_installation/'. $this->input->post('nacionalidad')."/".$this->input->post('ci')));
			}
		}
	}
	public function return_cargos() /* Metodo que retorna los cargos para asignarlos cuando se registra un empleado! */
	{
        if ($this->input->server('REQUEST_METHOD') === "POST") {

			$data = $this->ModelsPersonal->getCargos($this->input->post('value'));
			echo json_encode($data);

		}else{
			show_404();
		}
	}
    public function show() /* Metodo que retorna view principal con list personal */
	{
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...
			$resource = array(
				'js_one' => base_url("assets/js/personal/show_personal.js"),
			);
			$vista = $this->load->view("personal/show_personal", '', TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function return_personal() /* Metodo que retorna list persona */
	{
		// FUNCION PARA MOSTRAR TODO EL PERSONAL REGISTRADO
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$data = $this->ModelsPersonal->getPersonal($this->input->post('tipo'));
			$details = $this->load->view("personal/detalles_personal",'', TRUE);
			$table  = $this->load->view("personal/list_personal", compact("data", "details"), TRUE);
			echo json_encode(array(
				'view' => $table,
				'js' => base_url("assets/js/personal/show_personal.js")
			));

		}else{
			show_404();
		}
	}
	public function edit_personal() /* Metodo que retorna form para actualizar info persona */
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$data = $this->ModelsPersonal->getPersona($this->input->post('cedula'));
			$id_persona = $this->ModelsPersonal->return_id_persona($this->input->post('cedula'));
			$cedula_array = explode(" ", $data['cedula']);
			$nacionalidad = $cedula_array[0];
			$cedula = $cedula_array[1];
			$allCargos = $this->ModelsPersonal->getCargos($data['tipo']);
			$view  = $this->load->view("personal/update_personal", compact("data", "id_persona", "cedula", "nacionalidad", "allCargos"), TRUE);
			
			echo json_encode(array(
				'view' => $view,
				'js_one' => base_url("assets/js/personal/show_personal.js"),
				'js_two' => base_url("assets/js/personal/update_personal.js"),
			));

		}else{
			show_404();
		}
	}
	public function update_personal() /* Metodo para actualizar info persona */
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getPersonalRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					// PARTE 1
					'tipo' => form_error('tipo'),
					'turno' => form_error('turno'),
					'cargo' => form_error('cargo'),
					// PARTE 2
					'nombre' => form_error('nombre'),
					'apellido' => form_error('apellido'),
					'cedula' => form_error('ci'),
					'fecha_n' => form_error('fecha_n'),
					'edad' => form_error('edad'),
					'sexo' => form_error('sexo'),
					'correo' => form_error('correo'),
					'telefono' => form_error('telefono'),
					'ciudad' => form_error('ciudad'),
					'direccion' => form_error('direccion'),
				);

				echo json_encode($errors);
				exit;
			}else{

				// VARIABLES
				$datos = array(
					// PARTE 1
					'tipo' => $this->input->post('tipo'),
					'turno' => $this->input->post('turno'),
					'id_cargo' => $this->input->post('id_cargo'),
					// PARTE 2
					'nombre' => $this->input->post('nombre'),
					'apellido' => $this->input->post('apellido'),
					'cedula' => $this->input->post('nacionalidad') . " " . $this->input->post('ci'),
					'f_nacimiento' => $this->input->post('fecha_n'),
					'edad' => $this->input->post('edad'),
					'sexo_personal' => $this->input->post('sexo'),
					'correo' => $this->input->post('correo'),
					'telefono' => $this->input->post('telefono'),
					'ciudad' => $this->input->post('ciudad'),
					'direccion' => $this->input->post('direccion'),
					'observacion' => $this->input->post('observacion'),
					'updated_at' => date('Y-m-d H:i:s')
				);
				$id = $this->input->post('id_persona');
				if (!$res = $this->ModelsPersonal->updatePersonal($id, $datos)) {
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
					$this->output->set_status_header(500);
					exit;
				}else{

					$data = $this->ModelsPersonal->getPersonal($this->input->post('tipo_personal'));
					$table = $this->load->view("personal/list_personal", compact("data"), TRUE);
					echo json_encode(array(
						'view' => $table,
						'js' => base_url("assets/js/personal/show_personal.js")
					));

					//$this->output->set_status_header(200);
                    exit;
				}

			}



		}else{
			show_404();
		}
	}
	public function delete_personal() /* Metodo para eliminar user!*/
	{

		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$cedula = $this->input->post("cedula");
			$id_persona = $this->ModelsPersonal->return_id_persona($cedula);
			$tipo = $this->input->post('tipo');

			if(empty($cedula)){
				$this->output->set_status_header(400)->set_output(json_encode(array('msg' => 'La cedula no puede ser vacia!')));
			}else{
				if (!$res = $this->ModelsPersonal->deletePersona($id_persona, $tipo)) {
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
					$this->output->set_status_header(500);

				}else{

					$data = $this->ModelsPersonal->getPersonal($tipo);
					$table = $this->load->view("personal/list_personal", compact("data"), TRUE);
					echo json_encode(array(
						'view' => $table,
						'js' => base_url("assets/js/personal/show_personal.js")
					));

					$this->output->set_status_header(200);
				}
			}

		}else{
			show_404();
		}
	
	}
	public function detalles_persona() /* Metodo que retorna view con la info persona */
	{
		// FUNCION PARA MOSTRAR DETALLES DE EMPLEADO
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$data = $this->ModelsPersonal->getPersona($this->input->post('cedula'));
			$id_persona = $this->ModelsPersonal->return_id_persona($this->input->post('cedula'));

			$details = $this->load->view("personal/detalles_personal", compact("data"), TRUE);
			echo json_encode(array(
				'view' => $details,
				'js' => base_url("assets/js/personal/show_personal.js")
			));

		}else{
			show_404();
		}
	}
	public function getTemplate($view, $resource) /* Metodo para construir view!*/
	{
		$data = array(
			'head' => $this->load->view("layout/head", $resource, TRUE),
			'nav' => $this->load->view("layout/nav", '', TRUE),
			'carousel' => $this->load->view("layout/carousel", '', TRUE),
			'content' => $view,
			'footer' => $this->load->view("layout/footer", $resource, TRUE),
		);
		$this->load->view('dashboard', $data);
	}
}