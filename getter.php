<?php

// Getter Bot

function url_get_contents ($Url) {
	if (!function_exists('curl_init')){ 
		die('CURL is not installed!');
	}
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $Url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}


$url = 'https://www.wikipedia.org';


if(isset($_GET['url']))
{
	$var = $_GET['url'];
	$url = base64_decode($var);
}

if( ini_get('allow_url_fopen') ) {

	$html = file_get_contents($url);

	echo $html;
	return '';
}
else
{
	echo url_get_contents($url);

	// echo 'Not enabled';
	return '';
}

?>
