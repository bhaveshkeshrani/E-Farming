<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>E-farm</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

    

    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
         <a class="" href="index.php"><span class="navbar-brand"><span class="glyphicon glyphicon-tree-deciduous"></span> E-farm</span></a>
		 <span class="glyphicon glyphicon-tree-deciduous"> Technology,Where Sucess Is At Home</span></a></div>
        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    </div>
    

<form action="reset_submit.php" method="POST" >
        <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Reset your password</p>
        <div class="panel-body">
		<div id='msghere'></div> <!--for printing the error or success message -->
            <form>
                <div class="form-group">
                    <label>Enter your Email ID:</label>
                    <input type="email" id="email" name="email" class="form-controlspan12 form-control">
                </div>
				<div class="form-group">
					<input type="button" value="Reset Password" name="submit" class="btn btn-primary" onClick='SubmitForm();'/>
					<input type="button" value="cancel" name="submit" class="btn btn-primary" onClick='cancelForm();'/>  
				</div>
				<div class="clearfix"></div>
            </form>
        </div>
    </div>
    <a href="sign-in.php" style="font-size: .75em; margin-top: .25em;">Sign in to your account</a>
</div>
 </form>

<script type="text/javascript">
					var email='';
					function SubmitForm(){
						email=$("#email").val();
						$.ajax({
							url:"reset_submit.php",
							data:{email:email},
							type:"POST",
							beforeSend:function(){
								$("#msghere").html("<div class='alert alert-info text-center'>Loading...</div>");
							},
							success:function(info){
								if(info == 0){
									$("#msghere").html("<div class='alert alert-success text-center'>An otp has been mailed to your Email id..</div>");
									setTimeout(function(){
										$("#otp-verify-modal").modal("show");
									},2000);
								}
								else if(info== "email")
								{
									$("#msghere").html("<center style='color:red'>Please enter valid <strong>Email Id!</strong></center>");
								}
								else if(info== "invalid")
								{
									$("#msghere").html("<center style='color:red'>Please enter your current <strong>Email Id!</strong></center>");
								}
								else{
									$("#msghere").html(info);
								}
							}
						});
					}
					function cancelForm(){
						window.location="admin.php";
					}
					function Verify(){
						var otp=$("#otp").val();
						$.ajax({
							data:{input_otp:otp},
							url:"reset_submit.php",
							method:"POST",
							success:function(data){
								if(data == 0){
									$("#result").html("<div class='alert alert-success text-center'>Verified Successfully!</div>");
									setTimeout(function(){
										$("#otp-verify-modal").modal("hide");
										$("#reset-pwd-modal").modal("show");
									},2000);
								}
								else{
									$("#result").html("<div class='alert alert-danger text-center'>"+data+"</div>");
								}
							}
						});
					}
					function Reset(){
						var pwd1=$("#pwd1").val();
						var pwd2=$("#pwd2").val();
						if(pwd1 != pwd2){
							$("#result-pwd").html("<div class='alert alert-danger text-center'>Passwords Not Matching!</div>");
						}
						else{
							$.ajax({
								data:{email1:email,pwd:pwd1},
								method:"POST",
								url:"reset_submit.php",
								success:function(data){
									if(data == 0){
										$("#result-pwd").html("<div class='alert alert-success text-center'>Password Updated Successfully!</div>");
										setTimeout(function(){
											window.location="index.php";
										},2000);
									}
								}
							});
						}
					}
				</script>
			
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
	<div class='modal modal-fade' id='otp-verify-modal'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button class='close' data-dismiss='modal'>&times;</button>
					<h4 class='modal-title'>OTP Verification</h4>
				</div>	
				<div class='modal-body'>
					<div id='result'></div>
					<label class='control-lable'>OTP </label>
					<input type='text' class='form-control' name='otp' id='otp' />
				</div>
				<div class='modal-footer'>
					<button onClick='Verify();' class='btn btn-primary' id='btn-verify'>Verify</button>
					<button class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>
			</div>
		</div>
	</div>
	
	
	<div class='modal modal-fade' id='reset-pwd-modal'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button class='close' data-dismiss='modal'>&times;</button>
					<h4 class='modal-title'>Reset Password</h4>
				</div>	
				<div class='modal-body'>
					<div id='result-pwd'></div>
					<label class='control-lable'>New Password </label>
					<input type='password' class='form-control' name='pwd1' id='pwd1' />
					<label class='control-lable'>Confirm Password </label>
					<input type='password' class='form-control' name='pwd2' id='pwd2' />
				</div>
				<div class='modal-footer'>
					<button onClick='Reset();' class='btn btn-primary' id='btn-reset'>Reset</button>
					<button class='btn btn-default' data-dismiss='modal'>Close</button>
				</div>
			</div>
		</div>
	</div>
</body></html>
