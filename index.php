
<?php
session_start();
//include 'php/autostart.php';
if(!isset($_SESSION['logged_in'])){
	//echo "index page User";
	header("Location:login.php");
	exit;
}
else
{
	$name=$_SESSION['logged_in'];
}
include 'php/temperature.php';
include "php/metervalue.php";
if(isset($_SESSION['error'] ))
{
$neterror=$_SESSION['error'];
unset($_SESSION['error']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Director | Dashboard</title>
   		<link rel="import" href="head.php">
		<!--toggle button-->
		<link href="css/toggle/toggle.min.css" rel="stylesheet">
		<script src="js/toggle/toggle.min.js"></script>
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    
   
	<!--meter code-->
	<meta name="viewport" content="width=1024, maximum-scale=1">
    <link href="css/meter/jquery-gauge.css" type="text/css" rel="stylesheet">
    <style>
        .demo1 {
            position: relative;
            width: 9vw;
            height: 9vw;
            box-sizing: border-box;
            float:left;
            margin:0px
        }
        .demo2 {
            position: relative;
            width: 40vw;
            height: 40vw;
            box-sizing: border-box;
            float:right;
            margin:20px
        }
        }
    </style>
	
	<script src="js/meter/jquery-gauge.min.js" type="text/javascript"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
     		<script type="text/javascript" src="valve-list.js">
			
			</script>
      </head>
      <body class="skin-black" onLoad="onload();">
	  
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                E-farming
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
					               </a>
                <div class="navbar-right">
				
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
						
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope" onClick="getmessage(5);"></i>
                                <span class="label label-success">+</span>                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have some messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu" id="msg_list">
                                       
                                        <?php //include "php/getmessage.php"?> 
                                    </ul>
                                </li>
                                <li class="footer"><a href="message.php">See All Messages</a></li>
                            </ul>
                      </li>
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $name; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="message.php">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                        <span class="badge badge-danger pull-right">5</span> Messages</a>
                                   
                                </li>

                                <li class="divider"></li>

                                    <li>
                                        <a href="general.php">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <a data-toggle="modal" href="#modal-user-settings">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Settings
                                        </a>
                              </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="php/logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </nav>
      </header>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel">
                               
                                <div class="pull-left info">
                                    <p>Hello,<?php echo "$name"; ?></p>

                                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                                </div>
                            </div>
                            <!-- search form -->
                            <form action="http://www.google.com" method="get" target="_blank" class="sidebar-form">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li class="active">
                                    <a href="index.php">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="general.php">
                                        <i class="fa fa-gavel"></i> <span>Profile</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="simple.php">
                                        <i class="fa fa-video-camera"></i> <span>Live stream</span>
                                    </a>
                                </li>

                            </ul>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">	

                <!-- Main content -->
                <section class="content">

                    <div class="row" style="margin-bottom:5px;">


                        <div class="col-md-3">
                            <div class="sm-st clearfix" style="background:rgba(151,187,205,0.2)">
                                <span class="sm-st-icon st-red"><i class="fa fa-sun-o"></i><i class="fa fa-flash"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $temp; ?></span>
                                    Temperature
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-cloud"></i><i class="fa fa-arrow-right"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo "$wind km/Hr";?></span>Wind speed </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix" style="background:rgba(220,220,100,1)">
                                <span class="sm-st-icon st-blue"><i class="fa fa-cloud"></i><i class="fa fa-tint"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $rain; ?></span>Rain</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix" style="background:rgba(220,220,220,1)">
                                <span class="sm-st-icon st-green"><i class="fa fa-tint" aria-hidden="true"></i></span>
                                <div class="sm-st-info">
                                    <span><?php echo $humidity; ?>%</span>Humidity</div>
                            </div>
                        </div>
                    </div>

                    <!-- Main row -->
                    <div class="row">

                        <div class="col-md-8">
                            <!--earning graph start-->
                            <section class="panel">
                                <header class="panel-heading">
                                   Temperature , Humidity and cloud Graph : location = <b><?php echo $location; ?></b>
                                </header>
                                <div class="panel-body">
                                    <canvas id="linechart" width="600" height="200"></canvas>
									<h2><?php echo $neterror;?></h2>
                                </div>
								<div class="panel-body">
                                    <div class="row" style="margin-bottom:5px;">


                        <div class="col-md-3">
                            <div class="sm-st clearfix" style="background:rgba(220,220,220,1)">
							   <div class="gauge1 demo1"></div>
                                <div class="sm-st-info">
                                    <span><?php echo $meter[0]; ?><h5>Water level</h5></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix" style="background:rgba(220,220,220,1)">
							<div class="gauge2 demo1"></div>
                                <div class="sm-st-info">
                                    <span><?php echo $meter[1]; ?><h5>Land Humidity</h5></span>
                                </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix" style="background:rgba(220,220,220,1)">
								<div class="gauge3 demo1"></div>
                                <div class="sm-st-info">
                                    <span><?php echo $meter[2]; ?><h5>Water Pressure</h5></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix" style="background:rgba(220,220,220,1)">
							<div class="gauge4 demo1"></div>
                                <div class="sm-st-info">
                                    <span><?php echo $meter[3]; ?><h5>something</h5></span>
                                </div>
                            </div>
                        </div>
                    </div>
                                </div>
                          </section>
                                        <!--earning graph end-->

                      </div>
					  
					  
					  
					  <div class="col-lg-4">
            <section class="panel">
                <header class="panel-heading" id="switcherror">
                    WATER FEED
                </header>
                <div class="panel-body">
                  <ul class="media-list">
                        <li class="media">
                            <a href="#" class="pull-left"></a>
							<div id="b_list">
							
							</div>
							
							
							<div class="form-group">
                          <input type="text" class="form-control" name="desc" placeholder="Enter valve Number to add" id="v_desc"></input>
						   <div class="col-lg-offset-5 ">
											   <button type="submit" onClick="addvalve();" class="btn btn-danger">ADD</button>
                                    </div>
										  
                            </div>
                    </li>
                  </ul>
                </div>
            </section>
        </div>
                  </div>
                    <div class="row">

                        <div class="col-md-8">
                            <section class="panel">
                              <header class="panel-heading" id="error">
                                  Valve TimeStamp
                            </header>
                            <div class="panel-body table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Description</th>
                                      <th>Last ON/OFF</th>
                                      <th>Uptime in Hrs</th>
									  <th>Auto on</th>
									  <th>Auto off</th>
									  <th>Update</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody id="valve_timestamp">
							
								
                          </tbody>
                      </table>
                  </div>
              </section>


          </div><!--end col-6 -->
           <div class="col-md-4">

                                        <!--chat start-->
                                        <section class="panel">
                                            <header class="panel-heading">
                                                Notifications
                                            </header>
                                                <div class="panel-body" id="noti-box">

                                                    <div class="alert alert-block alert-danger">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Oh snap!</strong> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="alert alert-success">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Well done!</strong> You successfully read this important alert message.
                                                    </div>
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                                                    </div>
                                                    <div class="alert alert-warning">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Warning!</strong> Best check yo self, you're not looking too good.
                                                    </div>


                                                    <div class="alert alert-block alert-danger">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Oh snap!</strong> Change a few things up and try submitting again.
                                                    </div>
                                                    <div class="alert alert-success">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Well done!</strong> You successfully read this important alert message.
                                                    </div>
                                                    <div class="alert alert-info">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                                                    </div>
                                                    <div class="alert alert-warning">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Warning!</strong> Best check yo self, you're not looking too good.
                                                    </div>

													<div class="alert alert-success">
                                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                        <strong>Well done!</strong> You successfully read this important alert message.
                                                    </div>

                                                </div>
                                        </section>



                      </div>

                    </div>
                  <div class="row"></div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    e-farming &copy Efarming, 2016
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });
        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
		</script>
	
    <script>
	
        // first example
        var gauge = new Gauge($('.gauge1'), {value:<?php echo $meter[0]; ?>});
		var gauge = new Gauge($('.gauge2'), {value:<?php echo $meter[1]; ?>});
		var gauge = new Gauge($('.gauge3'), {value:<?php echo $meter[2]; ?>});
		var gauge = new Gauge($('.gauge4'), {value:<?php echo $meter[3]; ?>});
        // second example
        $('.gauge2').gauge({
            values: {
                0 : '0',
                20: '2',
                40: '4',
                60: '6',
                80: '8',
                100: '10'
            },
            colors: {
                0 : '#666',
				9 : '#378618',
                60: '#ffa500',
                80: '#f00'
            },
            angles: [
                180,
                360
            ],
            lineWidth: 20,
            arrowWidth: 20,
            arrowColor: '#ccc',
            inset:true,

            value: 50
        });
    </script>
