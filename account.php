<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login1.php');
  }
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login1.php");
  }
  
?>

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Smart City Traveller</title>
        <link rel="stylesheet" href="assets/fonts/stylesheet.css"/>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/account.css"/>
        <link rel="stylesheet" href="assets/css/fonticons.css"/>
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">
        <header id="main_menu" class="header navbar-fixed-top">
            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <div class="nave_menu">
                            <nav class="navbar navbar-default" id="navmenu">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav navbar-left">
                                            <li><a href="" style="padding-top:30px"><b>SMART CITY TRAVELER</b></a></li></ul>
                                        <ul class="nav navbar-nav navbar-right" style="padding-top:20px;">
                                            <form class="form-wrapper">
                                                <input type="text" id="search" placeholder="Search for..."/>
                                                <input type="submit" value="Search" id="submit"/>
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header> <!--End of header -->

        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic" style="padding-top:20px">
                    <center><img src="assets/images/traveling.jpg" /></center>
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle-name">
                    <?php echo $_SESSION['username']; ?>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu" style="padding-top:40px; height: 500px">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Profile </a>
                        </li>
                        <li>
                            <a href="profile.php">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>
                        <li>
                            <a href="account.php?logout='1'" >
                                <i class="glyphicon glyphicon-ok"></i>
                                Sign out </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
                <div class="row">
                    <div class="col-lg-6"><font style="font-weight:700; font-size:20px">
                            Your Location :&nbsp; &nbsp;</font>
                        <label id="lblSelect">
                            <select id="selectPointOfInterest" class="form-control">
                                <option selected><font color="#EBEBEB">Select</font></option>
                                <option>India </option>
                                <option>Australia</option>
                                <option>New Zealand</option>
                            </select>
                        </label></div>
                    <div class="col-md-6"><font style="font-weight:700; font-size:20px">
                            City :&nbsp; &nbsp;</font>
                        <label id="lblSelect">
                            <select id="selectPointOfInterest" class="form-control">
                                <option selected><font color="#EBEBEB">Select</font></option>
                                <option>Delhi </option>
                                <option>Mumbai</option>
                                <option>Chennai</option>
                                <option>Agra</option>
                            </select>
                        </label></div></div>
                <section id="portfolios" class="section">
                    <!-- Container Starts -->
                    <h2>Recommended For You</h2>
                    <div id="portfolio" class="row wow fadeInUp" data-wow-delay="0.4s" style="margin-right:50px">
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix marketing planning">
                            <div class="portfolio-item">
                                <div class="shot-item">
                                    <a class="overlay1 lightbox" href="img/portfolio/cafe.jpeg">
                                        <img src="img/portfolio/cafe.jpeg" alt="" style="height:230px;"/>
                                        <i class="lnr lnr-plus-circle item-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix planning">
                            <div class="portfolio-item">
                                <div class="shot-item">
                                    <a class="overlay1 lightbox" href="img/portfolio/Hospital.jpg">
                                        <img src="img/portfolio/Hospital.jpg" alt="" style="height:230px;"/>
                                        <i class="lnr lnr-plus-circle item-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix research">
                            <div class="portfolio-item">
                                <div class="shot-item">
                                    <a class="overlay1 lightbox" href="img/portfolio/img2.jpg">
                                        <img src="img/portfolio/img2.jpg" alt="" style="height:230px;"/>
                                        <i class="lnr lnr-plus-circle item-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="portfolio" class="row wow fadeInUp" data-wow-delay="0.8s" style="margin-right:50px; padding-top:40px">
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix marketing research">
                            <div class="portfolio-item">
                                <div class="shot-item">
                                    <a class="overlay1 lightbox" href="img/portfolio/temple.jpg">
                                        <img src="img/portfolio/temple.jpg" alt="" style="height:230px;"/>
                                        <i class="lnr lnr-plus-circle item-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix marketing planning">
                            <div class="portfolio-item">
                                <div class="shot-item">
                                    <a class="overlay1 lightbox" href="img/portfolio/tourist.jpg" >
                                        <img src="img/portfolio/tourist.jpg" alt="" style="height:230px;"/>
                                        <i class="lnr lnr-plus-circle item-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 mix planning research">
                            <div class="portfolio-item">
                                <div class="shot-item">
                                    <a class="overlay1 lightbox" href="img/portfolio/traffic.jpg">
                                        <img src="img/portfolio/traffic.jpg" alt="" style="height:230px;"/>
                                        <i class="lnr lnr-plus-circle item-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Container Ends -->

            </div>
        </div>


    </body>


    <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="js/wow.js"></script> 
    <script src="assets/js/jquery.easypiechart.min.js"></script>
    <script src="assets/js/jquery.mixitup.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="js/jquery-min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>



    <script src="js/bootstrap.min.js"></script>    
    <script src="js/menu.js"></script>   
    <script src="js/waypoints.min.js"></script>   
    <script src="js/main.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</html>
