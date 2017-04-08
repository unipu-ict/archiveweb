<!-- Evidencija korisnika - model - 17.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Evidencija_korisnika_model extends CI_Model {
	function __construct(){
    parent::__construct();
    $this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		$this->db->select('evidencija_korisnika.*,g.postanski_broj, g.mjesto AS mjesto_sta, r.mjesto AS mjesto_pri, p.mjesto AS mjesto_rod');
		$this->db->from('evidencija_korisnika');
		$this->db->where('evidencija_korisnika_id', $id);
		$this->db->join('mjesta g','g.mjesta_id = evidencija_korisnika.mjesto_stalno','left');
		$this->db->join('mjesta r','r.mjesta_id = evidencija_korisnika.mjesto_privremeno','left');
		$this->db->join('mjesta p','p.mjesta_id = evidencija_korisnika.mjesto_rodenja','left');
		$query=$this->db->get();
		return $result=$query->row();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('evidencija_korisnika', "own_read") && CheckPermission('evidencija_korisnika', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`evidencija_korisnika`.`user_id` = '".$this->user_id."') ";
		}
		$sql="SELECT evidencija_korisnika.*,`g`.`postanski_broj`, `g`.`mjesto` AS `mjesto_sta`, `r`.`mjesto` AS `mjesto_pri`, `p`.`mjesto` AS `mjesto_rod`
		FROM `evidencija_korisnika`
		LEFT JOIN `mjesta` `g` ON (`g`.`mjesta_id` = `evidencija_korisnika`.`mjesto_stalno`)
		LEFT JOIN `mjesta` `r` ON (`r`.`mjesta_id` = `evidencija_korisnika`.`mjesto_privremeno`)
		LEFT JOIN `mjesta` `p` ON (`p`.`mjesta_id` = `evidencija_korisnika`.`mjesto_rodenja`)";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function charts_data1(){
		$query2=$this->db->query("SELECT COUNT(rb_upisa) AS total FROM evidencija_korisnika");
		return $query2->result();
	}

	public function charts_data2(){
		$query3=$this->db->query("SELECT COUNT(DISTINCT(prezime_i_ime)) AS total,(SELECT year(datum_posjeta)) AS godina FROM dnevnik_citaonice GROUP BY godina");
		return $query3->result();
	}

	public function charts_data3(){
		$query4=$this->db->query("SELECT
			mjesta.drzava AS drzava,
			COUNT(DISTINCT dnevnik_citaonice.prezime_i_ime) AS total
			FROM dnevnik_citaonice
			INNER JOIN evidencija_korisnika ON evidencija_korisnika.evidencija_korisnika_id = dnevnik_citaonice.prezime_i_ime
			INNER JOIN mjesta ON mjesta.mjesta_id = evidencija_korisnika.mjesto_stalno
			GROUP BY drzava");
		return $query4->result();
	}

	public function charts_data4(){
		$query5=$this->db->query("SELECT COUNT(prezime_i_ime) AS total,(SELECT year(datum_posjeta)) AS godina FROM dnevnik_citaonice GROUP BY godina");
		return $query5->result();
	}

	public function delete_data($id='') {
		$this->db->where('evidencija_korisnika_id', $id);
    	$this->db->delete('evidencija_korisnika');
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
