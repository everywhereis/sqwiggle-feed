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

	/**
	* Constructor
	**/
	public function API() {

		new Config();

		switch ($_SERVER['REQUEST_METHOD']) {
			case "GET": {
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
				} else {
					header(':', true, 401);
					echo "Unauthorized";
				}
				break;
			}
			case "POST": {
				$endpoint = isset($_POST['endpoint']) ? $_POST['endpoint'] : null;
				if($endpoint != null) {
					$url = $this->url.$endpoint;
					$postData = $_POST['data'];
					echo $this->curlPost($url, $postData);
				}
				break;
			}
			default: {
				header(':', true, 401);
				echo "Unauthorized";
			}
		}
	}

	/**
	* Curl the api with a GET request;	
	**/
	private function curl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, Config::getAppSecret());
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);     
		curl_setopt($ch, CURLOPT_TIMEOUT, '3');
		$content = trim(curl_exec($ch));
		curl_close($ch);
		return $content;
	}

	/**
	* Curl the api with a POST request and post data;	
	**/
	private function curlPost($url, $data) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_USERPWD, Config::getAppSecret());
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);     
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$curl_response = curl_exec($curl);
		curl_close($curl);
		return $curl_response;
	}
}
// create new instance on page request
new API();
?>
