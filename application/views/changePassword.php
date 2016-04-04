<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8"/>
<link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>

</head>

<body>

  <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change password of <?=$username?></h3>
                    </div>
                    <div class="panel-body">
                        
                          <form role="form" action="<?php echo site_url('UserManage/newPassword'); ?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input name="password1" class="form-control" id="inputpassword" type="password" placeholder="New Password" title="Choose a new password" required=""> 
                                    <?php if(form_error('password1')){echo "<div class='bg-danger text-danger'>"; echo form_error('password1'); echo "</div>";}?>
                                </div>
                                <div class="form-group">
                                    <input name="verify1" class="form-control" id="inputVerify" type="password" placeholder="New Password (again)" title="Re-Enter password" required="">   
                                    <?php if(form_error('verify1')){echo "<div class='bg-danger text-danger'>"; echo form_error('verify1'); echo "</div>";}?>     
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" id="btnRegister" class="btn btn-primary">Change Password</button>
                                <input name="username" value="<?=$username?>" type="hidden">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>