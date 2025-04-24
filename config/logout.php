<?php
require_once 'session_cookie.php';
session_start();
$_SESSION = [];

session_destroy();
header("Location: /Web_assignment/index.php");

exit();

?>