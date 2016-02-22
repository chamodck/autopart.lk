<head>
<link rel="stylesheet" type="text/css" href="css/profilenew.css">
<?php 
	include "header.php";
	include "sessioncheck.php";
	$id=$_GET['user'];  
	
	include "../database/dbconnect.php";
    $sql = "SELECT * FROM user where userID='$id'";
    $result = mysqli_query($conn,$sql);
    $rws0 = mysqli_fetch_array($result);
	$userid= $rws0['userID'];	
	$username=$rws0['username'];
	$mobile=$rws0['mobilenumber'];
	$email=$rws0['email'];
	
?>
<style type="text/css">
.main {
	position: absolute;
	width: 1081px;
	height: 823px;
	top: 100px;
	left: 186px;
}
.edit {
	font-size: 14px;
	font-weight: bolder;
	background-color: #999;
	position: absolute;
	z-index:3;
	left: -29px;
	top: -468px;
}
#apDiv2 {
	position:absolute;
	left:919px;
	top:710px;
	width:89px;
	height:30px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:864px;
	top:188px;
	width:122px;
	height:27px;
	z-index:5;
	font-weight: bold;
	color: #000;
	font-size: 18px;
}
</style>


<script>

function selectFunction(variable){
		
		

				if (variable == 0)
		{			
		document.getElementById("apDivTopic0").style.zIndex = 8;
		
		document.getElementById("apDivTag0").style.color = "black" ;
		document.getElementById("apDivTag1").style.color = "grey" ;
		document.getElementById("apDivTag2").style.color = "grey" ;
	
		
		document.getElementById("apDivOptionBox0").style.visibility = "visible";
		document.getElementById("apDivOptionBox1").style.visibility = "hidden";
		document.getElementById("apDivOptionBox2").style.visibility = "hidden";
	
		
		document.getElementById("apDivBar0").style.background = "orange";
		document.getElementById("apDivBar1").style.background = "white";
		document.getElementById("apDivBar2").style.background = "white";
	
		
		document.getElementById("apDivProfBox").style.height = "400px" ;	

		
		}

		if (variable == 1)
		{
			
		document.getElementById("apDivTopic1").style.zIndex = 8;
		
		document.getElementById("apDivTag1").style.color = "black" ;
		document.getElementById("apDivTag0").style.color = "grey" ;
		document.getElementById("apDivTag2").style.color = "grey" ;
		
		
		document.getElementById("apDivOptionBox0").style.visibility = "hidden";
		document.getElementById("apDivOptionBox1").style.visibility = "visible";
		document.getElementById("apDivOptionBox2").style.visibility = "hidden";
		
		
		document.getElementById("apDivBar1").style.background = "orange";
		document.getElementById("apDivBar0").style.background = "white";
		document.getElementById("apDivBar2").style.background = "white";
		
		
		document.getElementById("apDivProfBox").style.height = "400px" ;

		}
		if (variable == 2)
		{
			
		document.getElementById("apDivTopic2").style.zIndex = 8;
		
		document.getElementById("apDivTag2").style.color = "black" ;
		document.getElementById("apDivTag1").style.color = "grey" ;
		document.getElementById("apDivTag0").style.color = "grey" ;
		
		
		document.getElementById("apDivOptionBox0").style.visibility = "hidden";
		document.getElementById("apDivOptionBox1").style.visibility = "hidden";
		document.getElementById("apDivOptionBox2").style.visibility = "visible";
		
		
		document.getElementById("apDivBar2").style.background = "orange";
		document.getElementById("apDivBar1").style.background = "white";
		document.getElementById("apDivBar0").style.background = "white";
		
		
		
		document.getElementById("apDivProfBox").style.height = "400px" ;		
		
		}
			
} 
</script>


</head>

<body>
<div class="main">

<div id="spProfEditContainer"> 


<div id="apDivProfBox">

  <div id="apDivProfAbout">

		<div id="apDivIcon"><img src="../images/face.png" width="40" height="39" alt="icon" /></div>

		<div id="apDivAbout">View</div>
      </div>

   

  <div id="apDivTopicList">

		<a href="#">
		<div id="apDivTopic0">
			<div id="apDivBar0"> </div>
		  <div id="apDivTag0" onclick = "selectFunction(0);">My Details</div>
		</div>
    	</a>

		<a href="#">
		<div id="apDivTopic1" style= "top:65px">
		  <div id="apDivBar1" ></div>
		  <div id="apDivTag1" onclick = "selectFunction(1)">Add Cart Details</div>
		</div>
        </a>
        <a href="#">
		<div id="apDivTopic2" style= "top:130px">
		  <div id="apDivBar2" ></div>
		  <div id="apDivTag2" onclick = "selectFunction(2)">Sell Parts Details</div>
		</div>
        </a>

        
  </div>






 <div id="apDivOptionBox0">
<table width="500" border="0" align="left" >
 <tr>
<td><table width="100%" border="0" align="center">
<tr><td></td></tr>
<tr><td></td></tr>
<tr><td></td></tr>
<tr>
<td><strong>Name</strong></td>
<td><?php echo $username;?></td>
</tr>
<tr><td height="10"></td></tr>
<tr>
<td ><strong>Email</strong></td>
<td ><?php echo $email;?></td>
</tr>
<tr><td height="10"></td></tr> 
<tr>
<td ><strong>Mobile</strong></td>
<td ><?php echo $mobile?></td>
</tr> 
</table>
</td>
</tr>
</table>
    


  </div>
    
<div id="apDivOptionBox1">
<table>
<tr>
<td><strong>History</strong></td>
<td align="center">
<strong><?php echo "NOt founda" ?></strong>
</td>
</tr>
<tr>
    <td></td>
    </tr>
    <tr>
    <td></td>
    </tr>
<tr>
<td><strong>Websites</strong></td>
<td>
<strong><?php	echo "Not Found"; ?></strong>
</td>
</tr>
</table>
 </div>
 <div id="apDivOptionBox2">    
  </div>
      
</div>

</div>
</div>
</body>
</html>
