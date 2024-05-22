<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session', 'form_validation'));
		$this->load->helper(array('alumnos/alumnos_rules', 'representantes/representantes_rules'));
		$this->load->model(array('ModelsAlumnos', 'ModelsRepresentantes', 'ModelsSecciones'));
	}
	public function index()
	{
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...
			$datos = $this->ModelsAlumnos->getAlumnos();
			$resource = array(
				'js_one' => base_url('assets/js/alumnos/show_students.js'),
				'js_two',
			);
			$vista = $this->load->view("alumnos/show_students", compact('datos'), TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function create()
	{
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...
			$resource = array(
				'js_one' => base_url('assets/js/alumnos/create_alumnos.js'),
				'js_two',
			);
			$representante_form = $this->load->view("representantes/create_representante", '', TRUE);
			$vista = $this->load->view("alumnos/create_student", compact('representante_form'), TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function store_alumno()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getAlumnoRules();
			$rules2 = getRepresentanteRules();
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_rules($rules2);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					// PARTE 1
					'grado' => form_error('grado'),
					'seccion' => form_error('seccion'),
					'turno' => form_error('turno'),
					// PARTE 2
					'nombre' => form_error('nombre'),
					'apellido' => form_error('apellido'),
					'sexo_student' => form_error('sexo_student'),
					'fecha_n' => form_error('fecha_n'),
					'edad' => form_error('edad'),
					'codigo' => form_error('codigo'),
					// PARTE 3
					'ci' => form_error('ci'),
					'nombre_r' => form_error('nombre_r'),
					'apellido_r' => form_error('apellido_r'),
					'sexo_r' => form_error('sexo_r'),
					'fecha_n_r' => form_error('fecha_n_r'),
					'edad_r' => form_error('edad_r'),
					'parentesco' => form_error('parentesco'),
					'telefono' => form_error('telefono'),
					'ciudad' => form_error('ciudad'),
					'direccion' => form_error('direccion'),
				);

				echo json_encode($errors);
				exit;
			}

			// DATOS ALUMNO
			$alumno = array(
				'grado_student' => $this->input->post('grado'),
				'seccion_id' => $this->input->post('seccion'),
				'turno' => $this->input->post('turno'),
				// PARTE 2
				'nombres_student' => $this->input->post('nombre'),
				'apellidos_student' => $this->input->post('apellido'),
				'sexo_student' => $this->input->post('sexo_student'),
				'edad_student' => $this->input->post('edad'),
				'codigo_student' => $this->input->post('codigo'),
				'f_nacimiento_student' => $this->input->post('fecha_n'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);

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
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			);

			// VERIFICATE CUPO
			$seccion = $this->ModelsSecciones->getSeccion($alumno['seccion_id']);
			#Alumnos
			if(!$total_alumnos = $this->ModelsAlumnos->seccion_alumnos($seccion->grado, $alumno['seccion_id'])){
				$total_alumnos = "0";
			}
			
			if($total_alumnos != 0){

				$cupos = $seccion->capacidad - count($total_alumnos);
			}else{
				$cupos = $seccion->capacidad;
			}

			if($cupos == '0'){
				$this->output->set_status_header(500);
				echo json_encode(array(
					'msg' => 'No hay cupos disponibles en esta seccion!'
				));
				exit;
			}

			// VALIDATE STUDENT
			if(!$code = $this->ModelsAlumnos->getAlumno($alumno['codigo_student'])){
				#todo bien

				// VALIDATE 2
				if(!$student = $this->ModelsAlumnos->validate(
					$alumno['nombres_student'], 
					$alumno['apellidos_student'],
					$alumno['sexo_student'],
					$alumno['edad_student'],
					$alumno['f_nacimiento_student'],
				)){
	
					#todo bien
	
				}else{
					$this->output->set_status_header(401);
					echo json_encode(array(
						'alumno' => 'El alumno ya esta registrado!',
						'codigo' => '',
					));
					exit;
				}

			}else{
				$this->output->set_status_header(401);
				echo json_encode(array(
					'codigo' => 'El c&oacute;digo ya ha sido usado, por favor genere otro!',
					'alumno' => '',
				));
				exit;
			}
			// END

			// VALIDATE REPRESENTANTE
			if(!$persona = $this->ModelsRepresentantes->getRepresentante($representante['cedula_r'])){
				#todo bien
				if(!$id_repre = $this->ModelsRepresentantes->save($representante)){

					$this->output->set_status_header(500);
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
					exit;

				}else{

					$alumno['representante_id'] = $id_repre;
				}
			
			}else{

				$id_persona = $persona->id;
				$alumno['representante_id'] = $id_persona;
			}
			// END

			// GUARDAR ALUMNO
			if(!$id_repre = $this->ModelsAlumnos->save($alumno)){

				$this->output->set_status_header(500);
				echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
				exit;

			}else{
				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => 'Guardado correctamente!',
				));
				exit;
			}


		}else{
			show_404();
		}

	}
	public function edit_alumno() /* Metodo que retorna form para actualizar info persona */
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$data = $this->ModelsAlumnos->getAlumno($this->input->post('codigo'));
			$secciones = $this->ModelsSecciones->verficate($data->grado_student);
			$seccion = $this->ModelsSecciones->getSeccion($data->seccion_id);

			$view  = $this->load->view("alumnos/update_student", compact('data', 'secciones', 'seccion'), TRUE);
			
			echo json_encode(array(
				'view' => $view,
				'js_one' => base_url("assets/js/alumnos/show_students.js"),
				'js_two' => base_url("assets/js/alumnos/update_student.js"),
			));

		}else{
			show_404();
		}
	}
	public function detalles_alumno()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$code = $this->input->post('code');
			// $data = $this->ModelsAlumnos->getAlumno($code);
			$data = $this->ModelsAlumnos->return_one('alumnos', 'codigo_student', $code);
			$representante = $this->ModelsAlumnos->return_one('representantes', 'id', $data->representante_id);

			if($data->seccion_id != 0){

				$seccion = $this->ModelsAlumnos->return_one('secciones', 'id', $data->seccion_id);
			}else{
				$seccion = "0";
			}

			$details = $this->load->view("alumnos/detalles_alumno", compact("data", "representante", "seccion"), TRUE);
			echo json_encode(array(
				'view' => $details,
				// 'js' => base_url("assets/js/personal/show_personal.js")
				'data' => $data
			));
		}else{
			show_404();
		}
	}
	public function update_alumno()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$this->form_validation->set_error_delimiters('', '');
			$rules = getAlumnoRules();
			$this->form_validation->set_rules($rules);

			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					// PARTE 1
					'grado' => form_error('grado'),
					'seccion' => form_error('seccion'),
					'turno' => form_error('turno'),
					// PARTE 2
					'nombre' => form_error('nombre'),
					'apellido' => form_error('apellido'),
					'sexo_student' => form_error('sexo_student'),
					'fecha_n' => form_error('fecha_n'),
					'edad' => form_error('edad'),
					'parentesco' => form_error('parentesco'),
					'codigo' => form_error('codigo'),
				);

				echo json_encode($errors);
				exit;
			}

			// DATOS ALUMNO
			$alumno = array(
				'grado_student' => $this->input->post('grado'),
				'seccion_id' => $this->input->post('seccion'),
				'turno' => $this->input->post('turno'),
				// PARTE 2
				'nombres_student' => $this->input->post('nombre'),
				'apellidos_student' => $this->input->post('apellido'),
				'sexo_student' => $this->input->post('sexo_student'),
				'edad_student' => $this->input->post('edad'),
				'codigo_student' => $this->input->post('codigo'),
				'f_nacimiento_student' => $this->input->post('fecha_n'),
				'updated_at' => date('Y-m-d H:i:s')
			);

			if(!$res = $this->ModelsAlumnos->update($alumno)){
				$this->output->set_status_header(500);
				echo json_encode(array(
					'msg' => 'Ocurrio un error inesperado!'
				));

			}else{

				$data = $this->ModelsAlumnos->getAlumno($alumno['codigo_student']);
				$secciones = $this->ModelsSecciones->verficate($data->grado_student);
				$seccion = $this->ModelsSecciones->getSeccion($data->seccion_id);
	
				$view  = $this->load->view("alumnos/update_student", compact('data', 'secciones', 'seccion'), TRUE);

				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => 'Actualizado correctamente!',
					'view' => $view,
					'js_one' => base_url("assets/js/alumnos/show_students.js"),
					'js_two' => base_url("assets/js/alumnos/update_student.js"),
				));
	
			}

		}else{
			show_404();
		}
	}
	public function delete_student()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$codigo = $this->input->post("codigo");

			if(empty($codigo)){
				$this->output->set_status_header(400)->set_output(json_encode(array('msg' => 'El codigo no puede estar vacio!')));
			}else{

				$alumno = $this->ModelsAlumnos->getAlumno($codigo);
				$alumnos = $this->ModelsAlumnos->getAlumnos_representante($alumno->representante_id);
				if(!empty($alumnos) AND count($alumnos) <= 1){
					$alumnos = false;
				}

				if (!$res = $this->ModelsAlumnos->delete($codigo, $alumnos, $alumno)) {
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
					$this->output->set_status_header(500);

				}else{

					$this->output->set_status_header(200);

					$datos = $this->ModelsAlumnos->getAlumnos();
					$table = $this->load->view("alumnos/show_students", compact('datos'), TRUE);
					echo json_encode(array(
						'view' => $table,
						'js' => base_url('assets/js/alumnos/show_students.js'),
					));

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








