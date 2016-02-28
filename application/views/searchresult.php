<!DOCTYPE html>
<html lang="en">

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

<body>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="text-success">
                    <?=$resultset->num_rows();?> results for <strong><?=$keyword?></strong>
                </div>
                <div class="well">
                    <?php
                        $count=0;
                        foreach ($resultset->result() as $row) {
                            $count++;
                            $partID=$row->partID;
                            
                            $before = new DateTime($row->date);//time calculate
                            $now = new DateTime();
                            $diff=$before->diff($now);
                            $interval='';
                            if(intval($diff->format("%Y"))>0){
                                if(intval($diff->format("%m"))>0){
                                    $interval=$diff->format("%Y years and %m months ago");
                                }else{
                                    $interval=$diff->format("%Y years ago");
                                }
                            }else{
                                if(intval($diff->format("%m"))>0){
                                    $interval=$diff->format("%m months ago");
                                }elseif(intval($diff->format("%d"))>0){
                                    $interval=$diff->format("%d days ago");
                                }elseif(intval($diff->format("%h"))>0){
                                    $interval=$diff->format("%h hours ago");
                                }elseif(intval($diff->format("%i"))>0){
                                    $interval=$diff->format("%i minuts ago");
                                }else{
                                    $interval=$diff->format("%s seconds ago");
                                }
                            }

                            $dir="uploads/autopartphotos/".$partID."/";
                            $imgArray=scandir($dir);
                            $img='';
                            if($row->numofphotos>0){
                                $img=$imgArray[2];
                            }

                    ?>
                    <div class="row">
                        
                        <div class="col-md-3" style="height:100px">
                            <a href="#"><img class="img-responsive" style="height:100%" src="<?php echo base_url();?>uploads/autopartphotos/<?=$partID?>/<?=$img?>" alt="Image not available!"></a>
                        </div>
                        <div class="col-md-9">
                            <p><a href="#"><strong><?=$row->title?></strong></a></p>
                            <div>
                            <?php 
                                if($row->status=='Brand New'){
                                    echo "<span class='label label-success'>Brand New</span>";
                                }else{
                                    echo "<span class='label label-danger'>Used</span>";
                                }
                                
                            ?>
                            <dev class='pull-right'><a href='#' class='btn btn-default '>Add to <i class='glyphicon glyphicon-shopping-cart'></i></a></dev>
                            <dev class='pull-right' style='padding-right:5px'><a href='#' class='btn btn-primary ' >Bye It Now</a></dev>
                            <dev class='pull-right' style='padding-right:5px'><input type='number' id='quantity' class='form-control' name='quantity' style='width:60px' value='1' min='1' max='".$row->quantity."' required></dev>
                                
                            </div>
                            <h4 class="text-primary"><strong><?=$row->price?> Rs</strong></h4>

                            <div><a href="#"><?=$row->category?></a>-><a href="#"><?=$row->subcategory?></a><div class="pull-right"><?=$row->views?> views</div></div>
                            <div>
                            <?php
                                if($row->year){
                                    echo "Recommend for : <label class='text-success'>".$row->year." ".$row->madeby." ".$row->model." ".$row->submodel." ".$row->engine."</label>";
                                }
                            ?>
                            <div class="pull-right"><?=$interval?></div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                    <?php
                        if($count!=$resultset->num_rows()){
                            echo "<hr>";
                        }
                       }
                    ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

</body>

</html>
