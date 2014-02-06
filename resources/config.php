<?php
	class Config {
		var $secret = 'SECRET_GOES_HERE';
		
		public function Config() {
		}
		public function getSecret() {
			return $this->secret;
		}
	}
?>