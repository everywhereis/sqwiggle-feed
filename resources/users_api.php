<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "[KEY_HERE]:X");
curl_setopt($ch, CURLOPT_URL, "https://api.sqwiggle.com/users");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, '3');
$content = trim(curl_exec($ch));
curl_close($ch);

$data = json_decode($content);
foreach ($data as $id => $value) {
	if($value->status == 'offline'){
	echo '<li class="menu-item-divided pure-menu-offline"><a href="#">' . $value->name . '</a></li>';
	}
	if($value->status == 'busy'){
	echo '<li class="menu-item-divided pure-menu-busy" ><a href="#">' . $value->name . '</a></li>';
	}
	if($value->status == 'available'){
	echo '<li class="menu-item-divided pure-menu-available" ><a href="#">' . $value->name . '</a></li>';
	}
	
}
?>