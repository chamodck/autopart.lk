<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8"/>
<link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet" type="text/css">

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
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <!-- Portfolio Item Row -->
        <div class="row">

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
                <div class="well">
                    <h4 class="text-primary"><strong><?=$row->price?> Rs</strong></h4>
                    <?php     
                        if($this->session->has_userdata('username')){//Checking whether a user has logged in
                          
                    ?>
                    <div class="form-group">
                        <a class="btn btn-primary" data-toggle="collapse" data-target="#payment">Buy It Now</a>
                    </div>
                    
                    <div id="payment" class="collapse">
                    <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                            Paypal</a>
                          </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                          <div class="panel-body">
                              <form role="form" action="https://www.paypal.com/cgi-bin/webscr" method="post">

                              <!-- Identify your business so that you can collect the payments. -->
                              <input type="hidden" name="business" value="herschelgomez@xyzzyu.com"/>

                              <!-- Specify a Buy Now button. -->
                              <input type="hidden" name="cmd" value="_xclick"/>

                              <!-- Specify details about the item that buyers will purchase. -->
                              <input type="hidden" name="item_name" value="Hot Sauce-12oz Bottle"/>
                              <input type="hidden" name="amount" value="5.95"/>
                              <input type="hidden" name="currency_code" value="AUD"/>

                              <!-- Display the payment button. -->
                             
                                    <input name="submit" type="image"  src="<?php echo base_url();?>images/paypal/btn_buynow_LG.gif">
                              
                        
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                            Bank Account</a>
                          </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                          <div class="panel-body">
                                Bank : XXXXXX,<br>Account No : xxxxxxxxxx
                                <p>Deposit your money and upload scan copy or photo of deposit slip here.</p>
                                <div class="form-group">
                                    <input type="file" name="userfile" accept="image/*" multiple>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>

                    </div>

                    
                        
                    

                    <div id="bank" class="collapse">
                        
                    </div>

                    
                    <?php 
                        }else{
                    ?>
                        <div  id="popup_placeholder">
                        </div>
                        
                        

                        <div class="form-group">
                            <button name="submit" id="buy" class="btn btn-primary">Buy It Now</button>
                        </div>
 
                    <?php
                        }
                    ?>
                    <form class="form-inline" action="<?php echo site_url('PaymentController/addToCart'); ?>" method="post">
                        <input type="hidden" name="partid" value="<?=$row->partID?>"/>
                        <div class="form-group">
                            <input type='number' id='quantity' class='form-control' name='quantity' value='1' min='1' max='<?=$row->quantity?>' required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="pull-right btn btn-default">Add to Cart</button>
                        </div>

                    </form>
                </div>

            
                
                <p><?=$row->description?></p>
                
                <ul>
                    <li><a href="#"><?=$row->category?></a> -> <a href="#"><?=$row->subcategory?></a> </li>
                    <li>
                        <?php
                            if($row->year){
                                echo "Recommend for : <label class='text-success'>".$row->year." ".$row->madeby." ".$row->model." ".$row->submodel." ".$row->engine."</label>";
                            }
                        ?>
                    </li>
                    <li>Seller : <a href="#"><?=$row->username?></a></li>
                    <li>part ID : <?=$row->partID?></li>
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
<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>script/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>script/imagezoom.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
    });

popup=function(message) {
            $('#popup_placeholder').html("<div class='alert alert-dismissible alert-danger fade in'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Login</strong> to your account before "+message+".</div>")
        }

$('#buy').on('click', function() {
   popup("Buy");
});


</script>


</html>
