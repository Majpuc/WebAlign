<?php

$referer=$_SERVER["HTTP_REFERER"];
$validator="https://".$_SERVER["SERVER_NAME"]."/";
strpos($referer,$validator) === 0 or die("!");

$ch = curl_init("https://data-proxy.ebrains.eu/api/buckets/".filter_input(INPUT_SERVER, "QUERY_STRING"));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Accept: application/json",
        "Authorization: " . filter_input(INPUT_COOKIE, "bucket-bearer")
    )
);
$res = curl_exec($ch);
curl_close($ch);