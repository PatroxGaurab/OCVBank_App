<?php
//code to be added

include("server.php");

$sercon = server_connection();
$dbconn = dbconnection($sercon);
session_start();
$id_no = $_SESSION['id_no'];

$projects=mysql_real_escape_string($_POST['proj']);
$data_string = "SELECT id_no from other where id_no='$id_no'";
$rowno = mysql_num_rows(mysql_query($data_string));
if(!$rowno)
$data_string="INSERT INTO other(id_no,ar_interest) VALUES('$id_no','$projects')";
else
$data_string="UPDATE other SET proj='$projects' where id_no='$id_no'";

mysql_query($data_string);
header("Location: index.php");

?>
