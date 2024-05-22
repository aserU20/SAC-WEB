<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Representantes extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('representantes/representantes_rules'));
		$this->load->model(array('ModelsRepresentantes', 'ModelsAlumnos'));
	}
	public function index()
	{
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...
			$datos = $this->ModelsRepresentantes->getRepresentantes();
			$resource = array(
				'js_one' => base_url('assets/js/representantes/show_representantes.js'),
				'js_two',
			);
			$vista = $this->load->view("representantes/show_representantes", compact('datos'), TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function return_representante()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$nacionalidad = $this->input->post('nacionalidad');
			$ci = $nacionalidad . " " . $this->input->post('ci');

			if(!$data = $this->ModelsRepresentantes->getRepresentante($ci)){
				$this->output->set_status_header(200);

				echo json_encode(array(
					'msg' => ''
				));

			}else{

				$this->output->set_status_header(200);

				echo json_encode(array(
					'nombre_r' => $data->nombres_r,
					'apellido_r' => $data->apellidos_r,
					'sexo_r' => $data->sexo_r,
					'sexo_r' => $data->sexo_r,
					'fecha_n_r' => $data->f_nacimiento_r,
					'edad_r' => $data->edad_r,
					'telefono' => $data->telefono_r,
					'ciudad' => $data->ciudad_r,
					'direccion' => $data->direccion_r,
					'parentesco' => $data->parentesco,
					'msg' => 'success'
				));

			}



		}else{
			show_404();
		}
	}
	public function edit_representante()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$data = $this->ModelsRepresentantes->getRepresentante($this->input->post('cedula'));
			$cedula = '';
			$nacionalidad = '';
			if(!empty($data)){
				$cedula_array = explode(" ", $data->cedula_r);
				$nacionalidad = $cedula_array[0];
				$cedula = $cedula_array[1];
			}


			$view  = $this->load->view("representantes/update_representante", compact('data', 'cedula', 'nacionalidad'), TRUE);
			
			echo json_encode(array(
				'view' => $view,
				'js_one' => base_url("assets/js/representantes/show_representantes.js"),
				'js_two' => base_url("assets/js/representantes/update_representante.js"),
			));
		}else{
			show_404();
		}
	}
	public function update()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$this->form_validation->set_error_delimiters('', '');
			$rules = getRepresentanteRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					// PARTE 3
					'ci' => form_error('ci'),
					'nombre_r' => form_error('nombre_r'),
					'apellido_r' => form_error('apellido_r'),
					'sexo_r' => form_error('sexo_r'),
					'fecha_n_r' => form_error('fecha_n_r'),
					'edad_r' => form_error('edad_r'),
					'telefono' => form_error('telefono'),
					'ciudad' => form_error('ciudad'),
					'direccion' => form_error('direccion'),
					'parentesco' => form_error('parentesco'),
				);
				echo json_encode($errors);
				exit;
			}

			// DATOS REPRESENTANTE
			$representante = array(
				'nombres_r' => $this->input->post('nombre_r'),
				'apellidos_r' => $this->input->post('apellido_r'),
				'sexo_r' => $this->input->post('sexo_r'),
				'cedula_r' => $this->input->post('nacionalidad') . " " . $this->input->post('ci'),
				'f_nacimiento_r' => $this->input->post('fecha_n_r'),
				'edad_r' => $this->input->post('edad_r'),
				'parentesco' => $this->input->post('parentesco'),
				'telefono_r' => $this->input->post('telefono'),
				'ciudad_r' => $this->input->post('ciudad'),
				'direccion_r' => $this->input->post('direccion'),
				'updated_at' => date('Y-m-d H:i:s')
			);

			if(!$res = $this->ModelsRepresentantes->update($representante)){
				$this->output->set_status_header(500);
				echo json_encode(array(
					'msg' => 'Ocurrio un error inesperado!'
				));

			}else{
				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => 'Actualizado correctamente!',
				));
			}

		}else{
			show_404();
		}
	}
	public function delete()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$cedula = $this->input->post("cedula");
			
			if(empty($cedula)){
				$this->output->set_status_header(400)->set_output(json_encode(array('msg' => 'La cedula no puede estar vacia!')));
			}else{

				$persona = $this->ModelsRepresentantes->getRepresentante($cedula);
				$alumnos = $this->ModelsAlumnos->getAlumnos_representante($persona->id);

				if (!$res = $this->ModelsRepresentantes->delete($persona->id, $alumnos)) {
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
					$this->output->set_status_header(500);

				}else{

					$datos = $this->ModelsRepresentantes->getRepresentantes();

					$table = $this->load->view("representantes/show_representantes", compact('datos'), TRUE);
					echo json_encode(array(
						'view' => $table,
						'js' => base_url('assets/js/representantes/show_representantes.js')
					));

					$this->output->set_status_header(200);
				}
			}
		}else{
			show_404();
		}
	}
	public function getTemplate($view, $resource)
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








