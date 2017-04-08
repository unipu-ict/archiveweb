<?php defined("BASEPATH") OR exit("No direct script access allowed");
class Setting extends CI_Controller {

  function __construct() {
    parent::__construct();
    //Provjera da li je korisnik logiran
    is_login();
    $this->load->model("Setting_model");
  }

  /**
  * Učitaj stranicu korisničkih ovlasti
  */
  public function index() {
    $result=array();
    $this->load->view('include/header');
    $data['result']=$this->Setting_model->get_setting();
    $result=[];
    foreach ($data['result'] as $key => $value) {
      $result[$value->keys]=$value->value;
    }
    if(setting_all('UserModules')=='yes') {
      if(isset($this->session->get_userdata()['user_details'][0]->user_type) && $this->session->get_userdata()['user_details'][0]->user_type=='admin') {
        $data['result']=$result;
        $this->load->view('index',$data);
      }
    }	else {
      $data['result']=$result;
      $this->load->view('index',$data);
    }
    $this->load->view('include/footer');
  }

  /**
  * Dodavanje nove vrste korisnika
  * @return: true ako je bilo uspješno
  */
  public function add_user_type() {
    echo $this->Setting_model->add_user_type();
    exit;
  }

  /**
  * Ažuriranje korisničkih ovlasti
  *@return: true ako je bilo uspješno
  */
  public function permission() {
    $data=array();
    $dataa=$this->input->post('data');
    foreach($dataa as $key=>$value)
    {
      $key=str_replace('_SPACE_', ' ', $key);
      $arr=array();
      foreach ($value as $vkey => $vvalue) {
        $vkey=str_replace('_SPACE_', ' ', $vkey);
        $arr[$vkey]=$vvalue;
      }
      $this->Setting_model->updateRow('permission', 'user_type', $key, array('data'=>json_encode($arr)));
    }
    $this->session->set_flashdata('message', 'Zapis je ažuriran!');
    redirect( base_url().'setting#permissionSetting', 'refresh');
  }
}
?>
