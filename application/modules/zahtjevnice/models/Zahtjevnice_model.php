<!-- Zahtjevnice - model - 21.03.2017. -->
<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Zahtjevnice_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	public function Get_data_id($id='') {
		 $this->db->select('*');
		 $this->db->from('zahtjevnice');
		 $this->db->where('zahtjevnice_id', $id);
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function Get_data_id2($id='') {
		 $this->db->select('*');
		 $this->db->from('zahtjevnice');
		 $this->db->where('zahtjevnice_id', $id);
		 $this->db->join('evidencija_korisnika','evidencija_korisnika.evidencija_korisnika_id = zahtjevnice.prezime_i_ime','left');
		 $this->db->join('zahtjevnice_fond','zahtjevnice_fond.id_zahtjeva = zahtjevnice.zahtjevnice_id','left');
		 $query=$this->db->get();
		 return $result=$query->row();
	}

	public function Get_data_id3($id='') {
		 $this->db->select('*');
		 $this->db->from('zahtjevnice');
		 $this->db->where('zahtjevnice_id', $id);
		 $this->db->join('zahtjevnice_fond','zahtjevnice_fond.id_zahtjeva = zahtjevnice.zahtjevnice_id','left');
		 $this->db->join('opci_inventar','zahtjevnice_fond.signatura_fonda = opci_inventar.opci_inventar_id','left');
		 $this->db->order_by('zahtjevnice_fond.id_zahtjeva', 'ASC');
		 $this->db->order_by('zahtjevnice_fond.signatura_fonda', 'ASC');
		 $query=$this->db->get();
		 return $result=$query->result();
	}

	public function charts_data1(){
		$query2=$this->db->query("SELECT
			COUNT(zf.signatura_fonda) AS total,
			(SELECT YEAR(z.datum_zahtjeva)) AS godina
			FROM zahtjevnice_fond zf
			INNER JOIN zahtjevnice z ON z.zahtjevnice_id = zf.id_zahtjeva
			GROUP BY godina");
		return $query2->result();
	}

	public function charts_data2(){
		$query3=$this->db->query("SELECT
			COUNT(prijavnice_id) AS total,
			svrha_koristenja
			FROM prijavnice
			GROUP BY svrha_koristenja
			ORDER BY total DESC");
		return $query3->result();
	}

	public function charts_data3(){
		$query4=$this->db->query("SELECT COUNT( zf.signatura_fonda ) AS total, oi.signatura AS fond
		FROM zahtjevnice_fond zf
		INNER JOIN zahtjevnice z ON z.zahtjevnice_id = zf.id_zahtjeva
		INNER JOIN opci_inventar oi ON oi.opci_inventar_id = zf.signatura_fonda
		GROUP BY signatura_fonda
		ORDER BY total DESC , signatura_fonda
		LIMIT 10 ");
		return $query4->result();
	}

	public function charts_data4(){
		$query5=$this->db->query("SELECT COUNT(zahtjevnice_id) AS total,
		(SELECT YEAR(datum_zahtjeva)) AS godina
		FROM zahtjevnice");
		return $query5->result();
	}

	public function get_data($con=NULL) {
		if(CheckPermission('zahtjevnice', "own_read") && CheckPermission('zahtjevnice', "all_read")!=true){
			if($con!='') {
				$con.="AND";
			}
			$con.="(`zahtjevnice`.`user_id` = '".$this->user_id."')";
		}
		$sql="SELECT `z`.`zahtjevnice_id`,`z`.`rb_zahtjeva`,`z`.`datum_zahtjeva`,`k`.`id_korisnika`,`k`.`prezime_i_ime`,
		`d`.`datum_posjeta`,`d`.`vrijeme_ulaska`,`d`.`vrijeme_izlaska`
		FROM `zahtjevnice` `z`
		LEFT JOIN `evidencija_korisnika` AS `k` ON (`k`.`evidencija_korisnika_id` = `z`.`prezime_i_ime`)
		LEFT JOIN `dnevnik_citaonice` AS `d` ON (`z`.`prezime_i_ime` = `d`.`prezime_i_ime` AND `z`.`datum_zahtjeva` = `d`.`datum_posjeta`)";
		if($con!='') {
			$sql.='WHERE'.$con;
		}
		$qr=$this->db->query($sql);
		return $qr->result();
	}

	public function Get_data2() {
		 $this->db->select('opci_inventar.signatura,opci_inventar.naziv,zahtjevnice_fond.oznaka,zahtjevnice_fond.naziv_jedinice');
		 $this->db->from('zahtjevnice');
		 $this->db->join('zahtjevnice_fond','zahtjevnice_fond.id_zahtjeva = zahtjevnice.zahtjevnice_id','left');
		 $this->db->join('opci_inventar','zahtjevnice_fond.signatura = opci_inventar.opci_inventar_id','left');
		 $query=$this->db->get();
		 return $result=$query->result();
	}

	public function delete_data($id='') {
		$this->db->where('zahtjevnice_id', $id);
		$this->db->delete('zahtjevnice');
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
