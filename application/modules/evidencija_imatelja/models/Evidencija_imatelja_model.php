<!-- Evidencija imatelja - model - 17.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Evidencija_imatelja_model extends CI_Model {
	function __construct(){
    parent::__construct();
    $this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		 $this->db->select('*');
		 $this->db->from('evidencija_imatelja');
		 $this->db->where('evidencija_imatelja_id' , $id);
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function Get_data_id2($id='') {
		$this->db->select('evidencija_imatelja.*,mjesta.mjesto');
		$this->db->from('evidencija_imatelja');
		$this->db->where('evidencija_imatelja_id', $id);
		$this->db->join('mjesta','mjesta.mjesta_id = evidencija_imatelja.sjediste');
		$query = $this->db->get();
		return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('evidencija_imatelja', "own_read") && CheckPermission('evidencija_imatelja', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`evidencija_imatelja`.`user_id` = '".$this->user_id."')";
		}
		$sql="SELECT * FROM `evidencija_imatelja` INNER JOIN `mjesta` ON (`mjesta`.`mjesta_id` = `evidencija_imatelja`.`sjediste`)";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('evidencija_imatelja_id', $id);
		$this->db->delete('evidencija_imatelja');
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
