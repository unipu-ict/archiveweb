<!-- Dnevnik čitaonice - controller - 19.03.2017. -->
<?php defined("BASEPATH") OR exit("No direct script access allowed");
class Dnevnik_citaonice extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model("Dnevnik_citaonice_model");
    if(true==1){
      is_login();
      $this->user_id=isset($this->session->get_userdata()['user_details'][0]->users_id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
    }else{
      $this->user_id=1;
    }
  }
  public function index() {
    if(CheckPermission("dnevnik_citaonice", "all_read,own_read")){
			$data["view_data"]= $this->Dnevnik_citaonice_model->get_data();
			$this->load->view("include/header");
			$this->load->view("index",$data);
			$this->load->view("include/footer");
		} else {
			$this->session->set_flashdata('messagePr', 'Nemate ovlasti za izvršenje tražene radnje!');
      redirect( base_url().'opci_inventar', 'refresh');
		}
  }

  public function add_edit() {
		$data=$this->input->post();
		foreach ($_FILES as $fkey => $fvalue) {
			foreach($fvalue['name'] as $key => $fileInfo) {
				if(!empty($_FILES[$fkey]['name'][$key])){
					$filename=$_FILES[$fkey]['name'][$key];
					$tmpname=$_FILES[$fkey]['tmp_name'][$key];
					$exp=explode('.', $filename);
					$ext=end($exp);
					$newname=  $exp[0].'_'.time().".".$ext;
					$config['upload_path']='assets/images/';
					$config['upload_url']=base_url().'assets/images/';
					$config['allowed_types']="gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
					$config['max_size']='2000000';
					$config['file_name']=$newname;
					$this->load->library('upload', $config);
					move_uploaded_file($tmpname,"assets/images/".$newname);
					$data[$fkey][]=$newname;
				} else {
					if(!empty($_POST['fileOld'])) {
						$newname=$this->input->post('fileOld');
						$newname=explode(',', $newname);
						$data[$fkey]=$newname;
					} else {
						$data[$fkey]='';
					}
				}
			}
			$data[$fkey]=implode(',', $data[$fkey]);
		}
		if($this->input->post('id')) {
			unset($data['submit']);
			unset($data['fileOld']);
			unset($data['save']);
			unset($data['id']);
			foreach ($data as $dkey => $dvalue) {
				if(is_array($dvalue)) {
					$data[$dkey]=implode(',', $dvalue);
				}
			}
			$this->Dnevnik_citaonice_model->updateRow('dnevnik_citaonice', 'dnevnik_citaonice_id', $this->input->post('id'), $data);
      $afftectedRows=$this->db->affected_rows();
      if ($afftectedRows>0) {
        $this->session->set_flashdata('message', 'Zapis je ažuriran!');
        redirect('dnevnik_citaonice');
      } else {
        $this->session->set_flashdata('message', 'Zapis nije ažuriran!');
        redirect('dnevnik_citaonice');
      }
    } else {
			unset($data['submit']);
			unset($data['fileOld']);
			unset($data['save']);
			$data['user_id']=$this->user_id;
			foreach ($data as $dkey => $dvalue) {
				if(is_array($dvalue)) {
					$data[$dkey]=implode(',', $dvalue);
				}
			}
			$this->Dnevnik_citaonice_model->insertRow('dnevnik_citaonice', $data);
      $afftectedRows=$this->db->affected_rows();
      if ($afftectedRows > 0) {
        $this->session->set_flashdata('message', 'Zapis je unesen!');
        redirect('dnevnik_citaonice');
      } else {
        $this->session->set_flashdata('message', 'Zapis nije unesen!');
        redirect('dnevnik_citaonice');
      }
    }
  }

  public function get_modal() {
		if($this->input->post('id')){
			$data['data']=$this->Dnevnik_citaonice_model->Get_data_id($this->input->post('id'));
      echo $this->load->view('add_update', $data, true);
	    } else {
        echo $this->load->view('add_update', '', true);
	    }
	    exit;
	}

  public function get_modal2() {
    if($this->input->post('id')){
      $data['data']=$this->Dnevnik_citaonice_model->Get_data_id2($this->input->post('id'));
      echo $this->load->view('view_record', $data, true);
    } else {
      echo $this->load->view('view_record', '', true);
    }
    exit;
  }

  public function print_record() {
		if($this->input->post('id')){
      $data['data']=$this->Dnevnik_citaonice_model->Get_data_id2($this->input->post('id'));
      echo $this->load->view('print_record', $data, true);
    } else {
      echo $this->load->view('print_record', '', true);
    }
    exit;
  }

  public function report() {
    $data['data']=$this->Dnevnik_citaonice_model->Get_data();
    echo $this->load->view('report', $data, true);
  }

  public function delete($ids) {
		$idsArr=explode('-', $ids);
		foreach ($idsArr as $key => $value) {
			$this->Dnevnik_citaonice_model->delete_data($value);
      $afftectedRows=$this->db->affected_rows();
      if ($afftectedRows > 0) {
        $this->session->set_flashdata('message', 'Zapis je izbrisan!');
        redirect(base_url().'dnevnik_citaonice', 'refresh');
      } else {
        $this->session->set_flashdata('message', 'Zapis nije moguće izbrisati!');
        redirect(base_url().'dnevnik_citaonice', 'refresh');
      }
    }
  }

  public function delete_data($id) {
		$this->Dnevnik_citaonice_model->delete_data($id);
    $afftectedRows=$this->db->affected_rows();
    if ($afftectedRows > 0) {
      $this->session->set_flashdata('message', 'Zapis je izbrisan!');
      redirect('dnevnik_citaonice');
    } else {
      $this->session->set_flashdata('message', 'Zapis nije moguće izbrisati!');
      redirect('dnevnik_citaonice');
    }
  }

  public function ajx_data(){
		$primaryKey='dnevnik_citaonice_id';
		$table='dnevnik_citaonice';
		$columns=array(
      array('db' => '`dnevnik_citaonice`.`dnevnik_citaonice_id`', 'dt' => 0, 'field' => 'dnevnik_citaonice_id'),
      array('db' => '`evidencija_korisnika`.`prezime_i_ime`', 'dt' => 1, 'field' => 'prezime_i_ime'),
      array('db' => '`dnevnik_citaonice`.`datum_posjeta`', 'dt' => 2, 'field' => 'datum_posjeta'),
      array('db' => '`dnevnik_citaonice`.`vrijeme_ulaska`', 'dt' => 3, 'field' => 'vrijeme_ulaska'),
      array('db' => '`dnevnik_citaonice`.`vrijeme_izlaska`', 'dt' => 4, 'field' => 'vrijeme_izlaska'),
      array('db' => '`dnevnik_citaonice`.`dnevnik_citaonice_id`', 'dt' => 5, 'field' => 'dnevnik_citaonice_id'));
      $joinQuery="FROM prijavnice LEFT JOIN `` AS `0` ON (`0`.`_id` = `dnevnik_citaonice`.`prezime_i_ime`)";
      $aminkhan='@banarsiamin@';
      $where='';
      if($this->input->get('dateRange')) {
			$date=explode(' - ', $this->input->get('dateRange'));
			$where=" DATE_FORMAT(`$table`.`".$this->input->get('columnName')."`, '%Y/%m/%d') >= '".date('Y/m/d', strtotime($date[0]))."' AND DATE_FORMAT(`$table`.`".$this->input->get('columnName')."`, '%Y/%m/%d') <= '".date('Y/m/d', strtotime($date[1]))."' ";
		}
		$sql_details=array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db' => $this->db->database,
			'host' => $this->db->hostname
		);
		if(CheckPermission($table, "all_read")){}
		else if(CheckPermission($table, "own_read") && CheckPermission($table, "all_read")!=true){$where.="`$table`.`user_id`=".$this->user_id;}
		$output_arr=SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $where);
		foreach ($output_arr['data'] as $key => $value)
		{
			$output_arr['data'][$key][0]='<input type="checkbox" name="selData" value="'.$output_arr['data'][$key][0].'">';
			$id=$output_arr['data'][$key][count($output_arr['data'][$key]) - 1];
			$output_arr['data'][$key][count($output_arr['data'][$key]) - 1]='';
			if(CheckPermission($table, "all_update")){
			$output_arr['data'][$key][count($output_arr['data'][$key]) - 1].='<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
			}else if(CheckPermission($table, "own_update") && (CheckPermission($table, "all_update")!=true)){
				$user_id=getRowByTableColomId($table,$id,'id','user_id');
				if($user_id==$this->user_id){
			$output_arr['data'][$key][count($output_arr['data'][$key]) - 1].='<a sty id="btnEditRow" class="modalButton mClass" href="javascript:;" type="button" data-src="'.$id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
				}
			}
			if(CheckPermission($table, "all_delete")){
			$output_arr['data'][$key][count($output_arr['data'][$key]) - 1].='<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$id.', \''.$table.'\')"><i class="fa fa-trash-o" ></i></a>';}
			else if(CheckPermission($table, "own_delete") && (CheckPermission($table, "all_delete")!=true)){
				$user_id=getRowByTableColomId($table,$id,'id','user_id');
				if($user_id==$this->user_id){
			$output_arr['data'][$key][count($output_arr['data'][$key]) - 1] .= '<a data-toggle="modal" class="mClass" style="cursor:pointer;" data-target="#cnfrm_delete" title="Izbriši" onclick="setId('.$id.', \''.$table.'\')"><i class="fa fa-trash-o" ></i></a>';
				}
			}
		}
		echo json_encode($output_arr);
  	}

    public function getFilterdata(){
  		$where='';
		if($this->input->post('dateRange')) {
			$date=explode(' - ', $this->input->post('dateRange'));
			$where="DATE_FORMAT(`dnevnik_citaonice`.`".$this->input->post('colName')."`, '%Y/%m/%d') >= '".date('Y/m/d', strtotime($date[0]))."' AND DATE_FORMAT(`dnevnik_citaonice`.`".$this->input->post('colName')."`, '%Y/%m/%d') <= '".date('Y/m/d', strtotime($date[1]))."' ";
		}
		$data["view_data"]=$this->Dnevnik_citaonice_model->get_data($where);
		echo $this->load->view("tableData",$data, true);
		die;
  	}
  }
?>
