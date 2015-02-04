<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultation_model extends CI_Model{

	protected $tableP = 'patient';

	public function updateDossier($array = array()){

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
			
	}

	public function selectAllLines($id){

		return $this->db->select('datecreation,symptome,observation,commentaires')
						->from($this->tableP)
						->where('numerodossier',$id)
						->get()
						->result();
	}
}