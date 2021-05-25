<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('send_mail'))
{
	function getBtcAddressTxn($url)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache"/*,
		"postman-token: a6393853-b9bd-b6b8-aa26-47903fbcdf2c"*/
	),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
			return json_encode(array('error' => "cURL Error #:" . $err));
		} else {
			return $response;
		}
	}
	function getPricePerBtc($currency)
	{
		/*$ch = curl_init('https://api.coinbase.com/v2/prices/spot?currency='.$currency);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$send_response = curl_exec($ch);
	var_dump($send_response);*/
	//$sendResponse = json_decode($send_response);
	//return $sendResponse;
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.coinbase.com/v2/prices/spot?currency=INR",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"postman-token: 0935cfd4-756d-4bb4-e146-db85d7fad997"
		),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response;
	}
}

function random_num() {
	$alpha_key = '';

	$keys = range('a','z');
	for ($i = 0; $i < 2; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
	}

	$keys = range(0, 9);
	for ($i = 0; $i < 2; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
	}

	$keys = range('a','z');
	for ($i = 0; $i < 2; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
	}

	$keys = range(0, 9);
	for ($i = 0; $i < 1; $i++) {
		$alpha_key .= $keys[array_rand($keys)];
	}


	return $alpha_key;
}


function timings($day, $start_end, $postTradeInfo=false)
{
	$timings = array('00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00','05:30','06:00','06:30','07:00','07:30','08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30',);
	$i =0;
	foreach ($timings as $key => $timing) {
		?>
		<option value="<?php echo $i; ?>" <?php echo (!empty(@$postTradeInfo) || !is_null(@$postTradeInfo) ? ($postTradeInfo == $i ? 'selected' : '') : ''); ?> ><?php echo $timing; ?></option>
		<?php
		$i++;
	}
}
function send_mail($message, $subject, $email_address)
{
	$ci =&get_instance();
	$ci->load->library('email');
	$config['mailtype']='html';
	$ci->email->initialize($config);
	$ci->email->from(ADMIN_EMAIL);
	$ci->email->to($email_address);
	$ci->email->subject($subject);
	$ci->email->message($message);

	if($ci->email->send()) {
		return true;
	} else {
		return false;
	}
}
}
if(!function_exists('p')) {
	function p($array) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}
}
if(!function_exists('check_required_value')) {
	function check_required_value($chk_params, $converted_array) {
		foreach ($chk_params as $param) {
			if (array_key_exists($param, $converted_array) && ($converted_array[$param] != '')) {
				$check_error = 0;
			} else {
				$check_error = array('check_error' => 1, 'param' => $param);
				break;
			}
		}
		return $check_error;
	}
}
if(!function_exists('send_apn_notification')) {
	function send_apn_notification($deviceToken, $message) {
//$deviceToken = '5c96f8747d856c8c938a71a17802aea963a19f0a36b3916f054ec833534b2e50';
// Put your private key's passphrase here:
		$passphrase = '123456';
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'ck.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
// Open a connection to the APNS server
		$fp = stream_socket_client(APNS_GATEWAY_URL, $err, $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		if (!$fp) {
			log_message('apn_debug',"APN: Maybe some errors: $err: $errstr");
	//exit("Failed to connect: $err $errstr" . PHP_EOL);
		} else {
			log_message('apn_debug',"Connected to APNS");
	//echo 'Connected to APNS' . PHP_EOL;
		}
// Create the payload body
		$body['aps'] = array(
			'alert' => $message,
			'sound' => 'default'
		);
// Encode the payload as JSON
		$payload = json_encode($body);
// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		if (!$result) {
			log_message('apn_send_debug',"APN: Message not delivered");
	//echo 'Message not delivered' . PHP_EOL;
		} else {
			log_message('apn_send_debug',"APN: Message successfully delivered");
	//echo 'Message successfully delivered' . PHP_EOL;
		}
// Close the connection to the server
		fclose($fp);
	}
}
if(!function_exists('send_apn_notification_old')) {
	function send_apn_notification_old()
	{
		$ci =&get_instance();
		$ci->load->library('apn');
$ci->apn->payloadMethod = 'enhance'; // you can turn on this method for debuggin purpose
$ci->apn->connectToPush();
$device_token = '5c96f8747d856c8c938a71a17802aea963a19f0a36b3916f054ec833534b2e50';
/* My access Token */
//$device_token = '232b43ca4c5926a1ad9f255f80a3c6cfe9a650c9c5bf9455290d9bd79bcebf03';
// adding custom variables to the notification
$ci->apn->setData(array( 'someKey' => true ));
$send_result = $ci->apn->sendMessage($device_token, 'Test Message', /*badge*/ 2, /*sound*/ 'default');
if($send_result)
	log_message('debug','Sending successful');
else
	log_message('error',$ci->apn->error);
$ci->apn->disconnectPush();
}
}
if(!function_exists('apn_feedback')) {
// designed for retreiving devices, on which app not installed anymore
	function apn_feedback()
	{
		$ci =&get_instance();
		$ci->load->library('apn');
		$unactive = $ci->apn->getFeedbackTokens();
		if (!count($unactive))
		{
			log_message('info','Feedback: No devices found. Stopping.');
			return false;
		}
		foreach($unactive as $u)
		{
			$devices_tokens[] = $u['devtoken'];
		}
//p($unactive);
	}
}
if(!function_exists('send_gcm_notification')) {
	function send_gcm_notification() {
		$ci =&get_instance();
// simple loading
// note: you have to specify API key in config before
		$ci->load->library('gcm');
// simple adding message. You can also add message in the data,
// but if you specified it with setMesage() already
// then setMessage's messages will have bigger priority
		$ci->gcm->setMessage('Test message '.date('d.m.Y H:s:i'));
// add recepient or few
		$ci->gcm->addRecepient('RegistrationId');
		$ci->gcm->addRecepient('New reg id');
// set additional data
		$ci->gcm->setData(array(
			'some_key' => 'some_val'
		));
// also you can add time to live
		$ci->gcm->setTtl(500);
// and unset in further
		$ci->gcm->setTtl(false);
// set group for messages if needed
		$ci->gcm->setGroup('Test');
// or set to default
		$ci->gcm->setGroup(false);
// then send
		if ($ci->gcm->send())
			echo 'Success for all messages';
		else
			echo 'Some messages have errors';
// and see responses for more info
		p($ci->gcm->status);
		p($ci->gcm->messagesStatuses);
		die(' Worked.');
	}
}
if(!function_exists('humanTiming')) {
	function humanTiming($time)
	{
$time = time() - $time; // to get the time since that moment
$time = ($time<1)? 1 : $time;
$tokens = array (
	31536000 => 'y',
	2592000 => 'm',
	604800 => 'w',
	86400 => 'd',
	3600 => 'h',
	60 => 'min',
	1 => 'sec'
);
foreach ($tokens as $unit => $text) {
	if ($time < $unit) continue;
	$numberOfUnits = floor($time / $unit);
	return $numberOfUnits.' '.$text;
}
}
}
if(!function_exists('is_logged_in')) {
	function is_logged_in($return_uri = '') {
		$ci =&get_instance();
		$admin_login = $ci->session->userdata('admin_session_data');
		if(!isset($admin_login['is_logged_in']) || $admin_login['is_logged_in'] != true) {
			if($return_uri) {
				redirect('admin/login?return_uri='.urlencode(base_url().$return_uri));
			} else {
				redirect("admin/login");
			}
		}
	}
}
if(!function_exists('admin_session_data')) {
	function admin_session_data() {
		$ci =&get_instance();
		$session_data = $ci->session->userdata('admin_session_data');
		return $session_data;
	}
}
if(!function_exists('assets_url')) {
	function assets_url() {
		echo base_url().'assets/';
	}
}
if(!function_exists('load_admin_view')) {
	function load_admin_view($view_path, $data = array(), $leftBar = 'yes') {
		if(!empty($view_path)) {
			$ci =&get_instance();
			/* Load Header */
			$ci->load->view('includes/header', $data);
			/* Load sidebar */
			if($leftBar == 'yes') {
				$ci->load->view('includes/left-sidebar', $data);
			}
			/* Load content section */
			$ci->load->view($view_path, $data);
			/* Load footer */
			$ci->load->view('includes/footer', $data);
		} else {
			show_error('Unable to load content view, please check again.');
		}
	}
}
if(!function_exists('add_active_class')) {
	function add_active_class($class) {
		$ci =&get_instance();
		$currentMethod = $ci->router->fetch_method();
		if($currentMethod == $class) {
			echo 'active';
		}
	}
}
if(!function_exists('sendEmail')) {
	function sendEmail($emailData) {
		try {
			$email = $emailData['email'];
			$body = $emailData['template_data'];;

			$from_name = "Espsofttech.com";
			$headers = "From: ".$from_name."<noreply@espsofttech.com>\r\n";
			$headers.= "MIME-Version: 1.0\r\n";
			$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			@mail($email,$emailData['subject'],$body,$headers);

			return 1;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}
}
if(!function_exists('generate_forgot_code')) {
	function generate_forgot_code($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	function formatData($data)
	{
		foreach($data as $key => $val)
		{
			if(!is_array($val))
			{
				$data[$key] = urldecode($val);
			}else
			{
				$data[$key] = formatData($val);
			}
		}
		return $data;
	}
}
/* End of file common_helper.php */
/* Location: ./system/application/helpers/common_helper.php */
/* Set User Language  */
/*function setUserLang($user_lang)
{
$ci =&get_instance();
//$user_data = $ci->db->get_where("users",array("id" => $user_id))->row_array();
if($user_lang == 1)
{
$user_lang = 1;
}
else
{
$user_lang = 2;
}
$GLOBALS['user_lang'] = $user_lang;
return true;
}*/
/*function setUserLang($user_id)
{
$ci =&get_instance();
$user_data = $ci->db->get_where("users",array("id" => $user_id))->row_array();
if(!empty($user_data))
{
$user_lang = $user_data["user_lang"];
}else
{
$user_lang = 2;
}
$GLOBALS['user_lang'] = $user_lang;
return $user_lang;
}*/
function setUserLang($user_lang)
{
	$ci =&get_instance();
//$user_data = $ci->db->get_where("users",array("id" => $user_id))->row_array();
	if($user_lang == 1)
	{
		$user_lang = 1;
	}
	else
	{
		$user_lang = 2;
	}
	$GLOBALS['user_lang'] = $user_lang;
	return true;
}
function __webtxt($word)
{
	global $user_lang;
	$ci =&get_instance();

	$data = $ci->db->get_where("webtexts",array("lang_id" => $user_lang,"text_eng" => $word))->row_array();
	$wordtrans = $data["text_lang"];
	if (!$wordtrans) {
		return $word;
	}else{
		return $wordtrans;
	}

}
function __webtxt1($word)
{
	return $word;
}
/*nirbhay start */
function sendResponse($res)
{
	$resp = json_encode($res);
	echo $resp;
	exit();
}
function __webtxtword($word)
{
	return $word;
/*global $user_lang;
$ci =&get_instance();

$data = $ci->db->get_where("webtexts",array("lang_id" => $user_lang,"text_eng" => $word))->row_array();
if(!empty($data["text_lang"]))
{
$word = $data["text_lang"];
}
return $word;*/
}
// function send_smtp_mail($message, $subject, $to)
// {
// 	$mail = new PHPMailer;
// 	$mail->SMTPDebug = false;
// 	//$mail->SMTPDebug = 4;
// 	$mail->isSMTP();                                   // Set mailer to use SMTP
// 	$mail->Host = 'cp-in-4.webhostbox.net';                    // Specify main and backup SMTP servers
// 	$mail->SMTPAuth = true;                            // Enable SMTP authentication
// 	$mail->Username = 'info@espsofttech.com';          // SMTP username
// 	$mail->Password = 'infoesp123#'; // SMTP password
// 	// $mail->Username = 'akash.espsofttech@gmail.com';          // SMTP username
// 	// $mail->Password = 'pareta123#'; // SMTP password
// 	//$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
// 	$mail->SMTPSecure = 'ssl';                         // Enable TLS encryption, `ssl` also accepted
// 	$mail->Port = 465;                                 // TCP port to connect to
// 	$mail->setFrom('info@espsofttech.com', 'Native coin');
// 	// $mail->addReplyTo(ADMIN_EMAIL, 'Auction');
// 	$mail->addAddress($to);
// 	$mail->isHTML(true);  // Set email format to HTML
// 	$mail->Subject = $subject;
// 	$mail->Body    = $message;
// 	if(!$mail->send()) {
// 	    // echo 'Message could not be sent.';
// 	    return   'Mailer Error: ' . $mail->ErrorInfo;
// 	    // return false;
// 	} else {
// 	    return true;
// 	}
// }
function generateRandomString($length = 10) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}
function get_distance($source=false, $destination=false) {
	$ch = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$source.'&destinations='.implode('|', $destination).'&key='.GMAPTOKEN);
//$response = json_decode(curl_exec($ch))';
	$response = json_decode($ch);
	return json_encode($response->rows[0]);
}
function print_backtrace()
{
	echo "<p>Backtrace:</p>";
	foreach (debug_backtrace() as $error){
		echo '<p style="margin-left:10px">
		File: '.$error['file'].'<br />
		Line: '.$error['line'].'<br />
		Function: '.$error['function'].'</p>';
	}
}

function get_coinprice($coin_input, $coin_output) {
    $apiurl = "https://api.coinbase.com/v2/prices/".$coin_input."-".$coin_output."/buy";
    $ch = curl_init($apiurl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    ));
    $response = json_decode(curl_exec($ch));
    return @$response->data->amount;
}

function getSiteUrl(){
	return "http://localhost/esqro_backend/";
}