<?php
session_start();
$error='';


if(isset($_SESSION['logged_in']))
{
	header("Location: index.php");
	exit;	
}
include 'php/getcookies.php';
include 'php/error.php';

?>

<!DOCTYPE html>
<html>
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
             
            </nav>
        </header>
     
                    
                      
                      <div class="alert alert-block alert-danger">
                          <section class="panel" >
                              <header class="panel-heading">
                                  login in Here
                              </header>
							 
                              <div class="panel-body">
							  	<div>
									<center> <?php echo $error; ?></center>
								</div>
                                  <form class="form-horizontal" role="form" method="POST" action="php/login_submit.php">
								  		
                                      <div class="form-group">
                                          <label for="inputEmail1" class="col-lg-4 col-sm-2 control-label">Email</label>
                                          <div class="col-sm-4" style="size:auto">
                                              <input type="email" class="form-control" id="inputEmail1" placeholder="Email" name="email" value="<?php echo $cname; ?>">
                                             
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="inputPassword1" class="col-lg-4 col-sm-2 control-label">Password</label>
                                          <div class="col-sm-4" style="size:auto">
                                              <input type="password" class="form-control" id="inputPassword1" placeholder="Password" name="password" value="<?php echo $cpass; ?>">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-4 col-lg-10">
                                              <div class="checkbox">
                                                  <label>
                                                      <input type="checkbox" name="remember" checked="checked"> Remember me 
												</label>
												<lable>	
													  <br>Not an existing user,<a href="signup.php">sign up here</a>
                                                  </label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-5 col-lg-10">
                                              <button type="submit" class="btn btn-danger">Sign in</button>
											    <button type="Reset" class="btn btn-danger">Reset</button>
                                          </div>
										  
                                      </div>
                                  </form>
                              </div>
                          </section>
						                       </div>
                    </div><!--row1-->
                   
              
            
            <div class="footer-main">
                e-farming &copy Efarming, 2016
            </div>
   
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Director App -->
        <script src="js/Director/app.js" type="text/javascript"></script>
    </body>
</html>
