
<?php
/*echo "<script>alert('Something went wrong, Please try again')</script>";
echo "<script>alert('Hi')</script>";*/
include("server.php");

$sercon = server_connection();
$dbconn = dbconnection($sercon);
session_start();

$fullname = mysql_real_escape_string($_POST['full_name']);
$id_no = mysql_real_escape_string($_POST['id_no']);
if(strlen($id_no)!=9)
	echo("<script type='text/javascript'>window.location('home.php')</script>");

 
$email = mysql_real_escape_string($_POST['email']);
$email2=$email."@students.becs.ac.in";
echo $email2;
$passwd=md5(mysql_real_escape_string($_POST['password']));

$dn = mysql_num_rows(mysql_query('select REGISTRATION_NO from REGISTRATION where EMAIL_ID="'.$email2.'"'));
if($dn != 0)
{
	//echo "<script>window.location('home.php')";
header("Location: home.php");
}
$reg_string="INSERT INTO REGISTRATION VALUES('$fullname','$id_no','$email2','$passwd','FALSE')";

$registration = mysql_query($reg_string);



$subject = "MozTI@BESU-Event Registration.";
$message = "Hello $fullname!
Thanks for registering for the event. You Registration Code is MozTI$id_no.
If you have any suggestion regarding the events, speakers, session etc, do feedback us.
Please read the following carefully

Since you have successfully registered and have been added to our database of attendees your seat is reserved.

Please bring your Identity Proof on the day of the event

You have to tell the Registration Code sent to you on mail on the day of the event.

http://moztibesu.webuda.com/OCVBank1/confirm.php?id=$id_no

Regularly visit our website for further updates.
MozTI@BESU Team
moztiatbesu@students.becs.ac.in";
					$from = "moztiatbesu@students.becs.ac.in";
					$headers = "From:" . $from;
					mail($email2,$subject,$message,$headers);
echo "<script>alert('Hi')</script>";


?>

