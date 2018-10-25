<?php
	$recipient = $_GET['recipient'];
	if (!$recipient || strlen($recipient) > 50) {
		  $recipient = "Your Mom";
	}
	$award = imagecreatefrompng("blankaward.png");

	$box = @imagettfbbox(28, 0, './font.ttf', $recipient);
	$width = abs($box[4] - $box[0]);
	$height = abs($box[5] - $box[1]);

	$nameimage = imagecreatetruecolor($width + 20, $height + 20);
	imagefill($nameimage, 0, 0, imagecolorallocatealpha($nameimage, 255, 255, 255, 127));
	$shad_color = imagecolorallocatealpha($nameimage, 255, 255, 0, 124);
	for ($xoff = -3; $xoff <= 3; $xoff++) {
		for ($yoff = -3; $yoff <= 3; $yoff++) {
			imagettftext($nameimage, 28, 0, abs($box[0]) + 10 + $xoff, abs($box[5]) + 10 + $yoff, $shad_color, "./font.ttf", $recipient);
		}
	}
	$text_color= imagecolorallocate($nameimage, 48, 15, 0);
	imagettftext($nameimage, 28, 0, abs($box[0]) + 10, abs($box[5]) + 10, $text_color, "./font.ttf", $recipient);
	$tx = (1082 - ($width + 20)) / 2;
	$ty = 910;
	imagecopy($award, $nameimage, $tx, $ty, 0, 0, $width + 20, $height + 20);

	header("Content-type: image/jpeg");
	header("Cache-Control: public, max-age=86400");
	// imagetruecolortopalette($award, true, 24);
	// imagecolortransparent($award, imagecolorat($award, 1, 1));
	imagejpeg($award);
?>
