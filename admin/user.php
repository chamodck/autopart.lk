<?php include "header.php"; 
include "sessioncheck.php";?>

<style type="text/css">
#apDiv1 {
	position:absolute;
	left:3px;
	top:200px;
	width:100%;
	height:81px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:-1px;
	top:-115px;
	width:404px;
	height:92px;
	z-index:2;
	border-radius: 20px;
	background-color:#CCC;
	font-weight: bold;
}
#publish {
	position:absolute;
	left:28px;
	top:151px;
	width:100%;
	height:1300px;
	z-index:2;
	font-weight: bold;
}
.searchtext {
	position: absolute;
	border-width:3px;
	border-style: inset;
	background-color:#fff;
	left: 9px;
	font-size:16px;
	font-family:"Arial Black", Gadget, sans-serif;
	top: 33px;
	width: 257px;
	height: 26px;
}
.searchtext:focus{
	color:#000;
}
.searchbutton {
	position: absolute;
	left: 289px;
	top: 29px;
	width: 103px;
	height: 29px;
	background-color: #00b300;
	font-weight: bold;
	font-size: 16px;
	border-radius: 20px;
}
</style>
<body background="images/cover.jpg">
<div id="apDiv1">
<div id="apDiv2">
  <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> ">
    <p>........SEARCH USER........</p>
    <p>
      <label for="textfield"></label>
      <input name="textfield" type="text" class="searchtext" id="textfield" required/>
      <input name="button" type="submit" class="searchbutton" id="button" value="SEARCH" />
    </p>
    <p>&nbsp;</p>
  </form>
</div>
</div>
<div id="publish">
<script type="text/javascript">  
function msg(){  
var v= confirm("Are u sure?");  
if(v==true){  
alert("ok");  
}  
else{  
alert("cancel");  
}  
  
}  
</script>
<?php
if ( isset($_POST['button']))
{
include '../database/dbconnect.php';
$found =0;
$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);
$word =mysql_real_escape_string(stripslashes($_POST['textfield']));
$word = str_replace(' ','',$word);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
       $string = $row['username'];	   
	   $line = strtolower($string);
	   if(strpos($line,strtolower($word))>-1) 
	   {	++$found;
	   		   
	   		

?>
<style type="text/css">
#ap<?php echo $found; ?>
{
	position:absolute;
	left:180px;
	top:<?php echo 120*$found?>px;
	width:800px;
	height:100px;
	z-index:2;
	border-radius: 20px;
	border-style:solid;
	border-width:2px;
	background-color:#F8F7F1;
	font-weight: bold;	
}
</style>
<div id="ap<?php echo $found; ?>">
<table width="750" height="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#F8F7F1" >
<tr>
<td><table width="100%" height="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#F8F7F1">
<tr>
<td width="100%" bgcolor="#F8F7F1"><table><tr>
<td width="10%" bgcolor="#F8F7F1" align='left'><img src="\autopart\images\face.png" alt="" border=3 height=30 width=30></img></td>
<td width="70%"bgcolor="#F8F7F1" align="left"><a href= "/autopart/admin/profile.php?user=<?php echo $row["userID"];?>" target="_blank" >View Profile</a></td>
</tr></table></td>
</tr>
<tr>
<td bgcolor="#F8F7F1"><strong><?php echo $row['username']."  ||  ".$row['email']."  ||  ".$row['mobilenumber']; ?></strong></td>
<td bgcolor="#F8F7F1" align="right"><a href= "remove.php?detail=<?php  echo "user".",".$row["userID"];?>" onClick="msg()"><img src="images/remove.jpg" alt="" border=2 height=28 width=30></img></a></td>
</tr>
</table></td>
</tr>
</table><br>
</div>
<?php	   
 }//if
		    
}//while
}//if
if($found == 0)
{
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<table width="1000"  >
<tr>
<td width="100%" align="left"><strong><?php echo "Not Founded" ?></strong></td>
</tr>
</table>
<?php
}//if found
mysqli_close($conn);
}
?>
</div>
</body>

