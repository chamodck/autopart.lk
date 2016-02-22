<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>autopart.lk</title>
<meta charset="UTF-8"/>
<link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>script/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
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
        if (xmlhttp.readyState == 4){
          document.getElementById("madeBy").disabled=false;
          if(xmlhttp.status == 200) {
            document.getElementById("madeBy").innerHTML = xmlhttp.responseText;
          }
        }  
      }
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadMadeBy/"+year,true);
      xmlhttp.send();
    }
  }

  function loadModel(year,madeBy) {
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
      
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadModel/"+year+"/"+madeBy,true);
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
      
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadSubmodel/"+year+"/"+madeBy+"/"+model,true);
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
      
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadEngine/"+year+"/"+madeBy+"/"+model+"/"+submodel,true);
      xmlhttp.send();
    }
  }

</script>
</head>

<body>

<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>">autopart.lk</a>

    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo base_url(); ?>" title="home">Home</a></li>
      <li><a href="#">Page 1</a></li>
       <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 
      <li class="dropdown">
         <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLog">Login</a>
        <ul class="dropdown-menu">
          <li><a href="#">Profile</a></li>
          <li><a href="#">Logout</a></li>
        </ul>
      </li>
    </ul>


     <ul class="nav navbar-right">
      
      <?php     
        if($this->session->has_userdata('username')){//Checking whether a user has logged in
          $username=$this->session->userdata('username'); 
      ?>
          <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><img src="images/profile1.png" class="profile-image img-circle"> <?php echo $username; ?></a>
              <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#" ><i class="glyphicon glyphicon-user"></i> Profile</a></li>
                
                <li><a href="<?php echo site_url('usermanage/logout'); ?>"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
              </ul>
          </li>
          
        <?php
      }

        else{
            $this->load->helper('cookie');
            $value1=get_cookie('remember_me_user');
            $value2=get_cookie('remember_me_pass');
            $u="";$p="";
            if($value1 && $value2){
              
              $u=$value1;
              $p=$value2;
            }
        ?>
          <li class="dropdown" id="menuLogin">
           
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><i class="glyphicon glyphicon-log-in"></i> Login</a>
              <div class="dropdown-menu" style="padding:15px; width: 250px;">
                
                <form id="formLogin" action="<?php echo site_url('usermanage/login'); ?>" method="post" autocomplete="off">

                  <div class="form-group">
                    <label>Login</label> 
                    <input name="loginusername" <?php if($u){echo "value=$u";} ?> class="form-control" id="username" type="text" placeholder="Email/Username" title="Enter your email/username" required="">
                  </div>
                  <div class="form-group">
                    <input name="loginpassword" <?php if($p){echo "value=$p";} ?> class="form-control" id="password" type="password" placeholder="Password" title="Enter your password" required="">
                    <?php if($loginError){echo "<div class='bg-danger text-danger'>The username/email and password you entered don't match.</div>";}?>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" <?php if($u){echo "checked";} ?> value="1" name="remember">Remember me</label>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="btnLogin" class="btn btn-default">Login</button>
                  </div>
                </form>
                <?php if($loginError){echo "<script>$('#navLogin').dropdown('toggle');</script>";} ?>
                
                <div class="form-group">
                <form><a href="#" title="Fast and free sign up!" id="btnNewUser" data-toggle="collapse" data-target="#formRegister" class="collapsed">New User? Sign-up..</a></form>
                </div>


                <form id="formRegister" class="form collapse" action="<?php echo site_url('usermanage/signup'); ?>" method="post" autocomplete="off" accept-charset="utf-8">
                  <div class="form-group">
                     <label >Sign-up</label>
                    <input name="email" class="form-control" id="inputEmail" type="email" placeholder="Email" value="<?=set_value('email')?>" title="Enter your email" required="">
                    <?php if(form_error('email')){echo "<div class='bg-danger text-danger'>"; echo form_error('email'); echo "</div>";}?>
                  </div>
                  <div class="form-group">
                    <input name="username" class="form-control" id="inputUsername" type="text" placeholder="Username" value="<?=set_value('username')?>" pattern="[A-Za-z0-9]+" title="Use Letters and Numbers" required="">
                    <?php if(form_error('username')){echo "<div class='bg-danger text-danger'>"; echo form_error('username'); echo "</div>";}?>
                    
                  </div>
                  <div class="form-group">
                    <input name="password" class="form-control" id="inputpassword" type="password" placeholder="Password" title="Use Letters and Numbers" required=""> 
                    <?php if(form_error('password')){echo "<div class='bg-danger text-danger'>"; echo form_error('password'); echo "</div>";}?>
                  </div>
                  <div class="form-group">
                    <input name="verify" class="form-control" id="inputVerify" type="password" placeholder="Password (again)" title="Use Letters and Numbers" required="">  
                    <?php if(form_error('verify')){echo "<div class='bg-danger text-danger'>"; echo form_error('verify'); echo "</div>";}?>                        
                  </div>
                  <div class="form-group">
                    <button type="submit" id="btnRegister" class="btn btn-default">Sign Up</button>
                  </div>
                </form>
                <?php 
                if(validation_errors() && !form_error('forgotEmail') && !form_error('password1') && !form_error('verify1')){
                  echo "<script>$('#navLogin').dropdown('toggle');</script>";
                  echo "<script>$('#formRegister').collapse();</script>";
                } 
                ?>

                <div class="form-group">
                  <form><a id="forgot" data-toggle="collapse" data-target="#forgotPassword" class="collapsed" role="button" href="#">Forgot username or password?</a></form>
                </div>
                <form id="forgotPassword" class="form collapse" action="<?=site_url('usermanage/forgotPassword'); ?>" method="post" accept-charset="utf-8">
                  <div class="form-group">
                    <label >Email</label>
                    <input name="forgotEmail" class="form-control" id="email" type="email" placeholder="Email" title="Enter your email" value="<?=set_value('forgotEmail')?>" required="">
                    <?php if(form_error('forgotEmail')){echo "<div class='bg-danger text-danger'>"; echo form_error('forgotEmail'); echo "</div>";}?>
                  </div>
                  <div class="form-group">
                    <button type="submit" id="btnForgot" class="btn btn-default">Submit</button>
                  </div>
                </form>
                <?php
                if(form_error('forgotEmail')){
                  echo "<script>$('#navLogin').dropdown('toggle');</script>";
                  echo "<script>$('#forgotPassword').collapse();</script>";
                }
                ?>

              </div>
          </li>      
        <?php
         }
      ?>
      </ul>

    <div class="navbar-right col-md-3 col-sm-3">
      <form class="navbar-form" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search(ex:mirror)" name="srch-term" id="srch-term">
            <div class="input-group-btn">
                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
      </form>
      
    </div>

  <ul class="nav navbar-right">
   <li class="dropdown" id="searchVehicle">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="navSearchVehicle">Search by Vehicle <span class="caret"></span></button>
        <div class="dropdown-menu" style="padding:15px; width:200px;">
          <?php echo form_open('usermanage/login'); ?>

            <div class="form-group">
              <label for="sel1">Select Vehicle Details</label>
              <select id="year" name="year" class="form-control" onchange="loadMadeBy(this.value)" title="Select your vehicle year" required>
                <option value="">--Select a Year--</option>
                <?php 
                  if($years){ 
                    foreach ($years as $y) {
                      echo "<option>$y</option>";
                    }
                  } 
                ?>
              </select>
            </div>
            <div class="form-group">
              <select id="madeBy" name="madeBy" class="form-control" onchange="loadModel(year.value,this.value)" title="Select made by">
                <option value="">--Select a Made By--</option>
              </select>
            </div>
            <div class="form-group">
              <select id="model" name="model" class="form-control" onchange="loadSubmodel(year.value,madeBy.value,this.value)" title="Select model">
                <option value="">--Select a Model--</option>
              </select>
            </div>
            <div class="form-group">
              <select id="submodel" name="submodel" class="form-control" onchange="loadEngine(year.value,madeBy.value,model.value,this.value)" title="Select submodel">
                <option value="">--Select a Submodel--</option> 
              </select>
            </div>
            <div class="form-group">
              <select id="engine" class="form-control" name="engine" title="Select engine">
                <option value="">--Select a Engine--</option>
              </select>
            </div>
            <div class="form-group">
              <button type="submit" id="btnSearchVehicle" class="btn btn-default">Search</button>
            </div>
          </form>
      </div>
    </li>
  </ul>
 
</div>
</div>
</nav>

<!-- header message-->

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-<?=$headerAlert['size']; ?>">
    
      <!-- Modal content-->
      <div class="modal-content panel-<?=$headerAlert['type']; ?>">
        <div class="modal-header panel-heading">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?=$headerAlert['header']; ?></h4>
        </div>
        <div class="modal-body">
          <p><?=$headerAlert['message']; ?></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
  </div>
<?php 
  if($headerAlert){
    echo "<script>$('#myModal').modal('show');</script>";
  }
?>
</body>
</html>