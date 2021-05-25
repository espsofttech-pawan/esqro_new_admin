<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model 
{
   
	function getAllRecords($table)
	{
		$query = $this->db->get($table);
		return $query->result_array();
	}
	
    function getSingleRecordById($table,$conditions)
	{
	   $query = $this->db->get_where($table,$conditions);
	   return $query->row_array();
	}
	 
	function getAllRecordsById($table,$conditions)
	{
	   $query = $this->db->get_where($table,$conditions);
		return $query->result_array();
	}

	function getAllRecordsOrderById($table, $field, $short, $conditions)
	{
	   $this->db->order_by($field, $short);
	   $query = $this->db->get_where($table,$conditions);
	   return $query->result_array();
	}

	function getAllRecordsOrderBy($table, $field, $short)
	{
	   $this->db->order_by($field, $short);
	   $query = $this->db->get_where($table);
	   return $query->result_array();
	}

    function addRecords($table,$post_data)
	{
		$this->db->insert($table,$post_data); 
		return $this->db->insert_id(); 
	}

	function updateRecords($table, $post_data, $where_condition)
	{
		$this->db->where($where_condition);
		return $this->db->update($table, $post_data); 
	}
	
	function deleteRecords($table,$where_condition)
	{		
	    $this->db->where($where_condition);
		return $this->db->delete($table);
	}	

	function getTotalRecords($table)
	{
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	function getTotalRecordsByCondition($table, $condition)
	{
	    $this->db->where($condition);
		$query = $this->db->get($table);
		return $query->num_rows();
	}
	
	function getAllRecordsByLimitId($table,$conditions,$limit)
	{
	    $this->db->limit($limit);
		$query = $this->db->get_where($table,$conditions);
		return $query->result_array();
	}
	
	function getLimitedRecords($table,$limit)
	{
	    $this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result_array();
	}

	function getRecordCount($table, $where_condition)
	{
	    $this->db->where($where_condition);
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	public function getUserProfile($userid)
	{
		$this->db->select("users.*, country.name as country_name");
    	$this->db->from("users");
    	$this->db->join("country","users.country_id = country.id", "left");
    	$this->db->where("users.id", $userid);
    	$result = $this->db->get()->row_array();
    	return $result;
	}

	public function getAllTradeAdvertisement()
	{
		$this->db->select("offers.*,users.username, users.email");
		$this->db->from("offers");
		$this->db->join("users","offers.user_id = users.id");
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getSingleTradeAdvertisement($id = null)
	{
		$this->db->select("offers.*,users.username, users.email");
		$this->db->from("offers");
		$this->db->join("users","offers.user_id = users.id");
		$this->db->where('offers.id', $id);
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get()->row_array();
		return $result;
	}

	public function getAllKycDocument()
	{
		$this->db->select("userkyc.*,users.username, users.email, country.name as countryName");
		$this->db->from("userkyc");
		$this->db->join("users","userkyc.user_id = users.id");
		$this->db->join("country","userkyc.issuing_country = country.id");
		$this->db->order_by('id', 'DESC');
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getAllTradeByAdmin($postData)
	{
		$this->db->select("trade_request.*, offers.trade_type, offers.min_transaction_limit, offers.max_transaction_limit, offers.terms_of_trade, ub.username as buyer_name, us.username as seller_name ");
    	$this->db->from("trade_request");
    	$this->db->join("offers","offers.id = trade_request.offer_id");
    	$this->db->join("users ub","trade_request.buyer_id = ub.id");
    	$this->db->join("users us","trade_request.seller_id = us.id");
    	$this->db->where("trade_request.status", $postData['status']);
    	$this->db->where("offers.trade_type", $postData['trade_type']);
    	$this->db->order_by("trade_request.id", "DESC");
    	$result = $this->db->get()->result_array();
    	return $result;
	}

	public function getSupportTokens()
	{
		$this->db->select("support_token.*,users.username");
		$this->db->from("support_token");
		$this->db->join("users","support_token.user_id = users.id");
		$result = $this->db->get()->result_array();
		return $result;
	}

	public function getsuppotchat($whr,$orderby)
	{
		$sql = "SELECT sr.*,
				fromus.username as from_user_name,
				fromus.profile_pic as from_profile_pic,
				tous.username as to_user_name,
				tous.profile_pic as to_profile_pic
				From support_chat as sr
    			LEFT JOIN users as fromus ON fromus.id = sr.from_id
    			LEFT JOIN users as tous ON tous.id = sr.to_id
    			$whr
    			$orderby
    			";
    	$result = $this->db->query($sql)->result_array();
        return $result;
	}

	public function getTradeDetails($id){
		$this->db->select("trade_request.*, offers.trade_type, offers.min_transaction_limit, offers.max_transaction_limit, offers.terms_of_trade, ub.username as buyer_name, us.username as seller_name, offers.terms_of_trade ");
    	$this->db->from("trade_request");
    	$this->db->join("offers","offers.id = trade_request.offer_id");
    	$this->db->join("users ub","trade_request.buyer_id = ub.id");
    	$this->db->join("users us","trade_request.seller_id = us.id");
    	$this->db->where("trade_request.id", $id);
    	$result = $this->db->get()->result_array();
    	return $result;		
	}

	public function totalBuySell($type){
		$this->db->select_sum("token_amount");
    	$this->db->from("trade_request");
    	$this->db->join("offers","offers.id = trade_request.offer_id");
    	$this->db->where("offers.trade_type", $type);
    	$result = $this->db->get()->row_array();
    	return $result;		
	}

}