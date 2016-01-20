<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identification extends CI_Controller
{
	public function __construct(){

		parent::__construct();

		$this->load->helper('assets'); /* chargement du helper pour les fichiers css,js,images ..*/

		$this->load->helper('form'); /* chargement du helper formulaire */

		$this->load->library('form_validation'); /* chargement de la librairie de validation des formulaires */
		$this->load->library('layout');
		$this->load->model('Connexion_model');


	}

	public function index(){

		$err = array( 'error' => '', 'msg' => 'false' ,'id' => '');
		$this->load->view('login',$err);
		//$this->login();
	}

	public function login(){

		$res = array();

		$login = $this->input->post('login');
		$mdp = $this->input->post('password');
		
		$this->form_validation->set_rules('login','"Login"','trim|required|xss_clean');
		$this->form_validation->set_rules('mot de passe','"Mot de passe"','trim|required|xss_clean');

		if (!empty($login) && !empty($mdp)){

			$res = $this->Connexion_model->getConnexion($login,$mdp);
		}

		if ( $this->form_validation->run() == FALSE && empty($res)){
			
			$var = array('error' => AUTHENTIFICATION_ERROR, 'msg' => 'true', 'id' => $login);
				
			$this->load->view('login',$var);
			
		}
		else{
			
			$this->session->set_userdata('nom',$res[0]->nom);

			redirect('Dashboard/acceuil');
			
		}
	}

}

