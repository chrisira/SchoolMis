<?php 

class Validate{

	//function to get extension of a file
	public function validate_image($str){
		$state=false;
		if(!empty($str) && strlen($str)>3){
			$fileExt=explode('.', $str);
			//get actual extension
			$extension=strtolower(end($fileExt));
			$allowed=array('jpg','png','jpeg','gif');
			if(in_array($extension,$allowed)){

				$state=true;
				
			}else{
				$state=false;
			}
		}else{
			$state=false;
		}

		return $state;
	}

	//function to validate login
	public function sanitize($str){
		global $con;
		$invalid_characters = array("$", "%", "#", "<", ">", "|");
		$str = str_replace($invalid_characters, "", $str);
		$str=stripcslashes(strip_tags(htmlentities(htmlspecialchars($str))));
		return $str;
	}

	//validate phone number
	public function validate_phone($value){
		$state=false;
		if(!preg_match('/^\(?\+?([0-9]{1,4})\)?[-\. ]?(\d{3})[-\. ]?([0-9]{7})$/', trim($value))) {
			 $state=false;
		} else {
			 $state=true;
		}
		return $state;
	}

	//email valid 
	public function isValidEmail($email) {
		// First, we check that there's one @ symbol, and that the lengths are right
		if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
			// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
			return false;
		}
		// Split it into sections to make life easier
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for ($i = 0; $i < sizeof($local_array); $i++) {
			if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
				return false;
			}
		}
		if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
			$domain_array = explode(".", $email_array[1]);
			if (sizeof($domain_array) < 2) {
				return false; // Not enough parts to domain
			}
			for ($i = 0; $i < sizeof($domain_array); $i++) {
				if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
					return false;
				}
			}
		}

		return true;
	}

	//function to remove all white space from a string
	public function removeSpace($str){
		$str = preg_replace('/\s+/', '', $str);
		return $str;
	}

	//function to get user's IP Address
	public function getUserIpAddr(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			//ip from share internet
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			//ip pass from proxy
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}

	//format date
	public function formatDate($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

	public function randomCode(){
	
		$num1 = mt_rand(0,9);
		$num2 = mt_rand(0,9);
		$num3 = mt_rand(0,9);
		$num4 = mt_rand(0,9);
		$num5 = mt_rand(0,9);
		$num6 = mt_rand(0,9);
		$confirmation = $num1.''.$num2.''.$num3.''.$num4.''.$num5.''.$num6;
	
		return $confirmation;
	}
	public function raf_create_vcard($name,$email,$tel){

		$fax        = "";
		$www        = "";
		$address    = "";
		return utf8_encode('BEGIN:VCARD
			VERSION:2.1
			N:;'.$name.';;;
			FN:'.$name.'
			EMAIL:'.$email.'
			ORG:'.$name.'
			TEL;CELL:'.$tel.'
			TEL;CELL:'.$tel.'
			END:VCARD');
	}
	
	public function sendMail($from,$to,$subject,$txt,$CC){

		$to         = $to;
		$subject    = $subject;
		$txt        = $txt;
		$headers    = "From: ".$from."" . "\r\n" .
		"CC: ".$CC."";

		if(mail($to,$subject,$txt,$headers)){
			return true;
		}else{
			return false;
		}

	}

	public function MTNDeposit($phoneNumber, $amount){
		//SEND REQUEST to $phoneNumber to deposit $amount on Mobile Money
		$curl = curl_init();

		$phone = $phoneNumber;
		$time = time();
		$hash = hash('sha256', ($time.''.$phone.''.$amount));

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://uplus.rw/bridge/",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYPEER => false,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "action=deposit&amount=$amount&phonenumber=$phone&clienttime=$time&appToken=731305b7f4aefa75fb9e&hash=$hash",
		  CURLOPT_HTTPHEADER => array(
			"Content-Type: application/x-www-form-urlencoded"
		  ),
		));

		$curl_response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		$response = array('status'=>false, "msg"=>"", "data"=>array());

		if ($err) {
			$response['status'] = false;
			$response['msg'] = "cURL Error #:" . $err;
		} else {
			$curl_response = json_decode($curl_response);
			if($curl_response->success){
				$response['status'] = true;
				$response['msg'] = "Successfull connected to MTN";
			}else{
				if($curl_response->message == 'TARGET_AUTHORIZATION_ERROR'){
					$response['msg'] = "Reba neza niba ufite amafranga ahagije kuri konti yawe, wongere ugerageze";
				}
				$response['status'] = false;
			}
			
			$response['data'] = $curl_response;
		}
		return (object)$response;
	}

	function formatPrintTimestamp($date){
		//formats the timestamp for printing
		return date(PRINTTIMESTAMP, strtotime($date));
	}
}
$function=new Validate();
?>
