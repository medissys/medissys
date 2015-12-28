<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Identification extends CI_Controller
{
	protected $count = 0;

	public function __construct(){

		parent::__construct();

		$this->load->helper('assets'); /* chargement du helper pour les fichiers css,js,images ..*/

		$this->load->helper('form'); /* chargement du helper formulaire */

		$this->load->library('form_validation'); /* chargement de la librairie de validation des formulaires */
		$this->load->library('layout');


	}

	public function index(){

		$err = array( 'error' => '', 'msg' => 'false' ,'id' => '');

		$this->load->view('login',$err);

		echo 'on passe la';
		//$this->login();
	}

	public function login(){

		$login = $this->input->post('login');
		$mdp = $this->input->post('password');

		$this->form_validation->set_rules('login','"Login"','trim|required|xss_clean');
		$this->form_validation->set_rules('mot de passe','"Mot de passe"','trim|required|xss_clean');

		$this->load->model('Connexion_model');

		$res = $this->Connexion_model->getConnexion($login,$mdp);


		if ( ($this->form_validation->run() == false) && empty($res)){
			
			echo $this->count;
			//if ( $this->count == 0) {

				$var = array('error' => AUTHENTIFICATION_ERROR, 'msg' => 'true', 'id' => $login);

				$this->load->view('login',$var);
				
				$this->count++;
			//}
		}
		else{

			$this->session->set_userdata('nom',$res[0]->nom);

			redirect('Dashboard/acceuil');
		}
	}
}

