<link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
 
    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.php"><span class="navbar-brand"><span class="glyphicon glyphicon-tree-deciduous"></span> E-farm</span></a>
		 <span class="glyphicon glyphicon-tree-deciduous"> Technology,Where Sucess Is At Home</span></a></div>
		<div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span><?php
				echo $_SESSION['user_name'];?> 
				<i class="fa fa-caret-down"></i>
                </a>
				<ul class="dropdown-menu">
                <li><a href="users.php">My Account</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Admin Panel</li>
                <li><a href="users.php">Users</a></li>
                <li class="divider"></li>
                <li><a tabindex="-1" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    

    <div class="sidebar-nav">
    <ul>
    <li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> Dashboard<i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">
            <li><a href="index.php"><span class="fa fa-caret-right"></span> Main</a></li>
            <li ><a href="users.php"><span class="fa fa-caret-right"></span> User List</a></li>
             <li ><a href="client.php"><span class="fa fa-caret-right"></span> Client List</a></li>
			  <li ><a href="farm.php"><span class="fa fa-caret-right"></span> Farm List</a></li>
		 <li ><a href="valve.php"><span class="fa fa-caret-right"></span> Valve List</a></li>
		 <li ><a href="message.php"><span class="fa fa-caret-right"></span> Message List</a></li>
		
		<!--<li ><a href="user.php"><span class="fa fa-caret-right"></span> User Profile</a></li>-->
            </ul></li>
	<!--<li><a href="#" data-target=".dashboard-menu" class="nav-header" data-toggle="collapse"><i class="fa fa-fw fa-dashboard"></i> Pages<i class="fa fa-collapse"></i></a></li>
    <li><ul class="dashboard-menu nav nav-list collapse in">
            <li><a href="aboutus.php"><span class="fa fa-caret-right"></span> About</a></li>
            <li ><a href="services.php"><span class="fa fa-caret-right"></span> Services</a></li>
			<li ><a href="portfolio.php"><span class="fa fa-caret-right"></span> Portfolio</a></li>
			<li ><a href="contactus.php"><span class="fa fa-caret-right"></span> Contact</a></li>
            </ul></li>
   -->
        <li><a href="#" data-target=".accounts-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-briefcase"></i> Account <span class="label label-info">+1</span></a></li>
        <li><ul class="accounts-menu nav nav-list collapse">
            <li ><a href="reset-password.php"><span class="fa fa-caret-right"></span> Reset Password</a></li>
    </ul></li>
	<li><a href="#" data-target=".legal-menu" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-legal"></i> Legal<i class="fa fa-collapse"></i></a></li>
        <li><ul class="legal-menu nav nav-list collapse">
           <!-- <li ><a href="privacy-policy.php"><span class="fa fa-caret-right"></span> Privacy Policy</a></li>-->
            <li ><a href="terms.php"><span class="fa fa-caret-right"></span> Terms and Conditions</a></li>
    </ul></li>
	
           </ul>
    </div>