<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/admin/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script>
    $(document).ready(function(){
        loadTable();
    });
    setInterval(loadTable, 3000);

    function loadTable(){
        document.getElementById('header').innerHTML='Pending';
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById('tableBody').innerHTML = xmlhttp.responseText;
        }
        };
          xmlhttp.open("POST", "<?php echo base_url(); ?>"+"index.php/AdminController/pendingAds", true);
          xmlhttp.send(); 

    }

    function setApprove(partID){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById('tableBody').innerHTML = xmlhttp.responseText;
        }
        };
          xmlhttp.open("POST", "<?php echo base_url(); ?>"+"index.php/AdminController/approve/"+escape(partID), true);
          xmlhttp.send(); 
    }
    
    </script>
    
</head>

<body>


    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><label id="header"></label> Advertiesments</h3>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <form class="form-inline" role="form">
                  <div class="form-group">
                    <select class="form-control">
                        <option>Part ID</option>
                        <option>Date & Time</option>
                        <option>Seller</option>
                        <option>Title</option>
                        <option>Price</option>
                    </select>
                     <div class="input-group custom-search-form ">
                        
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                  </div>
                  <div class="form-group pull-right">
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">State
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                      </ul>
                    </div>
                  </div>
                  
                </form>
            </div>
            
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>Part ID</th>
                        <th>Date & Time</th>
                        <th>Seller</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>State</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    
                </tbody>
            </table>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

</body>

</html>
