<!DOCTYPE html>
<html>

<head>

<title>autopart.lk</title>
<meta charset="UTF-8"/>
<link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>script/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
  function loadMadeBy(inputMadeBy,inputModel,inputSubmodel,inputEngine,year) {
    if (year == "") {
      document.getElementById(inputMadeBy).innerHTML= "<option value=''>--Select a Made By--</option>";
      document.getElementById(inputModel).innerHTML="<option value=''>--Select a Model--</option>";
      document.getElementById(inputSubmodel).innerHTML= "<option value=''>--Select a Submodel--</option>";
      document.getElementById(inputEngine).innerHTML= "<option value=''>--Select a Engine--</option>";

      return;
    } else { 
      document.getElementById(inputModel).innerHTML="<option value=''>--Select a Model--</option>";
      document.getElementById(inputSubmodel).innerHTML= "<option value=''>--Select a Submodel--</option>";
      document.getElementById(inputEngine).innerHTML= "<option value=''>--Select a Engine--</option>";

      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4){
          document.getElementById(inputMadeBy).disabled=false;
          if(xmlhttp.status == 200) {
            document.getElementById(inputMadeBy).innerHTML = xmlhttp.responseText;
          }
        }  
      }
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadMadeBy/"+escape(year),true);
      xmlhttp.send();
    }
  }

  function loadModel(inputModel,inputSubmodel,inputEngine,year,madeBy) {
    if (madeBy == "") {
      document.getElementById(inputModel).innerHTML = "<option value=''>--Select a Model--</option>";
      document.getElementById(inputSubmodel).innerHTML = "<option value=''>--Select a Submodel--</option>";
      document.getElementById(inputEngine).innerHTML = "<option value=''>--Select a Engine--</option>";
      return;
    } else { 
      document.getElementById(inputSubmodel).innerHTML = "<option value=''>--Select a Submodel--</option>";
      document.getElementById(inputEngine).innerHTML = "<option value=''>--Select a Engine--</option>";
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById(inputModel).innerHTML = xmlhttp.responseText;
        }
      }
      
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadModel/"+escape(year)+"/"+escape(madeBy),true);
      xmlhttp.send();
    }
  }

  function loadSubmodel(inputSubmodel,inputEngine,year,madeBy,model){
    if (model == "") {
      document.getElementById(inputSubmodel).innerHTML = "<option value=''>--Select a Submodel--</option>";
      document.getElementById(inputEngine).innerHTML = "<option value=''>--Select a Engine--</option>";
      return;
    } else { 
      document.getElementById(inputEngine).innerHTML = "<option value=''>--Select a Engine--</option>";
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById(inputSubmodel).innerHTML = xmlhttp.responseText;
        }
      }
      
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadSubmodel/"+escape(year)+"/"+escape(madeBy)+"/"+escape(model),true);
      xmlhttp.send();
    }
  }
  
  function loadEngine(inputEngine,year,madeBy,model,submodel){
    if (submodel == "") {
      document.getElementById(inputEngine).innerHTML = "<option value=''>--Select a Engine--</option>";
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
          document.getElementById(inputEngine).innerHTML = xmlhttp.responseText;
        }
      }
      
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadEngine/"+escape(year)+"/"+escape(madeBy)+"/"+escape(model)+"/"+escape(submodel),true);
      xmlhttp.send();
    }
  }

  function loadSubcategory(subcategoryField,category){
    if (submodel == "") {
      document.getElementById(subcategoryField).innerHTML = "<option value=''>--Select a Subcategory--</option>";
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
          document.getElementById(subcategoryField).innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("POST","<?php echo base_url(); ?>" + "index.php/AutopartManage/loadSubcategory/"+escape(category),true);
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
      <li>
        <form id="postAd" action="<?php echo site_url('AutopartManage/postAd'); ?>" method="post">
            <button type="submit" id="btnRegister" class="btn btn-success">Post Ad</button>
        </form>
      </li> 
    </ul>


     <ul class="nav navbar-right">
      
      <?php     
        if($this->session->has_userdata('username')){//Checking whether a user has logged in
          $username=$this->session->userdata('username'); 
      ?>
          <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><img src="<?php echo base_url();?>images/profile1.png" class="profile-image img-circle"> <?php echo $username; ?></a>
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
              <select id="year" name="year" class="form-control" onchange="loadMadeBy('madeBy','model','submodel','engine',this.value)" title="Select your vehicle year" required>
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
              <select id="madeBy" name="madeBy" class="form-control" onchange="loadModel('model','submodel','engine',year.value,this.value)" title="Select made by" required>
                <option value="">--Select a Made By--</option>
              </select>
            </div>
            <div class="form-group">
              <select id="model" name="model" class="form-control" onchange="loadSubmodel('submodel','engine',year.value,madeBy.value,this.value)" title="Select model" required>
                <option value="">--Select a Model--</option>
              </select>
            </div>
            <div class="form-group">
              <select id="submodel" name="submodel" class="form-control" onchange="loadEngine('engine',year.value,madeBy.value,model.value,this.value)" title="Select submodel" >
                <option value="">--Select a Submodel--</option> 
              </select>
            </div>
            <div class="form-group">
              <select id="engine" name="engine" class="form-control" title="Select engine" >
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

  <!--Post ad form Modal -->
  
  <div class="modal fade" id="postAdForm" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title ">Enter your autopart details (Step 1)</h4>
        </div>
        <div class="modal-body">
          
            <form class="form-horizontal" action="<?php echo site_url('AutopartManage/addAutopart'); ?>" method="post"><!--form open-->
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">Category</label>
                <div class="col-lg-9">
                  <select id="category" name="category" style="width:200px" class="form-control" onchange="loadSubcategory('subcategory',this.value)" required>
                    <option value="">--Select Category--</option>
                    <?php 
                      if($categories){ 
                        foreach ($categories as $c) {
                          echo "<option>$c</option>";
                        }
                      } 
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="subcategory" class="col-lg-3 control-label">Subcategory</label>
                <div class="col-lg-9">
                  <select id="subcategory" name="subcategory" style="width:200px" class="form-control" required>
                    <option value="">--Select Subcategory--</option>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label for="description" class="col-lg-3 control-label">Description</label>
                <div class="col-lg-9">
                  <textarea class="form-control" rows="3" id="description" name="description" placeholder="Something about item"><?=set_value('description')?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="quantity" class="col-lg-3 control-label">Quantity</label>
                <div class="col-lg-9">
                  <input type="number" class="form-control" id="quantity" name="quantity" style="width:80px" value="1" min="1" required>
                </div>
              </div>

              <div class="form-group">
                <label for="status" class="col-lg-3 control-label">Item Status</label>
                <div class="col-lg-9">
                  <select id="status" name="status" style="width:200px" class="form-control">
                    <option>Brand New</option>
                    <option>Used</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="price" class="col-lg-3 control-label">Price</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" id="price" name="price" style="width:200px" placeholder="Rs" required>
                  <?php if(form_error('price')){echo "<label class='bg-danger text-danger'>"; echo form_error('price'); echo "</label>";}?>
                </div>
              </div>

              <div class="form-group">
                <label class="col-lg-5 control-label"><input type="checkbox" name="vehicleDetails" data-toggle="collapse" data-target="#vehicleDetails" checked value="1"> Recommend Vehicle Details</label>
              </div>

            <div id="vehicleDetails" class="collapse in">

              <div class="form-group">
                <label for="formMadeBy" class="col-lg-5 control-label">Select details as you know</label>
              </div>
              
              <div class="form-group">
                <label for="formYear" class="col-lg-3 control-label">Year  <label class="text-danger">*</label></label>
                <div class="col-lg-9">
                  <select id="formYear" name="formYear" style="width:200px" class="form-control" onchange="loadMadeBy('formMadeBy','formModel','formSubmodel','formEngine',this.value)" title="Select made by" >
                    <option value="">--Select Year--</option>
                    <?php 
                      if($years){ 
                        foreach ($years as $y) {
                          echo "<option>$y</option>";
                        }
                      } 
                    ?>
                  </select>
                  <?php if(form_error('formYear')){echo "<label class='bg-danger text-danger'>"; echo form_error('formYear'); echo "</label>";}?>
                </div>
              </div>

              <div class="form-group">
                <label for="formMadeBy" class="col-lg-3 control-label">Made By  <label class="text-danger">*</label></label>
                <div class="col-lg-9">
                  <select id="formMadeBy" name="formMadeBy" style="width:200px" class="form-control" onchange="loadModel('formModel','formSubmodel','formEngine',formYear.value,this.value)" title="Select made by" >
                    <option value="">--Select a Made By--</option>
                  </select>
                  <?php if(form_error('formMadeBy')){echo "<label class='bg-danger text-danger'>"; echo form_error('formMadeBy'); echo "</label>";}?>
                </div>
              </div>

              <div class="form-group">
                <label for="formModel" class="col-lg-3 control-label">Model  <label class="text-danger">*</label></label>
                <div class="col-lg-9">
                  <select id="formModel" name="formModel" style="width:200px" class="form-control" onchange="loadSubmodel('formSubmodel','formEngine',formYear.value,formMadeBy.value,this.value)" title="Select model" >
                    <option value="">--Select a Model--</option>
                  </select>
                  <?php if(form_error('formModel')){echo "<label class='bg-danger text-danger'>"; echo form_error('formModel'); echo "</label>";}?>
                </div>
              </div>

              <div class="form-group">
                <label for="formSubmodel" class="col-lg-3 control-label">Submodel</label>
                <div class="col-lg-9">
                  <select id="formSubmodel" name="formSubmodel" style="width:200px" class="form-control" onchange="loadEngine('formEngine',formYear.value,formMadeBy.value,formModel.value,this.value)" title="Select submodel">
                    <option value="">--Select a Submodel--</option> 
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="formEngine" class="col-lg-3 control-label">Engine</label>
                <div class="col-lg-9">
                  <select id="formEngine" class="form-control" style="width:200px" name="formEngine" title="Select engine">
                    <option value="">--Select a Engine--</option>
                  </select>
                </div>
              </div>

            </div><!--collapse div close-->

            <div class="form-group">
                <label for="keyword" class="col-lg-3 control-label">Keywords</label>
                <div class="col-lg-9">
                  <textarea class="form-control" rows="3" id="keyword" name="keyword" placeholder="oil pump#1995 townace#unpacking"><?=set_value('keyword')?></textarea>
                  <span class="help-block">if you can't find category,subcategory and vehical details here.Please add details about autopart seperating '#' as you know.(System will consider these keywords when searching a autopart.)</span>
                </div>
              </div>

            <div class="form-group col-lg-5" style="float:right">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Next</button>
            </div>

            </fieldset>
          </form><!--form close-->
          
        </div>
        
      </div>
      
    </div>
  </div>

  <?php 
  if($headerFormModal){
    if($headerFormModal['name']=='postAdForm'){
      echo "<script>$('#postAdForm').modal({backdrop:'static',keyboard:false});</script>";
      echo "<script>$('#postAdForm').modal('show');</script>";
    }    
  }
?>

<!-- photo form modal-->

<div class="modal fade" id="photoFormModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add autopart photos (Step 2)</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            Upload your photo number <?=$headerFormModal['photonumber']+1;?>
          </div>

          <?php echo form_open_multipart('AutopartManage/uploadPhoto/'.$headerFormModal['partID'].'/'.$headerFormModal['photonumber']); ?>
            <div class="form-group">
              <input type="file" name="userfile" accept="image/*" multiple>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Upload</button>
            </div>
          </form>
          <div class="form-group"> 
            <?php if($headerFormModal['photonumber']!=0){
              if($headerFormModal['message']=='success'){
                echo "Note :<label class='bg-success text-success'>Photo number ".$headerFormModal['photonumber']." uploaded.</label>";
              }else{
                echo "Note :<label class='bg-danger text-danger'>".$headerFormModal['message']."</label>";
              }
            }
            ?>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Finish</button>
        </div>

      </div>
    </div>
  </div>
<?php 
  if($headerFormModal){
    if($headerFormModal['name']=='photoFormModal'){
      echo "<script>$('#photoFormModal').modal({backdrop:'static',keyboard:false});</script>";
      echo "<script>$('#photoFormModal').modal('show');</script>";
    }
  }
?>
</body>
</html>