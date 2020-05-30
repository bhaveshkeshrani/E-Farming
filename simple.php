
<?php
	include "php/session.php";
	$name=$_SESSION['logged_in'];
	$fid=$_SESSION['fid'];
	include 'php/connect.php';
		$sql = "SELECT camid FROM farm where fid=$fid";
		$result = mysql_query($sql);
		if(!$result)
		{
			 echo "camera not found";
		}
		else
		{
		$count_rows = mysql_num_rows($result);
		if($count_rows > 0)
		{	
			$row = mysql_fetch_assoc($result);
			$camid = $row['camid'];
		}
		}
?>
<!DOCTYPE html>
<html>
<script type="text/javascript" src="valve-list.js">
			
			</script>
  	<link rel="import" href="head.php">
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
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
                            <p>Hello,<?php echo " $name"; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="http://www.google.com" target="_blank" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="general.php">
                                <i class="fa fa-gavel"></i> <span>Profile</span>
                            </a>
                        </li>


                        <li class="active">
                            <a href="simple.php">
                                <i class="fa fa-video-camera"></i> <span>Live stream</span>
                            </a>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel">
                                <header class="panel-heading">
                                    Camera 1
                                </header>
                                <div class="panel-body">
															  <iframe src="http://<?php echo $camid;?>:8080/jsfs.html" height="287" width="100%" scrolling="no"></iframe>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->
                            <div class="panel">
                                <header class="panel-heading">
                                    Camera 2
                                </header>
                              <div class="panel-body">
							  								<iframe src="http://<?php echo $camid;?>:8080/jsfs.html" height="287" width="100%" scrolling="no"></iframe>
							  </div>
                             
                            </div><!-- /.panel -->
                        </div><!-- /.col -->
                       <div class="col-md-6">
                            <div class="panel">
                                <header class="panel-heading">
                                    Camera 3
                                </header>
                                <div class="panel-body">
                                							<iframe src="http://<?php echo $camid;?>:8080/jsfs.html" height="287" width="100%" scrolling="no"></iframe>
                                </div><!-- /.panel-body -->
                            </div><!-- /.panel -->
                            <div class="panel">
                                <header class="panel-heading">
                                    Camera 4
                                </header>
                              <div class="panel-body">
															<iframe src="http://<?php echo $camid;?>:8080/jsfs.html" height="287" width="100%" scrolling="no"></iframe>						  </div>

                            </div><!-- /.panel -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section>
                <!-- /.content -->
                <div class="footer-main">
                    e-farming &copy Efarming, 2016
                </div>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/Director/app.js" type="text/javascript"></script>
    </body>
</html>