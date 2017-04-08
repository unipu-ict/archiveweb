<!-- Audit_log - model - 01.04.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Audit_log_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		$this->db->select('*');
		$this->db->from('audit_log');
		$this->db->where('audit_log_id' , $id);
		$query=$this->db->get();
		return $result = $query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('audit_log', "own_read") && CheckPermission('audit_log', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`audit_log`.`user_id` = '".$this->user_id."')";
		}
		$sql="SELECT * FROM `audit_log`";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}
}?>
