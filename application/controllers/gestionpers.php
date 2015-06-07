<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GestionPers extends CI_Controller{

	public function __construct(){

		parent::__construct();

		$this->sess_user();

		$this->load->helper('assets');
		$this->load->library('layout');
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->layout->ajouter_css('layout');
		$this->layout->getId($this->session->userdata('nom'));

		$this->load->model('Gestionpers_model');

	}

	public function sess_user(){

		if ( ! $this->session->userdata('nom') ) {

			//redirect('Idenfication/index','refresh');
			redirect();
		}
	}


	public function acceuil(){

		$this->layout->view('gestionpers');

	}

	public function consulterFiche(){

		$login = $this->input->post('login');

		$res = $this->Gestionpers_model->getPersByLogin($login);


		if ( empty($res) ){

			//$this->acceuil();
			$err = array('erreur' => 'ERREUR: Ce login ou ce matricule n\'existe pas');
			$this->layout->view('gestionpers',$err);
			//$this->session->set_flashdata('recherche_user_ko','ERREUR: Ce login ou ce matricule n\'existe pas');

		}
		else{
			$data = array(
						'nom'       => $res[0]->nom,
						'prenom'    => $res[0]->prenom,
						'email'     => $res[0]->email,
						'telephone' => $res[0]->telephone,
						'adresse'   => $res[0]->adresse
						);

			$this->layout->view('searchpers',$data);
		}
		
	}

	public function consulterFiches(){

		$data['row'][0] = array ('nom'    => '',
								 'prenom'    => '',
								 'login'     => '',
								 'telephone' => '',
								 'email'      => '',
								 'adresse'   => ''
								);

		$this->layout->view('listepers',$data);


	}

	public function annuaire(){

		$res = $this->Gestionpers_model->getAllPers();

		$row = $this->Gestionpers_model->getNumRows();

		//TODO: Elargir la recherche au nom et prénom et l'afficher automatiquement via JS ou AJAX.

		if ( empty($res) ){


			$this->consulterFiches();
			//$this->session->set_flashdata('recherche_users_ko','Aucun contact trouvé');

		}
		else{	

			for ($i=0; $i<$row; $i++){

				$data['row'][$i] = array ( 'nom'    => $res[$i]->nom,
					                    'login'		=> $res[$i]->login,
										'prenom'    => $res[$i]->prenom,
										'telephone' => $res[$i]->telephone,
										'email'      => $res[$i]->email,
										'adresse'   => $res[$i]->adresse
										);

			}

			$this->layout->view('listepers',$data);
			
		}
	}
}

?>