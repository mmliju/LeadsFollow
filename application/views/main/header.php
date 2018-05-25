<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administration Panel</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>css/plugins/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/plugins/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="<?php echo base_url(); ?>css/plugins/bootstrap-datetimepicker.min.css">
     
  </head>

    <!-- Custom Fonts -->
  <!--  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administration Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
 
     
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url(); ?>index.php/login/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if($page == "dashboard"){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url(); ?>index.php/home"> Dashboard</a>
                    </li>
                    <li <?php if($page == "employees"){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url(); ?>index.php/employees"> Employees</a>
                    </li>
                    <li  <?php if($page == "policies"){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url(); ?>index.php/policies">Policies</a>
                    </li>
                    <li  <?php if($page == "prospectives"){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url(); ?>index.php/prospectives">Prospectives</a>
                    </li>
                     <li  <?php if($page == "clients"){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url(); ?>index.php/clients">Clients</a>
                    </li>
                        <li  <?php if($page == "reports"){ echo 'class="active"'; } ?>>
                        <a href="<?php echo base_url(); ?>index.php/reports">Reports</a>
                    </li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

  


