<!DOCTYPE html>
<html lang="zxx">

<head>
    <title> Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- Custom Theme files -->
    <link href="<?php echo base_url(); ?>assets/web/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/web/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="<?php echo base_url(); ?>assets/web/css/font-awesome.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <header id="home">
        <div class="container">
            <div class="header d-lg-flex justify-content-between align-items-center py-sm-3 py-2 px-sm-2 px-1">
                <!-- logo -->
                <div id="logo">
                    <h1><a href="index.html">MWT</a></h1>
                </div>
                <!-- //logo -->
                <!-- nav -->
                <div class="nav_w3ls ml-lg-5">
                    <nav>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="<?php echo base_url(); ?>index" class="active">Home</a></li>
							<li>
                                <!-- First Tier Drop Down -->
                                <label for="drop-2" class="toggle toogle-2">Product <span class="fa fa-angle-down"
                                        aria-hidden="true"></span>
                                </label>
                                <a href="#">Product <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-2" />
                                <ul>
                                    <li><a href="#" class="drop-text">Process Payroll</a></li>
                                    <li><a href="#" class="drop-text">Manage Talent</a></li>
                                    <li><a href="#" class="drop-text">Nurture Talent</a></li>
                                    <li><a href="#" class="drop-text">Acquire Talent</a></li>
                                    <li><a href="#" class="drop-text">Pricing</a></li>
                                </ul>
                            </li>
							<li>
                                <!-- First Tier Drop Down -->
                                <label for="drop-2" class="toggle toogle-2">About <span class="fa fa-angle-down"
                                        aria-hidden="true"></span>
                                </label>
                                <a href="#">About <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-2" />
                                <ul>
                                    <li><a href="#" class="drop-text">About Us</a></li>
                                    <li><a href="#" class="drop-text">Partner With Us</a></li>
                                    <li><a href="#" class="drop-text">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Customer Experience</a></li>
                            
                            <li><a href="#">Resources</a></li>
                            <li class="nav-right-sty mt-lg-0 mt-sm-4 mt-3" style="margin-left: 1em;">
                                <a href="<?php echo base_url(); ?>login" class="reqe-button text-uppercase">Login</a>
                                <a href="<?php echo base_url(); ?>index/register" class="reqe-button text-uppercase">Free Trial</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- //nav -->
            </div>
        </div>
    </header>
    <!-- //header -->
