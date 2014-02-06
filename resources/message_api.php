<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "[KEY_HERE]:X");
curl_setopt($ch, CURLOPT_URL, "https://api.sqwiggle.com/messages");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, '3');
$content = trim(curl_exec($ch));
curl_close($ch);

$data = json_decode($content);
foreach ($data as $id => $value) {
	if($value->text != ""){
		if($value->author->name != everywhere_api){
		echo '<div id="nm"> <img class="avatar" src="'.$value->author->avatar.'" alt="avatar" /> ' . $value->author->name . '</div>';
		}
	}
	
	if($value->type == 'message'){
		if($value->text != ""){
			echo '<div id="msg">' . $value->text;
			
			foreach($value->attachments as $attachments){ 
				if($attachments->title != ""){ 
							echo '<a href="'.$attachments->url.'"><div class="attachment">';
							if($attachments->image != ""){
							echo '<div class="attachment_image"><img src="'.$attachments->image.'" /></div>';
							}
							echo '<div class="attachment_title">'.$attachments->title.'</div>';
							echo '<div class="attachment_desciption">'.$attachments->description.'</div>';
							echo '</div></a>';
				}
			}
			echo '<div class="clear"></div>';
			echo '<div class="timestamp">'.date("H:i:s d-m-Y",strtotime($value->created_at)).'</div>';
			echo '<div class="clear"></div>';
			echo '</div>';
		}	
		 
	} 
	if($value->type == 'conversation'){
		echo '<div id="convomsg"> Conversation '.$value->conversation->status;
			echo '<div style="height: 2.5em;">';
				foreach($value->conversation->participated as $participants){
					echo  '<img class="avatar" src="'.$participants->avatar.'" alt="avatar" />';
				}
			echo '<div style="padding-top: 0.5em; ">Had a '.round((($value->conversation->duration)/60)).' min conversation.</div>'; 
		
			echo '</div>'; 
			//echo '<div class="clear"></div>';
			//echo '<div class="timestamp">'.date("H:i:s d-m-Y",strtotime($value->created_at)).'</div>';
			echo '<div class="clear"></div>';
		echo '</div>';
	}
	if($value->type == 'html'){
		if($value->text != ""){
			echo '<div id="apimsg"><img class="avatar" src="'.$value->author->avatar.'" alt="avatar" />' . $value->text;
			
			echo '<div class="clear"></div>';
			echo '<div class="timestamp">'.date("H:i:s d-m-Y",strtotime($value->created_at)).'</div>';
			echo '<div class="clear"></div>';
			echo '</div>';
		}
		
	}	
}
?>