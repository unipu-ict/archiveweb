<!-- Zahtjevnice_fond - model - 29.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Zahtjevnice_fond_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		 $this->db->select('zahtjevnice_fond.*, zahtjevnice.rb_zahtjeva, opci_inventar.signatura, opci_inventar.naziv');
		 $this->db->from('zahtjevnice_fond');
		 $this->db->where('zahtjevnice_fond_id', $id);
		 $this->db->join('zahtjevnice','zahtjevnice_fond.id_zahtjeva = zahtjevnice.zahtjevnice_id','left');
		 $this->db->join('opci_inventar','zahtjevnice_fond.signatura_fonda = opci_inventar.opci_inventar_id','left');
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('zahtjevnice_fond', "own_read") && CheckPermission('zahtjevnice_fond', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`zahtjevnice_fond`.`user_id` = '".$this->user_id."')";
		}
		$sql="SELECT * FROM `zahtjevnice_fond`
		LEFT JOIN `zahtjevnice` ON (`zahtjevnice_fond`.`id_zahtjeva` = `zahtjevnice`.`zahtjevnice_id`)
		LEFT JOIN `opci_inventar` ON (`zahtjevnice_fond`.`signatura_fonda` = `opci_inventar`.`opci_inventar_id`)
		ORDER BY `zahtjevnice`.`rb_zahtjeva`, `zahtjevnice_fond`.`signatura_fonda`
		";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function delete_data($id='') {
		$this->db->where('zahtjevnice_fond_id', $id);
		$this->db->delete('zahtjevnice_fond');
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
