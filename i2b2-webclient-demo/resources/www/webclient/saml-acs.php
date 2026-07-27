<?php

session_start();

$_SESSION["shib-session-id"] = filter_input(INPUT_SERVER, 'AJP_Shib-Session-ID', FILTER_UNSAFE_RAW);
$_SESSION["eppn"] = filter_input(INPUT_SERVER, 'AJP_eduPersonPrincipalName', FILTER_UNSAFE_RAW);

$error_msg;
if (isset($_SESSION['error_msg'])) {
    $error_msg = $_SESSION['error_msg'];
    unset($_SESSION['error_msg']);
}

$success_msg;
if (isset($_SESSION['success_msg'])) {
    $success_msg = $_SESSION['success_msg'];
    unset($_SESSION['success_msg']);
}

?>


<html>
  <body>
<?php
  if (empty($_SESSION["shib-session-id"])) {
      ?><h1>Error: The Shibbolith session ID is missing!</h1><?php
  } else {
      ?><script type="text/javascript">window.opener.i2b2.PM.ctrlr.SamlLogin("<?php echo $_SESSION["eppn"]; ?>", "<?php echo $_SESSION["shib-session-id"]; ?>", true);</script><?php
  }
?>
  </body>
</html>
