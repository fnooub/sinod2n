<?php

if (isset($_GET['link'])) {
	include "functions.php";
	$file = single_curl('https://dichngay.com/translate?u=' . $_GET['link']);

	echo $file;
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