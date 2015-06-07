<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionpers_model extends CI_Model{

	protected $table = 'employe';
	protected $tableU = 'utilisateur';

	public function getPersByLogin($login){
		
		return $this->db->select('*')
						->from($this->tableU)
						->where('login',$login)
						->get()
						->result();

	}

	public function getAllPers(){

		return $this->db->order_by('nom','ASC')
						->get($this->tableU)
						->result();

	}

	public function getNumRows(){

		return $this->db->count_all($this->tableU);
	}
}