<!-- Prijavnice_fond - model - 29.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Prijavnice_fond_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		 $this->db->select('prijavnice_fond.*, prijavnice.rb_prijave, opci_inventar.signatura, opci_inventar.naziv');
		 $this->db->from('prijavnice_fond');
		 $this->db->where('prijavnice_fond_id', $id);
		 $this->db->join('prijavnice','prijavnice_fond.id_prijave = prijavnice.prijavnice_id','left');
		 $this->db->join('opci_inventar','prijavnice_fond.signatura_fonda = opci_inventar.opci_inventar_id','left');
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('prijavnice_fond', "own_read") && CheckPermission('prijavnice_fond', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`prijavnice_fond`.`user_id` = '".$this->user_id."')";

		}
		$sql="SELECT * FROM `prijavnice_fond`
		LEFT JOIN `prijavnice` ON (`prijavnice_fond`.`id_prijave` = `prijavnice`.`prijavnice_id`)
		LEFT JOIN `opci_inventar` ON (`prijavnice_fond`.`signatura_fonda` = `opci_inventar`.`opci_inventar_id`)
		ORDER BY `prijavnice`.`rb_prijave`, `prijavnice_fond`.`signatura_fonda`
		";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('prijavnice_fond_id', $id);
		$this->db->delete('prijavnice_fond');
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
