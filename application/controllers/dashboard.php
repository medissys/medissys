<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->sess_user();

		$this->load->helper('assets');

		$this->load->library('layout');

		$this->load->model('Dashboard_model');
		$this->load->model('RendezVous_model');

		$this->layout->ajouter_css('layout');

		setlocale(LC_TIME, "fr_FR");

	}

	public function index(){

		$this->load->view('acceuil');
	}

	public function sess_user(){

		if ( ! $this->session->userdata('nom') ) {

			//redirect('Idenfication/index','refresh');
			redirect();
		}
	}

	public function acceuil(){

		$this->layout->getId($this->session->userdata('nom'));

		$res = $this->RendezVous_model->getallRDV();

		if ( !empty($res) ){

			$i = 0;

			foreach ($res as $key => $value) {
				
				$data['row'][$i] = $value;
				$i++;
			}

			$this->layout->view('acceuil',$data);

		}
		else{

			$data['row'] = array();

			$this->layout->view('acceuil',$data);

		}
	}
}
?>