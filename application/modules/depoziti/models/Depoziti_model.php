<!-- Depoziti - model - 15.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Depoziti_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->user_id =isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		$this->db->select('*');
		$this->db->from('depoziti');
		$this->db->where('depoziti_id', $id);
		$query=$this->db->get();
		return $result = $query->row();
	}

	public function Get_data_id2($id='') {
		$this->db->select('depoziti.*, predavatelji.predavatelj, stvaratelji.naziv_stvaratelja, mjesta.postanski_broj, mjesta.mjesto');
		$this->db->from('depoziti');
		$this->db->where('depoziti_id', $id);
		$this->db->join('predavatelji','predavatelji.predavatelji_id = depoziti.predavatelj','left');
		$this->db->join('stvaratelji','stvaratelji.stvaratelji_id = depoziti.stvaratelj','left');
		$this->db->join('mjesta','predavatelji.mjesto = mjesta.mjesta_id','left');
		$query=$this->db->get();
		return $result = $query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('depoziti', "own_read") && CheckPermission('depoziti', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`depoziti`.`user_id` = '".$this->user_id."')";
		}
		$sql="SELECT * FROM `depoziti`
		LEFT JOIN `predavatelji` ON (`predavatelji`.`predavatelji_id` = `depoziti`.`predavatelj`)
		LEFT JOIN `stvaratelji` ON (`stvaratelji`.`stvaratelji_id` = `depoziti`.`stvaratelj`)
		LEFT JOIN `mjesta` ON (`mjesta`.`mjesta_id` = `predavatelji`.`mjesto`)";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('depoziti_id', $id);
		$this->db->delete('depoziti');
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
