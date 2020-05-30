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
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.cssn">

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

<?php include "head.php";?>   
    <div class="content">
        <div class="header">
            
            <h1 class="page-title">Clients</h1>
                    <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li class="active">Clients</li>
        </ul>

        </div>
        <div class="main-content">
            
<div class="btn-toolbar list-toolbar">
       <div class="btn-group">
	    
  </div>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Client Id</th>
      <th>Client Name</th>
      <th>Email</th>
	  <th>Password</th>
	  <th>Address</th>
	  <th>Contact</th>
	  <th>Farm Id</th>
	  <!--<th style="width: 2.0em;"></th>-->
	  <th>Update</th>
	  <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
		include 'connect.php';
		$sql = "SELECT `pid`, `email`, `password`, `pname`, `paddress`, `contact`,p.`fid` FROM `person` p,`farm` f WHERE p.fid=f.fid	";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			die("Record Does Not Exist");
			
		}
		while($row = mysqli_fetch_assoc($result))
		//if($count_rows > 0)
		{
			$id = $row['pid'];
			$email = $row['email'];
			$password= $row['password'];
			$name = $row['pname'];
			$address= $row['paddress'];
			$contact = $row['contact'];
			$fid=$row['fid'];
			
			echo "<tr>      <td>$id</td>      <td>$name</td>      <td>$email</td>      <td>$password</td>      <td>$address</td>      <td>$contact</td>      <td>$fid</td>    <td>
			<a href=\"update_client.php?id=$id\"><i class=\"fa fa-pencil\"></i>Update</a>
			</td> <td><a href=\"client_delete.php?id=$id\" role=\"button\" data-toggle=\"modal\">
			<i class=\"fa fa-trash-o\"></i>Delete</a> </td> </td></tr>";
		}
		
		?>
  </tbody>
</table>

<!--<ul class="pagination">
  <li><a href="#">&laquo;</a></li>
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#">&raquo;</a></li>
</ul>
-->
<div class="modal small fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Delete Confirmation</h3>
        </div>
        <div class="modal-body">
            <p class="error-text"><i class="fa fa-warning modal-icon"></i>Are you sure you want to delete the user?<br>This cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
            <button class="btn btn-danger" data-dismiss="modal">Delete</button>
        </div>
      </div>
    </div>
</div>

<footer>
                <hr>
				<p class="pull-right">A Powered by E-farm</a></p>
                <p>© 2016 E-farm</a></p>
            </footer>
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

