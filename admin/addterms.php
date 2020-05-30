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
    
<form action="addterms_submit.php" method="POST" >
	
    <div class="dialog">
    <div class="panel panel-default">
        <p class="panel-heading no-collapse">Add Terms & Condition </p>
        <div class="panel-body">
		<div id='msghere'></div> <!--for printing the error or success message -->
            <form>
				<div class="form-group">
				<label>Header</label>
				<input type="text" id="header" name="header" class="form-control span12">
				</div>
				
				<div class="form-group"> 
				<label>Description</label>
				<textarea rows="5" cols="50" name="desc" class="form-control span12" id="desc"></textarea>
                </div>
						
                <div class="form-group">
				<input type="button" value="Add T&C " name="submit" class="btn btn-primary" onClick='SubmitForm();'/>
                <input type="button" value="cancel" name="submit" class="btn btn-primary" onClick='cancelForm();'/>
                
				</div>
                    <div class="clearfix"></div>
            </form>
			</div>
    </div>
</div>
</form>
		
			<script type="text/javascript">
					
					function SubmitForm(){
						var header=$("#header").val();
						var desc=$("#desc").val();
						//var tym=$("#tym").val();
						$.ajax({
							url:"addterms_submit.php",
							data:{header:header,desc:desc},
							type:"POST",
							success:function(info){
								//alert(info);
								if(info == "desc")
								{
									$("#msghere").html("<center style='color:red'>Please enter valid Content for <strong>Description</strong></center>");
								}
								else if(info == "success"){
									
									$("#msghere").html("<center style='color:green'><strong>T&C Add successfully!</strong></center>");
									setTimeout(function(){
										window.location="terms.php";
									},2000);
									
								}
								else if(info == "please"){
									$("#msghere").html("<center style='color:red'>Please try again..some problem in updating!</center>");
								}
								else if (info=="header"){
									$("#msghere").html("<center style='color:red'>Please enter valid Content for <strong>Header!</strong></center>");
								}
								else if (info=="nonempty"){
									$("#msghere").html("<center style='color:red'>Header and Description are <strong>non-empty Fields!</strong></center>");
								}
								else{}
							}
						});
					}
					function cancelForm(){
						window.location="terms.php";
					}
					
				</script>
			<footer>
                <hr>
				<p class="pull-right">A Powered by E-farm</a></p>
                <p>© 2016 E-farm</a></p>
            </footer>

</body></html>
