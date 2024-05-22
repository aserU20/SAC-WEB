<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {

	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session'));
		$this->load->model(array('ModelsCargos', 'ModelsPersonal', 'ModelsUsers'));
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$data = array(
			'codigo' => '0001',
			'nombre_cargo' => 'DIRECTOR',
			'categoria' => 'Administrativo'
		);

		if(!$this->ModelsCargos->validate_code($data['codigo'], $data['nombre_cargo'])){

			#GUARDAR CARGO
			$this->ModelsCargos->save($data);
			
			unlink('./application/controllers/'.'Welcome.php'); 
			copy('./application/views/config/Welcome.php', './application/controllers/Welcome.php');
	
			$this->load->view('config/installation');

		}else{

			if(empty($res = $this->ModelsPersonal->getAll())){
				$this->load->view('config/installation');

			}else{
				$cedula_array = explode(" ", $res->cedula);
				$nacionalidad = $cedula_array[0];
				$cedula = $cedula_array[1];

				header('Location: '.base_url('configuration/finish_installation/'. $nacionalidad . "/" . $cedula));
			}
		}

		
	}
	public function finish_installation($nacionalidad, $cedula)
	{

		if(empty($this->ModelsUsers->getUsers())){

			$this->load->view('config/configurate_user', compact('nacionalidad', 'cedula'));

		}else{
			header('Location: '.base_url('login'));
		}
	}
}
