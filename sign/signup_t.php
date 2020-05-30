
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Director | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By M Abdur Rokib Promy">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Director
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
             
               
            </nav>
        </header>
       
            <!-- Left side column. contains the logo and sidebar --><!-- Right side column. Contains the navbar and content of the page -->
            
                <!-- Content Header (Page header) -->


                <!-- Main content -->
                 
                      
                      <div class="alert alert-block alert-danger">
                          <section class="panel" >
                              <header class="panel-heading">
                                  Sign up  Here
                              </header>
                              <div class="panel-body">
                                  <form class="form-horizontal" role="form" method="POST" action="signup_submit.php">
								  		<div class="form-group">
                                          <label class="col-sm-4 col-sm-4 control-label">Name</label>
                                          <div class="col-sm-4" style="size:auto">
                                              <input type="text" class="form-control"  placeholder="First Last" name="name" id="txtname">
                                          </div>
                                      </div>
									   <div class="form-group">
                                          <label class="col-sm-4 col-sm-4 control-label">Phone no</label>
                                          <div class="col-sm-4">
                                              <input type="text" class="form-control" value="+91" maxlength="13" name="contact" id="txtcontact">
                                      
                                          </div>
                                      </div>
                                      <div class="form-group" >
                                          <label for="inputEmail1" class="col-sm-4 col-sm-4 control-label">Email</label>
                                          <div class="col-lg-4">
                                              <input type="email" class="form-control" id="inputEmail1" placeholder="Email" name="email">
                                          </div>
									</div>
									<div class="form-group"> 
									<label for="inputEmail1" class="col-sm-4 col-sm-4 control-label">Address</label>
										<div class="col-lg-4">
										<textarea name="add" class="form-control" placeholder="Address" id="txtadd"></textarea>
										</div>
										</div>
                                      <div class="form-group ">
                                          <label for="inputPassword1" class="col-sm-4 col-sm-4 control-label">Password</label>
                                          <div class="col-lg-4">
                                              <input type="password" class="form-control" placeholder="Password" name="password" id="txtPassword">
                                          </div>
                                      </div>
									   <div class="form-group ">
                                          <label for="inputPassword1" class="col-sm-4 col-sm-4 control-label">Confirm Password</label>
                                          <div class="col-lg-4">
                                              <input type="password" class="form-control" placeholder="Reenter Password" name="repass" id="txtConfirmPassword">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-10">
                                              <div class="checkbox">
                                                  <label>
                                                      <input type="checkbox" id="txtcheck"> Terms and condition agreements goes here..	
                                                  </label>
												  <lable>	
													  <br>For an existing user,<a href="signin.php">sign in here</a>
                                                  </label>
                                              </div>
                                          </div>
          	                            </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-5 col-lg-11">
                                              <button type="submit" class="btn btn-danger" onclick="return Validate()">Sign up</button>
											    <button type="Reset" class="btn btn-danger">Reset</button>
                                          </div>
										  
                                      </div>
                                  </form>
                              </div>
							  </section>
							</div>  
						
                          
            <div class="footer-main">
                Copyright &copy Director, 2014
            </div>
   <!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>
		
		<!-- Password validation -->
		<script src="lib/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript">
        function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
		var firstname = document.getElementById("txtname").value;
		var address = document.getElementById("txtadd").value;
		var contact = document.getElementById("txtcontact").value;
		var check = document.getElementById("txtcheck").value;

        if (password != confirmPassword) {
            alert("Passwords does not match.");
            return false;
        }
        return true;
		}
	</script>
    </body>
</html>
