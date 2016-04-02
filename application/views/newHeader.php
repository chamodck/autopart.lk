<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>autopart.lk</title>
<meta charset="UTF-8">
<link href="css/bootstrap-simplex-theme.css" rel="stylesheet">
<script src="script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="script/bootstrap.min.js" type="text/javascript"></script>

</head>

<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">autopart.lk</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
       <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li> 

    </ul>
     <ul class="nav navbar-right">
      <?php     
        if(isset($_SESSION['user']) ) { //Checking whether a user has logged in
          $username=$_SESSION['user'];
          $mobile=$_SESSION['mobile'];
          
          echo "
            <div id=\"name\">$username</div>
            <a href =\"logout.php\"><div id=\"apDivLogout\">
            <img src=\"images/lgout.png\" width=\"100\" height=\"35\" alt=\"logot\" /></div></a>";
        }

        else{
        ?>
          <li class="dropdown" id="menuLogin">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Login</a>
              <div class="dropdown-menu dropdown-menu-right" style="padding:15px; width: 200px;">

                <form id="formLogin" role="form"> 
                  <div class="form-group">
                    <label>Login</label> 
                    <input name="username" class="form-control" id="username" type="text" placeholder="Username" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="6" title="Enter your username" required="">
                  </div>
                  <div class="form-group">
                    <input name="password" class="form-control" id="password" type="password" placeholder="Password" title="Enter your password" required="">
                  </div>
                  <div class="form-group">
                    <button type="submit" id="btnLogin" class="btn btn-default">Login</button>
                  </div>
                </form>

                <div class="form-group">
                <form><a href="#" title="Fast and free sign up!" id="btnNewUser" data-toggle="collapse" data-target="#formRegister" class="collapsed">New User? Sign-up..</a></form>
                </div>

                <form id="formRegister" class="form collapse" style="height: 0px;">
                  <div class="form-group">
                     <label>Sign-up</label> 
                    <input name="email" class="form-control" id="inputEmail" type="email" placeholder="Email" required="">
                  </div>
                  <div class="form-group">
                    <input name="username" class="form-control" id="inputUsername" type="text" placeholder="Username" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="6" title="Choose a username" required="">
                  </div>
                  <div class="form-group">
                    <input name="password" class="form-control" id="inputpassword" type="password" placeholder="Password" required=""> 
                  </div>
                  <div class="form-group">
                    <input name="verify" class="form-control" id="inputVerify" type="password" placeholder="Password (again)" required="">                               
                  </div>
                  <div class="form-group">
                    <button type="submit" id="btnRegister" class="btn btn-default">Sign Up</button>
                  </div>
                </form>
                
                <a data-toggle="modal" role="button" href="#forgotPasswordModal">Forgot username or password?</a>

              </div>
          </li>      
        <?php
         }
      ?>
      
    </ul>
  </div>
</nav>


</body>
</html>