<script type="text/javascript">
    $(function() {
                "use strict";
                //BAR CHART
                var data = {
                    labels: [<?php 
					try{
							$tmp=$jsonobj->forecast->forecastday[0]->hour[0]->time_epoch;	
							echo "\"".date("g:i a",$tmp)."\"";
							for($x=1;$x<24;$x++)
							{
								$tmp=$jsonobj->forecast->forecastday[0]->hour[$x]->time_epoch;
								echo ",\"".date("g:i a",$tmp)."\"";
							}
							}
	catch(Exception $e)
	{
	//echo $e;
	}
							?> ],
                    datasets: [
                        {
                            label: "My First dataset",
                            fillColor: "rgba(220,220,220,0.9)",
                            strokeColor: "rgba(220,220,220,1)",
                            pointColor: "rgba(220,220,220,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,220,1)",
                            //data: [65, 59, 80, 81, 56, 55, 40,50,60,70,40]
							data: [<?php 
							try{
							$tmp=$jsonobj->forecast->forecastday[0]->hour[0]->humidity;	
							echo  $tmp;
							for($x=1;$x<24;$x++)
							{
								$tmp=$jsonobj->forecast->forecastday[0]->hour[$x]->humidity;
								echo ",".$tmp;
							}
							}
	catch(Exception $e)
	{
	//echo $e;
	}
							?>]
                        },
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [<?php 
							try{
							$tmp=$jsonobj->forecast->forecastday[0]->hour[0]->temp_c;	
							echo  $tmp;
							for($x=1;$x<24;$x++)
							{
								$tmp=$jsonobj->forecast->forecastday[0]->hour[$x]->temp_c;
								echo ",".$tmp;
							}
							}
	catch(Exception $e)
	{
	//echo $e;
	}
							?>]
                        },
						{
                            label: "My third dataset",
                            fillColor: "rgba(220,220,100,0.2)",
                            strokeColor: "rgba(220,220,100,1)",
                            pointColor: "rgba(220,220,100,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(220,220,100,1)",
                            //data: [65, 59, 80, 81, 56, 55, 40,50,60,70,40]
							data: [<?php 
							try{
							$tmp=$jsonobj->forecast->forecastday[0]->hour[0]->cloud;	
							echo  $tmp;
							for($x=1;$x<24;$x++)
							{
								$tmp=$jsonobj->forecast->forecastday[0]->hour[$x]->cloud;
								echo ",".$tmp;
							}
							}
							catch(Exception $e)
							{
							
							}
													
							?>]
                        }
                    ]
                };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data,{
                responsive : true,
                maintainAspectRatio: false,
            });

            });
            // Chart.defaults.global.responsive = true;
</script>
</body>
</html>