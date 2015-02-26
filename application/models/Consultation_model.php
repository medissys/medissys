<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultation_model extends CI_Model{

	protected $tableP = 'patient';
	protected $tableC = 'consultation';

	/*public function updateDossier($array = array()){

		$date = getdate();
		$day = $date['mday'];
		$month = $date['mon'];
		$year = $date['year'];
		$hour = $date['hours'];
		$minute = $date['minutes'];
		$seconds = $date['seconds'];

		$var = array('numerodossier'  => $array['id'],
					 'symptome' => $array['symp'],
					 'observation' => $array['obs'],
					 'commentaires' => $array['com'],
					 'datecreation'  => $year.'/'.$month.'/'.$day.' '.$hour.':'.$minute.':'.$seconds
				);

		$this->db->insert($this->tableP,$var);
			
	}*/

	public function updateDossier($array = array()){

		$date = getdate();
		$day = $date['mday'];
		$month = $date['mon'];
		$year = $date['year'];
		$hour = $date['hours'];
		$minute = $date['minutes'];
		$seconds = $date['seconds'];

		$var = array('numerodossier'  => $array['id'],
					 'symptomes' => $array['symp'],
					 'observations' => $array['obs'],
					 'commentaires' => $array['com'],
					 'dateconsultation'  => $year.'/'.$month.'/'.$day.' '.$hour.':'.$minute.':'.$seconds
				);

		$this->db->insert($this->tableC,$var);
			
	}

	public function selectAllLines($id){

		return $this->db->select('dateconsultation,symptomes,observations,commentaires')
						->from($this->tableC)
						->where('numerodossier',$id)
						//->where('dateconsultation !=', NULL)
						->get()
						->result();
	}

	/*public function selectAllLines($id){

		return $this->db->select('datecreation,symptome,observation,commentaires')
						->from($this->tableP)
						->where('numerodossier',$id)
						->get()
						->result();
	}*/
}