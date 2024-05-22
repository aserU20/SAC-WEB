<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargos extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('personal/cargos_rules'));
        $this->load->model("ModelsCargos");
	}
    public function index() /* Metodo para cargar view (form cargos) and (list cargos) */
    {
        if ($this->session->userdata('is_logged') AND $this->session->userdata('rango') == 'Admin') {
			# PANEL ADMIN...
			$data = $this->ModelsCargos->getCargos();
			$resource = array(
				'js_one' => base_url("assets/js/cargos/store.js"),
				'js_two' => base_url("assets/js/cargos/update.js")
			);
			$show  = $this->load->view("cargos/show_cargos", compact("data"), TRUE);
			$vista = $this->load->view("cargos/create_cargos", compact("show"), TRUE);

			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
    }
    public function store_cargo() /* Metodo para validar y guardar info cargo */
    {
        if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getCargosRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					'cargo' => form_error('cargo'),
					'codigo' => form_error('codigo'),
					'categoria' => form_error('categoria')
				);
				echo json_encode($errors);
			}else{

				$datos = array(
					'codigo' => $this->input->post('codigo'),
					'nombre_cargo' => $this->input->post('cargo'),
					'categoria' => $this->input->post('categoria')
				);

				// VALIDATION CARGO
				if (!$result = $this->ModelsCargos->validate_code($datos['codigo'], $datos['nombre_cargo'])) {

					if (!$res = $this->ModelsCargos->save($datos)) {
						echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
						$this->output->set_status_header(500);
						exit;
					}else{
						
						$data = $this->ModelsCargos->getCargos();
						$show  = $this->load->view("cargos/show_cargos", compact("data"), TRUE);
						$resource = base_url("assets/js/cargos/update.js");
	
						echo json_encode(array(
							'success' => $show,
							'js' => $resource
						));
					}
				}else{
					$errors = array(
						'codigo' ,
						'cargo' 
					);

					if($result['codigo'] == $datos['codigo']){
						$errors['codigo'] = "El codigo ingresado ya existe!";
					}else{
						$errors['codigo'] = "";
					}

					if($result['nombre_cargo'] == $datos['nombre_cargo']){
						$errors['cargo'] = "El cargo ingresado ya existe!";
					}else{
						$errors['cargo'] = "";
					}
					$this->output->set_status_header(401);
					echo json_encode($errors);
				}
			}
		}else{
			show_404();
		}
    }
	public function return_views() /* Metodo que retorna view con form update cargo */
	{
		// FUNCION PARA RETORNAR VISTAS POR AJAX 
		if ($this->input->server('REQUEST_METHOD') === "POST"){

			$id_cargo = $this->input->post("id_cargo");
			$data = $this->ModelsCargos->getCargo($id_cargo);
			$show  = $this->load->view("cargos/update_cargos", compact("data"), TRUE);
			$resource = base_url("assets/js/cargos/update.js");

			echo json_encode(array(
				'success' => $show,
				'js' => $resource
			));

		}else{
            show_404();
		}
	}
	public function update_cargo() /* Metodo que actualiza la info cargo */
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getCargosRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					'cargo' => form_error('cargo'),
					'codigo' => form_error('codigo'),
					'categoria' => form_error('categoria')
				);
				echo json_encode($errors);
			}else{

				$codigo =  $this->input->post('codigo');
				$datos = array(
					'codigo' => $codigo,
					'nombre_cargo' => $this->input->post('cargo'),
					'categoria' => $this->input->post('categoria')
				);
				$id = $this->input->post('id_cargo');

				if (!$res = $this->ModelsCargos->updateCargo($id, $datos)) {
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
					$this->output->set_status_header(500);
					exit;
				}else{

					$data = $this->ModelsCargos->getCargos();
					$show  = $this->load->view("cargos/show_cargos", compact("data"), TRUE);
					$resource = base_url("assets/js/cargos/update.js");

					echo json_encode(array(
						'success' => $show,
						'js' => $resource,
					));
				}
			}
		}else{
			show_404();
		}
	}
	public function delete() /* Metodo que elimina un cargo */
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$_id = $this->input->post("id");
			if(empty($_id)){
				$this->output->set_status_header(400)->set_output(json_encode(array('msg' => 'El id no puede ser vacio!')));
			}else{
				if (!$res = $this->ModelsCargos->deleteCargo($_id)) {
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
					$this->output->set_status_header(500);

				}else{

					$this->output->set_status_header(200);
					$data = $this->ModelsCargos->getCargos();
					$show  = $this->load->view("cargos/show_cargos", compact("data"), TRUE);
					$resource = base_url("assets/js/cargos/update.js");

					echo json_encode(array(
						'success' => $show,
						'js' => $resource
					));
				}
			}

		}else{
			show_404();
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