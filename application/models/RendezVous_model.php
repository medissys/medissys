<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RendezVous_model extends CI_Model{

	protected $tableP = 'patient';
	
	public function getAllDossier(){

		return $this->db->select('*')
						->from($this->tableP)
						->where('numerodossier !=','')
						->where('nom !=','')
						->get()
						->result();
	}

	public function getData($numDossier){

		return $this->db->select('idPatient,idEmploye,numerodossier,nom,prenom,telephone')
						->from($this->tableP)
						->where('numerodossier',$numDossier)
						->where('nom !=','')
						->get()
						->result();
	}
}