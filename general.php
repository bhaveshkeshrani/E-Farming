
<?php	
include "php/session.php";
if(isset($_SESSION['user_id']))
	{
		$uid=$_SESSION['user_id'];
		$name=$_SESSION['logged_in'];
		include "php/selectuser.php";
	}
include 'php/error.php';
	

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

                        <!-- Tasks: style can be found in dropdown.less -->
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
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                       
                        <div class="pull-left info">
                            <p>Hello,<?php echo " $name"; ?></p>

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
                                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="#">Dashboard</a></li>
                                <li class="active">User and Farm profile</li>
                            </ul>
                            <!--breadcrumbs end -->
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                            <!--breadcrumbs start -->
                           <h3> <?php echo $error; ?></h3>
                            <!--breadcrumbs end -->
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12">
                     
                                    <!--pagination start-->
                               <section class="panel">
                                    <header class="panel-heading">
                                        User profile                                  
									</header>
                                    
                             
                         
                              <form class="form-horizontal" action="php/updateuser.php" method="post" >
								  		<div class="form-group">
                                          <label class="col-sm-4 col-sm-4 control-label">Name</label>
                                          <div class="col-sm-4" style="size:auto">
                                              <input type="text" class="form-control"  placeholder="First Last" name="name" id="txtname" value="<?php echo $name; ?>">
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label class="col-sm-4 col-sm-4 control-label">Phone no</label>
                                          <div class="col-sm-4">
                                              <input type="text" class="form-control" maxlength="10" placeholder="Phone number" name="contact" id="txtcontact"  onkeypress="javascript:return isNumber(event)" value="<?php echo $phone; ?>">
                                      
                                          </div>
                                      </div>
                                      <div class="form-group" >
                                          <label for="inputEmail1" class="col-sm-4 col-sm-4 control-label">Email</label>
                                          <div class="col-lg-4">
                                              <input type="email" class="form-control" id="inputEmail1" placeholder="Email" name="email" value="<?php echo $email; ?>" readonly>
                                             
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="inputPassword1" class="col-sm-4 col-sm-4 control-label">Address</label>
                                          <div class="col-lg-4">
										<textarea name="add" class="form-control" placeholder="Address" id="txtadd"><?php echo $address; ?></textarea>
										</div>
                                      </div>
									  
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-5 col-lg-11">
                                              <button type="submit" class="btn btn-danger" onClick="return Validate()">Update</button>
											    <button type="Reset" class="btn btn-danger">Reset</button>
                                          </div>
										  
                                      </div>
                                  </form>	
							 </section>							
                                    <!--pagination end-->
                      </div>
					  </div>
					  <div class="row">
                        <div class="col-md-12">
                            <!--breadcrumbs start -->
                           <section class="panel">
                                    <header class="panel-heading">
                                        Farm profile                                  
									</header>
                                    
                             
                         
                              <form class="form-horizontal" action="php/updatefarm.php" method="post" >
								  		<div class="form-group">
                                          <label class="col-sm-4 col-sm-4 control-label">Address</label>
                                          <div class="col-sm-4" style="size:auto">
                                              <input type="text" class="form-control"  placeholder="Address" name="add" id="txtfadd" value="<?php echo $fadd; ?>">
                                          </div>
                                      </div>
									  
                                     <div class="form-group">
                                          <label class="col-sm-4 col-sm-4 control-label">Latitude</label>
                                          <div class="col-sm-4" style="size:auto">
                                              <input type="text" class="form-control"  placeholder="Latitude" name="lat" id="txtflat" value="<?php echo $lat; ?>">
                                          </div>
                                      </div>
									  <div class="form-group">
                                          <label class="col-sm-4 col-sm-4 control-label">Longitude</label>
                                          <div class="col-sm-4" style="size:auto">
                                              <input type="text" class="form-control"  placeholder="Longitude" name="lon" id="txtflon" value="<?php echo $lon; ?>">
                                          </div>
                                      </div>
                                     
                                      <div class="form-group">
                                          <div class="col-lg-offset-5 col-lg-11">
                                              <button type="submit" class="btn btn-danger" onClick="return Validate()">Update</button>
											    <button type="Reset" class="btn btn-danger">Reset</button>
                                          </div>
										  
                                      </div>
                                  </form>	
							 </section>
                            <!--breadcrumbs end -->
                        </div>
                    </div>
               
				</div> 
				</div>
			
				
				
				
            <div class="footer-main">
                e-farming &copy Efarming, 2016
            </div>
        </div><!-- ./wrapper -->
		<script type="text/javascript">
        function Validate() 
		{
			var firstname = document.getElementById("txtname").value;
			var address = document.getElementById("txtadd").value;
			var contact = document.getElementById("txtcontact").value;
			
			return true;
		}
		function isNumber(evt)
		{
			var iKeyCode = (evt.which) ? evt.which : evt.keyCode
			if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
				return false;
			return true;
    	}	    
	</script>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>
    </body>
</html>
