<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FrontendContent extends CI_Controller {
   function __construct() {
         parent::__construct();
         $this->load->model('common_model');
   }

   public function index()
   {
      if(isset($_POST['homebtn']))
      {
        $id = $this->input->post('id');
        if($_FILES['image']['name']){
            $imagename  = time().$_FILES['image']['name'];
            $tmpname    = $_FILES['image']['tmp_name'];
            $dbUrlimg   = 'assets/images/'.  $imagename;
            move_uploaded_file($tmpname, 'assets/images/'.$imagename);
        }else{
            $dbUrlimg = $this->input->post('old_image');
        }

        $post_data = array(
          'title' => $this->input->post('title'),
          'image' => $dbUrlimg
        );

        if(!empty($id)){
          $response = $this->common_model->updateRecords('frontend_home', $post_data, array('id' => $id));
        }else{
          $response = $this->common_model->addRecords('frontend_home', $post_data);
        }

        if($response)
        {
            $this->session->set_flashdata('success','Data updated successfully.');
        }
        else
        {
            $this->session->set_flashdata('error','Some internal issue occure. Please try again.');
        }
      }

      if(isset($_POST['how_it_works_btn']))
      {
        $id = $this->input->post('id');
        if($_FILES['image']['name']){
            $imagename  = time().$_FILES['image']['name'];
            $tmpname    = $_FILES['image']['tmp_name'];
            $dbUrlimg   = 'assets/images/'.  $imagename;
            move_uploaded_file($tmpname, 'assets/images/'.$imagename);
        }else{
            $dbUrlimg = $this->input->post('old_image');
        }

        $post_data = array(
          'title1' => $this->input->post('title1'),
          'title2' => $this->input->post('title2'),
          'description1' => $this->input->post('description1'),
          'description2' => $this->input->post('description2'),
          'image' => $dbUrlimg
        );

        if(!empty($id)){
          $response = $this->common_model->updateRecords('frontend_how_it_works', $post_data, array('id' => $id));
        }else{
          $response = $this->common_model->addRecords('frontend_how_it_works', $post_data);
        }

        if($response)
        {
            $this->session->set_flashdata('how_it_works_success','Data updated successfully.');
        }
        else
        {
            $this->session->set_flashdata('how_it_works_error','Some internal issue occure. Please try again.');
        }
        redirect(base_url('FrontendContent'));
      } 

      if(isset($_POST['features_btn']))
      {
        $id = $this->input->post('id');
        if($_FILES['blog_image1']['name']){
            $imagename  = time().$_FILES['blog_image1']['name'];
            $tmpname    = $_FILES['blog_image1']['tmp_name'];
            $blog_image1   = 'assets/images/'.  $imagename;
            move_uploaded_file($tmpname, 'assets/images/'.$imagename);
        }else{
            $blog_image1 = $this->input->post('old_blog_image1');
        }

        if($_FILES['blog_image2']['name']){
            $imagename  = time().$_FILES['blog_image2']['name'];
            $tmpname    = $_FILES['blog_image2']['tmp_name'];
            $blog_image2   = 'assets/images/'.  $imagename;
            move_uploaded_file($tmpname, 'assets/images/'.$imagename);
        }else{
            $blog_image2 = $this->input->post('old_blog_image2');
        }

        if($_FILES['blog_image3']['name']){
            $imagename  = time().$_FILES['blog_image3']['name'];
            $tmpname    = $_FILES['blog_image3']['tmp_name'];
            $blog_image3   = 'assets/images/'.  $imagename;
            move_uploaded_file($tmpname, 'assets/images/'.$imagename);
        }else{
            $blog_image3 = $this->input->post('old_blog_image3');
        }                

        $post_data = array(
          'title'              => $this->input->post('title'),
          'blog_title1'        => $this->input->post('blog_title1'),
          'blog_title2'        => $this->input->post('blog_title2'),
          'blog_title3'        => $this->input->post('blog_title3'),
          'description'        => $this->input->post('description'),
          'blog_description1'  => $this->input->post('blog_description1'),
          'blog_description2'  => $this->input->post('blog_description2'),
          'blog_description3'  => $this->input->post('blog_description3'),
          'blog_image1'        => $blog_image1,
          'blog_image2'        => $blog_image2,
          'blog_image3'        => $blog_image3,
        );

        if(!empty($id)){
          $response = $this->common_model->updateRecords('frontend_features', $post_data, array('id' => $id));
        }else{
          $response = $this->common_model->addRecords('frontend_features', $post_data);
        }

        if($response)
        {
            $this->session->set_flashdata('feature_success','Data updated successfully.');
        }
        else
        {
            $this->session->set_flashdata('feature_error','Some internal issue occure. Please try again.');
        }
        redirect(base_url('FrontendContent'));
      }            

      $data['homeData'] = $this->common_model->getSingleRecordById('frontend_home', array());
      $data['how_it_works'] = $this->common_model->getSingleRecordById('frontend_how_it_works', array());
      $data['features'] = $this->common_model->getSingleRecordById('frontend_features', array());
      $data['blog'] = $this->common_model->getAllRecords('frontend_blog');
      $data['frequently_asked_questions'] = $this->common_model->getAllRecords('frontend_frequently_asked_questions');

      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/frontend_content', $data);
      $this->load->view('admin/footer');
   }

   public function add_blog(){

      if(isset($_POST['addBlogBtn']))
      {
        if($_FILES['image']['name']){
            $imagename  = time().$_FILES['image']['name'];
            $tmpname    = $_FILES['image']['tmp_name'];
            $dbUrlimg   = 'assets/images/'.  $imagename;
            move_uploaded_file($tmpname, 'assets/images/'.$imagename);
        }else{
            $dbUrlimg = $this->input->post('old_image');
        }

        $post_data = array(
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
          'image' => $dbUrlimg
        );

        $response = $this->common_model->addRecords('frontend_blog', $post_data);
        if($response)
        {
            $this->session->set_flashdata('blog_success','Blog added successfully.');
        }
        else
        {
            $this->session->set_flashdata('blog_error','Some internal issue occure. Please try again.');
        }
        redirect(base_url('FrontendContent'));
      } 

      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/frontend_add_blog');
      $this->load->view('admin/footer');
   }

   public function delete_blog(){
      $id = $this->input->post('id');
      if(!empty($id)){      
        $res = $this->common_model->deleteRecords("frontend_blog",array('id'=>$id));
        if($res){            
            echo "true";
        }else{
            echo "false";
        }
      }else{
        redirect(base_url('FrontendContent'));
      }
   }

   public function blog_edit($id = null){

      if(isset($_POST['editBlogBtn']))
      {
        $id = $this->input->post('id');
        if($_FILES['image']['name']){
            $imagename  = time().$_FILES['image']['name'];
            $tmpname    = $_FILES['image']['tmp_name'];
            $dbUrlimg   = 'assets/images/'.  $imagename;
            move_uploaded_file($tmpname, 'assets/images/'.$imagename);
        }else{
            $dbUrlimg = $this->input->post('old_image');
        }

        $post_data = array(
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
          'image' => $dbUrlimg
        );

        $response = $this->common_model->updateRecords('frontend_blog', $post_data, array('id' => $id));
        if($response)
        {
            $this->session->set_flashdata('blog_success','Blog updated successfully.');
        }
        else
        {
            $this->session->set_flashdata('blog_error','Some internal issue occure. Please try again.');
        }
        redirect(base_url('FrontendContent'));
      } 

      $data['blog'] = $this->common_model->getSingleRecordById('frontend_blog', array('id' => $id));

      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/frontend_edit_blog', $data);
      $this->load->view('admin/footer');    
   }


   public function add_frequently_asked_questions(){

      if(isset($_POST['addBlogBtn']))
      {
        $post_data = array(
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description')
        );

        $response = $this->common_model->addRecords('frontend_frequently_asked_questions', $post_data);
        if($response)
        {
            $this->session->set_flashdata('question_success','Questions added successfully.');
        }
        else
        {
            $this->session->set_flashdata('question_error','Some internal issue occure. Please try again.');
        }
        redirect(base_url('FrontendContent'));
      } 

      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/frontend_add_frequently_asked_questions');
      $this->load->view('admin/footer');
   }

   public function delete_frequently_asked_questions(){
      $id = $this->input->post('id');
      if(!empty($id)){      
        $res = $this->common_model->deleteRecords("frontend_frequently_asked_questions",array('id'=>$id));
        if($res){            
            echo "true";
        }else{
            echo "false";
        }
      }else{
        redirect(base_url('FrontendContent'));
      }
   }

   public function frequently_asked_questions_edit($id = null){

      if(isset($_POST['editBlogBtn']))
      {
        $id = $this->input->post('id');
        $post_data = array(
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
        );

        $response = $this->common_model->updateRecords('frontend_frequently_asked_questions', $post_data, array('id' => $id));
        if($response)
        {
            $this->session->set_flashdata('question_success','Questions updated successfully.');
        }
        else
        {
            $this->session->set_flashdata('question_error','Some internal issue occure. Please try again.');
        }
        redirect(base_url('FrontendContent'));
      } 

      $data['frequently_asked_questions'] = $this->common_model->getSingleRecordById('frontend_frequently_asked_questions', array('id' => $id));

      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/frontend_edit_frequently_asked_questions', $data);
      $this->load->view('admin/footer');    
   }   

   public function support_category(){
      $data['category'] = $this->common_model->getAllRecords('support_category');
      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/support_category', $data);
      $this->load->view('admin/footer');
   }

   public function delete_support_category(){
      $id = $this->input->post('id');
      if(!empty($id)){      
        $res = $this->common_model->deleteRecords("support_category",array('id'=>$id));
        if($res){            
            echo "true";
        }else{
            echo "false";
        }
      }else{
        redirect(base_url('FrontendContent/support_category'));
      }
   }   

   public function add_support_category($id =null){
      $data = array();
      if(isset($_POST['addBtn']))
      {

        $id = $this->input->post('id');
        $post_data = array(
          'name' => $this->input->post('name')
        );

        if(!empty($id)){
          $response = $this->common_model->updateRecords('support_category', $post_data, array('id' => $id));
        }else{
          $response = $this->common_model->addRecords('support_category', $post_data);
        }

        if($response)
        {
            $this->session->set_flashdata('success','Questions added successfully.');
        }
        else
        {
            $this->session->set_flashdata('n_error','Some internal issue occure. Please try again.');
        }
        redirect(base_url('FrontendContent/support_category'));
      } 

      if(!empty($id)){
        $data['support_category'] = $this->common_model->getSingleRecordById('support_category', array('id' => $id));
      }

      $this->load->view('admin/header');
      $this->load->view('admin/side_bar');
      $this->load->view('admin/add_support_category', $data);
      $this->load->view('admin/footer');
   }

}
?>