<!-- Evidencija stvaratelja - model - 17.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Evidencija_stvaratelja_model extends CI_Model {
	function __construct(){
		parent::__construct();
    $this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		$this->db->select('*');
		$this->db->from('evidencija_stvaratelja');
		$this->db->where('evidencija_stvaratelja_id', $id);
		$query=$this->db->get();
		return $result=$query->row();
	}

	public function Get_data_id2($id='') {
		$this->db->select('evidencija_stvaratelja.*,mjesta.mjesto');
		$this->db->from('evidencija_stvaratelja');
		$this->db->where('evidencija_stvaratelja_id', $id);
		$this->db->join('mjesta','mjesta.mjesta_id = evidencija_stvaratelja.sjediste');
		$query=$this->db->get();
		return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('evidencija_stvaratelja', "own_read") && CheckPermission('evidencija_stvaratelja', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`evidencija_stvaratelja`.`user_id` = '".$this->user_id."') ";
		}
		$sql="SELECT * FROM `evidencija_stvaratelja` INNER JOIN `mjesta` ON (`mjesta`.`mjesta_id` = `evidencija_stvaratelja`.`sjediste`)";
		if($con!='') {
			$sql.= 'WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('evidencija_stvaratelja_id', $id);
		$this->db->delete('evidencija_stvaratelja');
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
