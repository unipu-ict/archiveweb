<!-- Knjiga dopunskih preslika - model - 16.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Knjiga_dopunskih_preslika_model extends CI_Model {
	function __construct(){
    parent::__construct();
    $this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		 $this->db->select('*');
		 $this->db->from('knjiga_dopunskih_preslika');
		 $this->db->where('knjiga_dopunskih_preslika_id', $id);
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('knjiga_dopunskih_preslika', "own_read") && CheckPermission('knjiga_dopunskih_preslika', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`knjiga_dopunskih_preslika`.`user_id`='".$this->user_id."')";
		}
		$sql="SELECT * FROM `knjiga_dopunskih_preslika`";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('knjiga_dopunskih_preslika_id', $id);
    	$this->db->delete('knjiga_dopunskih_preslika');
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
