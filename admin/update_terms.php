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

    <?php include"head.php";?>

    <div class="content">
        <div class="header">
            
            <h1 class="page-title">Edit Message</h1>
                    <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li><a href="message.php">Message</a> </li>
            <li class="active"><?php
				echo $_SESSION['user_name'];?></li>
        </ul>

        </div>
        <div class="main-content">
            
<ul class="nav nav-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Message</a></li>
  
</ul>

<div class="row">

  <div class="col-md-4">
    <br>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <div class="form-group">
		<?php
		if(isset($_GET['tid']))
		{
			include 'connect.php';
			$tid=$_GET['tid'];
			$sql = "SELECT `tid`,`header`,`desc` FROM terms where `tid`=$tid";
			$result = mysqli_query($con,$sql);
			if(!$result)
			{
				die("Record Does Not Exist");
				
			}
			while($row = mysqli_fetch_assoc($result))
			//if($count_rows > 0)
			{
					$tid = $row['tid'];
					$header = $row['header'];
					$desc= $row['desc'];
										
			}
					
		}
		?>
		<form method="get" action="up_info_terms.php">
				<div id='msghere'></div>
				
				<div class="form-group">
				<label>T&C id</label>
				<input type="text" value="<?php echo "$tid";?>" name="tid" id="tid" class="form-control" disabled>
				</div>
				
				<div class="form-group">
				<label>Header</label>
				<input type ="text" value="<?php echo "$header";?>" name="header" id="header" class="form-control">
				</div>
			   
			   <div class="form-group"> 
				<label>Description</label>
				<textarea rows="5" cols="30" name="desc" id="desc" class="form-control"><?php echo "$desc";?></textarea>
				</div>
			    		
				<div class="btn-toolbar list-toolbar">
				<input type="button" value="Update" name="submit" class="btn btn-primary" onClick="SubmitForm();"/>
				<input type="button" value="Cancel" name="submit" class="btn btn-primary" onClick="cancelForm();"/>
				</div>
			</form>
				<script type="text/javascript">
					
					function SubmitForm(){
						var tid=$("#tid").val();
						var header=$("#header").val();
						var desc=$("#desc").val();
						//var tym=$("#tym").val();
						$.ajax({
							url:"up_info_terms.php",
							data:{tid:tid,header:header,desc:desc},
							type:"get",
							success:function(info){
								//alert(info);
								if(info == "desc")
								{
									$("#msghere").html("<center style='color:red'>Please enter valid Content for <strong>Description</strong></center>");
								}
								else if(info == "success"){
									
									$("#msghere").html("<center style='color:green'><strong>Update successfully!</strong></center>");
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
								else if (info=="nondesc"){
									$("#msghere").html("<center style='color:red'>Description is <strong>non-empty Field!</strong></center>");
								}
								else if (info=="nonheader"){
									$("#msghere").html("<center style='color:red'>Header is <strong>non-empty Field!</strong></center>");
								}
								
								else{}
							}
						});
					}
					function cancelForm(){
						window.location="terms.php";
					}
					
				</script>

		</div>
		</div>
		</div>
		</div>
	</div>

<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
      </div>
      <div class="modal-body">
        
        <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the user?</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
      </div>
    </div>
  </div>
</div>


            
	<script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
 </body></html>

