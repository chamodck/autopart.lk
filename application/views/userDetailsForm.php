<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registration</title>

        <!-- CSS -->
        
        <link href="<?php echo base_url();?>css/bootstrap-simplex-theme.css" rel="stylesheet" type="text/css">
		<script src="<?php echo base_url();?>script/jquery-2.1.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>script/bootstrap.min.js" type="text/javascript"></script>
		<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <div class="text-center"><h1><strong>Register</strong> Here in autopart.lk</h1></div>
                            <div class="description">
                            	<p class="text-center">
	                            	autopart.lk is the srilanka's premier website for the selling and buying your autoparts.!<br>	                            
									Run your business with ease - we have the tools for you to efficiently manage your inventory and orders.
									Save money for you and your business by buying on autopart.lk
									Promote your brand and grow your business.

                            	</p>
                            	<br>
                            </div>
                            <div class="progress">
							  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="1" aria-valuemax="2"></div>
							</div>
                        </div>
                    </div>
                    <div class="container">
                    	<div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	
                        	<form id="myform" role="form" action="<?=site_url('UserManage/userDetailsSubmit');?>" method="post" class="form-horizontal">
                        		
                        		<fieldset class="step well">
		                        	
		                        		
		                        			<i class="fa fa-user pull-right fa-5x"></i>
		                        			<p class="lead">Step 1/2</p>
		                            		<p class="text-success lead ">Personal Details</p>

				                    	<div class="form-group">
				                    		<label class="col-lg-4 control-label">First Name <label class="text-danger">*</label></label>
                							<div class="col-lg-8">
				                        		<input type="text" value="<?=set_value('firstname')?>" name="firstname" placeholder="First name..." title="First name" class="form-control" id="firstname"  />
				                        		<span class="text-danger" id="firstError"></span>
				                        	</div>
				                        </div>

				                        <div class="form-group">
				                        	<label class="col-lg-4 control-label">Last Name <label class="text-danger">*</label></label>
                							<div class="col-lg-8">
				                        		<input type="text" value="<?=set_value('lastname')?>" name="lastname" placeholder="Last name..." title="Last name" class="form-control" id="lastname" />
				                        		<span class="text-danger" id="lastError"></span>
				                        	</div>
				                        </div>

				                        <div class="form-group">
				                        	<label class="col-lg-4 control-label">NIC <label class="text-danger">*</label></label>
                							<div class="col-lg-8">
				                       			<input type="text" name="nic" placeholder="xxxxxxxxx" title="NIC(9 digits)" class="form-control" id="nic" />
				                       			<span class="text-danger" id="nicError"><?=form_error('nic')?></span>
				                       		</div>
				                        </div>

				                        <div class="form-group">
				                        	<label class="col-lg-4 control-label">Contact Number <label class="text-danger">*</label></label>
                							<div class="col-lg-8">
				                       			<input type="text" value="<?=set_value('contact')?>" name="contact" placeholder="xxxxxxxxxx" title="Contact Number(10 digits)" class="form-control" id="contact" />
				                       			<span class="text-danger" id="contactError"></span>
				                       		</div>
				                        </div>

				                        <div class="form-group">
				                        	<label class="col-lg-4 control-label">Address line1 <label class="text-danger">*</label></label>
                							<div class="col-lg-8">
				                        		<input type="text" value="<?=set_value('address1')?>" name="address1" placeholder="Address line1" class="form-control" title="Address line1" id="address1" />
				                        		<span class="text-danger" id="address1Error"></span>
				                        	</div>
				                        </div>
				                        <div class="form-group">
				                        	<label class="col-lg-4 control-label">Address line2 <label class="text-danger">*</label></label>
                							<div class="col-lg-8">
				                        		<input type="text" value="<?=set_value('address2')?>" name="address2" placeholder="Address line2" class="form-control" title="Address line2" id="address2" />
				                        		<span class="text-danger" id="address2Error"></span>
				                        	</div>
				                        </div>
				                        <div class="form-group">
				                        	<label class="col-lg-4 control-label">Address line3</label>
                							<div class="col-lg-8">
				                        		<input type="text" value="<?=set_value('address3')?>" name="address3" placeholder="Address line3" class="form-control" title="Address line3" id="address3" />
				                        		<span class="text-danger" id="address3Error"></span>
				                        	</div>
				                        </div>

				                        

			                    </fieldset>
			                    
			                    
			                    
			                    <fieldset class="step well" >
			                    	<i class="fa fa-money pull-right fa-5x"></i>
		                        	<p class="lead">Step 2/2</p>
		                            <p class="text-success lead">Payment Information</p>

		                            
				                    	<div class="bs-example">
				                    		
    
										    <div class="panel-group" id="accordion">
										        <div class="panel panel-default">
										            <li><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										            	<div class="panel-heading">
											                <h4 class="panel-title">
											                    Bank Account
											                </h4>
										            	</div>
										        	</a></li>
										            <div id="collapseOne" class="panel-collapse collapse">
										                <div class="panel-body">

										                    <div class="form-group">
									                        	<label class="col-lg-4 control-label">Bank Name</label>
					                							<div class="col-lg-8">
									                        		<input type="text" name="bankname" placeholder="Bank Name" title="Enter Bank Name" class="form-control acc" pattern="[-a-zA-Z\s]+"/>
									                        	</div>
									                        </div>
									                        <div class="form-group">
									                        	<label class="col-lg-4 control-label">Account Holder Name</label>
					                							<div class="col-lg-8">
									                        		<input type="text" name="holdername" placeholder="Account Holder Name" title="Enter Account Holder Name" class="form-control acc" pattern="[a-zA-Z\s]+"/>
									                        	</div>
									                        </div>
									                        <div class="form-group">
									                        	<label class="col-lg-4 control-label">Account Number</label>
					                							<div class="col-lg-8">
									                        		<input type="text" name="accnumber" placeholder="Account Number" class="form-control acc" title="Enter Account Number" pattern="[0-9]+"/>
									                        	</div>
									                        </div>

										                </div>
										            </div>
										        </div>
										        <div class="panel panel-default">
										            <li><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
										            	<div class="panel-heading">
											                <h4 class="panel-title">
																PayPal
											                </h4>
										            	</div>
										        	</a></li>
										            <div id="collapseTwo" class="panel-collapse collapse">
										                <div class="panel-body ">
										                	<a href="#" class="btn btn-default ">Continue to PayPal</a>
										                	
										                </div>
										            </div>
										        </div>
										        
										    </div>
										</div>
								     
			                    </fieldset>
		                     <button type="submit" class="action submit btn btn-primary pull-right" id="submitBtn">Submit and Finish</button>
		                     <input type='button' id="next" class="action next btn btn-primary pull-right" value="next" />
		                     <input type='button' class="action back btn btn-default pull-right" style="margin-right:5px" value="Back" /> 
		                    </form>
                        </div></div>
                    </div>
                </div>
            </div>
          
        </div>

    </body>

