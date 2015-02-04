<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RendezVous extends CI_Controller{

	protected $count = 0;

	public function __construct(){

		parent::__construct();

		$this->sess_user();

		$this->load->helper('assets');
		$this->load->library('layout');

		$this->load->library('errors'); //TODO: Class à développer pour rendre les variables portables dans les vues;

		$this->layout->getId($this->session->userdata('nom'));

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		$this->layout->ajouter_css('layout');

		$this->load->model('RendezVous_model');


	}

	public function sess_user(){

		if ( ! $this->session->userdata('nom') ) {

			redirect();
		}
	}
	
	public function planning(){

		$this->layout->view('rdv/planning');
	}

	public function nouveauRDV(){

		$result = $this->RendezVous_model->getAllDossier();

		$i = 0;

		foreach ($result as $value) {
			
			$data['row'][$i] = $value;

			$i++;
		}

		$this->layout->view('rdv/plannifier',$data);

	}


	public function ouvrirDossier($index){

		$this->session->set_userdata('indice',$index);

		$res = $this->RendezVous_model->getData($index);

		$res[0]->error = '';

		$this->layout->view('rdv/rdvForm',$res[0]);

	}

	public function saveRDV($index){

		$res = $this->RendezVous_model->getData($index);

		$d = $this->input->post('date');
		$h = $this->input->post('heure');
		$m = $this->input->post('minute');

		$isCorrect = $this->checkFormatHeure($h,$m);

		$config = array(
					array(
						'field' => 'date',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					),
					array(
						'field' => 'heure',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					),
					array(
						'field' => 'minute',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					)
				  );

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<p class="error">','</p>');


		if ( $this->form_validation->run() == false ){

			$res[0]->error = validation_errors();

			$this->layout->view('rdv/rdvForm',$res[0]);

		}else{

			if ( !is_numeric($h) || !is_numeric($m)){

				$res[0]->error = "Veuillez entrer une heure correcte";

				$this->layout->view('rdv/rdvForm',$res[0]);
			}
			elseif ($isCorrect) {
				echo 'heure correcte';
			}
			else{
				echo 'heure incorrecte';
			}

		}

	}

	public function checkFormatHeure($heure,$minute){

		if (($heure >= 8 && $heure <= 18) && ($minute >= 0 && $minute <= 59 )){

			//$string = 'Plage horaire de travail dépassée';

			return true;
		}	

	}

	public function check_required($str){

		if ( empty($str) && $this->count == 0 ){

			$this->form_validation->set_message('check_required','les champs contenant un (*) sont obligatoires.');

			$this->count++;

			return false;
		}
	}
}

?>