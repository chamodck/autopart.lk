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
                
                <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <!--<div class="sidebar-nav-fixed affix">-->
                <ul class="list-group">
                    <a href="#" class="list-group-item active" id="related" data-toggle="collapse" data-target="#relatedresult"><?= $related['name']?><span class="icon glyphicon glyphicon-chevron-up pull-right"></span></a>
                    <div id="relatedresult" class="collapse in">
                        <?php
                            foreach ($related['resultset']->result() as $row) {
                                if($related['type']=='vehicle'){
                                    if($related['need']=='cat'){
                                        $url=site_url("AutopartManage/vehicleSearch/1?".$searchresult['suffix']."&category=".$row->data);
                                         echo "<a href='$url' class='list-group-item' ><span class='badge'>$row->count</span>$row->data</a>";
                                    }else{
                                        $url=site_url("AutopartManage/vehicleSearch/1?".$searchresult['suffix']."&subcategory=".$row->data);

                                        if($related['subcategory']==$row->data){
                                            echo "<a href='$url' class='list-group-item' ><span class='badge'>$row->count</span><strong>$row->data</strong></a>";
                                        }else{
                                            echo "<a href='$url' class='list-group-item' ><span class='badge'>$row->count</span>$row->data</a>";
                                        }
                                    }
                                                                      
                                }elseif ($related['type']=='normal') {
                                    $url=site_url("AutopartManage/categorySearch/".$row->data."/1");
                                    echo "<a href='$url' class='list-group-item' ><span class='badge'>$row->count</span>$row->data</a>";
                                }else{
                                    $url=site_url("AutopartManage/subcategorySearch/".$row->data."/1");
                                    if($searchresult['keyword']==$row->data){
                                        echo "<a href='$url' class='list-group-item'><span class='badge'>$row->count</span><strong>$row->data</strong></a>";
                                    }else{
                                        echo "<a href='$url' class='list-group-item'><span class='badge'>$row->count</span>$row->data</a>";
                                    }
                                }  
                            }
                        ?>
                    </div>
                </ul>
            </div>
        </div>
    
                <!--</div>-->
            </div>
            <script type="text/javascript">
                $('#related').click(function () {
                if($('.icon').hasClass('glyphicon-chevron-down'))
                {
                    $('.icon').addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down'); 
                }
                else
                {      
                    $('.icon').addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up'); 
                }
                }); 
            
            </script>

            <div class="col-md-9" >
                <div class="text-success">
                    <?php
                        $pagefrom=(($searchresult['page']-1)*$searchresult['limit'])+1;
                        $pageto=$pagefrom+$searchresult['resultset']->num_rows()-1;
                    ?> 
                    <?=$searchresult['resultsize']?> results for <strong><?=$searchresult['keyword']?></strong> This page :<?php echo "$pagefrom -> $pageto"; ?>
                </div>
                <?php
                    if($searchresult['resultsize']>0){
                ?>
                <div class="well">
                    <?php
                        $count=0;
                        foreach ($searchresult['resultset']->result() as $row) {
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
                            <?php $url=site_url("AutopartManage/item_select/".$partID); ?>
                            <a href="<?=$url?>"><img class="img-responsive img-rounded" style="height:100%" src="<?php echo base_url();?>uploads/autopartphotos/<?=$partID?>/<?=$img?>" alt="Image not available!"></a>
                        </div>
                        <div class="col-md-9">
                            <p><a href="<?=$url?>"><strong><?=$row->title?></strong></a></p>
                            <div>
                            <?php 
                                if($row->status=='Brand New'){
                                    echo "<span class='label label-success'>Brand New</span>";
                                }else{
                                    echo "<span class='label label-danger'>Used</span>";
                                }
                                
                            ?>
                                
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
                        if($count!=$searchresult['resultset']->num_rows()){
                            echo "<hr>";
                        }
                       }
                    ?>
                </div>
                <?php
                    if($searchresult['resultsize']>$searchresult['limit']){
                ?>
                <div class="row text-center">
                    <div class="col-lg-12">                        
                        <ul class="pagination">

                            <?php
                                //pagination setup
                                //set pagination size
                                $paginationSize=5;//initial pagination value
                                $loopsize=intval($searchresult['resultsize']/$searchresult['limit']);
                                if($searchresult['resultsize']%$searchresult['limit']!=0){
                                    $loopsize++;
                                    //echo $loopsize;
                                }
                                $lastpage=$loopsize;
                                if($loopsize>$paginationSize){
                                    $loopsize=$paginationSize;
                                }else{
                                    $paginationSize=$loopsize;
                                }

                                $loopstart=1;
                                if($searchresult['page']>3){
                                    if($searchresult['page']+2>$lastpage){
                                        $loopstart=$lastpage-$paginationSize+1;
                                    }else{
                                        $loopstart=$searchresult['page']-2;
                                    }
                                }

                                $type=$searchresult['type'];
                                $keyword=$searchresult['keyword'];
                                $prev=$searchresult['page']-1;
                                $next=$searchresult['page']+1;

                                if($related['type']=='normal'){
                                    $urlprev=site_url("AutopartManage/normalSearch/$prev?".$searchresult['suffix']);//url for first page
                                    $urlfirst=site_url("AutopartManage/normalSearch/1?".$searchresult['suffix']);//for previous
                                    $urlnext=site_url("AutopartManage/normalSearch/$next?".$searchresult['suffix']);
                                    $urllast=site_url("AutopartManage/normalSearch/$lastpage?".$searchresult['suffix']);
                                }elseif ($type=='vehicle') {
                                    $urlprev=site_url("AutopartManage/vehicleSearch/$prev?".$searchresult['suffix']);//url for first page
                                    $urlfirst=site_url("AutopartManage/vehicleSearch/1?".$searchresult['suffix']);//for previous
                                    $urlnext=site_url("AutopartManage/vehicleSearch/$next?".$searchresult['suffix']);
                                    $urllast=site_url("AutopartManage/vehicleSearch/$lastpage?".$searchresult['suffix']);
                                }else{
                                    $urlprev=site_url("AutopartManage/".$type."Search/".$keyword."/$prev");//url for first page
                                    $urlfirst=site_url("AutopartManage/".$type."Search/".$keyword."/1");//for previous
                                    $urlnext=site_url("AutopartManage/".$type."Search/".$keyword."/$next");
                                    $urllast=site_url("AutopartManage/".$type."Search/".$keyword."/$lastpage");
                                }

                                if($searchresult['page']!=1){
                                    echo "<li ><a title='First page' href='$urlfirst'>&Lang;</a></li>";
                                    echo "<li ><a title='Previous page' href='$urlprev'>&lang;</a></li>";
                                }
                                
                                for($i=$loopstart;$i<$loopstart+$loopsize;$i++){
                                    if($i==$searchresult['page']){
                                        echo "<li class='active'>";
                                    }else{
                                        echo "<li>";
                                    }
                                    
                                    if($related['type']=='normal'){
                                        $url=site_url("AutopartManage/normalSearch/$i?".$searchresult['suffix']);
                                    }elseif ($type=='vehicle') {
                                        $url=site_url("AutopartManage/vehicleSearch/$i?".$searchresult['suffix']);
                                    }else{
                                        $url=site_url("AutopartManage/".$type."Search/".$keyword."/$i");
                                    }
                                    echo "<a href='$url'>$i</a></li>";
                                }

                                

                                if($searchresult['page']!=$lastpage){
                                    echo "<li ><a title='Next page' href='$urlnext'>&rang;</a></li>";
                                    echo "<li ><a title='Last page' href='$urllast'>&Rang;</a></li>";
                                }

                            ?> 
                            
                        </ul>
                    </div>
                </div><!-- /.well -->
                <?php
                    }
                }
                ?>
            </div>

        </div>

    </div>
    <!-- /.container -->

</body>

</html>