<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RendezVous_model extends CI_Model{

	protected $tableP = 'patient';
	protected $tableH = 'heures';
	protected $tableM = 'minutes';
	protected $tableR = 'rdv';
	protected $tableS = 'statut_rdv';


	public function getAllDossier($limit,$page){

		return $this->db->select('*')
						->from($this->tableP)
						->where('numerodossier !=','')
						->where('nom !=','')
						->order_by('nom','asc')
						->limit($limit,($page-1)*$limit)
						->get()
						->result();
	}

	public function getallRDV($limit,$page){

		return $this->db->select('r.num_dossier,r.date,r.heure,p.nom,p.prenom,s.type')
						->from($this->tableR.' r')
						->join($this->tableP.' p', 'p.numerodossier = r.num_dossier')
						->join($this->tableS.' s', 'r.idStatut = s.id')
						->order_by('r.date','asc')
						->limit($limit,($page-1)*$limit)
						//->where('r.date >=', date('Y-m-d')) /* On récupère les dates de rdv >= àla date du jour */
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

	public function getHeure(){

		return $this->db->select('heure')
						->from($this->tableH)
						->get()
						->result();

	}

	public function getMinute(){

		return $this->db->select('minutes')
						->from($this->tableM)
						->get()
						->result();
	}

	public function matchHeure($idH){

		return $this->db->select('heure')
						->from($this->tableH)
						->where('id',$idH)
						->get()
						->result();

	}

	public function matchMinute($idM){

		return $this->db->select('minutes')
						->from($this->tableM)
						->where('id',$idM)
						->get() 
						->result();
	}

	public function insertRdv($date,$h,$m,$ind){

		$data = array('date' => date_format(date_create($date),"Y-m-d"),
					  'heure' => $h.':'.$m,
					  'num_dossier' => $ind,
					  'idStatut' => 1
					);

		return $this->db->insert($this->tableR,$data);
	}

	public function updateRDV($date,$h,$m,$ind){

		$data = array('date' => date_format(date_create($date),"Y-m-d"),
					  'heure' => $h.':'.$m,
					  'num_dossier' => $ind,
					  'idStatut' => 1
					);

		$this->db->where('num_dossier',$ind);
		return $this->db->update($this->tableR,$data);

	}
}