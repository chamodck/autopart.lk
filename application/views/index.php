
<?php
	//$db = new mysqli('localhost','root','','autopart');//set your database handler
	include "database/dbconnect.php";
	$query = "SELECT DISTINCT year FROM vehicle";
  	$result = $conn->query($query);
	
	while($row = $result->fetch_assoc()){
    	$years[] = $row['year'];
  	}
	rsort($years);
	$jsonYears=json_encode($years);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>autopart.lk</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/index.css">
<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>script/index.js" type="text/javascript"></script>
<script type="text/javascript">
	<?php
		echo "var years = $jsonYears; \n";
    ?>
	
	function loadYear(){
        var select = document.getElementById("year");
        for(var i = 0; i < years.length; i++){
          select.options[i+1] = new Option(years[i],years[i]);    
		}
    }
	
	function loadMadeBy(year) {
		
		if (year == "empty") {
			document.getElementById("madeBy").innerHTML = "<option value='empty'>--Select a Made By--</option>";
			document.getElementById("model").innerHTML = "<option value='empty'>--Select a Model--</option>";
			document.getElementById("submodel").innerHTML = "<option value='empty'>--Select a Submodel--</option>";
			document.getElementById("engine").innerHTML = "<option value='empty'>--Select a Engine--</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("madeBy").innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","getMadeBy.php?year="+year,true);
			//xmlhttp.open("GET","getMadeBy.php?id="+id,true);
			xmlhttp.send();
		}
		//alert("bninm");
	}
	
	function loadModel(year,madeBy){
		if (madeBy == "empty") {
			document.getElementById("model").innerHTML = "<option value='empty'>--Select a Model--</option>";
			document.getElementById("submodel").innerHTML = "<option value='empty'>--Select a Submodel--</option>";
			document.getElementById("engine").innerHTML = "<option value='empty'>--Select a Engine--</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("model").innerHTML = xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET","getMadeBy.php?year="+year+"& madeBy="+madeBy,true);
			xmlhttp.send();
		}
	}
	
	function loadSubmodel(year,madeBy,model){
		if (model == "empty") {
			document.getElementById("submodel").innerHTML = "<option value='empty'>--Select a Submodel--</option>";
			document.getElementById("engine").innerHTML = "<option value='empty'>--Select a Engine--</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("submodel").innerHTML = xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET","getMadeBy.php?year="+year+"& madeBy="+madeBy+"& model="+model,true);
			xmlhttp.send();
		}
	}
	
	function loadEngine(year,madeBy,model,submodel){
		if (submodel == "empty") {
			document.getElementById("engine").innerHTML = "<option value='empty'>--Select a Engine--</option>";
			return;
		} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("engine").innerHTML = xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET","getMadeBy.php?year="+year+"& madeBy="+madeBy+"& model="+model+"& submodel="+submodel,true);
			xmlhttp.send();
		}
	}
	function validateQuantity(quantityID) {
  		var qid = document.getElementById(quantityID);

  		if (qid.value == "") {
	   		alert("please fill quantity!");
			qid.value=1;
  			//return false;
 		}else{
		  if (isNaN(qid.value)) {
		  alert("invalid quantity!");
		  qid.value=1;
		  //return false;
		 }else{
			 if (qid.value<1) {
		  	alert("minimum quantity is 1");
			qid.value=1;
		  	//return false;
		 	}
		 }
		}
	}
	function searchOnFocuse(){
		if(this.value == 'ex:air filters/bumpers') { 
			this.value = ''; this.class='searchFont';
		}
	}
</script>

</head>

<body onload="loadYear()">

<section id="counter">1</section>

<section id="slider_wrapper">
	<div id ="slide_back"><img src="<?php echo base_url();?>(images/Slides/slide2.png)" alt="slide1"/></div>
  <div id ="slide_front"><img src="<?php echo base_url();?>(images/Slides/slide1.png)" alt="slide1"/></div>
  <div id="controls">
   	<div id="arrow_wrapper">
        	<div id="left" onclick="prevSlide()"></div>
        	<div id="right" onclick="nextSlide()"></div>
    </div>
    
<div id="jumpers">
   	    <ul>
           	  <li id="1" onclick="jump(1)" class="current"></li>
              <li id="2" onclick="jump(2)" ></li>
              <li id="3" onclick="jump(3)"></li>
              <li id="4" onclick="jump(4)"></li>
              <li id="5" onclick="jump(5)"></li>
   	  </ul>
    </div>
  </div>
</section>
<div id="apDiv5"><img src="<?php echo base_url();?>images/Index/findvehicle.png" width="355" height="300" />

  <form id="form" name="form" method="post" action"<?php echo $_SERVER['PHP_SELF'];?>">
  	<div id="apDiv7">
    	<select id="year" name="year" class="select" onchange="loadMadeBy(this.value)" required>
      		<option value="">--Select a Year--</option>
    	</select>
    </div>   
    <div id="apDiv8">
    	<select id="madeBy" name="madeBy" class="select" onchange="loadModel(year.value,this.value)" required>
    		<option value="">--Select a Made By--</option>
    	</select>
    </div>
    <div id="apDiv9">
   	  	<select id="model" name="model" class="select" onchange="loadSubmodel(year.value,madeBy.value,this.value)" required>
    		<option value="">--Select a Model--</option>
    	</select>
    </div>
    <div id="apDiv10">
   	  	<select id="submodel" name="submodel" class="select" onchange="loadEngine(year.value,madeBy.value,model.value,this.value)" required>
    		<option value="">--Select a Submodel--</option>	
    	</select>
    </div>
	<div id="apDiv11">
   	  	<select id="engine" class="select" name="engine" required>
    		<option value="">--Select a Engine--</option>
    	</select>
    </div>
	<div id="apDiv12">
    	<input type="submit" id="findVehicle" value="" name="findVehicle"
         onmouseover="mouseOn('findVehicle','findButtonSel')" onmouseout="mouseOut('findVehicle','findButton')"
   		 style="<?php echo base_url();?>images/Index/findButton.png;background-color: Transparent;"/>
    </div>
  </form>
