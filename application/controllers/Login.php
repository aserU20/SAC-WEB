<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('auth/login_rules'));
		$this->load->model('Auth');
	}
	public function index() /* Metodo para cargar view login!*/
	{
		if ($this->session->userdata('is_logged')) {
			header('Location: '.base_url('dashboard'));
        }else{
			$this->load->view('login/login');
        }
	}

	public function validate() /* Metodo para validadr datos y crear session!*/
	{
		$this->form_validation->set_error_delimiters('', '');
		$rules = getLoginRules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() === FALSE){
			$this->output->set_status_header(400);
			$errors = array(
				'username' => form_error('username'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
		}else{
			$nacionalidad = $this->input->post('nacionalidad');
			$cedula = $nacionalidad ." ". $this->input->post('username');
			$password = md5($this->input->post('password'));

			if (!$res = $this->Auth->login($cedula, $password)) {
				echo json_encode(array('msg' => 'Los datos ingresados son incorrectos!'));
				$this->output->set_status_header(401);
				exit;
			}
			if($res['data1']->status != "1"){
				echo json_encode(array('msg' => 'Usuario inhabilitado por el administrador!'));
				$this->output->set_status_header(401);
				exit;
			}
	
			// CREAR SESION
			$data = array(
				'id' => $res['data1']->id,
				'rango' => $res['data1']->range,
				'status' => $res['data1']->status,
				'id_persona' => $res['data1']->id_persona,
				'nombre' => $res['data2']->nombre,
				'apellido' => $res['data2']->apellido,
				'is_logged' => TRUE,
			);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('msg', 'Bienvenido ' . $data['id_persona']);
			echo json_encode(array('url' => base_url("dashboard")));
		}

	}

	public function logout() /* Metodo para finalizar session!*/
	{
		$vars = array('id', 'rango', 'status', 'id_persona', 'is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();

		header('Location: '.base_url('login'));
	}
}