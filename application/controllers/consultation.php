<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultation extends CI_Controller{

	protected $count=0;

	public function __construct(){

		parent::__construct();

		$this->sess_user();

		$this->load->helper('assets');
		$this->load->library('layout');

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		$this->load->model('Gestionpatient_model');
		$this->load->model('Consultation_model');

		$this->layout->ajouter_css('layout');

		$this->layout->getId($this->session->userdata('nom'));
	}


	public function sess_user(){

		if ( ! $this->session->userdata('nom') ) {

			redirect();
		}
	}

	public function rechercherDossier(){

		$numdossier = $this->input->post('numerodossier');

		$config = array(
					array(
						'field' => 'numerodossier',
						'label' => '',
						'rules' => 'trim|callback_check_numdossier|xss_clean'
					)
				  );

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		if ( $this->form_validation->run() == false ){

			$this->layout->view('consultation/rechercherDossier');
		}
		else{

			$res = $this->Gestionpatient_model->findDossier($numdossier);

			$resBoard = $this->Gestionpatient_model->getDataBoard($numdossier);

			if ( empty($res) ){
				
				$this->session->set_flashdata('error','le dossier n\'existe pas');
				$this->layout->view('consultation/rechercherDossier');

			}
			else{

				$i = 0;

				foreach ($resBoard as $key) {
					
					$data[$i] = $resBoard[$i];
					$i++; 
				}

				$array = array(
					'header' => $res[0],
					'board'  => $data
					);

				$this->layout->view('consultation/nouvelleConsultation',$array);

				$this->session->set_userdata('numerodossier',$res[0]->numerodossier);
				$this->session->set_userdata('nom',$res[0]->nom);
				$this->session->set_userdata('prenom',$res[0]->prenom);
				$this->session->set_userdata('civilite',$res[0]->idCivilite);
				$this->session->set_userdata('datenaissance',$res[0]->datenaissance);
			}
		}
	}

	public function consulterDossier($index){

		$res = $this->Gestionpatient_model->findDossier($index);

		$resBoard = $this->Gestionpatient_model->getDataBoard($index);

		$i = 0;

		foreach ($resBoard as $key) {
			
			$data[$i] = $resBoard[$i];
			$i++; 
		}

		$array = array(
			'header' => $res[0],
			'board'  => $data
			);

		$this->layout->view('consultation/nouvelleConsultation',$array);

	}

	public function modifierDossier($index){

		//$result = $this->Gestionpatient_model->findDossier($this->session->userdata('numerodossier'));

		$result = $this->Gestionpatient_model->findDossier($index);

		if ( empty($result) ){

			// TODO: Implémenter page erreur technique.
			//$err = array('erreur' => DIR_NOT_FOUND);

			//$this->layout->view('patient/modifier_dossier_error',$err);

		}
		else{

			$this->layout->view('patient/consulter_dossier_modifier',$result[0]);

		}
	}

	/*public function enregistrerConsultation(){

		$data = array( 
			'id'   => $this->session->userdata('numerodossier'),
			'symp' => $this->input->post('symptome'),
			'obs'  => $this->input->post('observation'),
			'com'  => $this->input->post('commentaire')
			);

		$config = array(
					array(
						'field' => 'symptome',
						'label' => '',
						'rules' => 'trim|callback_check_field|xss_clean'
					),
					array(
						'field' => 'observation',
						'label' => '',
						'rules' => 'trim|callback_check_field|xss_clean'
					),
					array(
						'field' => 'commentaire',
						'label' => '',
						'rules' => 'trim|callback_check_field|xss_clean'
					)
				  );

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		if ( $this->form_validation->run() == false ){

			$this->layout->view('consultation/ficheConsultation');
		}
		else{

			$resInsert = $this->Consultation_model->updateDossier($data);

			if ( empty($resInsert) ){

				$resSelect = $this->Consultation_model->selectAllLines($this->session->userdata('numerodossier'));

				// Implémenter le code pour ressortir toutes les lignes dans le tableau de bord
				// Css pour agrémenter le bouton succes et le texte qui va avec.
				// $array = array (
				// 		'nom' => $this->session->userdata('nom'),
				// 		'prenom' => $this->session->userdata('prenom'),
				// 		'civilite' => $this->session->userdata('civilite'),
				// 		'datenaissance' => $this->session->userdata('datenaissance'),
				// 		);
				$i = 0;

				foreach ($resSelect as $key) {
					
					$data['row'][$i] = $resSelect[$i];
					$i++; 
				}

				$this->layout->view('consultation/consultation_success',$data);
			}
			else{
				echo 'Erreur a l\'enregistrement';
			}
		}
	}*/

	public function enregistrerConsultation($index){

		$data = array( 
			'id'   => $index,
			'symp' => $this->input->post('symptome'),
			'obs'  => $this->input->post('observation'),
			'com'  => $this->input->post('commentaire')
			);

		$config = array(
					array(
						'field' => 'symptome',
						'label' => '',
						'rules' => 'trim|callback_check_field|xss_clean'
					),
					array(
						'field' => 'observation',
						'label' => '',
						'rules' => 'trim|callback_check_field|xss_clean'
					),
					array(
						'field' => 'commentaire',
						'label' => '',
						'rules' => 'trim|callback_check_field|xss_clean'
					)
				  );

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		if ( $this->form_validation->run() == false ){

			$data = array('index' => $index);

			$this->layout->view('consultation/ficheConsultation',$data);
		}
		else{

			$resInsert = $this->Consultation_model->updateDossier($data);

			if ( empty($resInsert) ){

				$resSelect = $this->Consultation_model->selectAllLines($index);

				$i = 0;

				foreach ($resSelect as $key) {
					
					$data['row'][$i] = $resSelect[$i];
					$i++; 
				}

				//print_r($data);

				$this->layout->view('consultation/consultation_success',$data);
			}
		}
	}

	public function consulter($index){

		$data = array( 'index' => $index );

		$this->layout->view('consultation/ficheConsultation',$data);
	}

	public function check_numdossier($str){

		if ( empty($str) ){

			$this->form_validation->set_message('check_field','Veuillez renseigner le numéro de dossier pour effectuer la recherche.');

			return false;
		}
	}

	public function check_field($str){

		if ( empty($str) && $this->count == 0){

			//$this->form_validation->set_message('check_field','Veuillez renseigner les champs pour effectuer la recherche.');

			$this->form_validation->set_message('check_field','Veuillez renseigner les champs.');

			$this->count++;

			return false;
		}
	}

}

?>