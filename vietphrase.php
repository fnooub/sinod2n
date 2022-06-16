<?php

if (isset($_GET['link'])) {
	include "functions.php";
	$file = single_curl('http://vietphrase.info/VietPhrase/Browser?url='.$_GET['link'].'&script=false&t=VP');

	//$file = nl2br($file);

	preg_match('#<pre.+?>(.+?)<\/pre>#is', $file, $out);

	header("Content-Type: text/plain");

	echo $out[1];
	exit;
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<form action="" method="get">
	<input type="text" name="link"><br>
	<input type="radio" id="line" name="line" value="line">
	<label for="line">line</label><br>
	<input type="submit">
</form>
