<!-- Prijavnice - model - 20.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Prijavnice_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		 $this->db->select('*');
		 $this->db->from('prijavnice');
		 $this->db->where('prijavnice_id', $id);
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function Get_data_id2($id='') {
		 $this->db->select('*');
		 $this->db->from('prijavnice');
		 $this->db->where('prijavnice_id', $id);
		 $this->db->join('evidencija_korisnika','evidencija_korisnika.evidencija_korisnika_id = prijavnice.prezime_i_ime','left');
		 $this->db->join('prijavnice_fond','prijavnice_fond.id_prijave = prijavnice.prijavnice_id','left');
		 $this->db->join('opci_inventar','prijavnice_fond.signatura_fonda = opci_inventar.opci_inventar_id','left');
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function Get_data_id3($id='') {
		 $this->db->select('*');
		 $this->db->from('prijavnice');
		 $this->db->where('prijavnice_id', $id);
		 $this->db->join('prijavnice_fond','prijavnice_fond.id_prijave = prijavnice.prijavnice_id','left');
		 $this->db->join('opci_inventar','prijavnice_fond.signatura_fonda = opci_inventar.opci_inventar_id','left');
		 $this->db->order_by('prijavnice_fond.id_prijave', 'ASC');
		 $this->db->order_by('prijavnice_fond.signatura_fonda', 'ASC');
		 $query=$this->db->get();
		 return $result=$query->result();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('prijavnice', "own_read") && CheckPermission('prijavnice', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`prijavnice`.`user_id` = '".$this->user_id."') ";
		}
		$sql="SELECT * FROM `prijavnice`
		LEFT JOIN `evidencija_korisnika` ON (`evidencija_korisnika`.`evidencija_korisnika_id` = `prijavnice`.`prezime_i_ime`)";
		if($con != '') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('prijavnice_id', $id);
		$this->db->delete('prijavnice');
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
