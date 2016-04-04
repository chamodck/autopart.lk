<!DOCTYPE html>
<html >

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet" type="text/css">
    <script src="<?php echo site_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>script/bootstrap.min.js" type="text/javascript"></script>
</head>

<body >

    <!-- Page Content -->
    <div class="container">

        <!-- /.row -->
        <?php
        $count=0;

        foreach ($categories as $key=>$value) {
            if($count%3==0){//new row after 3 item 
                echo "<div class='row'>";
            }
        ?>
            <div class="col-md-4 portfolio-item">
                <a href="<?=site_url('AutopartManage/categorySearch/'.$key.'/1'); ?>">
                    <img class="img-responsive" src="<?php echo base_url();?>images/category/<?=$key?>.png" alt="">
                </a>
                <h3>
                    <a href="<?=site_url('AutopartManage/categorySearch/'.$key.'/1'); ?>"><?=$key?></a>
                    <div class="dropdown" style="float:right">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="navSearchVehicle">Subcategories <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php foreach ($value as $sub) { ?>
                                <li><a href="<?=site_url('AutopartManage/subcategorySearch/'.$sub.'/1'); ?>"><?=$sub?></a></li>
                            <?php } ?>
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