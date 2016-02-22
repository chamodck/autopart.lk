<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8"/>
<link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>

</head>

<body>
<div class="container">
  <div class="col-lg-3">
    <div class="panel panel-primary" style="width:100%">
      <div class="panel-heading">Change password of <?=$username?></div>
      <div class="panel-body">
      	<?php echo form_open('UserManage/newPassword'); ?>
      	<div class="form-group">
          <input name="password1" class="form-control" id="inputpassword" type="password" placeholder="Password" title="Choose a new password" required=""> 
          <?php if(form_error('password1')){echo "<div class='bg-danger text-danger'>"; echo form_error('password1'); echo "</div>";}?>
        </div>
        <div class="form-group">
          <input name="verify1" class="form-control" id="inputVerify" type="password" placeholder="Password (again)" title="Re-Enter password" required="">  
          <?php if(form_error('verify1')){echo "<div class='bg-danger text-danger'>"; echo form_error('verify1'); echo "</div>";}?>                        
        </div>
        <div class="form-group">
          <button type="submit" id="btnRegister" class="btn btn-default">Change Password</button>
        </div>
        	<input name="username" value="<?=$username?>" type="hidden">
    	</form>
      </div>
    </div>
</div>
</div>

</body>
</html>