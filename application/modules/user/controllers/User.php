<?php defined("BASEPATH") OR exit("No direct script access allowed");
class User extends CI_Controller {
  function __construct() {
    parent::__construct();
    $this->load->model('User_model');
    $this->user_id=isset($this->session->get_userdata()['user_details'][0]->id)?$this->session->get_userdata()['user_details'][0]->users_id:'1';
  }

  /**
  * Redirect na Opći inventar
  * @return Void
  */
  public function index() {
    if(is_login()){
      redirect( base_url().'opci_inventar', 'refresh');
    }
  }

  /**
  * Učitavanje stranice prijave
  * @return Void
  */
  public function login(){
    if(isset($_SESSION['user_details'])){
      redirect( base_url().'user/profile', 'refresh');
    }
    $this->load->view('include/script');
    $this->load->view('login');
  }

  /**
  * Odjava korisnika
  * @return Void
  */
  public function logout(){
    is_login();
    $this->session->unset_userdata('user_details');
    redirect( base_url().'user/login', 'refresh');
  }

  /**
  * Autentifikacija korisnika
  * @return Void
  */
	public function auth_user($page =''){
		$return=$this->User_model->auth_user();
		if(empty($return)) {
			$this->session->set_flashdata('messagePr', 'Greška tijekom prijave! <br>Unesena e-mail adresa ili zaporka nije valjana! <br>Pokušajte ih ponovo unijeti ili se obratite administratoru.');
      redirect( base_url().'user/login', 'refresh');
    } else {
      if($return=='not_varified') {
        $this->session->set_flashdata('messagePr', 'Nemate dozvolu pristupa u aplikaciju, molimo obratite se administratoru.');
        redirect( base_url().'user/login', 'refresh');
      } else {
        $this->session->set_userdata('user_details',$return);
      }
      redirect( base_url().'opci_inventar', 'refresh');
    }
  }

  /**
  * Generiranje hasha
  * @return string
  */
  public function getVarificationCode(){
    $pw=$this->randomString();
    return $varificat_key=password_hash($pw, PASSWORD_DEFAULT);
  }

  /**
  * Prikaz liste korisnika
  * @return Void
  */
  public function userTable(){
    is_login();
    if(CheckPermission("user", "own_read")){
        $this->load->view('include/header');
        $this->load->view('user_list');
        $this->load->view('include/footer');
      } else {
        $this->session->set_flashdata('messagePr', 'Nemate ovlasti za izvršenje tražene radnje!');
        redirect( base_url().'opci_inventar', 'refresh');
      }
    }

