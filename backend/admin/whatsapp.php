<?php

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://whin2.p.rapidapi.com/webhk?gid=81012020742023",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: whin2.p.rapidapi.com",
		"X-RapidAPI-Key: d1ac67f6c8msh95105132dafe1bcp164ad9jsn5481e6d114f9"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}