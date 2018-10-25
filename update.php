<?php
	if ($_POST["token"] != trim(file_get_contents('key.txt'))) {
		die('Invalid key my dude');
	}
	$awardee = trim($_POST["text"]);
	if (strlen($awardee) > 50) {
		die('Too many letters my dude');
	}
	file_put_contents('./recipient.txt', $awardee);
	file_put_contents('./historical.txt', 'time='.time().'&'.http_build_query($_POST).PHP_EOL, FILE_APPEND | LOCK_EX);
	header("Content-Type: application/json");
	print(json_encode(array(
		'response_type'=> 'in_channel',
		'text'=> "$awardee has been awarded the prestigious Jay Farrimond Memorial Crossing the Line Award!",
		'attachments'=>array(
			array(
				"title"=>"Jay Farrimond Memorial Crossing the Line Award",
				'title_link'=>'http://jfmctla.com/',
				"thumb_url"=>"http://jfmctla.com/award?thumb=true&recipient=".urlencode($awardee),
				'fields'=>array(
					array(
						'title'=>'Awarded By',
						'value'=>$_POST['user_name'],
						'short'=>false
					)
				)
			)
		)
	)));
?>