    /**
    * Datatable lista korisnika
    * @return Void
    */
    public function dataTable (){
      is_login();
      $table='users';
      $primaryKey='users_id';
      $columns=array(
        array('db' => 'users_id', 'dt' => 0),
        array('db' => 'email', 'dt' => 1),
        array('db' => 'name', 'dt' => 2),
        array('db' => 'status', 'dt' => 3),
        array('db' => 'users_id', 'dt' => 4)
      );
      $sql_details=array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db' => $this->db->database,
			'host' => $this->db->hostname
    );
    $where=array("user_type != 'admin'");
    $output_arr=SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, $where);
    foreach ($output_arr['data'] as $key => $value) {
      $id=$output_arr['data'][$key][count($output_arr['data'][$key]) - 1];
      $output_arr['data'][$key][count($output_arr['data'][$key]) - 1]='';
      if(CheckPermission('user', "all_update")){
			$output_arr['data'][$key][count($output_arr['data'][$key]) - 1].='<a id="btnEditRow" class="modalButtonUser mClass" href="javascript:;" type="button" data-src="'.$id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
			}else if(CheckPermission('user', "own_update") && (CheckPermission('user', "all_update")!=true)){
        $user_id=getRowByTableColomId($table,$id,'users_id','user_id');
        if($user_id==$this->user_id){
          $output_arr['data'][$key][count($output_arr['data'][$key]) - 1].='<a id="btnEditRow" class="modalButtonUser mClass" href="javascript:;" type="button" data-src="'.$id.'" title="Izmjeni"><i class="fa fa-pencil" data-id=""></i></a>';
        }
      }

      if(CheckPermission('user', "all_delete")){
			$output_arr['data'][$key][count($output_arr['data'][$key]) - 1].='<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'user\')" data-target="#cnfrm_delete" title="Izbriši"><i class="fa fa-trash-o" ></i></a>';}
			else if(CheckPermission('user', "own_delete") && (CheckPermission('user', "all_delete")!=true)){
        $user_id=getRowByTableColomId($table,$id,'users_id','user_id');
        if($user_id==$this->user_id){
          $output_arr['data'][$key][count($output_arr['data'][$key]) - 1].='<a style="cursor:pointer;" data-toggle="modal" class="mClass" onclick="setId('.$id.', \'user\')" data-target="#cnfrm_delete" title="Izbriši"><i class="fa fa-trash-o" ></i></a>';
        }
      }
      $output_arr['data'][$key][0]='<input type="checkbox" name="selData" value="'.$output_arr['data'][$key][0].'">';
		}
		echo json_encode($output_arr);
  }

  /**
  * Prikaz korisničkog profila
  * @return Void
  */
  public function profile($id='') {
    is_login();
    if(!isset($id) || $id=='') {
      $id=$this->session->userdata ('user_details')[0]->users_id;
    }
    $data['user_data']=$this->User_model->get_users($id);
    $this->load->view('include/header');
    $this->load->view('profile', $data);
    $this->load->view('include/footer');
    }

    /**
    * Popup prikaz dodavanja i izmjene korisnika
    * @return Void
    */
    public function get_modal() {
      is_login();
      if($this->input->post('id')){
        $data['userData']=getDataByid('users',$this->input->post('id'),'users_id');
        echo $this->load->view('add_user', $data, true);
      } else {
        echo $this->load->view('add_user', '', true);
      }
      exit;
    }

    /**
    * Upload datoteke
    * @return Void
    */
    function upload() {
      foreach($_FILES as $name => $fileInfo)
      {
        $filename=$_FILES[$name]['name'];
        $tmpname=$_FILES[$name]['tmp_name'];
        $exp=explode('.', $filename);
        $ext=end($exp);
        $newname=$exp[0].'_'.time().".".$ext;
        $config['upload_path']='assets/images/';
        $config['upload_url']=base_url().'assets/images/';
        $config['allowed_types']="gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp";
        $config['max_size']='2000000';
        $config['file_name']=$newname;
        $this->load->library('upload', $config);
        move_uploaded_file($tmpname,"assets/images/".$newname);
        return $newname;
      }
    }

    /**
    * Dodavanje i izmjena korisnika
    * @return Void
    */
    public function add_edit($id='') {
      $data=$this->input->post();
      $profile_pic='user.png';
      if($this->input->post('users_id')) {
        $id=$this->input->post('users_id');
      }
      if(isset($this->session->userdata('user_details')[0]->users_id)) {
        if($this->input->post('users_id')==$this->session->userdata ('user_details')[0]->users_id){
          $redirect='profile';
        } else {
          $redirect='userTable';
        }
      } else {
        $redirect='login';
      }
      if($this->input->post('fileOld')) {
        $newname=$this->input->post('fileOld');
        $profile_pic=$newname;
      } else {
        $data[$name]='';
        $profile_pic='user.png';
      }
      foreach($_FILES as $name => $fileInfo)
      {
        if(!empty($_FILES[$name]['name'])){
          $newname=$this->upload();
          $data[$name]=$newname;
          $profile_pic=$newname;
        } else {
          if($this->input->post('fileOld')) {
            $newname=$this->input->post('fileOld');
            $data[$name]=$newname;
            $profile_pic=$newname;
          } else {
            $data[$name]='';
            $profile_pic='user.png';
          }
        }
      }
      if($id!='') {
        $data=$this->input->post();
        if($this->input->post('status')!='') {
          $data['status']=$this->input->post('status');
        }
        if($this->input->post('users_id')==1) {
          $data['user_type']='admin';
          $data['status']='aktivan';
            }
            if($this->input->post('password')!='') {
              if($this->input->post('currentpassword')!='') {
                $old_row=getDataByid('users', $this->input->post('users_id'), 'users_id');
                if(password_verify($this->input->post('currentpassword'), $old_row->password)){
                  if($this->input->post('password')==$this->input->post('confirmPassword')){
                    $password=password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                    $data['password']=$password;
                  } else {
                    $this->session->set_flashdata('messagePr', 'Unesene zaporke nisu iste! Molimo ponovite unos.');
                    redirect( base_url().'user/'.$redirect, 'refresh');
                  }
                } else {
                  $this->session->set_flashdata('messagePr', 'Unijeli ste krivu zaporku! Molimo ponovite unos.');
                  redirect( base_url().'user/'.$redirect, 'refresh');
                  }
                } else {
                  $this->session->set_flashdata('messagePr', 'Niste unijeli trenutnu zaporku! Molimo ponovite unos.');
                  redirect( base_url().'user/'.$redirect, 'refresh');
                }
              }
              $id=$this->input->post('users_id');
              unset($data['fileOld']);
              unset($data['currentpassword']);
              unset($data['confirmPassword']);
              unset($data['users_id']);
              unset($data['user_type']);
              if(isset($data['edit'])){
                unset($data['edit']);
              }
              if($data['password']==''){
                unset($data['password']);
              }
              $data['profile_pic']=$profile_pic;
              foreach ($data as $dkey => $dvalue) {
                if(is_array($dvalue)) {
                  $data[$dkey]=implode(',', $dvalue);
                }
              }
              $this->User_model->updateRow('users', 'users_id', $id, $data);
              $this->session->set_flashdata('messagePr', 'Zapis je ažuriran!');
              redirect( base_url().'user/'.$redirect, 'refresh');
          } else {
            if($this->input->post('user_type')!='admin') {
            $data=$this->input->post();
            $password=password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $checkValue=$this->User_model->check_exists('users','email',$this->input->post('email'));
            if($checkValue==false) {
              $this->session->set_flashdata('messagePr', 'Unesena e-mail adresa već se koristi! Molimo unesite drugu.');
              redirect( base_url().'user/userTable', 'refresh');
            }
            $checkValue1=$this->User_model->check_exists('users','name',$this->input->post('name'));
            if($checkValue1==false) {
              $this->session->set_flashdata('messagePr', 'Uneseno korisničko ime već se koristi! Molimo unesite drugo.');
              redirect( base_url().'user/userTable', 'refresh');
            }
            $data['status']='aktivan';
            if(setting_all('admin_approval')==1) {
              $data['status']='izbrisan';
            }
            if($this->input->post('status')!='') {
              $data['status']=$this->input->post('status');
            }
            $data['user_id']=$this->user_id;
            $data['password']=$password;
            $data['profile_pic']=$profile_pic;
            $data['is_deleted']=0;
            if(isset($data['password_confirmation'])){
              unset($data['password_confirmation']);
            }
            if(isset($data['call_from'])){
              unset($data['call_from']);
            }
            unset($data['submit']);
            foreach ($data as $dkey => $dvalue) {
              if(is_array($dvalue)) {
                $data[$dkey]=implode(',', $dvalue);
              }
            }
            $this->User_model->insertRow('users', $data);
            redirect( base_url().'user/'.$redirect, 'refresh');
          } else {
            $this->session->set_flashdata('messagePr', 'Nemate ovlasti za izvršenje tražene radnje!' );
            redirect( base_url().'user/login', 'refresh');
          }
        }
      }

      /**
      * Brisanje korisnika
      * @return Void
      */
      public function delete($id){
        is_login();
        $ids=explode('-', $id);
        foreach ($ids as $id) {
          $this->User_model->delete($id);
        }
        redirect(base_url().'user/userTable', 'refresh');
      }
}
