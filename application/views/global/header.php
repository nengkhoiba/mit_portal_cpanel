<html>
<head>

	 <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/site.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/AdminLTE.min.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
 	<link href="<?php echo base_url();?>css/dataTables.bootstrap.min.css" rel="stylesheet">
 <link href="<?php echo base_url();?>css/buttons.dataTables.min.css" rel="stylesheet">
 <link href="<?php echo base_url();?>css/bootstrap-datepicker.standalone.min.css"  rel="stylesheet">
<link href="<?php echo base_url();?>css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/bootstrap-datepicker3.min.css" rel="stylesheet">


</head>
<body>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url();?>landing" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>IT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MIT</b>Portal</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
   <!--  
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
              
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>-->
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
           
              <span class="hidden-xs"><?php echo $this->session->userdata('User'); ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
             

                <p>
                  <?php echo $this->session->userdata('User');?>
                  <small><?php echo $this->session->userdata('Role');?></small>
                </p>
              </li>
              <!-- Menu Body -->
       
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left"> 
                  <a href="<?php echo base_url();?>change-password" class="btn btn-default btn-flat">Change Password</a>
                </div>
                
                <div class="pull-right">
                  <a href="<?php echo base_url();?>login_controller/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
       
        </ul>
      </div>
    </nav>
  </header>
