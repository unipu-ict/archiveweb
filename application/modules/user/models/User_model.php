<?php class User_model extends CI_Model {
	function __construct(){
		parent::__construct();
		$this->user_id=isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
	}

	/**
	* Autentifikacija korisnika pri loginu
	*/
	function auth_user() {
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$this->db->where("is_deleted='0' AND (name='$email' OR email='$email')");
		$result=$this->db->get('users')->result();
		if(!empty($result)){
			if (password_verify($password, $result[0]->password)) {
				if($result[0]->status!='aktivan') {
					return 'not_varified';
				}
				return $result;
			}
			else {
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	* Brisanje korisnika
	* @param: $id - id of user table
	*/
	function delete($id='') {
		$this->db->where('users_id', $id);
		$this->db->delete('users');
	}

	/**
	* Odabir podataka u form tablici
	*/
	function get_data_by($tableName='', $value='', $colum='',$condition='') {
		if((!empty($value)) && (!empty($colum))) {
			$this->db->where($colum, $value);
		}
		$this->db->select('*');
		$this->db->from($tableName);
		$query=$this->db->get();
		return $query->result();
	}

	/**
	* Provjera da li korisnik već postoji
	*/
	function check_exists($table='', $colom='',$colomValue=''){
		$this->db->where($colom, $colomValue);
		$res=$this->db->get($table)->row();
		if(!empty($res)){ return false;} else{ return true;}
	}

 	/**
      * Dobivanje detalja o korisniku
      */
	function get_users($userID='') {
		$this->db->where('is_deleted', '0');
		if(isset($userID) && $userID!='') {
			$this->db->where('users_id', $userID);
		} else if($this->session->userdata('user_details')[0]->user_type=='admin') {
			$this->db->where('user_type', 'admin');
		} else {
			$this->db->where('users.users_id !=', '1');
		}
		$result=$this->db->get('users')->result();
		return $result;
  	}


	/**
	* Dodavanje zapisa u tablicu
	*/
	public function insertRow($table, $data){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	/**
	* Izmjena zapisa u tablici
	*/
	public function updateRow($table, $col, $colVal, $data) {
		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
	}

	public function get_info_box_data($input_data){
		$input_data=json_decode($input_data);
		foreach ($input_data as $key => $value) {
			if($value->action=='count') {
				$res[$value->com_crud.'_'.$value->action]=$this->db->get($value->com_crud)->num_rows();
			} else if($value->action=='sum') {
				$val=$this->db->select_sum($value->crd_field)->get($value->com_crud)->row();
				$m=$value->crd_field;
				$res[$value->com_crud.'_'.$value->action]=$val->$m;
  			} else if($value->action=='condition') {
					$sql="SELECT * FROM `$value->com_crud` WHERE ";
					foreach ($value->cfield as $ckey => $cvalue) {
						$operater='';
						if($value->con_operators[$ckey]=='equal_to'){
							$operater='=';
						} elseif($value->con_operators[$ckey]=='not_equal_to') {
							$operater='!=';
						} elseif($value->con_operators[$ckey]=='greater_then') {
							$operater='>';
						} elseif($value->con_operators[$ckey]=='greater_then_equal_to') {
							$operater='>=';
						} elseif($value->con_operators[$ckey]=='less_then') {
							$operater='<';
						} elseif($value->con_operators[$ckey]=='less_then_equal_to') {
							$operater='<';
						}
						$sql.=" `$cvalue` ".$operater." '".$value->con_value[$ckey]."' AND";
					}
					$sql=substr_replace($sql, '', -3);
					$val=$this->db->query($sql);
					$qr=$val->result();
					$res[$value->com_crud.'_'.$value->action]=count($qr);
				}
			}
			return $res;
		}
}
