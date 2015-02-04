<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout_model extends CI_Controller
{
		public function __construct(){

		parent::__construct();

		$this->sess_user();

	}

	public function sess_user(){

		if( ! $this->session->userdata('nom') ) {
			
			redirect('Idenfication/login');
		}
	}

	public function logout(){

		$this->session->sess_destroy();

	}
}