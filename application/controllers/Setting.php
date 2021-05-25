<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
   function __construct() {
         parent::__construct();
         $this->load->model('common_model');
   }

   public function index()
   {

      if (isset($_POST['feesBtn'])) {
         $id = $this->input->post('id');
         $post_data = array(
            'buyer'    => $this->input->post('buyer_fees'),
            'seller'   => $this->input->post('seller_fees'),
            'platform_fees' => $this->input->post('platform_fees')
         );

         if(!empty($id)){
            $res = $this->common_model->updateRecords('settings', $post_data, array('id' => $id));
         }else{
            $res = $this->common_model->addRecords('settings', $post_data);
         }

         if ($res){
             $this->session->set_flashdata('success', 'Fees updated successfully!');
         }else{
            $this->session->set_flashdata('error', 'Some technical error. Please try again!');
         }
         redirect(base_url('setting'));
      }

      if (isset($_POST['accountBtn'])) {
         $id = $this->input->post('id');
         $post_data = array(
            'account_holder_name' => $this->input->post('account_holder_name'),
            'account_number'      => $this->input->post('account_number'),
            'bsc'                 => $this->input->post('bsc')
         );

         if(!empty($id)){
            $res = $this->common_model->updateRecords('settings', $post_data, array('id' => $id));
         }else{
            $res = $this->common_model->addRecords('settings', $post_data);
         }

         if ($res){
             $this->session->set_flashdata('bank_success', 'Account information updated successfully!');
         }else{
            $this->session->set_flashdata('bank_error', 'Some technical error. Please try again!');
         }
         redirect(base_url('setting'));
      }

      if (isset($_POST['walletBtn'])) {
         $id = $this->input->post('id');
         $post_data = array(
            'wallet_address' => $this->input->post('wallet_address')
         );

         if(!empty($id)){
            $res = $this->common_model->updateRecords('settings', $post_data, array('id' => $id));
         }else{
            $res = $this->common_model->addRecords('settings', $post_data);
         }

         if ($res){
             $this->session->set_flashdata('wallet_success', 'Wallet address updated successfully!');
         }else{
            $this->session->set_flashdata('wallet_error', 'Some technical error. Please try again!');
         }
         redirect(base_url('setting'));
      }            

      $data['feeData'] = $this->common_model->getAllRecords('settings');
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/setting',$data);
      $this->load->view('admin/footer');
   }

}
?>