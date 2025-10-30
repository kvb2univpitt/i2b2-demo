<?php

$script = filter_input(INPUT_SERVER, 'SCRIPT_FILENAME', FILTER_UNSAFE_RAW);
$https = filter_input(INPUT_SERVER, 'HTTPS', FILTER_UNSAFE_RAW);
$hostname = filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_UNSAFE_RAW);
$requestUri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_UNSAFE_RAW);
$shib_handler = filter_input(INPUT_SERVER, 'AJP_Shib-Handler', FILTER_UNSAFE_RAW);

$scriptFilename = basename($script);
$path = str_replace($scriptFilename, '', $requestUri);
$url = (isset($https) && $https === 'on' ? "https" : "http") . "://{$hostname}{$path}saml-acs.php";
$redir_url = rtrim($url, '/');

header("Location: {$shib_handler}/Login?target={$redir_url}");
