<?php
include("server.php");
$sercon = server_connection();
$dbconn = dbconnection($sercon);

session_start();
if(isset($_SESSION['user_name']))
{
	$usr = $_SESSION['id_no'];
	//echo("<script>alert('$usr')</script>");
}
else
{	
	echo("<script>alert('Sorry!! You need to log in to access this page')</script>");
	header("Location: home.php");
}
$id_no = $_SESSION['id_no'];
$fieldname=mysql_real_escape_string($_POST['fieldname']);
$fieldafter=mysql_real_escape_string($_POST['fieldafter']);
//echo "<script>alert('$fieldafter')</script>";
$data_string = "SELECT id_no from custom where id_no='$id_no'";
$rowno = mysql_num_rows(mysql_query($data_string));

if(!$rowno)
{

	$data_string="INSERT INTO custom(id_no,nooffields,field1after,field1name) VALUES('$id_no','1','$fieldafter','$fieldname')";
}
mysql_query($data_string);
header("Location: index.php");
?>
