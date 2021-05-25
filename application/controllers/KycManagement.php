<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KycManagement extends CI_Controller {
   function __construct() {
         parent::__construct();
         $this->load->model('common_model');
   }

   public function index()
   {
      $data['allDocument'] = $this->common_model->getAllKycDocument();
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/kycManagement',$data);
      $this->load->view('admin/footer');
   }

   public function approveKyc(){
      $id = $this->input->post('id');
      $response = $this->common_model->updateRecords('userkyc', array('isapproved' => 1) , array('id' => $id));

      if($response){
         echo 1;
      }else{
         echo 0;
      }
   }

   public function rejectKyc(){
      $id = $this->input->post('id');
      $response = $this->common_model->updateRecords('userkyc', array('isapproved' => 2) , array('id' => $id));

      if($response){
         echo 1;
      }else{
         echo 0;
      }
   }   

}
?>