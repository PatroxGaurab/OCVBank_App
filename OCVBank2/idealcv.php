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
ob_start();
?>
<html>
<head>
<title>My Resume</title>
</head>
<body>

<div id = "basic_info" name="basic_info" style="float:left; width:38.3333%">
<br>
<br>
<?php
$result=mysql_query("SELECT * FROM REGISTRATION where REGISTRATION_NO='".$_SESSION['id_no']."'");//change your session variable here also
        if($row = mysql_fetch_array($result)) {
?>
<strong><?php
echo $row['FULL_NAME'];
}
?></strong>
<br>
<?php
$result=mysql_query("SELECT * FROM basic where id_no='".$_SESSION['id_no']."'");//change your session variable here also
        if($row = mysql_fetch_array($result)) {
?>
<?php
echo $row['addr_1'];

?>
<br>
<?php
echo $row['addr_2'];

?>
<br>
<?php
echo $row['addr_3'];

?>
</div>

<div id = "logo" name="logo" style="float:left; width:33.3333%">
<center>
<img src="besu_logo.jpg" alt="BESU, Shibpur" height="150" width="150">
</center>
</div>
  <div id = "basic_info1" name="basic_info1" style="float:left; width:28%">
<br><br><br>
    Email: <?php
echo $row['email'];

?>
<br>
Ph No. : +91-<?php
echo $row['ph_no'];

?>
  </div>
<br style="clear:left"/>
<center>
Department of <strong><?php echo $row['dept'];}?></strong><br>
<strong>BENGAL ENGINEERING AND SCIENCE UNIVERSITY, SHIBPUR</strong>
</center>
<hr>
<strong>OBJECTIVE:</strong>
<br/>
<?php
$result=mysql_query("SELECT * FROM other where id_no='".$_SESSION['id_no']."'");//change your session variable here also
        if($row = mysql_fetch_array($result)) {
	
?>
<strong>TECHNICAL SKILLS:</strong><br/>
<?php
echo $row['oth_skills'];
}
?>
<?php
$result=mysql_query("SELECT * FROM other where id_no='".$_SESSION['id_no']."'");//change your session variable here also
        if($row = mysql_fetch_array($result)) {
	
?>
<strong>AREA OF INTEREST:</strong><br/>
<?php
echo $row['ar_interest'];
}
?>
<?php
$result=mysql_query("SELECT * FROM other where id_no='".$_SESSION['id_no']."'");//change your session variable here also
        if($row = mysql_fetch_array($result)) {
	
?>
<strong>SPECIAL ACHIEVEMENTS:</strong><br/>
<?php
echo $row['sp_achievements'];
}
?>
<?php
$result=mysql_query("SELECT * FROM other where id_no='".$_SESSION['id_no']."'");//change your session variable here also
        if($row = mysql_fetch_array($result)) {
	
?>
<strong>PROJECTS:</strong><br/>
<?php
echo $row['proj'];
}
?>
<?php
$result=mysql_query("SELECT * FROM other where id_no='".$_SESSION['id_no']."'");//change your session variable here also
        if($row = mysql_fetch_array($result)) {
	
?>
<strong>EXTRA-CURRICULAR ACTIVITIES:</strong><br/>
<?php
echo $row['ext_cur_act'];
}
?>
</body>
</html>
<?php
file_put_contents('cv.html', ob_get_contents());
?>
