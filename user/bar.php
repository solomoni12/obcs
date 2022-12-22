<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="../assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo">
                        <a href="#">
                            <img src="upload/logo/onli.jpg" style="width: 80%; border-radius: 20px;"/>
                        </a>
                    </div>
                    <li class="treeview">
                    <a href="dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li class="label">Birth reg form</li>
                    <li>
                        <a class="sidebar-sub-toggle"><i class="fa fa-building-o"></i>Birth reg form<span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a  href="fill-birthregform.php"><i class="fa fa-sitemap"></i><span>Add detail</span></a>
                            </li>
                            <li><a  href="view-birthregform.php"><i class="fa fa-book"></i><span>Manage detail</span></a></li>
                        </ul>
                    </li>
                <li><a href="certificates-list.php"><i class="fa fa-users"></i><span>Certificates</span></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="content-wrap">

    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            <h1></h1>
                        </div>
                    </div>
                </div>
                <!-- /# column -->
                <div class="col-lg-4 p-l-0 title-margin-left">
                   <div class="page-header">
                        <div class="page-title">
                            <ol class="breadcrumb">
                                <li class="dropdown user user-menu">
 <?php 
$uid=$_SESSION['obcsaid'];
$sql="SELECT FirstName,LastName,MobileNumber,pictureData from  tbluser where ID='$uid'";
$query = mysqli_query($dbh,$sql);
$rowCount = mysqli_num_rows($query);

$cnt=1;
if($rowCount > 0){
    while($row = mysqli_fetch_array($query)){
                                     ?>

                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <img style="width: 50px; height: 50px;" src="image/<?php  echo $row['pictureData'];?>" class="img-circle"/>
                                        <span class="hidden-xs"><?php  echo $row['FirstName'];?>  <?php  echo $row['LastName'];?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li class="user-header">
                                            <img style="width: 150px; height: 150px;" src="image/<?php  echo $row['pictureData'];?>" class="img-circle"/>
                                            <!-- <p><small>System Administrator</small> -->
                                            </p>
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="">
                                                <a style="width: 100%;margin-bottom: 10px;" href="profile.php" class="btn btn-default btn-flat"><i class="fa fa-user"></i>Profile</a>
                                                <a style="width: 100%;margin-bottom: 10px;" href="change-password.php" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change password</a>
                                            </div>
                                            <div class="">
                                                <a style="width: 100%;margin-bottom: 10px;" href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Log out
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                    <?php $cnt=$cnt+1;}} ?>

                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /# column -->
        </div>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>
    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="assets/js/dashboard2.js"></script>
</body>

</html><?php } ?>