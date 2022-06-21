<?php

include 'functions.php';

$link = $_GET['link'];

$show = 50000;
$tx = single_curl($link);
$strrpos = mb_strrpos($tx, " ");
$total = 1;
if (isset($_GET['p'])) {
	$page = abs(intval($_GET['p']));
	if ($page == 0) $page = 1;
}
else {
	$page = 1;
}
$ta = 0;
if ($strrpos) {
	while ($ta < $strrpos) {
		$string = mb_substr($tx, $ta, $show);
		$tb = mb_strrpos($string, " ");
		$m_sim = $tb;
		$strings[$total] = $string;
		$ta = $tb + $ta;
		if ($page == $total) {
			$nd = $strings[$total];
		}
		if ($strings[$total] == "") {
			$ta = $strrpos++;
		}
		else {
			$total++;
		}
	}
	if ($page >= $total) {
		$page = $total - 1;
		$nd = $strings[$page];
	}
	$total = $total - 1;
	if ($page != $total) {
		$prb = mb_strrpos($nd, " ");
		$nd = mb_substr($nd, 0, $prb);
	}
}
else {
	$nd = $tx;
}


if (isset($_GET['nd'])) {
	// header("Content-Type: text/plain");
	// echo $nd;
	$time = time() . '.txt';
	file_put_contents($time, $nd);
	header('Location: vietphrase.php?link=' .  base_url() . $time);
	exit;
}

echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo $total;

for ($i=1; $i <= $total; $i++) { 
	echo '<p><a href="?link='.$link.'&nd&p='.$i.'">TXT PHAN '.$i.'</a></p>';
}
