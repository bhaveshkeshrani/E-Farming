<?php
session_start();
if(!isset($_SESSION['log_in'])){
	header("Location:sign-in.php");
	exit;
}?>
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
          <a class="" href="index.php"><span class="navbar-brand"><span class="glyphicon glyphicon-tree-deciduous"></span> E-farm</span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    </div>
    
<form action="new_submit.php" method="POST" >
	
    <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Add New User</p>
        <div class="panel-body">
		<div id='msghere'></div> <!--for printing the error or success messege -->
            <form>
                <div class="form-group">
                    <label>First Name</label>	
                    <input type="text" name="name" class="form-control span12" id="first_name">
                </div>
               
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control span12" id="email">
                </div>
                <div class="form-group"> 
				<label>Address</label>
				<textarea rows="3" cols="50" name="add" class="form-control span12" id="address"></textarea>
                </div>
				
				<div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control span12" id="txtPassword">
                </div>
				 <div class="form-group">
                    <label>Re-type Password</label>
                    <input type="password" name="repass" class="form-control span12" id="repass">
                </div>
                <div class="form-group">
				<input type='button' value='Add User' name="submit" class="btn btn-primary" onClick='SubmitForm();'/>
             <input type='button' value='Cancel' name="submit" class="btn btn-primary" onClick="cancelForm();"/>
                </div>
                    <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
</form>
<footer>
                <hr>
				<p class="pull-right">A Powered by E-farm</a></p>
                <p>© 2016 E-farm</a></p>
            </footer>
	
	

    <script src="lib/bootstrap/js/bootstrap.js">
        /*$("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
		function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords does not match.");
            return false;
        }
        return true;
		}
		*/</script>
		<script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
		
		function SubmitForm(){
			
			var first_name=$("#first_name").val();
			var email=$("#email").val();
			var address=$("#address").val();
			var password=$("#txtPassword").val();
			var repass=$("#repass").val();
		/*if (password != confirmPassword) {
            alert("Passwords does not match.");
            return false;
        }
		else{*/
			//alert("jj");
			$.ajax({
				url:"new_submit.php",
				data:{first_name:first_name,email:email,address:address,password:password,repass:repass},
				type:"post",
				success:function(info){
					//alert(info);
					if(info == "email")
					{
						$("#msghere").html("<center style='color:red'>Please enter valid <strong>Email Id!</strong></center>");
					}
					else if(info == "success"){
						$("#msghere").html("<center style='color:green'>User add successfully! Redirecting in 3 seconds...</center>");
						setTimeout(function(){
							window.location="users.php";
						},3000);
					}
					else if(info == "error"){
						$("#msghere").html("<center style='color:red'>Please Check adding <strong>credential!</strong></center>");
					}
					else if(info=="password")
					{
						$("#msghere").html("<center style='color:red'><strong>Password Does not Match!</strong></center>");
				
					}
					else if (info=="address")
					{
						$("#msghere").html("<center style='color:red'>Please enter valid <strong>Address</strong> and Its <strong>non-empty</strong> Field!</center>");
					}
					else if (info=="user_name")
					{
						$("#msghere").html("<center style='color:red'>Please enter valid <strong>First Name</strong> and Its <strong>non-empty</strong> Field!</center>");
					}
					else if(info=="nonpass")
					{
						$("#msghere").html("<center style='color:red'><strong>Password is non-empty Field!</strong></center>");
				
					}
							
					else{
						
					}
				}
			});
		}
			function cancelForm(){
						window.location="users.php";
					
					}
    </script>
    

    
  
</body></html>
