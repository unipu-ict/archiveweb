<!-- Akvizicije - model - 13.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Akvizicije_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		$this->db->select('*');
		$this->db->from('akvizicije');
		$this->db->where('akvizicije_id', $id);
		$query=$this->db->get();
		return $result=$query->row();
	}

	public function Get_data_id2($id='') {
		$this->db->select('akvizicije.*, predavatelji.predavatelj, stvaratelji.naziv_stvaratelja, opci_inventar.signatura, opci_inventar.naziv, mjesta.postanski_broj, mjesta.mjesto');
		$this->db->from('akvizicije');
		$this->db->where('akvizicije_id', $id);
		$this->db->join('predavatelji','predavatelji.predavatelji_id = akvizicije.predavatelj','left');
		$this->db->join('stvaratelji','stvaratelji.stvaratelji_id = akvizicije.stvaratelj','left');
		$this->db->join('opci_inventar','opci_inventar.opci_inventar_id = akvizicije.oznaka_fonda','left');
		$this->db->join('mjesta','predavatelji.mjesto = mjesta.mjesta_id','left');
		$query=$this->db->get();
		return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('akvizicije', "own_read") && CheckPermission('akvizicije', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`akvizicije`.`user_id` = '".$this->user_id."') ";
		}
		$sql="SELECT * FROM `akvizicije`
		LEFT JOIN `predavatelji` ON (`predavatelji`.`predavatelji_id` = `akvizicije`.`predavatelj`)
		LEFT JOIN `stvaratelji` ON (`stvaratelji`.`stvaratelji_id` = `akvizicije`.`stvaratelj`)
		LEFT JOIN `opci_inventar` ON (`opci_inventar`.`opci_inventar_id` = `akvizicije`.`oznaka_fonda`)
		LEFT JOIN `mjesta` ON (`mjesta`.`mjesta_id` = `predavatelji`.`mjesto`) ";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('akvizicije_id', $id);
    $this->db->delete('akvizicije');
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
