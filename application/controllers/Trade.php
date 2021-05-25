<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trade extends CI_Controller {
   function __construct() {
         parent::__construct();
         $this->load->model('common_model');
         $this->load->library('user_agent');
   }

   public function all_trade_advertisement()
   {
      $data['all_trade'] = $this->common_model->getAllTradeAdvertisement();
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/all_trade_advertisement',$data);
      $this->load->view('admin/footer');      
   }

   public function change_publish_status()
   {
      $trade_id = $this->input->post('id');
      $trade_info = $this->common_model->getSingleRecordById('offers',array('id' => $trade_id));
      if($trade_info['admin_approval'] == 0)
      {
         $offerTypeMsg = "published";
         $data_arr = array('admin_approval' => 1);
      }
      elseif($trade_info['admin_approval'] == 1)
      {
         $offerTypeMsg = "unpublished";
         $data_arr = array('admin_approval' => 0);
      }
      $response = $this->common_model->updateRecords('offers', $data_arr, array('id' => $trade_id));
      if($response)
      {
         $this->session->set_flashdata('success','Offer '.$offerTypeMsg.' Successfully.');
      }
      else
      {
         $this->session->set_flashdata('error','Something went wrong. please try again.');
      }
      redirect('trade/all_trade_advertisement', 'refresh');
  }

  public function getofferDetails(){
      $id = $this->input->post('id');
      $res = $this->common_model->getSingleTradeAdvertisement($id);

      if(!empty($res['trade_type'])){
         if($res['trade_type'] == 1){
            $res['trade_type'] = "Buy";
         }else{
            $res['trade_type'] = "Sell";
         }
      }

      if(!empty($res['admin_approval'])){
         if($res['admin_approval'] == 1){
            $res['admin_approval'] = "Published";
         }else{
            $res['admin_approval'] = "Pending";
         }
      }
      echo json_encode($res);
  }

   public function open_trades_buy()
   {
      $data['openTradeInfo'] = $openTradeInfo = $this->common_model->getAllTradeByAdmin(array('trade_type' => 2, 'status' => 0));
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/open_trade',$data);
      $this->load->view('admin/footer');      
   }

   public function ongoing_trades_buy()
   {
      $data['openTradeInfo'] = $openTradeInfo = $this->common_model->getAllTradeByAdmin(array('trade_type' => 2, 'status' => 1));
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/ongoing_trades_buy',$data);
      $this->load->view('admin/footer');      
   }

   public function completed_trade_buy()
   {
      $data['openTradeInfo'] = $openTradeInfo = $this->common_model->getAllTradeByAdmin(array('trade_type' => 2, 'status' => 4));
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/completed_trade_buy',$data);
      $this->load->view('admin/footer');      
   }

   public function cancelled_trade_buy()
   {
      $data['openTradeInfo'] = $openTradeInfo = $this->common_model->getAllTradeByAdmin(array('trade_type' => 2, 'status' => 2));
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/cancelled_trade_buy',$data);
      $this->load->view('admin/footer');      
   }

   public function open_trades_sell()
   {
      $data['openTradeInfo'] = $openTradeInfo = $this->common_model->getAllTradeByAdmin(array('trade_type' => 1, 'status' => 0));
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/open_trade_sell',$data);
      $this->load->view('admin/footer');      
   }

   public function ongoing_trades_sell()
   {
      $data['openTradeInfo'] = $openTradeInfo = $this->common_model->getAllTradeByAdmin(array('trade_type' => 1, 'status' => 1));
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/ongoing_trades_sell',$data);
      $this->load->view('admin/footer');      
   }

   public function completed_trade_sell()
   {
      $data['openTradeInfo'] = $openTradeInfo = $this->common_model->getAllTradeByAdmin(array('trade_type' => 1, 'status' => 4));
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/completed_trade_sell',$data);
      $this->load->view('admin/footer');      
   }

   public function cancelled_trade_sell()
   {
      $data['openTradeInfo'] = $openTradeInfo = $this->common_model->getAllTradeByAdmin(array('trade_type' => 1, 'status' => 2));
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/cancelled_trade_sell',$data);
      $this->load->view('admin/footer');      
   }         

   public function viewTrade(){
      $id = $this->uri->segment(3);
      $trade_info = $this->common_model->getTradeDetails($id);
      $trade_id = $trade_info[0]['id'];
      $sellerDetails = $this->common_model->getSingleRecordById('seller_wallet', array('trade_id' => $trade_id));
      $data['sellerWallet'] = $sellerDetails;
      $data['trade_info'] = $trade_info[0];
      $data['redirectUrl'] = $this->agent->referrer();
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/trade_info',$data);
      $this->load->view('admin/footer');       
   }

   public function cancelTrade(){
      $trade_id = $this->input->post('trade_id');
      $response = $this->common_model->updateRecords('trade_request', array('status' => 2, 'is_admin_cancel' => 1) , array('id' => $trade_id));

      if($response){
         $this->session->set_flashdata('success', 'Trade cancelled successfully!');
      }else{
         $this->session->set_flashdata('error', 'Some technical error. Please try again!');
      }
      redirect($this->agent->referrer());
   }

}
?>