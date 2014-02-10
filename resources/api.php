<?php
require_once 'config.php';

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');  
/*
 * Sqwiggle API wrapper
*/
class API {

	public $url = 'https://api.sqwiggle.com/';

	public function API() {
		$endpoint = isset($_GET['endpoint']) ? $_GET['endpoint'] : null;
		$page = isset($_GET['page']) ? $_GET['page'] : null;
		$limit = isset($_GET['limit']) ? $_GET['limit'] : null;
		if($endpoint != null) {
			$url = $this->url.$endpoint;
			if($page != null && $limit != null) {
				$url .= "?page=$page&limit=$limit";
			} else if($page != null) {
				$url .= "?page=$page";
			} else if($limit != null) {
				$url .= "?limit=$limit";
			}
			echo $this->curl($url);
		}
	}

	public function curl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, Config::$secret);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');
		$content = trim(curl_exec($ch));
		curl_close($ch);
		return $content;
	}
}
new API();
?>
