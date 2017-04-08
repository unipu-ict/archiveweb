<!-- Predavatelji - model - 11.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Predavatelji_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
		$this->name=isset($this->session->get_userdata()['user_details'][0]->name)?$this->session->get_userdata()['user_details'][0]->name:'';
	}

	/**
	* Dobivanje podataka po id-u za add_update
	* @param : $id je vrijednost predavatelji_id
	*/
	public function Get_data_id($id=''){
		$this->db->select('*');
		$this->db->from('predavatelji');
		$this->db->where('predavatelji_id',$id);
		$query=$this->db->get();
		return $result=$query->row();
	}

	/**
	* Dobivanje podataka po id-u za view
	* @param : $id je vrijednost predavatelji_id
	*/
	public function Get_data_id2($id='') {
		$this->db->select('predavatelji.*,mjesta.postanski_broj,mjesta.mjesto');
		$this->db->from('predavatelji');
		$this->db->where('predavatelji_id', $id);
		$this->db->join('mjesta','mjesta.mjesta_id=predavatelji.mjesto');
		$query=$this->db->get();
		return $result=$query->row();
	}

	/**
	* Dobivanje podataka za datatable
	* @param : $con je where uvijet za select
	*/
	public function get_data($con=NULL){
		if(CheckPermission('predavatelji',"own_read") && CheckPermission('predavatelji',"all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`predavatelji`.`user_id`='".$this->user_id."')";
		}
		$sql="SELECT * FROM `predavatelji` INNER JOIN `mjesta` AS `mjesta0` ON (`mjesta0`.`mjesta_id` = `predavatelji`.`mjesto`)";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	/**
	* Brisanje zapisa
	* @param : $id je id koji brišem
	*/
	public function delete_data($id=''){
		$this->db->where('predavatelji_id', $id);
		$this->db->delete('predavatelji');
	}

	/**
	* Unos podataka
	* @param : $table - tablica u koju unosim
	* @param : $data - niz podataka
	*/
	public function insertRow($table, $data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	/**
	* Ažuriranje podataka
	* @param : $table - tablica u kojoj ažuriram
	* @param : $col - ime polja u where
	* @param : $colVal - vrijednost polja u where
	* @param : $data - ažuriran niz
	*/
	public function updateRow($table, $col, $colVal, $data){
		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
	}
}?>
