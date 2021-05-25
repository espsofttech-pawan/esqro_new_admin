<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Support extends CI_Controller {
   function __construct() {
         parent::__construct();
         $this->load->model('common_model');
   }

   public function index()
   {
      $data['support_tkn_list'] = $this->common_model->getSupportTokens();
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/support_list',$data);
      $this->load->view('admin/footer');
   }

   public function supportchat()
   {
      if(isset($_GET['token']) && !empty($_GET['token']))
      {
        $token = $_GET['token'];
        $chekToken = $this->common_model->getSingleRecordById('support_token',array('token'=>$token));
        if(!empty($chekToken))
        {
            $data = array();
            $user_id = $chekToken['user_id'];
            $data['user_data'] = $this->common_model->getSingleRecordById('users',array('id'=>$user_id));

            $data['admin_data'] = $admin_data = $this->common_model->getSingleRecordById('admin',array('id'=> 1));
            if(isset($_POST['reply']))
            {
              $reply_data = array();
              $reply_data['token'] = $token;
              $reply_data['from_id'] = $admin_data['id'];
              $reply_data['to_id'] = $user_id;
              $reply_data['message'] = $_POST['message'];
              $reply_data['is_send_by_admin'] = 1;
              $r_id = $this->common_model->addRecords('support_chat',$reply_data);
              if($r_id)
              {
                $data['success'] = "Message has been sent successfully to user";
              }
              else
              {
                $data['error'] = "Oops something went wrong please try again";
              }
            }
            $whr_chat = array();
            $whr_chat[] = "sr.token = '".$token."'";
            $where_chat = " WHERE ".implode(" AND ", $whr_chat);
            $orderbychat = " order by sr.id desc";
            $data['chat_data'] = $this->common_model->getsuppotchat($where_chat,$orderbychat);            
            $this->load->view('admin/support_chat',$data);
        }
        else
        {
            $this->session->set_flashdata('error', 'Invalid token please try again.');
        }
      }
      else
      {
        $this->session->set_flashdata('error', 'Invalid token please try again.');
      }
   }   

   public function newsletter()
   {
      $data['newsletter'] = $this->common_model->getAllRecordsOrderBy('newslatter', 'id', 'DESC'  );
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/newsletter',$data);
      $this->load->view('admin/footer');
   }

   public function contact_us()
   {
      $data['contact_us'] = $this->common_model->getAllRecordsOrderBy('contact_us','id','DESC');
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/contact_us',$data);
      $this->load->view('admin/footer');
   }

}
?>