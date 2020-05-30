
<?php
	include "php/session.php";
if(!isset($_SESSION['logged_in'])){
	//echo "index page User";
	header("Location:login.php");
	exit;
}
else
{
	$name=$_SESSION['logged_in'];
}
//include 'php/temperature.php';
	$no=10;
?>
<!DOCTYPE html>
<html>
   	<link rel="import" href="head.php">
	<script type="text/javascript" src="valve-list.js">
			
			</script>
    <body class="skin-black" onLoad="getmessage(10);">
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
                       

                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo " $name"; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="#">
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
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="active">
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

            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="right-side">

                    <div class="row">
                        <div class="col-md-12">
                            <!--breadcrumbs start -->
                            <ul class="breadcrumb">
                                <li><a href="#"><i class="fa fa-home"></i> Home</a>ff</li>
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">Current page</li>
                            </ul>
                            <!--breadcrumbs end -->
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                     
                                    <!--pagination start-->
                              <section class="panel">
                                    <header class="panel-heading">
                                       Messages                                  
									</header>
                              
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu" id="msg_list" >
                                       
                                    </ul>
									
                                                 
                                    <!--pagination end-->
                         			<a href="javascript:getmessage(<?php $no+=10; echo $no;?>);">Load more messages..</a>
								</section>
                            </div>

                      </div>

                        </div>
               
            </div>
            <div class="footer-main">
                e-farming &copy Efarming, 2016
            </div>
        </div><!-- ./wrapper -->
		
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>
    </body>
</html>
