<?php
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-type: application/json');

	require_once('config.php');
	if($_SERVER['REQUEST_METHOD'] == "POST") {
		if($_POST['endpoint'] == 'settings') {
			if(Config::writeSettings($_POST['data'])) {
				header(':', true, 200);
			} else {
				header(':', true, 500);
			}
		}
	} else {
		new Config();
	}
?>