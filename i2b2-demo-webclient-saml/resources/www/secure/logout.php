<?php
session_start();

$shib_handler = filter_input(INPUT_SERVER, 'Shib-Handler', FILTER_SANITIZE_STRING);
$hostname = filter_input(INPUT_SERVER, 'SERVER_NAME', FILTER_SANITIZE_STRING);
$url = "${shib_handler}/Logout?return=https://${hostname}/";

unset($_SESSION["Shib-Handler"]);

header("Location: ${url}");