<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php

if (isset($_POST['text'])) {
	$urls = explode("\n", $_POST['text']);
	$newfile = time() . '.txt';
	foreach ($urls as $key => $value) {
		$myfile = fopen($newfile, "a") or die("Unable to open file!");
		$txt = file_get_contents($value);
		fwrite($myfile, $txt);
		fclose($myfile);
	}
	header('Location: ' . $newfile);
}

?>

<form action="" method="post">
	<textarea name="text" style="width: 100%; height: 35%"></textarea>
	<input type="submit">
</form>