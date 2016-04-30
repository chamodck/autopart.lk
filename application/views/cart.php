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
        <?php
            if($this->session->has_userdata('username')){
              $totalPrice=0;
        ?>
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  
                  <th>Item</th>
                  <th>Quantity</th>
                  <th>Price (Rs)</th>
                </tr>
              </thead>
              <tbody>
        <?php
                foreach ($cartdata->result() as $row) {
                  $totalPrice +=$row->qty*$row->price;

                  $dir="uploads/autopartphotos/".$row->id."/";
                  $imgArray=$imgArray=scandir($dir);
                  $imgURL=base_url()."uploads/autopartphotos/".$row->id."/";
                  if(sizeof($imgArray)>2){
                    $imgURL.=$imgArray[2];
                  }
        ?>
                  <div clas"row">
                    <tr>
                      <td>
                        <div class="col-md-3" style="height:100px">
                            <a href="<?=site_url("AutopartManage/item_select/".$row->id); ?>"><img class="img-responsive img-rounded" style="height:100%" src="<?=$imgURL?>"></a>
                        </div>
                        <div class="col-md-8"><a href="<?=site_url("AutopartManage/item_select/".$row->id); ?>"><?=$row->name?></a></div>
                      </td>
                      <td><?=$row->qty?></td>
                      <td><?=$row->price?></td>
                      <td><a href="<?=site_url("PaymentController/deleteUserCartItem/".$row->id."/".$row->qty); ?>">Remove</a></td>
                      
                    </tr>
                  </div>
        <?php
                }
        ?>
                  <tr>
                  <td><strong>Total</strong></td>
                  <td></td>
                  <td><strong><?= $totalPrice?></strong></td>
                </tr>

                </tbody>
            </table>
        <?php
            }else{
        ?>
            <div class="alert alert-dismissible alert-warning">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <h4>Login to your Account</h4>
              <p>This cart is a temporary, Login to your account to save cart</p>
            </div>

            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  
                  <th>Item</th>
                  <th>Quantity</th>
                  <th>Price (Rs)</th>
                </tr>
              </thead>
              <tbody>
                

        <?php
            $cart=$this->cart->contents();
                foreach($cart as $array){
                    //image url setup
                    $dir="uploads/autopartphotos/".$array['id']."/";
                    $imgArray=scandir($dir);
                    $imgURL=base_url()."uploads/autopartphotos/".$array['id']."/";
                    if(sizeof($imgArray)>2){
                        $imgURL.=$imgArray[2];
                    }
        ?>
                <div clas"row">
                <tr>
                  <td>
                    <div class="col-md-3" style="height:100px">
                        <a href="<?=site_url("AutopartManage/item_select/".$array['id']); ?>"><img class="img-responsive img-rounded" style="height:100%" src="<?=$imgURL?>"></a>
                    </div>
                    <div class="col-md-8"><a href="<?=site_url("AutopartManage/item_select/".$array['id']); ?>"><?=$array['name']?></a></div>
                  </td>
                  <td><?=$array['qty']?></td>
                  <td><?=$array['price']?></td>
                  <td><a href="<?=site_url("PaymentController/deleteSessionCartItem/".$array['rowid']); ?>">Remove</a></td>
                  
                </tr>
                </div>
        <?php
                }
        ?>      
                <tr>
                  <td><strong>Total</strong></td>
                  <td></td>
                  <td><strong><?=$this->cart->total();?></strong></td>
                </tr>

                </tbody>
            </table>

        <?php
            }
        ?>

    </div>
    <!-- /.container -->

</body>

</html>