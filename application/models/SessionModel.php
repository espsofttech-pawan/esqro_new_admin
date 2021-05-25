<?php
	

class SessionModel extends CI_Model {

	public function __construct()
	{
		
	}

	public function checklogin($allow)
    {
       $f_name = $this->router->fetch_method();
       $user = $this->session->userdata('user_data');
      
       if(empty($user))
       {
      	  if(in_array($f_name, $allow))		
	      {
	      	return true;
	      }else
	      {
	      	redirect("/users/index");
	      }
       }		
	}

	public function checkClientlogin($allow)
	{
	   $f_name = $this->router->fetch_method();
       $user = $this->session->userdata('client_data');
      
       if(empty($user))
       {
      	  if(in_array($f_name, $allow))		
	      {
	      	return true;
	      }else
	      {
	      	redirect("/admin/login");
	      }
       }
	}
}

?>