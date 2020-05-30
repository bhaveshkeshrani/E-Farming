<?php
session_start();
if(isset($_SESSION['log_in'])){
	header("Location:index.php");
	exit;
}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>E-farm Sign-In</title>
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

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  
  <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="index.php"><span class="navbar-brand"><span class="glyphicon glyphicon-tree-deciduous"></span> E-farm</span></a>
		  </div>

        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    
    <div class="dialog" id="main">
    <div class="panel panel-default" id="sign_div">
        <p class="panel-heading no-collapse">Sign In</p>
        <div class="panel-body" >
            <form method="post" id="sign" action= "sign-in-submit.php" enctype='multipart/form-data'>
			
				<div id='msghere'></div> <!-- division part where any success or error message will be displayed... --> 
				
                <div class="form-group">
                    <label>Email ID:</label>
                    <input type="email" class="form-control span12" name="email" id="email">
					<!--<<div id='emailmsg'></div>-->
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input type="password" class="form-controlspan12 form-control" name="password" id="password" >
                </div>
				
				<!--<input type='submit' value='Sign In' name="submit" class="btn btn-primary pull-right" />-->
				<input type='button' value='Sign In' name="submit" class="btn btn-primary pull-right" onClick='SubmitForm();'/>
              <!--<label class="remember-me"><input type="checkbox"> Remember me</label>-->
                <div c lass="clearfix"></div>
            </form>
        </div>
    </div>

    <p class="pull-right" style="font-size: .85em; margin-top: .25em;">Design by E-farm</a></p>
    <!--<p><a href="reset-password.php">Forgot your password?</a></p>-->
</div>
	



    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
		
		function SubmitForm(){
			
			var email=$("#email").val();
			var password=$("#password").val();
			$.ajax({
				
				url:"sign-in-submit.php",
				data:{email:email,password:password},
				type:"post",
				success:function(info){
					//alert(info);
					if(info == "email")
					{
						$("#msghere").html("<center style='color:red'><strong>Please enter valid Email Id!</strong></center>");
					}
					else if(info == "success"){
						$("#msghere").html("<center style='color:green'><strong>Log in successfully! Please Wait..</strong></center>");
						setTimeout(function(){
							window.location="index.php";
						},2000);
					}
					else if(info == "error"){
						$("#msghere").html("<center style='color:red'><strong>Invalid Login Credentials!</strong></center>");
					}
					else if(info == "password"){
						$("#msghere").html("<center style='color:red'><strong>Password is non-empty Field!</strong></center>");
					}
					else{
						
					}
				}
			});
		}
    </script>
    
  
</body></html>
