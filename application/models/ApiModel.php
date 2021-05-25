<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiModel extends CI_Model 
{
	public function verify_device_id($device_id)
	{
		$result = $this->db->get_where("divicelist", array("imei" => $device_id))->result_array();
		return $result;
	}

	public function getWhereData($tab,$whr)
	{
		$result = $this->db->get_where($tab,$whr)->result_array();
		return $result;	
	}

	public function getStandardAd($vehicle_id)
	{	$date = date("Y-m-d");
		$sql = "SELECT * FROM Adds WHERE ad_status = 1 AND ad_type = 1 AND startdate <= '".$date."' AND enddate >= '".$date."' AND FIND_IN_SET($vehicle_id,vehicle) > 0 ORDER BY RAND() LIMIT 0,25";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	public function getPremiumAd($vehicle_id)
	{
		$date = date("Y-m-d");
		$sql = "SELECT * FROM Adds WHERE ad_status = 1 AND ad_type = 2 AND startdate <= '".$date."' AND enddate >= '".$date."' AND FIND_IN_SET($vehicle_id,vehicle) > 0 ORDER BY RAND() LIMIT 0,7";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	public function updateVehicleStatus($vehicle_id, $status)
	{
		$this->db->update("vehicle",array("status" => $status),array("vehicle_id" => $vehicle_id));
		return true;
	}

	public function updateData($tab,$data,$whr)
	{
		$this->db->update($tab,$data,$whr);
		return true;
	}
}