</div>
<div id="apDiv13"><img src="images/Index/frame.png" width="344" height="303" />
	 <div id="apDiv14">
     	<input type="submit" id="sell" value="" 
        onmouseover="mouseOn('sell','aftersell')" onmouseout="mouseOut('sell','presell')" onclick="location.href = 'sell.php';"
        style="<?php echo base_url();?>images/Index/presell.png;background-color: Transparent;"/>
  </div>
     <form id="form1" name="form1" method="post" action"<?php echo $_SERVER['PHP_SELF'];?>">
     <div id="apDiv15">
     	<img src="images/Index/search.png" width="280" height="50" />
        <div id="apDiv17">
        	<input type="text" name="keyword" id="searchtext" value="ex:air filters/bumpers"
            onfocus="if(this.value == 'ex:air filters/bumpers') { this.value = '';}" 
      		onblur="if (this.value == '') {this.value = 'ex:air filters/bumpers'; }" required/>
        </div>
     </div>
     <div id="apDiv16"><input type="submit" id="search" name="search" value=""
        onmouseover="mouseOn('search','aftersearch')" onmouseout="mouseOut('search','presearch')"
        style="<?php echo base_url();?>images/Index/presearch.png;background-color: Transparent;"/>
     </div>
     </form>
</div>


<div class="parttable">
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include "database/dbconnect.php";
 		if(isset($_POST["findVehicle"]) ){
			
			$year=$_POST['year'];
			$madeBy=$_POST['madeBy'];
			$model=$_POST['model'];
			$submodel=$_POST['submodel'];
			$engine=$_POST['engine'];
			
			$quary="SELECT vehicleID FROM vehicle WHERE year='".$year."' AND madeBy='".$madeBy."' AND model='".$model."' AND submodel='".$submodel."' AND engine='".$engine."'";
			$result = $conn->query($quary);
			
				while($row = $result->fetch_assoc()){
					$vehicleID =$row['vehicleID'];
				}
				
				$quary="SELECT * FROM part WHERE vehicleID='".$vehicleID."'";
				$result = $conn->query($quary);
				
				$count=mysqli_num_rows($result);
				if( $count< 1){
					echo "<div class='partListTitle'>Not Result Found For $year $madeBy $model $submodel $engine</div>";
				}else{
					echo "<div class='partListTitle'>$count Results Found For $year $madeBy $model $submodel $engine</div>";
					
					while($row = $result->fetch_assoc()){
						?>
						<div class="partList">
						<form name="addCartForm" class="partListContain" method="post" action="addToCart.php">
						<?php echo $row['description'];?><br>
						Category : <?php echo $row['category'];?><br>
						SubCategory : <?php echo $row['subCategory'];?><br>
						<div class="remain"> <?php echo $row['quantity'];?> more</div>
						<div class="price"> <?php echo $row['price'];?> LKR</div>
						<input type="number" class="partListContain"  id="quantity" min="1" max="<?php echo $row['quantity'];?>" value="1" onblur="validateQuantity('quantity')" required/>
						<input type="submit" class="partListContain" name="addToCart" value="Add to Cart" />
						<input type="text" class="partListContain" name="partID" value="<?php echo $row['partID'];?>" hidden="true"/>
						</form>
						</div>
						<br>
						<?php
				}//closing while loop
			}
		}
		
		if(isset($_POST["search"])){
			$keyword =mysql_real_escape_string(stripslashes($_POST['keyword']));
			$keyword = str_replace(' ','',$keyword);
			//$keyword=$_POST['keyword'];
			$quary="SELECT * FROM part";
			$result = $conn->query($quary);

			//$quary="SELECT * FROM part WHERE subCategory='".$keyword."'";
				
				//$count=mysqli_num_rows($result);
				
				$count=0;
				while($row = $result->fetch_assoc()){
					$string = $row["subCategory"];
			   		$string = str_replace(' ','',$string);
			   		$string = strtolower($string);
			   		
			   		if(strpos($string,strtolower($keyword))>-1){
			   			$count =$count+1;
	  		
?>
<div class="partList">
<form name="addCartForm" class="partListContain" method="post" action="addToCart.php">
<?php echo $row['description'];?><br>
Category : <?php echo $row['category'];?><br>
SubCategory : <?php echo $row['subCategory'];?><br>
<div class="remain"> <?php echo $row['quantity'];?> more</div>
<div class="price"> <?php echo $row['price'];?> LKR</div>
<input type="number" class="partListContain"  id="quantity" min="1" max="<?php echo $row['quantity'];?>" value="1" onblur="validateQuantity('quantity')" required/>
<input type="submit" class="partListContain" name="addToCart" value="Add to Cart" />
<input type="text" class="partListContain" name="partID" value="<?php echo $row['partID'];?>" hidden="true"/>
</form>
</div>
<br>
<?php
				}//closing while loop
			}
			if( $count< 1){
				echo "<div class='partListTitle'>Not Results Found For #$keyword</div>";
			}else{
				echo "<div class='partListTitle'>$count Results Found For #$keyword</div>";
			}
		}
	}
	
?>

</div>

</body>
</html>