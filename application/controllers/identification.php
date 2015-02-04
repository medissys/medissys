<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identification extends CI_Controller
{

	public function __construct(){

		parent::__construct();

		$this->load->helper('assets'); /* chargement du helper pour les fichiers css,js,images ..*/

		$this->load->helper('form'); /* chargement du helper formulaire */

		$this->load->library('form_validation'); /* chargement de la librairie de validation des formulaires */

	}

	public function index(){

		$this->load->view('login');
	}

	public function login(){

		$error = '';

		$this->load->view('login',$error);

		$login = $this->input->post('login');
		$mdp = $this->input->post('password');

		$this->form_validation->set_rules('login','"Login"','trim|required|xss_clean');
		$this->form_validation->set_rules('mot de passe','"Mot de passe"','trim|required|xss_clean');

		$this->load->model('Connexion_model');

		$res = $this->Connexion_model->getConnexion($login,$mdp);


		if ( ($this->form_validation->run() == false) && empty($res)){

			//$array['error'] = AUTHENTIFICATION_ERROR;
			//$error = AUTHENTIFICATION_ERROR;
			$this->session->set_flashdata('connexion_ko','login et / ou mot de passe incorrect.');

		}
		else{

			$this->session->set_userdata('nom',$res[0]->nom);

			redirect('Dashboard/acceuil');
		}
	}
}

