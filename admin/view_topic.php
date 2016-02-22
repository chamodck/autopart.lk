<link href="css/forum.css" rel="stylesheet">
<?php include "sessioncheck.php" ;?>
<?php include 'header.php'; ?> 
<style type="text/css">
.createtabel {
	position: absolute;
	left: 127px;
	top: 175px;
	width: 724px;
	height: 450px;
}
#apDiv11 {
	position:absolute;
	left:765px;
	top:333px;
	width:579px;
	height:284px;
	z-index:4;
}
.image {
	position: absolute;
	width: 457px;
	height: 238px;
	left: 114px;
	top: 44px;
}
#apDiv12 {
	position:absolute;
	left:914px;
	top:150px;
	width:379px;
	height:165px;
	z-index:5;
}
.backto {
	font-weight: bold;
	cursor:hand;
}
.image2 {
	position: absolute;
	left: 44px;
	width: 281px;
	top: 34px;
	height: 175px;
}
#answer{
	border-style: outset;
	border-width: 3px;
	border-color: #0F0;;
	background-color:#0F0;;
	cursor:hand;
	font-weight: bold;
}
#a_answer
{
	border-width: 3px;
	border-style:outset;
}
</style>
</head>

<body>

<?php
 
include "../database/dbconnect.php";

$id=$_GET['id'];
$sql="SELECT * FROM fquestions WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);
?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="createtabel">
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCC" class="viewtopic3">
<td bgcolor="#ccc"><strong><?php echo $rows['topic']; ?></strong></td>
</tr>
<tr>
<td bgcolor="#ccc" align="left"><?php echo "by ".$rows['user']."  -    ".$rows['datetime']; ?></td>
</tr>  
<tr>
<td bgcolor="#F8F7F1" height="75%"> <p><?php echo $rows['detail']; ?></p>
  <p>&nbsp;</p></td>
</tr>

</table></td>
</tr>
</table>
<BR>
 
<?php
include "../database/dbconnect.php";
$sql2="SELECT * FROM fanswer WHERE question_id='$id'";
$result2 = mysqli_query($conn, $sql2);
while($rows=mysqli_fetch_array($result2)){
?>
<table align="center" width="1000">
<tr>
<td>
<table width="95%" border="0"  align="right" cellpadding="0" cellspacing="1" bgcolor="#CCC" class="viewtopic3">
 <tr>
<td bgcolor="#ccc"><strong>RE :</strong></td>
</tr>
<tr>
<td bgcolor="#ccc" align="left"><?php echo "by ".$rows['user']."  -    ".$rows['a_datetime']; ?></td>
</tr>  
<tr>
<td bgcolor="#F8F7F1" height="75%"> <p><?php echo $rows['a_answer']; ?></p>
  <p>&nbsp;</p></td>
</tr>

</table></td>
</tr>
</table>
</td>
</tr>
</table><br>
  
<?php
}
 
$sql3="SELECT view FROM fquestions WHERE id='$id'";
$result3=mysqli_query($conn,$sql3);
$rows=mysqli_fetch_array($result3);
$view=$rows['view'];
 
// if have no counter value set counter = 1
if(empty($view)){
$view=1;
$sql4="INSERT INTO fquestions(view) VALUES('$view') WHERE id='$id'";
$result4=mysqli_query($conn,$sql4);
}
 
// count more value
$addview=$view+1;
$sql5="update fquestions set view='$addview' WHERE id='$id'";
$result5=mysqli_query($conn,$sql5);
mysqli_close($conn);
?>
 
<BR>
<table width="600" border="2" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="viewtopic2">
<tr>
<form name="form1" method="post" action="add_answer.php">
<td>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td valign="top"><strong>Answer</strong></td>
<td valign="top">:</td>
<td><textarea name="a_answer" cols="60" rows="7" id="a_answer"  required></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
<td><input type="submit" name="Submit" value="Submit" id="answer"> </td>
</tr>
</table>
</td>
</form>
</tr>
</table>
</div>
<p>&nbsp;</p>
<p class="backto">  	<a href="forum.php">&lt;&lt;BACK TO FORUM</a></p>

</body>