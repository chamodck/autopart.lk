<!DOCTYPE html>
<html >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/3-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>script/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>script/bootstrap.min.js"></script>
</head>

<body >

    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <h1 class="page-header">Categories</h1>
            </div>
        </div>
        <!-- /.row -->
        <?php
        $count=0;

        foreach ($categories as $key=>$value) {
            if($count%3==0){//new row after 3 item 
                echo "<div class='row'>";
            }
        ?>
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url();?>images/category/<?=$key?>.png" alt="">
                </a>
                <h3>
                    <a href="#"><?=$key?></a>
                    <div class="dropdown" style="float:right">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="navSearchVehicle">Subcategories <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php foreach ($value as $sub) {echo "<li><a href='#' >$sub</a></li>";}?>
                        </ul>
                    </div>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>
        <?php
            if($count%3==2){//close row after 3 item 
                echo "</div>";
            }
            $count++;
        }
        ?>
    </div>
    <!-- /.container -->

</body>

</html>