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

		$res = $this->RendezVous_model->getallRDV();

		if ( !empty($res) ){
			$i = 0;

			foreach ($res as $key => $value) {
				
				$data['row'][$i] = $value;
				$i++;
			}

			$this->layout->view('rdv/planning',$data);
		}
		else{

			$data['row'] = array();

			$this->layout->view('rdv/planning',$data);

		}
	}

	public function nouveauRDV(){

		$result = $this->RendezVous_model->getAllDossier();

		if ( !empty($result) ){

			$i = 0;

			foreach ($result as $value) {
				
				$data['row'][$i] = $value;

				$i++;
			}

			$this->layout->view('rdv/plannifier',$data);
		}
		else{

			$data['row'] = array();

			$this->layout->view('rdv/plannifier',$data);
		}	
	}

	public function modifierRDV(){

		//$this->layout->view('rdv/modifier');

		$res = $this->RendezVous_model->getallRDV();

		if ( !empty($res) ){
			$i = 0;

			foreach ($res as $key => $value) {
				
				$data['row'][$i] = $value;
				$i++;
			}

			$this->layout->view('rdv/modifier',$data);
		}
		else{

			$data['row'] = array();

			$this->layout->view('rdv/modifier',$data);

		}
	}

	public function modifier($numDossier){

		$heure = $this->loadHeure();
		$minute = $this->loadMinute();

		$res = $this->RendezVous_model->getData($numDossier);

		$res[0]->error = '';

		$res[0]->heure = $heure;

		$res[0]->minute = $minute;

		$this->layout->view('rdv/modifierRDVForm',$res[0]);

	}

	public function ouvrirDossier($index){

		$heure = $this->loadHeure();
		$minute = $this->loadMinute();

		$this->session->set_userdata('indice',$index);

		$res = $this->RendezVous_model->getData($index);

		$res[0]->error = '';

		$res[0]->heure = $heure;

		$res[0]->minute = $minute;

		$this->layout->view('rdv/rdvForm',$res[0]);

	}

	public function saveRDV($index){

		$res = $this->RendezVous_model->getData($index);


		$heure = $this->loadHeure();
		$minute = $this->loadMinute();

		$res[0]->heure = $heure;
		$res[0]->minute = $minute;

		$d = $this->input->post('date');
		$h = $this->input->post('heure');
		$m = $this->input->post('minute');

		$isCorrect = $this->checkFormatHeure($h,$m);

		$config = array(
					array(
						'field' => 'date',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					)
				  );

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<p class="error">','</p>');


		if ( $this->form_validation->run() == false ){

			$res[0]->error = validation_errors();

			$this->layout->view('rdv/rdvForm',$res[0]);

		}
		else{

			$resH = $this->RendezVous_model->matchHeure($h);
			$resM = $this->RendezVous_model->matchMinute($m+1);

			/* Après reformattage date / Heure, on insère en base */

			$indb = $this->RendezVous_model->insertRdv($d,$resH[0]->heure,$resM[0]->minutes,$index);

			if ( $indb ){

				$this->planning();
			}
		}

	}

	public function alterRDV($numDossier){

		$res = $this->RendezVous_model->getData($numDossier);


		$heure = $this->loadHeure();
		$minute = $this->loadMinute();

		$res[0]->heure = $heure;
		$res[0]->minute = $minute;

		$d = $this->input->post('date');
		$h = $this->input->post('heure');
		$m = $this->input->post('minute');

		$isCorrect = $this->checkFormatHeure($h,$m);

		$config = array(
					array(
						'field' => 'date',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					)
				  );

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<p class="error">','</p>');


		if ( $this->form_validation->run() == false ){

			$res[0]->error = validation_errors();

			$this->layout->view('rdv/modifierRDVForm',$res[0]);

		}
		else{

			$resH = $this->RendezVous_model->matchHeure($h);
			$resM = $this->RendezVous_model->matchMinute($m+1);

			/* Après reformattage date / Heure, on insère en base */

			$indb = $this->RendezVous_model->updateRDV($d,$resH[0]->heure,$resM[0]->minutes,$numDossier);

			if ( $indb ){

				$this->planning();
			}
		}

	}

	public function loadHeure(){

		$heure = $this->RendezVous_model->getHeure();

		return $heure;
	}

	public function loadMinute(){

		$minute = $this->RendezVous_model->getMinute();

		return $minute;

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