<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	protected $tableR = 'rdv';
	protected $tableP = 'patient';
	protected $tableE = 'employe';
	protected $tableS = 'statut_rdv';

	public function matchStatut($idStatut){

		return $this->db->select('type')
				->from($this->tableS)
				->where('id',$idStatut)
				->get()
				->result();
	}

	public function matchPatient($idPatient){

		return $this->db->select('nom','prenom','numerodossier')
				->from($this->tableP)
				->where('idPatient',$idPatient)
				->get()
				->result();
	}

	public function matchEmploye($idEmploye){

		return $this->db->select('nom')
				->from($this->tableE)
				->where('idEmploye',$idEmploye)
				->get()
				->result();
	}

	public function matchMonths($idMonths){

		return $this->db->select('mois')
				->from($this->tableM)
				->where('id',$idMonths)
				->get()
				->result();

	}
}