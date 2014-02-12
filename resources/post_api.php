<?php
require_once 'config.php';

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept"); 
		
		$url = 'https://api.sqwiggle.com/';
		$text =  $_POST['text'];
		$room_id = '2327'; 
		$endpoint = 'messages';
		$url = $url.$endpoint;
		$url .= '?room_id=$room_id&text=$text';
		

		
			$service_url = 'https://api.sqwiggle.com/messages';
			$curl = curl_init($service_url);
			$curl_post_data = array(
					'room_id' => '2327',
					'text' => $text
			);
			curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($curl, CURLOPT_USERPWD, Config::$secret);
			curl_setopt($curl, CURLOPT_URL, $service_url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
			$curl_response = curl_exec($curl);
			if ($curl_response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
				die('error occured during curl exec. Additioanl info: ' . var_export($info));
			}
			curl_close($curl);
			$decoded = json_decode($curl_response);
			if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
				die('error occured: ' . $decoded->response->errormessage);
			}
			echo 'response ok!'; 
			var_export($decoded->response); 
		
		
?> 