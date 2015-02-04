<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Connexion_model extends CI_Model{

	protected $table = 'employe';

	public function getConnexion($login,$mdp){
		
		return $this->db->select('nom','login','motdepasse')
						->from($this->table)
						->where('login',$login)
						->where('motdepasse',$mdp)
						->get()
						->result();

	}
}