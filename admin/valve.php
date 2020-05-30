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
            
            <h1 class="page-title">Valve</h1>
                    <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li class="active">Valve List</li>
        </ul>

        </div>
        <div class="main-content">
        <table class="table">
  <thead>
    <tr>
      <th>Valve Id</th>
      <th>Description</th>
      <th>Last Change</th>
	  <th>Auto on</th>
	  <th>Auto off</th>
	  <th>Status</th>
	 <th>Farm id</th>
	  <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
		include 'connect.php';
		$sql = "SELECT v.vid, v.desc, v.last_chng, v.autoon, v.autooff, v.status, f.fid FROM valve v,farm f WHERE f.fid=v.fid";
		$result = mysqli_query($con,$sql);
		if(!$result)
		{
			die("Record Does Not Exist");
			
		}
		while($row = mysqli_fetch_assoc($result))
		//if($count_rows > 0)
		{
			$id = $row['vid'];
			$desc = $row['desc'];
			$last_chng= $row['last_chng'];
			$autoon = $row['autoon'];
			$autooff= $row['autooff'];
			$status = $row['status'];
			$fid=$row['fid'];
			
			echo "<tr>      <td>$id</td>      <td>$desc</td>      <td>$last_chng</td>      <td>$autoon</td>      <td>$autooff</td>      <td>$status</td>      <td>$fid</td>    
			<td><a href=\"valve_delete.php?id=$id\" role=\"button\" data-toggle=\"modal\">
			<i class=\"fa fa-trash-o\"></i>Delete</a> </td> </td></tr>";
		}
		
		?>
  </tbody>
</table>
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

