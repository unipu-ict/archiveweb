<!-- Stvaratelji - model - 13.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Stvaratelji_model extends CI_Model {
	function __construct(){
    parent::__construct();
    $this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
		$this->name=isset($this->session->get_userdata()['user_details'][0]->name)?$this->session->get_userdata()['user_details'][0]->name:'';
	}

	public function Get_data_id($id='') {
		$this->db->select('*');
		$this->db->from('stvaratelji');
		$this->db->where('stvaratelji_id', $id);
		$query=$this->db->get();
		return $result=$query->row();
	}

	public function Get_data_id2($id='') {
		$this->db->select('stvaratelji.*,mjesta.mjesto');
		$this->db->from('stvaratelji');
		$this->db->where('stvaratelji_id', $id);
		$this->db->join('mjesta','mjesta.mjesta_id=stvaratelji.mjesto');
		$query=$this->db->get();
		return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('stvaratelji', "own_read") && CheckPermission('stvaratelji', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`stvaratelji`.`user_id`='".$this->user_id."') ";
		}
		$sql="SELECT * FROM `stvaratelji` INNER JOIN `mjesta` AS `mjesta0` ON (`mjesta0`.`mjesta_id` = `stvaratelji`.`mjesto`)";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('stvaratelji_id', $id);
		$this->db->delete('stvaratelji');
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
