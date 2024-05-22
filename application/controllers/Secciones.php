<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Secciones extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session', 'form_validation', 'pdf'));
		$this->load->helper(array('secciones/secciones_rules', 'url', 'file', 'download'));
		$this->load->model(array('ModelsSecciones', 'ModelsPersonal', 'ModelsAlumnos'));
	}
	public function index()
	{
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...

			$secciones = $this->ModelsSecciones->getSecciones();

			$letras = array(
				'A','B','C','D','E','F','G', 'H', 'I', 'J',
				'K','L','N','M','O','P','Q','R','S','T','U',
				'V','W','X','Y','Z'
			);

			$resource = array(
				'js_one' => base_url('assets/js/secciones/gestion_secciones.js'),
				'js_two' => base_url('assets/js/secciones/show_secciones.js'),
			);
			$list = $this->load->view("secciones/show_secciones", compact('secciones'), TRUE);
			$vista = $this->load->view("secciones/gestion_secciones", compact('list', 'letras'), TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
        }
	}
	public function store()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getSeccionesRules();
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					'grado' => form_error('grado'),
					'seccion' => form_error('seccion'),
					'turno' => form_error('turno'),
					'capacidad' => form_error('capacidad'),
				);
				echo json_encode($errors);
			}else{
				#todo bien
				
				$data = array(
					'grado' => $this->input->post('grado'),
					'seccion' => $this->input->post('seccion'),
					'turno' => $this->input->post('turno'),
					'capacidad' => $this->input->post('capacidad'),
				);

				if (!$res = $this->ModelsSecciones->save($data)) {

					$this->output->set_status_header(500);
					echo json_encode(array(
						'msg' => 'Ocurrio un error inesperado!'
					));

				}else{

					$secciones = $this->ModelsSecciones->getSecciones();
					$list = $this->load->view("secciones/show_secciones", compact('secciones'), TRUE);

					$this->output->set_status_header(200);
					echo json_encode(array(
						'msg' => 'Creada correctamente!',
						'view' => $list, 
						'js' => base_url('assets/js/secciones/show_secciones.js')
					));
				}


			}
		}else{
			show_404();
		}
	}
	public function verificate_letra()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$letra = $this->input->post('value');
			$grado = $this->input->post('grado');
			$id = $this->input->post('id');

			$seccions = $this->ModelsSecciones->verficate($grado);

			if(!$res = $this->ModelsSecciones->verficate_letra($grado, $letra)){
				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => ''
				));
			}else{
		

				if(!empty($id)){
					$seccion = $this->ModelsSecciones->getSeccion($id);
					$msg = array(
						'msg' => 'La letra no puede ser asignada!',
						'seccions' => $seccions,
						'letra' => $seccion->seccion
					);
				}else{
					$msg = array(
						'msg' => 'La letra no puede ser asignada!',
						'seccions' => $seccions,
					);
				}
	
				$this->output->set_status_header(401);
				echo json_encode($msg);
			}

		}else{
			show_404();
		}
	}
	public function return_form_update()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$id_seccion = $this->input->post('id');
			$seccion = $this->ModelsSecciones->getSeccion($id_seccion);
			$docentes = $this->ModelsPersonal->getDocentes($seccion->turno, 'Docente');
			$secciones = $this->ModelsSecciones->verficate($seccion->grado);
			$all_alumnos = $this->ModelsAlumnos->all_alumnos($seccion->grado);
			$letras = array(
				'A','B','C','D','E','F','G', 'H', 'I', 'J',
				'K','L','N','M','O','P','Q','R','S','T','U',
				'V','W','X','Y','Z'
			);

			#Alumnos
			if(!$asignados = $this->ModelsAlumnos->seccion_alumnos($seccion->grado, $id_seccion)){
				$asignados = "";
			}

			if(!$sin_asignar = $this->ModelsAlumnos->seccion_alumnos($seccion->grado, '0')){
				$sin_asignar = "";
			}

			if(!empty($seccion->id_docente)){
				$docente = $this->ModelsPersonal->getPerson($seccion->id_docente);
			}else{
				$docente = "";
			}
			$resource = array(
				'js_one' ,
				'js_two' ,
			);
			$vista = $this->load->view("secciones/control_secciones",compact('seccion', 'secciones', 'letras', 'docentes', 'docente', 'asignados'), TRUE);
			$students_view = $this->load->view("secciones/estudiantes_seccion", compact('all_alumnos', 'id_seccion','asignados', 'sin_asignar'), TRUE);

			$this->output->set_status_header(200);
			echo json_encode(array(
				'view' => $vista,
				'students' => $students_view,
				'js' => base_url('assets/js/secciones/details_seccion.js')
			));
		}else{
			show_404();
		}
	}
	public function asignate_docente()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$id = $this->input->post('id_seccion');
			$cedula = $this->input->post('cedula');
			
			if(!empty($cedula)){
				$id_docente = $this->ModelsPersonal->soloPersona($cedula);
			}else{
				$id_docente = '';
			}

			$data = array(
				'id_docente' => $id_docente->id
			);

			if (!$res = $this->ModelsSecciones->asig_docente($id, $data)) {
				$this->output->set_status_header(500);
				echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));

			}else{

				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => 'El docente ha sido asignado correctamente!',
					'js' => base_url('assets/js/secciones/details_seccion.js')
				));
			}

		}else{
			show_404();
		}
	
	}
	public function return_secciones()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$data = $this->ModelsSecciones->verficate($this->input->post('value'));
			echo json_encode($data);
		}else{
			show_404();
		}
	}
	public function return_seccion()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$data = $this->ModelsSecciones->getSeccion($this->input->post('value'));
			echo json_encode(array(
				'turno' => $data->turno
			));
		}else{
			show_404();
		}
	}
	public function asignate_alumnos()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$id = $this->input->post('id');
			$id_seccion = $this->input->post('id_seccion');
			$proceso = $this->input->post('proceso');

			$seccion = $this->ModelsSecciones->getSeccion($id_seccion);

			#Alumnos
			if(!$total_alumnos = $this->ModelsAlumnos->seccion_alumnos($seccion->grado, $id_seccion)){

				$total_alumnos = "0";
			}
				
			if($proceso == "Asignar"){
				#Asignate
				$data = array(
					'seccion_id' => $id_seccion
				);

				if(!empty($total_alumnos)){

					$cupos = $seccion->capacidad - count($total_alumnos);
				}else{
					$cupos = $seccion->capacidad - $total_alumnos;
				}

				if($cupos == '0'){
					$this->output->set_status_header(500);
					echo json_encode(array(
						'msg' => 'No hay cupos disponibles en esta seccion!'
					));
					exit;
				}else{

					$msg = 'Asignado(a) correctamente! ';
				}


			}else{
				#Sin seccion
				$data = array(
					'seccion_id' => '0'
				);

				$msg = 'Eliminado(a) de la secci&oacute;n correctamente!';

			}

			
			if(!$res = $this->ModelsSecciones->alumnos_seccion($id, $data)){
				$this->output->set_status_header(500);
				echo json_encode(array(
					'msg' => 'Ocurrio algo inesperado!'
				));

			}else{

				$docentes = $this->ModelsPersonal->getDocentes($seccion->turno, 'Docente');
				$secciones = $this->ModelsSecciones->verficate($seccion->grado);
				$all_alumnos = $this->ModelsAlumnos->all_alumnos($seccion->grado);
				$letras = array(
					'A','B','C','D','E','F','G', 'H', 'I', 'J',
					'K','L','N','M','O','P','Q','R','S','T','U',
					'V','W','X','Y','Z'
				);
	
				#Alumnos
				if(!$asignados = $this->ModelsAlumnos->seccion_alumnos($seccion->grado, $id_seccion)){
					$asignados = "";
				}
	
				if(!$sin_asignar = $this->ModelsAlumnos->seccion_alumnos($seccion->grado, '0')){
					$sin_asignar = "";
				}
	
				if(!empty($seccion->id_docente)){
					$docente = $this->ModelsPersonal->getPerson($seccion->id_docente);
				}else{
					$docente = "";
				}

				$vista = $this->load->view("secciones/control_secciones",compact('seccion', 'secciones', 'letras', 'docentes', 'docente', 'asignados'), TRUE);
				$students_view = $this->load->view("secciones/estudiantes_seccion", compact('all_alumnos', 'id_seccion', 'asignados', 'sin_asignar'), TRUE);
	
				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => $msg,
					'view' => $vista,
					'students' => $students_view,
					'js' => base_url('assets/js/secciones/details_seccion.js'),
				));
			}

		}else{
			show_404();
		}
	}
	function reporte_pdf($id_seccion) {

		$seccion = $this->ModelsSecciones->getSeccion($id_seccion);
		$docente = $this->ModelsPersonal->getPerson($seccion->id_docente);
		$secciones = $this->ModelsSecciones->verficate($seccion->grado);
		$all_alumnos = $this->ModelsAlumnos->all_alumnos($seccion->grado);
		$letras = array(
			'A','B','C','D','E','F','G', 'H', 'I', 'J',
			'K','L','N','M','O','P','Q','R','S','T','U',
			'V','W','X','Y','Z'
		);

		#Alumnos
		$array = array(
			'grado_student' => $seccion->grado, 
			'seccion_id' => $id_seccion, 
		);
		if(!$asignados = $this->ModelsAlumnos->return_all('alumnos', $array)){
			$asignados = "";
		}

		$m = array(
			'grado_student' => $seccion->grado, 
			'seccion_id' => $id_seccion, 
			'sexo_student' => "M"
		);
		$varones = $this->ModelsAlumnos->return_all('alumnos', $m);

		$f = array(
			'grado_student' => $seccion->grado, 
			'seccion_id' => $id_seccion, 
			'sexo_student' => "F"
		);
		$hembras = $this->ModelsAlumnos->return_all('alumnos', $f);

        // PDF
        $paper = 'a4';

        // # portrait
        // #landscape
        $orientation = 'portrait'; 

        //Set folder to save PDF to
        $this->pdf->folder('assets/pdf/');

        //Set the filename to save/download as
        if(!empty($docente)){
            $cedula_array = explode(" ", $docente->cedula);
            $filename = 'carga '.' '.$cedula_array[0].$cedula_array[1].'.pdf';
        }else{
            $filename = 'seccion'.'.pdf';
        }
        $this->pdf->filename($filename);

        //Set the paper defaults portrait/landscape
        $this->pdf->paper($paper, $orientation);

        //Load html view
        $data = array(
            'margin' => '40px',
            'title' => 'ESCUELA BASICA NACIONAL VICTOR JULIO GONZALES "LAS DELICIAS"',
            'docente' => $docente,
            'seccion' => $seccion,
            'total' => $asignados,
            'varones' => $varones,
            'hembras' => $hembras
        );
        $this->pdf->html($this->load->view('secciones/pdf', $data, true));

        //PDF was successfully download and view
        if($this->pdf->create('download')) {
            redirect();
        }
    }
	public function update()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {

			$this->form_validation->set_error_delimiters('', '');
			$rules = getSeccionesRules();
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() === FALSE){
				$this->output->set_status_header(400);
				$errors = array(
					'grado' => form_error('grado'),
					'seccion' => form_error('seccion'),
					'turno' => form_error('turno'),
					'capacidad' => form_error('capacidad'),
				);
				echo json_encode($errors);
			}else{
				#todo bien
				
				$id_seccion = $this->input->post('id_seccion');
				$data = array(
					'grado' => $this->input->post('grado'),
					'seccion' => $this->input->post('seccion'),
					'turno' => $this->input->post('turno'),
					'capacidad' => $this->input->post('capacidad'),
				);

				if (!$res = $this->ModelsSecciones->update($id_seccion, $data)) {
					$this->output->set_status_header(500);
					echo json_encode(array('msg' => 'Ocurrio un error inesperado!'));
	
				}else{

					$seccion = $this->ModelsSecciones->getSeccion($id_seccion);
					$docentes = $this->ModelsPersonal->getDocentes($seccion->turno, 'Docente');
					$secciones = $this->ModelsSecciones->verficate($seccion->grado);
					$all_alumnos = $this->ModelsAlumnos->all_alumnos($seccion->grado);

					$letras = array(
						'A','B','C','D','E','F','G', 'H', 'I', 'J',
						'K','L','N','M','O','P','Q','R','S','T','U',
						'V','W','X','Y','Z'
					);
		
					#Alumnos
					if(!$asignados = $this->ModelsAlumnos->seccion_alumnos($seccion->grado, $id_seccion)){
						$asignados = "";
					}
		
					if(!$sin_asignar = $this->ModelsAlumnos->seccion_alumnos($seccion->grado, '0')){
						$sin_asignar = "";
					}
		
					if(!empty($seccion->id_docente)){
						$docente = $this->ModelsPersonal->getPerson($seccion->id_docente);
					}else{
						$docente = "";
					}
	
					$vista = $this->load->view("secciones/control_secciones",compact('seccion', 'secciones', 'letras', 'docentes', 'docente', 'asignados'), TRUE);
					$students_view = $this->load->view("secciones/estudiantes_seccion", compact('all_alumnos', 'id_seccion', 'asignados', 'sin_asignar'), TRUE);


					$this->output->set_status_header(200);
					echo json_encode(array(
						'view' => $vista,
						'students' => $students_view,
						'msg' => 'Los datos han sido actualizados!',
						'js' => base_url('assets/js/secciones/details_seccion.js')
					));
				}
			}
		}else{
			show_404();
		}
	}
	public function delete()
	{
		if ($this->input->server('REQUEST_METHOD') === "POST") {
			$id = $this->input->post('id');

			if(!$res = $this->ModelsSecciones->deleteSeccion($id)){
				$this->output->set_status_header(500);
				echo json_encode(array(
					'msg' => 'Ocurrio un error inesperado!'
				));
			}else{

				$secciones = $this->ModelsSecciones->getSecciones();
				$list = $this->load->view("secciones/show_secciones", compact('secciones'), TRUE);

				$this->output->set_status_header(200);
				echo json_encode(array(
					'msg' => 'Eliminada correctamente!',
					'view' => $list, 
					'js' => base_url('assets/js/secciones/show_secciones.js')
				));
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
