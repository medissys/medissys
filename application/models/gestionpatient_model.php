<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionpatient_model extends CI_Model{

	protected $table = 'civilite';
	protected $tableP = 'patient';
	protected $tableJ = 'jours';
	protected $tableM = 'mois';
	protected $tableA = 'annee';
	protected $tableC = 'consultation';

	public function getCivilite(){
		
		return $this->db->get($this->table)
						->result();

	}

	public function getJours(){

		return $this->db->get($this->tableJ)
					    ->result();
	}

	public function getMois(){

		return $this->db->get($this->tableM)
					    ->result();
	}

	public function getAnnees(){

		return $this->db->get($this->tableA)
					    ->result();
	}

	public function creerDossier($array){

		//$numerodossier = $this->genererNumeroDossier($array['nom'],$array['prenom']);
		$numerodossier = $this->genererNumeroDossier();
		$date = getdate();
		$day = $date['mday'];
		$month = $date['mon'];
		$year = $date['year'];
		$hour = $date['hours'];
		$minute = $date['minutes'];
		$seconds = $date['seconds'];

		$datecreation = $year.'/'.$month.'/'.$day.' '.$hour.':'.$minute.':'.$seconds;

		$data = array(
					'idCivilite'    => $array['civilite'],
					'numerodossier' => $numerodossier,					
					'nom'           => $array['nom'],
					'prenom'        => $array['prenom'],
					'telephone'     => $array['tel'],
					'email'	        => $array['mail'],
					'adresse'       => $array['adresse'],
					'profession'    => $array['profession'],
					//'symptome'      => $array['symptome'],
					//'observation'   => $array['observation'],				
					'datenaissance' => $array['date_naissance'],
					//'datecreation'  => $year.'/'.$month.'/'.$day.' '.$hour.':'.$minute.':'.$seconds
					'datecreation'  => $datecreation
				);

		$rInsert = $this->db->insert($this->tableP,$data);

		if ( $rInsert ){

			$rUpdate = $this->updateConsultation($numerodossier,$datecreation,$array['symptome'],$array['observation']);
		}

		return $rUpdate;
		//return $this->db->insert($this->tableP,$data);
	}

	public function updateConsultation($num,$datec,$symp,$obs){

		$data = array('numerodossier' => $num,'dateconsultation' => $datec, 'symptomes' => $symp, 'observations' => $obs);

		return $this->db->insert($this->tableC,$data);

	}

	/*public function genererNumeroDossier($nom,$prenom){

		$codePrenom = substr($prenom,0,2);
		$codeNom = substr($nom,0,2);
		$dateC = getdate();

		return strtoupper($codePrenom).''.$dateC[0].''.strtoupper($codeNom);
	}*/

	public function genererNumeroDossier(){

		$baseNumero = $this->db->select_max('numerodossier')
		 						->from($this->tableP)
		 						->get()
		 						->result();

		 if ( empty($baseNumero[0]->numerodossier) ){

		 	$numerodossier = INITIALIZE_NUMERO_DOSSIER;

		 }
		 else{

		 	$numerodossier = $baseNumero[0]->numerodossier + 1;
		 }

		 return $numerodossier;
	}

	protected function matchMonths($idMonths){

		return $this->db->select('mois')
				->from($this->tableM)
				->where('id',$idMonths)
				->get()
				->result();

	}

	protected function matchYears($idYear){

		return $this->db->select('annee')
				->from($this->tableA)
				->where('id',$idYear)
				->get()
				->result();

	}

	public function matchDate($idJours, $idMonths, $idYear){

		 $res_match_year = $this->matchYears($idYear);


		 if ( !empty($res_match_year) ){

		 	return $res_match_year[0]->annee.'-'.$idMonths.'-'.$idJours; //Modifié le 16/11/2014 à 02:55
		 }
		 else{

		 	$err_string = 'Une erreur est survenue pendant l\'enregistrement, Le dossier n\'a pas été crée';
		 	
		 	return $err_string;
		 }
	
	}

	public function getLastInsertData(){

		$idMax =  $this->db->select_max('idPatient')
						->from($this->tableP)
						->get()
						->result();

		return $this->db->select('*')
						->from($this->tableP)
						->where('idPatient',$idMax[0]->idPatient)
						->get()
						->result();
	}

	public function findDossier($numDossier){

		return $this->db->select('*')
						->from($this->tableP)
						->where('numerodossier',$numDossier)
						->where('nom !=','')
						->get()
						->result();
	}

	/*public function findDossier($nom){

		return $this->db->select('*')
						->from($this->tableP)
						->where('nom',$nom)
						->where('nom !=','')
						->get()
						->result();
	}*/

	/*public function getDataBoard($numDossier){

		return $this->db->select('*')
						->from($this->tableP)
						->where('numerodossier',$numDossier)
						->get()
						->result();
	}*/

	public function getDataBoard($numDossier){

		return $this->db->select('*')
						->from($this->tableC)
						->where('numerodossier',$numDossier)
						->get()
						->result();
	}

	public function updateDossier($array = array()){

		$date = getdate();
		$day = $date['mday'];
		$month = $date['mon'];
		$year = $date['year'];
		$hour = $date['hours'];
		$minute = $date['minutes'];
		$seconds = $date['seconds'];

		$var = array('numerodossier' => $array['numdossier'],
					 'telephone' => $array['telephone'],
					 'email' => $array['mail'],
					 'adresse' => $array['adresse'],
					 'profession' => $array['profession'],
					 'datemodification' => $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':'.$seconds
					 );

		$this->db->where('numerodossier',$var['numerodossier'])
				  ->where('nom !=','');

		return $this->db->update($this->tableP,$var);
			
	}

	public function getDataForLoad($string){

		return $this->db->select('nom,prenom,numerodossier')
        		 ->from($this->tableP)
        		 ->like('nom',$string)
        		 ->get()
        		 ->result();

	}

	public function getDossier(){
		
		return $this->db->select('numerodossier,nom,prenom,telephone,email,profession,adresse,datenaissance,datecreation')
				 ->from($this->tableP)
				 ->get()
				 ->result();
	}
}