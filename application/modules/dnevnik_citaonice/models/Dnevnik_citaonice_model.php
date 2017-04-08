<!-- Dnevnik čitaonice - model - 19.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Dnevnik_citaonice_model extends CI_Model {
	function __construct(){
		parent::__construct();
    $this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		 $this->db->select('*');
		 $this->db->from('dnevnik_citaonice');
		 $this->db->where('dnevnik_citaonice_id', $id);
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function Get_data_id2($id='') {
		$this->db->select('*');
		$this->db->from('dnevnik_citaonice');
		$this->db->where('dnevnik_citaonice_id', $id);
		$this->db->join('evidencija_korisnika','evidencija_korisnika.evidencija_korisnika_id = dnevnik_citaonice.prezime_i_ime','left');
		$query=$this->db->get();
		return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('dnevnik_citaonice', "own_read") && CheckPermission('dnevnik_citaonice', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`dnevnik_citaonice`.`user_id` = '".$this->user_id."')";
		}
		$sql="SELECT * FROM `dnevnik_citaonice` LEFT JOIN `evidencija_korisnika` ON (`evidencija_korisnika`.`evidencija_korisnika_id` = `dnevnik_citaonice`.`prezime_i_ime`)";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('dnevnik_citaonice_id', $id);
		$this->db->delete('dnevnik_citaonice');
	}

	public function insertRow($table, $data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function updateRow($table, $col, $colVal, $data) {
		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
	}
}?>
