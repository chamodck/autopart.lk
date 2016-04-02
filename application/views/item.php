<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8"/>
<link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet" type="text/css">
<<<<<<< HEAD

<style type="text/css">
  
 h4 {
    margin: 20px 10px 10px;
}
p {
    margin: 10px;
}

#carousel-example-generic {
    margin: 20px auto;
    width: 400px;
}

#carousel-custom {
    margin: 20px auto;
    width: 400px;
}
#carousel-custom .carousel-indicators {
    margin: 10px 0 0;
    overflow: auto;
    position: static;
    text-align: left;
    white-space: nowrap;
    width: 100%;
}
#carousel-custom .carousel-indicators li {
    background-color: transparent;
    -webkit-border-radius: 0;
    border-radius: 0;
    display: inline-block;
    height: auto;
    margin: 0 !important;
    width: auto;
}
#carousel-custom .carousel-indicators li img {
    display: block;
    opacity: 0.5;
}
#carousel-custom .carousel-indicators li.active img {
    opacity: 1;
}
#carousel-custom .carousel-indicators li:hover img {
    opacity: 0.75;
}
#carousel-custom .carousel-outer {
    position: relative;
}

</style>
=======
<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>script/bootstrap.min.js" type="text/javascript"></script>

>>>>>>> 1569e30ca9814140f0ea4ab1981fd92f1b3a13b1
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <!-- Portfolio Item Row -->
        <div class="row">

<<<<<<< HEAD
            <div class="col-md-6">
                <div id='carousel-custom' class='carousel slide'>
                    <div class='carousel-outer'>
                        <!-- Wrapper for slides -->
                        <div class='carousel-inner'>
                            
                            <?php
                                $dir="uploads/autopartphotos/".$row->partID."/";
                                $imgArray=scandir($dir);
                                $img='';
                                if(sizeof($imgArray)>2){
                                    for($i=2;$i<sizeof($imgArray);$i++){
                                        $img=$imgArray[$i];
                                        if($i==2){
                                            echo "<div class='item active' style='height:275px' >";
                                        }else{
                                            echo "<div class='item' style='height:275px'>";
                                        }
                            ?>
                                    
                                        <img src="<?php echo base_url();?>uploads/autopartphotos/<?=$row->partID?>/<?=$img?>" style='height:100%' data-imagezoom="true" alt='Image not available!' />
                                    </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                            
                        <!-- Controls --><!--
                        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                            <span class='glyphicon glyphicon-chevron-left'></span>
                        </a>
                        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                            <span class='glyphicon glyphicon-chevron-right'></span>
                        </a>-->
                    </div>
                    
                    <!-- Indicators for the slider images -->
                    <ol class='carousel-indicators mCustomScrollbar' >
                        <?php
                            $img='';
                            if(sizeof($imgArray)>2){
                                for($i=2;$i<sizeof($imgArray);$i++){
                                    $img=$imgArray[$i];
                                    $to=$i-2;
                                    if($i==2){                       
                                        echo "<li data-target='#carousel-custom' style='height:70px' data-slide-to='".$to."' class='active'>";
                                    }else{
                                        echo "<li data-target='#carousel-custom' style='height:70px' data-slide-to='".$to."'>";
                                    }
                                    $url=base_url()."uploads/autopartphotos/$row->partID/$img";
                                    echo "<img src='$url' alt='Image not available!' style='height:100%' /></li>";
                                } 
                            }
                        ?>
                    </ol>
                </div>

            </div>

            <div class="col-md-6">
                <h3><?=$row->title?></h3>
=======
            <div class="col-md-5">
                <img class="img-responsive" src="http://placehold.it/750x500" alt="">
            </div>

            <div class="col-md-7">
                <h3>Project Description</h3>
>>>>>>> 1569e30ca9814140f0ea4ab1981fd92f1b3a13b1
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                <h3>Project Details</h3>
                <ul>
                    <li>Lorem Ipsum</li>
                    <li>Dolor Sit Amet</li>
                    <li>Consectetur</li>
                    <li>Adipiscing Elit</li>
                </ul>
            </div>

        </div>
        <!-- /.row -->

        <!-- Related Projects Row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Related Projects</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>
        <!-- /.row -->
    </div>
</body>
<<<<<<< HEAD
<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>script/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>script/imagezoom.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
});
</script>

=======
>>>>>>> 1569e30ca9814140f0ea4ab1981fd92f1b3a13b1

</html>
