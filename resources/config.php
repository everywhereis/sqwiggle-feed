<?php
	class Config {

		

		public function Config() {
			// read the contents of the settings file
			$this->settings = $this->readSettings();
			if($this->needsInstall()) {
				$this->throwInteralError();
			}
		}

		private function readSettings() {
			try {
				$json = file_get_contents("files/settings.json");
				$jsonIterator = new RecursiveIteratorIterator(
			    new RecursiveArrayIterator(json_decode($json, TRUE)),
			    RecursiveIteratorIterator::SELF_FIRST);
				
				foreach ($jsonIterator as $key => $val) {
				    if(is_array($val)) {

				    } else {
				        if($key == "API_SECRET") {
				        	$this->API_SECRET = $val;
				        }
				    }
				} 
			} catch(Exception $e) {
				return false;
			};
		}

		public static function writeSettings($settings) {
			return file_put_contents("files/settings.json", json_encode($settings));
		}

		public static function getAppSecret() {
			$conf = new Config();
			return $conf->API_SECRET;
		}

		private function needsInstall() {
			return $this->API_SECRET === null
				|| $this->API_SECRET == '';
		}

		private function throwInteralError() {
			header(':', true, 401);
		}
	}
?>

