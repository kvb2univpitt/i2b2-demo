<?php
session_start();
$shib_handler = filter_input(INPUT_SERVER, 'Shib-Handler', FILTER_SANITIZE_STRING);
$hostname = filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_STRING);

$_SESSION["Shib-Handler"] = $shib_handler;

header("Location: https://${hostname}");