</html>

<script type="text/javascript">
	$(document).keypress(
    function(event){
     if (event.which == '13') {
        event.preventDefault();
      }
	});

	$(document).ready(function(){
		var current = 1;
		
		widget      = $(".step");
		btnnext     = $(".next");
		btnback     = $(".back"); 
		btnsubmit   = $(".submit");

		// Init buttons and UI
		widget.not(':eq(0)').hide();
		hideButtons(current);
		setProgress(current);

		// Next button click action
		btnnext.click(function(){
			
			if(validatePersonalDetails() && current < widget.length){
				widget.show();
				widget.not(':eq('+(current++)+')').hide();
				setProgress(current);
			}
			hideButtons(current);
		})

		// Back button click action
		btnback.click(function(){
			if(current > 1){
				current = current - 2;
				btnnext.trigger('click');
			}
			hideButtons(current);
		})	

		$("#collapseOne").on("hide.bs.collapse", function(){
		   $(".acc").prop("required",false);
		});
		$("#collapseOne").on("show.bs.collapse", function(){
		   $(".acc").prop("required",true);
		});
		
	});

	// Change progress bar action
	setProgress = function(currstep){
		var percent = parseFloat(100 / widget.length) * (currstep);
		percent = percent.toFixed();
		$(".progress-bar").css("width",percent+"%").html('Step '+currstep+' of '+widget.length);		
	}

		// Hide buttons according to the current step
	hideButtons = function(current){
		var limit = parseInt(widget.length); 

		$(".action").hide();
		if(current < limit) btnnext.show();
		if(current > 1) btnback.show();
		if (current == limit) { btnnext.hide(); btnsubmit.show(); }
	}

	
	function validatePersonalDetails(){
		$("#firstError").html("");
		$("#lastError").html("");
		$("#nicError").html("");
		$("#contactError").html("");
		$("#address1Error").html("");
		$("#address2Error").html("");

		if($("#firstname").val()==""){
			$("#firstError").html("Enter first name!");
			return false;

		}else{
			//$("#firstError").html("scd");
			if($("#firstname").val().match(/[^a-zA-Z]+/g)!=null){
				$("#firstError").html("Use only letters!");
				return false;
			}else{
				if($("#lastname").val()==""){
					$("#lastError").html("Enter last name!");
					return false;
				}else{
					if($("#lastname").val().match(/[^a-zA-Z]+/g)!=null){
						$("#lastError").html("Use only letters!");
						return false;
					}else{
						if($("#nic").val().match(/[^0-9]+/g)!=null){
							$("#nicError").html("Wrong NIC Number!");
							return false;
						}else{
							if($("#nic").val().length!=9){
								$("#nicError").html("Wrong NIC Number!");
								return false;
							}
							else{
								
									if($("#contact").val().match(/[^0-9]+/g)!=null){
										$("#contactError").html("Wrong Contact Number!");
										return false;
									}else{
										if($("#contact").val().length!=10){
											$("#contactError").html("Wrong Contact Number!");
											return false;
										}else{
											if($("#address1").val().match(/[a-zA-Z]+/g)==null){
												$("#address1Error").html("Enter Address line1 !");
												return false;
											}
											if($("#address2").val().match(/[a-zA-Z]+/g)==null){
												$("#address2Error").html("Enter Address line2 !");
												return false;
											}
										}
									}
								
							}
						}
					}
				}
			}
		}
		return true;
	}

	$(function () {
        $("#myform").formwizard({
            validationEnabled: true,
            focusFirstInput: false,
            disableUIStyles: true,
            textSubmit: 'Submit and Finish',
            textNext: 'Continue to next step',
            next: "input:submit"
        }
        );
    });

    $('#submitBtn').click(function () {
        var stepInfo = $('#myform').formwizard('state');
        for (var i = 0; i < stepInfo.activatedSteps.length; i++) {
            stepInfo.steps.filter("#" + stepInfo.activatedSteps[i]).find(":input").not(".wizard-ignore").removeAttr("disabled");
        }
    });

</script>