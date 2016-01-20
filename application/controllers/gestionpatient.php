<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GestionPatient extends CI_Controller{

	protected $count = 0;
	protected $cnt = 0;
	protected $index = 0;

	public $resInsert;

	public function __construct(){

		parent::__construct();

		$this->sess_user();

		$this->load->helper('assets');
		$this->load->library('layout');
		$this->load->library('pagination');

		$this->load->library('errors'); //TODO: Class à développer pour rendre les variables portables dans les vues;

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="error pForm">','</p>');

		$this->layout->ajouter_css('layout');

		$this->layout->getId($this->session->userdata('nom'));

		$this->load->model('Gestionpatient_model');

		$this->load->library('javascript', array('js_library_driver' => 'jquery', 'autoload' => FALSE));

		set_error_handler( function($errno, $errstr, $errfile, $errline) {
      
	      if (strpos($errstr, 'Undefined offset') !== false) {

	        throw new ErrorException($errstr, 0);
	      }

	      return true;  // Récupération des exceptions de type -- undefined offset
	    });

		
	}

	public function sess_user(){

		if ( ! $this->session->userdata('nom') ) {

			//redirect('Idenfication/index','refresh');
			redirect();
		}
	}

	public function acceuil(){

		$this->layout->view('patient/gestionpatient');

	}

	public function liste(){

		if ( isset($_GET['query']) ) {

			$q = htmlentities($_GET['query']);

			$res = $this->Gestionpatient_model->getDataForLoad($q);

			foreach ($res as $key => $value) {

	        	$d = mb_strtoupper($value->nom).' '.ucwords($value->prenom).' - '.$value->numerodossier;

	        	$suggestions['suggestions'][] = $d;	
       		 }

       		 echo json_encode($suggestions);
		}
	}

	public function rechercherDossier(){

		//$numdossier = $this->input->post('numerodossier');

		$nom = $this->input->post('nom');

		$nom = explode(" - ",$nom); /* on split la chaîne de caractère */

		$config = array(
					/*array(
						'field' => 'numerodossier',
						'label' => '',
						'rules' => 'trim|callback_check_numdossier|xss_clean'
					),*/
					array(
						'field' => 'nom',
						'label' => '',
						'rules' => 'trim|callback_check_numdossier|xss_clean'
						)
				  );

		$this->form_validation->set_rules($config);

		$this->form_validation->set_error_delimiters('<p class="error">','</p>');

		if ( $this->form_validation->run() == false ){

			$this->layout->view('patient/gestionpatient');

		}
		else {

			try{

				$numdossier = $nom[1];

				//$result = $this->Gestionpatient_model->findDossier($numdossier);

				$result = $this->Gestionpatient_model->findDossier($numdossier);		

				if ( empty($result) ){

					$err = array('erreur' => DIR_NOT_FOUND);

					//$this->layout->view('patient/rechercher_dossier_error',$err);
					$this->layout->view('patient/gestionpatient',$err);

				}
				else{

					$i = 0;

					$resBoard = $this->Gestionpatient_model->getDataBoard($numdossier);

					foreach ($resBoard as $key) {
						
						$data[$i] = $resBoard[$i];
						$i++; 
					}

					$array = array(
						'header' => $result[0],
						'board'  => $data
						);

					$this->layout->view('patient/consulter_dossier',$array);

				}

			}
			catch (ErrorException $exception) {

				$err = array('erreur' => DIR_NOT_FOUND);

				$this->layout->view('patient/gestionpatient',$err);
			}	
		}
	}

	public function modifierDossierIndex($index){

		$result = $this->Gestionpatient_model->findDossier($index);

		$this->layout->view('patient/consulter_dossier_modifier',$result[0]);
	}

	public function modifierDossier(){

		/*if ( $index == 0 ){

			$result = $this->Gestionpatient_model->findDossier($index);

			$this->layout->view('patient/consulter_dossier_modifier',$result[0]);
		}

		else{*/

			//echo $this->layout->view('patient/consulter_dossier_modifier',$index);

			//$this->layout->view('patient/modifierdossier');

			$num = $this->input->post('numerodossier');

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

				$this->layout->view('patient/modifierdossier');

			}
			else {

				$result = $this->Gestionpatient_model->findDossier($num);

				if ( empty($result) ){

					$err = array('erreur' => DIR_NOT_FOUND);

					$this->layout->view('patient/modifier_dossier_error',$err);

				}
				else{

					$this->layout->view('patient/consulter_dossier_modifier',$result[0]);

				}
			}
		//}
	}

	public function pagination(){

		$config['base_url'] = base_url().'GestionPatient/listeDossier/';
 		$config['total_rows'] = $this->db->get('patient')->num_rows();
 		$config['per_page'] = 10;
  		$config['num_links'] = 5;
 		$config['use_page_numbers'] = TRUE;
 		$config['display_pages'] = TRUE;
  		$config['uri_segment'] = 3;
  		 
  	    $this->pagination->initialize($config);

  	    return $config;
	}

	public function listeDossier(){

	 	$cfg = $this->pagination();

	 	if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
		}
		else
		{
			$page = 1;
		}

	 	$res = $this->Gestionpatient_model->getDossier($cfg['per_page'],$page);
		$i = 0;

		foreach ($res as $value) {

			$data['row'][$i] = $value;

			$i++;
		}
		
		$this->layout->view('patient/listedossier',$data);
		
	}

	public function historique(){
		echo 'historique consulation';
	}

	public function dossierModifier(){

		//echo $this->jquery->event('#submit',alert());
		//$num = $this->input->post('numerodossier');

		$alterValue = array('numdossier' => $this->input->post('numdossier'),
							'telephone' => $this->input->post('telephone'),
							'mail' => $this->input->post('email'),
							'adresse' => $this->input->post('adresse'),
							'profession' => $this->input->post('profession'),
							'observation' => $this->input->post('observation')
						);

		//Vérification des valeurs à enregistrer

		$config = array (
					array(
						'field' => 'email',
						'label' => '',
						'rules' => 'valid_email'
					)
				 );
		// Message d'erreur à afficher
		$this->form_validation->set_message('valid_email','veuillez entrer un email valide :: exemple: totoemail@email.fr');
		$this->form_validation->set_rules($config);


		if ( $this->form_validation->run() == false ){

			$result = $this->Gestionpatient_model->findDossier($alterValue['numdossier']);

			$this->layout->view('patient/consulter_dossier_modifier',$result[0]);

		}
		else{
			
			$resUpdate = $this->Gestionpatient_model->updateDossier($alterValue);

			if ( $resUpdate ){
				
				$this->layout->view('patient/modifier_dossier_success',$alterValue);

			}
		}
	}

	public function creerDossier(){

		//$error = array( 'err' => '' );

		//$civilite = $this->loadCivilite();
		//$date = $this->loadDateNaissance();

		//$var = array('c' => $civilite, 'd' => $date, 'error' => '');
		
		//$this->layout->view('patient/creerdossier',$var);

		/* Récupération des données postées */
		$civilite = $this->input->post('civilite') + 1;
		$nom = $this->input->post('nom');
		$prenom = $this->input->post('prenom');

		/* Récupération date naissance */
		$jour = $this->input->post('jours') +1;
		$mois = $this->input->post('mois') +1;
		$annees = $this->input->post('annees') +1;


		$telephone = $this->input->post('telephone');
		$email = $this->input->post('email');
		$adresse = $this->input->post('adresse');
		$profession = $this->input->post('profession');
		$symp = $this->input->post('symptome');
		$obs = $this->input->post('diagnostic');

		/*  Attribution des rules aux champs */
		/** callback_require: rules redefinit pour les champs requis
		 ** gère la multiplication d'affichage de la même erreur */

		$config = array(
					array(
						'field' => 'nom',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					),
					array(
						'field' => 'prenom',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					),
					array(
						'field' => 'telephone',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					),
					array(
						'field' => 'telephone',
						'label' => '',
						'rules' => 'callback_check_length'
					),
					array(
						'field' => 'email',
						'label' => '',
						'rules' => 'valid_email'
					),
					array(
						'field' => 'symptome',
						'label' => '',
						'rules' => 'trim|callback_check_required|xss_clean'
					)
			);

		$this->form_validation->set_message('valid_email', 'veuillez entrer un email valide :: exemple: email@serveur.fr');

		$this->form_validation->set_rules($config);

		/* Fin de la customisation */

		if ( $this->form_validation->run() == false ){

			$civilite = $this->loadCivilite();
			$date = $this->loadDateNaissance();

			$var = array('c' => $civilite, 'd' => $date, 'error' => validation_errors(), 'nom' => $nom, 'prenom' => $prenom, 'tel' => $telephone, 'mail' => $email,
						  'adresse' => $adresse, 'profession' => $profession, 'symptome' => $symp);

			$this->layout->view('patient/creerdossier',$var);

		}
		else{
			// Database matching date;
			$fullDate = $this->Gestionpatient_model->matchDate($jour,$mois,$annees);

			$var = array ('nom' => $nom, 'prenom' => $prenom, 'date_naissance' => $fullDate, 'tel' => $telephone, 'mail' => $email, 'civilite' => $civilite,
						  'adresse' => $adresse, 'profession' => $profession, 'symptome' => $symp, 'observation' => $obs);
			
			$resInsert = $this->Gestionpatient_model->creerDossier($var);

			if ( $resInsert ){
				
				//$this->creerdossier_success();
				redirect('GestionPatient/creerdossier_success');
				//$this->layout->view('GestionPatient/creerdossier_success');
			}
		}
	}

	public function creerdossier_success(){


		$this->layout->view('patient/creerdossier_success');

	}

	public function consulterDossier(){

		$res = $this->Gestionpatient_model->getLastInsertData();

		$this->layout->view('patient/consulter_dossier',$res[0]);

	}

	public function consulterDossierModifier($index){

		$result = $this->Gestionpatient_model->findDossier($index);

		$resBoard = $this->Gestionpatient_model->getDataBoard($index);

		$i = 0;

		foreach ($resBoard as $key) {
			
			$data[$i] = $resBoard[$i];
			$i++; 
		}

		$array = array(
			'header' => $result[0],
			'board'  => $data
			);

		$this->layout->view('patient/consulter_dossier',$array);

		//$this->layout->view('patient/consulter_dossier',$res[0]);

	}

	public function consulterDossierCree(){

		$res = $this->Gestionpatient_model->getLastInsertData();

		$index = $res[0]->numerodossier;

		$this->consulterDossierModifier($index);

	}

	public function loadCivilite(){

		$civilite = $this->Gestionpatient_model->getCivilite();

		$i = 0;
	
		if ( !empty($civilite) ){

			foreach ($civilite as $index => $value) {

				$data['row'][$i] = array('libelle' => $civilite[$i]->libelle );

				$i++;

			}

			return $data;
		}
	}

	public function loadDateNaissance(){

		$i = 0;

		$jours = $this->Gestionpatient_model->getJours();
		$month = $this->Gestionpatient_model->getMois();
		$year = $this->Gestionpatient_model->getAnnees();

		/* Chargement de la liste de jours */

		foreach ($jours as $index) {

			$j[$i] = array('jours' => $jours[$i]->jours); 

			$i++;	
		}
		/* Fin chargement */

		$i = 0;

		/* Chargement de la liste de mois */

		foreach ($month as $index => $value) {
			
			$m[$i] = array('mois' => $month[$i]->mois);

			$i++;
		}
		/* Fin chargement */

		$i = 0;

		/* Chargement de la liste des années */

		foreach ($year as $index => $value) {
			
			$a[$i] = array('annee' => $year[$i]->annee);
			$i++;
		}
		/* Fin chargement */

		$date = array('array_jours' => $j, 'array_mois' => $m, 'array_annees' => $a);

		return $date;
	}

	public function check_required($str){

		if ( empty($str) && $this->count == 0 ){

			$this->form_validation->set_message('check_required','Les champs contenant un (*) sont obligatoires.');

			$this->count++;

			return false;
		}
	}

	public function check_field($str){

		if ( empty($str) && $this->cnt == 0 ){

			$this->form_validation->set_message('check_field','Veuillez remplir les champs pour effectuer la recherche.');

			$this->cnt++;

			return false;
		}
	}

	public function check_numdossier($str){

		if ( empty($str) ){

			$this->form_validation->set_message('check_numdossier','Veuillez renseigner le numéro de dossier pour effectuer la recherche.');

			return false;
		}
	}


	public function check_numeric($str){


		if ( ! is_numeric($str) ){

			$this->form_validation->set_message('check_numeric','le numéro de téléphone doit être une valeur numérique');

			return false;
		}
	}

	public function check_length($str){

		$length = strlen($str);

		if ( ($length < LENGTH_MIN || $length > LENGTH_MAX) && !empty($str)){

			$this->form_validation->set_message('check_length','le numéro de téléphone doit comporter 9 caractères');

			return false;

		}
	}
}

?>