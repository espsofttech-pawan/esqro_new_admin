<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
   function __construct() {
         parent::__construct();
         require_once APPPATH . 'libraries/blockcypher/php-client/autoload.php';
         $this->SessionModel->checklogin(array('incomingTransaction')); 
         $this->load->model('admin/user');
         $this->load->model('common_model');
         $this->load->helper(array('form','common_helper'));
         $this->load->library('upload');
         $this->load->library('form_validation');
   }

   public function index()
   { 
        $data['totalUsers'] = $this->common_model->getRecordCount('users', array());
        $data['tradeRequest'] = $this->common_model->getRecordCount('trade_request', array());
        $data['totalBuy'] = $this->common_model->totalBuySell(2);
        $data['totalSell'] = $this->common_model->totalBuySell(1);

        $this->load->view('admin/header');
        $this->load->view('admin/side_bar');
        $this->load->view('admin/home',$data);
        $this->load->view('admin/footer');
   }

   public function user_list()
   {
      $user_list = $this->common_model->getAllRecordsById('users', array());
      $data['user_list'] = $user_list;
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/user_list',$data);
      $this->load->view('admin/footer');
   }

   public function user_profile($uid='')
   {
      if(!empty($uid))
      {
          $coinAddressDetails = array();
          if(isset($_POST['btnUpdateUser']))
          {
              $user_id  = $this->input->post('user_id');
              $email    = $this->input->post('email');

              $emailChk = $this->common_model->getSingleRecordById('users',array('id !=' => $user_id,'email' => $email));
              if(empty($emailChk))
              {
                $post_data = array(
                  'username'    => $this->input->post('user_name'),
                  'first_name'  => $this->input->post('first_name'),
                  'last_name'   => $this->input->post('last_name'), 
                  'mobile'      => $this->input->post('contact_no'), 
                  'address1'    => $this->input->post('address1'), 
                  'dob'         => $this->input->post('dob'),
                  'postcode'    => $this->input->post('postcode'),
                  'telegram_username' => $this->input->post('telegram_username'),
                  'city'        => $this->input->post('city'),
                  'isVerified'  => $this->input->post('status')
                );

                $response = $this->common_model->updateRecords('users', $post_data, array('id' => $user_id));
                if($response)
                {
                    $this->session->set_flashdata('success','Profile detail updated successfully.');
                }
                else
                {
                    $this->session->set_flashdata('error','Some internal issue occure. Please try again.');
                }
              } 
              else
              {
                  $this->session->set_flashdata('error','Email already exist.');
              }

          }

          $user_id = base64_decode($uid);
          $user_info = $this->common_model->getUserProfile($user_id);

          if(!empty($user_info))
          {
              $data['user_info'] = $user_info;
              $this->load->view('admin/header');
              $this->load->view('admin/side_bar');
              $this->load->view('admin/user_profile',$data);
              $this->load->view('admin/footer');              
          }else{
            redirect('home/user_list');
          }
      }else{
         redirect('home/user_list');
      }
   }

   public function my_profile($uid='')
   {
      if(!empty($uid))
      {
          $coinAddressDetails = array();
          if(isset($_POST['btnUpdateUser']))
          {
              $user_id    = $this->input->post('user_id');
              $first_name = $this->input->post('first_name');
              $last_name  = $this->input->post('last_name');
              $email      = $this->input->post('email');
              $user_name  = $this->input->post('user_name');
              $contact_no = $this->input->post('contact_no');
              $address    = $this->input->post('address');

              $emailChk = $this->common_model->getSingleRecordById('admin',array('id !=' => $user_id,'email' => $email));
              $userNameChk = $this->common_model->getSingleRecordById('admin',array('id !=' => $user_id,'user_name' => $user_name));
              if(empty($emailChk))
              {
                  if(empty($userNameChk))
                  {
                      $post_data = array('email' => $email,'user_name' => $user_name,'first_name' => $first_name,'last_name' => $last_name, 'contact_no' => $contact_no, 'address' => $address);
                      $response = $this->common_model->updateRecords('admin', $post_data, array('id' => $user_id));
                      if($response)
                      {
                          $this->session->set_flashdata('success','Profile detail updated successfully.');
                          redirect(base_url('home/my_profile/'.base64_encode($user_id)));
                      }
                      else
                      {
                          $this->session->set_flashdata('error','Some internal issue occure. Please try again.');
                      }
                  }
                  else
                  {
                      $this->session->set_flashdata('error','User name already exist.');
                  }
              } 
              else
              {
                  $this->session->set_flashdata('error','Email already exist.');
              }

          }

          if(isset($_POST['btnChangePassword']))
          {
            $user_id      = $this->input->post('user_id');
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            if($new_password != $confirm_password){
                $this->session->set_flashdata('password_error', 'Please enter confirm password same as new password. Please try again.');
            }else{
                $chkPass = $this->common_model->getSingleRecordById('admin',array('id' => $user_id,'password' => md5($old_password)));
                if(!empty($chkPass))
                {
                  $response = $this->common_model->updateRecords('admin', array('password' => md5($new_password)), array('id' => $user_id));
                  if($response)
                  {
                    $this->session->set_flashdata('password_success', 'your password has been changed successfully!');
                    redirect(base_url('home/my_profile/'.base64_encode($user_id)));
                  }
                  else
                  {
                    $this->session->set_flashdata('password_error', 'Some internal issue occure. Please try again.');
                  }
                }
                else
                {
                  $this->session->set_flashdata('password_error', 'You enter wrong old password. Please check and try again.');
                }
            }
          }

          $user_id = base64_decode($uid);
          $user_info = $this->common_model->getSingleRecordById('admin',array('id' => $user_id));
          if(!empty($user_info))
          {
              $data['user_info'] = $user_info;
              $this->load->view('admin/header');
              $this->load->view('admin/side_bar');
              $this->load->view('admin/my_profile',$data);
              $this->load->view('admin/footer');
          }
      }
   }  

    public function deleteUsers()
    {
        $id = $this->input->post('id');
        $this->common_model->deleteRecords("userkyc",array('user_id'=>$id));        
        $res = $this->common_model->deleteRecords("users",array('id'=>$id));
        if($res){            
            echo "true";
        }else{
            echo "false";
        }
    }

   public function logout(){
      $this->session->sess_destroy();
      redirect('/'); 
   } 
}
?>