<?php include "sessioncheck.php";
	include "header.php";
?>

<style type="text/css">


p{	
	color: rgba(51,51,51,1);
	font-size:18px;
	}

h3{
	line-height: 40%;	

}
 .FAQ { 
 		cursor:hand; cursor:pointer;
        border:1px solid darkorange;
        border-radius: 10px;
        width:250px; 
        background-color: #f0f0f0;
       // padding :5px;  	
        
        
    }

 .FAA { 
 	display:none;	
 	 }


#apDivTitle{
	position: absolute;
	left: 40px;
	top: 93px;
	width: 302px;
	height: 105px;
	z-index: 111;
}
#show1{
	position:absolute;
	left:500px;
	top:150px;
	width:628px;
	height:347px;
	z-index:2;
	background-color: rgba(51,51,51,0.4);
	border-radius : 40px;
	
}
#show2 {
	position:absolute;
	left:500px;
	top:150px;
	width:628px;
	height:347px;
	z-index:2;
	background-color:rgba(51,51,51,0.4);
	border-radius : 40px;
}
#show3 {
	position:absolute;
	left:500px;
	top:150px;
	width:628px;
	height:347px;
	z-index:2;
	background-color:rgba(51,51,51,0.4);
	border-radius : 40px;
}
#show4 {
	position:absolute;
	left:500px;
	top:150px;
	width:628px;
	height:347px;
	z-index:2;
	background-color:rgba(51,51,51,0.4);
	border-radius : 40px;
}
</style>

<script type="text/javascript">
	function toggle(Info) {
  		var CState = document.getElementById(Info);
		var CState1 = document.getElementById('show1');
		var CState2 = document.getElementById('show2');
		var CState3 = document.getElementById('show3');
		var CState4 = document.getElementById('show4');
		if(Info =="show1")
		{
			CState2.style.display = 'none';
			CState3.style.display = 'none';
			CState4.style.display = 'none';
		}
		else if(Info =="show2")
		{
			CState1.style.display = 'none';
			CState3.style.display = 'none';
			CState4.style.display =  'none';
		}
			else if(Info =="show3")
		{
			CState1.style.display = 'none';
			CState2.style.display = 'none';
			CState4.style.display = 'none';
		}
			else if(Info =="show4")
		{
			CState1.style.display = 'none' ;
			CState2.style.display =  'none' ;
			CState3.style.display = 'none';
		}
		
		
  		CState.style.display = (CState.style.display != 'block') ? 'block' : 'none';
		}
</script>


<body background="images/cover.jpg">
<div  id="apDivTitle">
<h1 align="left">Manage Options</h1>
<div class="FAQ" onClick="toggle('show1')">	
<h3 align="left"><img src="images/j.png" alt="expand" style="width:30px;height:30px;">  Users</h3>
</div>
<DIV class="FAQ" onClick="toggle('show2')">
<h3 align="left"><img src="images/j.png" alt="expand" style="width:30px;height:30px;"> Parts</h3>
</DIV>
<DIV class="FAQ" onClick="toggle('show3')">
<h3 align="left"><img src="images/j.png" alt="expand" style="width:30px;height:30px;"> Forum</h3>
</DIV>
<DIV class="FAQ" onClick="toggle('show4')">
<h3 align="left"><img src="images/j.png" alt="expand" style="width:30px;height:30px;">Jobs</h3>
 </DIV>

</div>

<div id="show1" class="FAA">
 <p>&nbsp;</p>
<table width="500" align="center" cellspacing="20" >
      	  <tr >
        <td width="25%" height="100" align="center"><a href="user.php"><img src="images/1.jpg" height="100" width="100"></img></a></td>
             </tr>
        <tr>
         <td width="25%" height="50" align="center" class="tablefont"><a href="user.php"><strong>User</strong></a></td>
         </tr>
    </table>
</div>
<div id="show2" class="FAA">
 <p>&nbsp;</p>
<table width="500" align="center" cellspacing="20" >
      	  <tr >
        <td width="25%" height="100" align="center"><a href="#"><img src="images/1.jpg" height="100" width="100"></img></a></td>
        </tr>
        <tr>
         <td width="25%" height="50" align="center" class="tablefont"><a href="#"><strong>Parts</strong></a></td>
         </tr>
    </table>

</div>

<div id="show3" class="FAA">
 <p>&nbsp;</p>
<table width="500" align="center" cellspacing="20" >
      	  <tr >
        <td width="25%" height="100" align="center"><a href="forumremove.php"><img src="images/4.jpg" height="100" width="100"></img></a></td>
        </tr>
        <tr>
         <td width="25%" height="50" align="center" class="tablefont"><a href="forumremove.php"><strong>Forum</strong></a></td>
         </tr>
    </table>
</div>
<div id="show4" class="FAA">
 <p>&nbsp;</p>
<table width="500" align="center" cellspacing="20" >
      	  <tr >
        <td width="25%" height="100" align="center"><a href="#"><img src="images/4.jpg" height="100" width="100"></img></a></td>
        </tr>
        <tr>
         <td width="25%" height="50" align="center" class="tablefont"><a href="#"><strong>Jobs</strong></a></td>
         </tr>
    </table>
</div>

	
    