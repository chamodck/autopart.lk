<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Autopart.lk</title>
<meta charset="UTF-8">
<link href="css/header.css" rel="stylesheet">

</head>
<script>

function Fun() {	

	setInterval( function(){		
		var widthVal = window.innerWidth;	
		console.log(widthVal);
		if (widthVal >1100){		
			document.getElementById("main-header").style.right ="30%";
			}		
		else if(widthVal >1024){
			document.getElementById("main-header").style.right ="15%";
			}
		else{
			document.getElementById("main-header").style.visibility = "hidden" ;
			document.getElementById("menu").style.visibility = "hidden" ;
			//document.getElementById("sinhala").style.visibility = "hidden" ;		
			//document.getElementById("tamil").style.visibility = "hidden" ;
			document.getElementById("apDivBaasLk").style.fontSize = "30px" ;
			document.getElementById("apDivBaasLk").style.top = "30px" ;
			document.getElementById("tamil").style.right = "0px" ;
			document.getElementById("sinhala").style.right = "45px" ;
			}			
	},500 );
}
</script>

<script>//window.onload = Fun;</script>

<div id="apDivHeaderContainer">

	<?php 		
	if(isset($_SESSION['user']) ) { //Checking whether a user has logged in
		$username=$_SESSION['user'];
		$mobile=$_SESSION['mobile'];
		
		echo "
			
			<a href =\"/autopart/logout.php\"><div id=\"apDivLogout\">
			<img src=\"images/lgout.png\" width=\"100\" height=\"35\" alt=\"logot\" /></div></a>";
	}

	?>

	
	<div id="apDivUBar1"></div>
	<div id="apDivUBar2"></div>
	<div id="apDivBaasLk">Autopart.lk</div>
	<div id="Home">
<a href="/autopart/admin/index.php"><strong><h2>ADMIN HOME</h2></strong></a> 
</div>
<div id="UserHome">
<a href="/autopart/index.php"><strong><h2>USERS HOME</h2></strong></a> 
</div>
	
</div>






<body>

	
	

	

	

</body>

</html>







