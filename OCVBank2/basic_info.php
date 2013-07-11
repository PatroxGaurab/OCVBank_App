<?php
//code to be added
include("server.php");

$sercon = server_connection();
$dbconn = dbconnection($sercon);
session_start();
$id_no = $_SESSION['id_no'];
$email=mysql_real_escape_string($_POST['email_basic']);
$phone=mysql_real_escape_string($_POST['phone']);
$address1=mysql_real_escape_string($_POST['address_1']);
$address2=mysql_real_escape_string($_POST['address_2']);
$address3=mysql_real_escape_string($_POST['address_3']);
$dept=mysql_real_escape_string($_POST['dept']);
$sem=mysql_real_escape_string($_POST['sem']);
$department="";



if($dept=="cst")
{
 $department="Computer Science and Technology";
}
else if($dept=="it")
{
 $department="Information Technology";
}  
else if($dept=="etc")
{
 $department="Electronics and Telecommunication";
}  
$data_string = "SELECT id_no from basic where id_no='$id_no'";
$rowno = mysql_num_rows(mysql_query($data_string));
if(!$rowno)
$data_string="INSERT INTO basic VALUES('$id_no','$email','$phone','$address1','$address2','$address3','$department','$sem')";
else
$data_string="UPDATE basic SET email='$email', ph_no='$phone', addr_1='$address1', addr_2='$address2', addr_3='$address3', dept='$department', sem='$sem' WHERE id_no='$id_no'";
mysql_query($data_string);
header("Location: index.php");
?>
