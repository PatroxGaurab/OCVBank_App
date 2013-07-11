<?php
function server_connection(){
$con=mysql_connect('localhost','public_user','thisUSERdoesITaLL');
if(!$con)
 die("Could not connect: ".mysql_error());
return $con;
}

function dbconnection($sercon)
   {      
      $dbconn = mysql_select_db("OCV", $sercon)
      //$dbconn = mysql_select_db("teststaffir", $sercon)  
      or die("Database connection not completed");      
      return $dbconn;      
   }   

?>
