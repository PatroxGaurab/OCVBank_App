<?php
include("server.php");
$sercon = server_connection();
$dbconn = dbconnection($sercon);
session_start();
$id_no = mysql_real_escape_string($_GET['id']);
//echo $id_no;
//echo("<script>alert('$id_no')</script>");
$query1 = mysql_query('select CHECK_FIELD from REGISTRATION where REGISTRATION_NO="'.$id_no.'"');
if (mysql_num_rows($query1)) {
    $score = mysql_fetch_assoc($query1);
	$score1=$score['CHECK_FIELD'];
}
else {
    echo 1;
}
//echo("<script>alert('$query1')</script>");
if($score1=="FALSE")
{
	$str="TRUE";
	$query2=mysql_query('update REGISTRATION set CHECK_FIELD="'.$str.'" where REGISTRATION_NO="'.$id_no.'"');
	echo("<script>alert('$id_no')</script>");
	//echo("<script>window.location('home.php')</script>");
        header("Location: home.php");
}
else
{
	echo("<script>alert('Already Confirmed')</script>");
	//echo("<script>window.location('home.php')</script>");
        header("Location: home.php");
}
?>
