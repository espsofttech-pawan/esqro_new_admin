<?php 

class User extends CI_Model {

  function login($username, $password)
  {
  	   $this->db->select('*');
  	   $this->db->from('admin');
       $this->db->group_start();
       $this->db->where('user_name', $username);
  	   $this->db->or_where('email', $username);
       $this->db->group_end();  
  	   $this->db->where('password', $password);
       $query = $this->db->get();
       if($query->num_rows() == 1)
       {
          return $query->result();
       }
       else
       {
         return false;
       }
  }

  public function checkAdmin()
  {
     $role = $this->getUserRole();
     if($role != 2 )
     {
       return true;
     }else
     {
        redirect("/admin/login");
     }
  }

  public function getData($tab,$whr)
  {
    $result = $this->db->get_where($tab,$whr)->result_array();
    return $result;
  }

  public function getAlldata($tab,$col)
  {
      $this->db->select($col);
      $this->db->from($tab);
      $result = $this->db->get()->result_array();
      return $result;
  }

  function insertrecords($table,$data)
  {
     $this->db->insert($table,$data); 
     return $this->db->insert_id();
  }

  public function updateData($tab,$data,$whr)
  {
     $this->db->update($tab,$data,$whr);
     return true;
  }

  public function getAdminDetail()
  {   
      $this->db->select("email,phonenumber");
      $this->db->from("users");
      $this->db->where("userrole", 1);
      $result = $this->db->get()->result_array();
      return $result;
  }

  public function getUserId()
  {
      $user_id = $this->session->userdata("user_id");
      return $user_id;
  }

  public function getUserRole()
  {  
     $user_role = $this->session->userdata("user_role");
     return $user_role;
  }

  public function getWhereData($tab,$whr)
  {
     $result = $this->db->get_where($tab,$whr)->result_array();
     return $result;
  }

  public function userLoginStatus()
  {
    $user_id = $this->getUserId();
    $this->db->select("login_status");
    $this->db->from("users");
    $this->db->where("id",$user_id);
    $result = $this->db->get()->result_array();
    $ls = $result[0]["login_status"];
    return $ls;
  }

  public function deleteMultipleData($tab,$col,$ids)
  {
      $this->db->where_in($col,$ids);
      $this->db->delete($tab);
      return true;
  }

  public function insertMultipleData($tab,$data)
  {
      $lid = $this->db->insert_batch($tab, $data);
      return $lid;
  }

}
?>