<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Setting_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_setting() {
		return $this->db->get('setting')->result();
	}

	/**
	* Dodavanje vrste korisnika
	*/
	public function add_user_type() {
		$rolesName=isset($_REQUEST['rolesName'])?$_REQUEST['rolesName']:'';
		$this->db->where('user_type', $rolesName);
		$result=$this->db->get('permission')->row();
		if(!empty($result)) {
			return 'Navedena vrsta korisnika ('.$result->user_type.') već postoji u aplikaciji, molimo unesite novu.';
		} else {
			return $this->insertRow('permission', array('user_type' => $rolesName));
		}
	}

	/**
	* Unos podataka u tablicu
	* @param : $table - tablica za unos podataka
	* @param : $data - niz podataka
	*/
	public function insertRow($table, $data){
		$this->db->insert($table, $data);
		return  $this->db->insert_id();
	}

	/**
	* Ažuriranje podataka u tablici
	* @param : $table - naziv tablice za ažuriranje
	* @param : $col - polje za where uvjet
	* @param : $colVal - vrijednost polja za where uvjet
	* @param : $data - niz podataka
	*/
	public function updateRow($table, $col, $colVal, $data) {
		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
	}
}?>
