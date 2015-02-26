<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ordonnance extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->sess_user();

		$this->load->helper('assets');
		$this->load->library('layout');

		$this->load->library('errors'); //TODO: Class à développer pour rendre les variables portables dans les vues;

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		$this->layout->ajouter_css('layout');

		$this->layout->getId($this->session->userdata('nom'));
	}

	public function sess_user(){

		if ( ! $this->session->userdata('nom') ) {

			//redirect('Idenfication/index','refresh');
			redirect();
		}
	}

	public function editerOrdonnance($index){

		$this->layout->view('ordonnance/ordonnance');
	}
}

?>