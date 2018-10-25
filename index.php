<html>
<?php
	$recipient = trim(file_get_contents("./recipient.txt"));
?>
	<head>
		<title>Jay Farrimond Memorial Crossing The Line Award</title>
		<style>
			body {
				padding: 0px;
				margin: 0px;
			}
			#award {
				text-align: center;
				padding-top: 100px;
				position: relative;
			}
		</style>
	</head>
	<body>
		<div id="stage">
			<div id="award">
				<img src="/award?recipient=<?=urlencode($recipient)?>" width="541" height="508">
			</div>
		</div>
	</body>
</html>

