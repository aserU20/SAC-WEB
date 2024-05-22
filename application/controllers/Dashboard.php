<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() /* Metodo para cargar recursos necesarios!*/
	{
		parent::__construct();
        $this->load->library(array('session'));
	}
	public function index()
	{
        if ($this->session->userdata('is_logged')) {
			# PANEL ADMIN...
			$date = date('Y-m-d H:i:s');
			$date_array = explode(" ", $date);
			$fecha = $date_array[0];
			
			$day_array = explode("-", $fecha);
			$day = $day_array[2];

			$resource = array(
				'js_one' => base_url("assets/vendor/clock/js/clock.js"),
				'js_two' => base_url("assets/js/asistencia/confirmar_asistencia.js"),
			);
			$vista = $this->load->view("layout/inicio", compact('day', 'fecha'), TRUE);
			$this->getTemplate($vista, $resource);
			
        }else{
			header('Location: '.base_url('login'));
            // show_404();
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








