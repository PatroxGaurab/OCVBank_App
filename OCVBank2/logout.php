<?php
include("server.php");
$sercon = server_connection();
$dbconn = dbconnection($sercon);
session_start();
//echo '<script>alert("index.php")</script>';
$_SESSION = array();
session_destroy();
header("Location: home.php");
?>
