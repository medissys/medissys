<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller
{

	public function __construct(){

		parent::__construct();
		$this->sess_user();

	}

	public function index(){

	}

	public function sess_user(){

		if( ! $this->session->userdata('nom') ) {

			//redirect('Idenfication/index');
			redirect();
		}
	}

	public function deconnect(){

		$this->load->model('logout_model');

		$this->logout_model->logout();

		redirect();

	}

}