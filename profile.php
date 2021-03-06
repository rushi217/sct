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

<!DOCTYPE html>
<html lang="en">

    <head>

        <script src="js/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <title>User Profile</title>
        <link rel="stylesheet" href="assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/account.css">
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="assets/css/fonticons.css">
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>

        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" >

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
                                        <ul class="nav navbar-nav navbar-left" style="padding-top:10px; font-size:30px; font-weight:700; font-family:Arial Rounded MT Bold">
											<li><font style="color:#0066FF">SMART<font style="color:#FFFFFF">CITY<font style="color:#669933">TRAVELLER</li>
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
                <div class="profile-userpic">
                    <center><img src="assets/images/traveling.jpg" /></center>
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle-name">
                    <?php echo $_SESSION['username']; ?>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu" style="padding-top:40px; height: 400px">
                    <ul class="nav">
                        <li>
                            <a href="account.php">
                                <i class="glyphicon glyphicon-home"></i>
                                Profile </a>
                        </li>
                        <li class="active">
                            <a href="profile.php">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>
                        <li>
                            <a href="account.php?logout='1'">
                                <i class="glyphicon glyphicon-ok"></i>
                                Sign out </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>



        <div class="col-md-6">
            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend style="font-size:32px; font-weight:400">User Profile</legend>

                    <!-- Text input-->

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Name(Fullname)">Name (Full name)</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-user">
                                    </i>
                                </div>
                                <input id="Name" name="Name (Full name)" type="text" placeholder="Name (Full name)" class="form-control input-md" style="width:250px">
                            </div>
                        </div>
                    </div>

                    <!-- File Button --> 
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Uploadphoto">Upload photo</label>
                        <div class="col-md-4">
                            <input id="Uploadphoto" name="Upload photo" class="input-file" type="file" style="width:150px">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="DateOfBirth">Date Of Birth</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-birthday-cake"></i>
                                </div>
                                <input id="DateOfBirth" name="Date Of Birth" type="date" placeholder="Date Of Birth" class="form-control input-md" style="width:250px">
                            </div>  
                        </div>
                    </div>


                    <!-- Multiple Radios (inline) -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Gender">Gender</label>
                        <div class="col-md-4"> 
                            <label class="radio-inline" for="Gender-0">
                                <input type="radio" name="Gender" id="Gender-0" value="1" checked="checked">
                                Male
                            </label> 
                            <label class="radio-inline" for="Gender-1">
                                <input type="radio" name="Gender" id="Gender-1" value="2">
                                Female
                            </label> 
                            <label class="radio-inline" for="Gender-2">
                                <input type="radio" name="Gender" id="Gender-2" value="3">
                                Other
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label col-xs-12" for="PermanentAddress">Address</label>  
                        <div class="col-md-2  col-xs-4">
                            <input id="PermanentAddress" name="Permanent Address" type="text" placeholder="District" class="form-control input-md " style="width:130px">
                        </div>
                        <div class="col-md-2 col-xs-4" style="padding-left:100px;">
                            <input id="PermanentAddress" name="Permanent Address" type="text" placeholder="Area" class="form-control input-md " style="width:130px;">
                        </div> 
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" for="PermanentAddress"></label>  
                        <div class="col-md-2  col-xs-4">
                            <input id="PermanentAddress" name="Permanent Address" type="text" placeholder="Street" class="form-control input-md " style="width:130px">
                        </div>  
                    </div>



                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="Phonenumber">Phone number </label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>

                                </div>
                                <input id="Phonenumber" name="Phone number " type="text" placeholder="Phone number " class="form-control input-md" style="width:250px">

                            </div>

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="EmailAddress">Email Address</label>  
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope-o"></i> 
                                </div>
                                <input id="EmailAddress" name="Email Address" type="email" placeholder="Email Address" class="form-control input-md" style="width:250px">
                            </div>
                        </div>
                    </div>

                    <!-- Multiple Checkboxes -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="LanguagesKnown">Languages Known</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="LanguagesKnown-0">
                                    <input type="checkbox" name="Languages Known" id="LanguagesKnown0" value="1">
                                    English
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="LanguagesKnown-1">
                                    <input type="checkbox" name="Languages Known" id="LanguagesKnown1" value="2">
                                    Marathi
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="LanguagesKnown-2">
                                    <input type="checkbox" name="Languages Known" id="LanguagesKnown2" value="3">
                                    English
                                </label>
                            </div>
                            <div class="checkbox">
                                <label for="LanguagesKnown-3">
                                    <input type="checkbox" name="Languages Known" id="LanguagesKnown3" value="4">
                                    Urdu
                                </label>
                            </div>

                            <div class="othertop">
                                <label for="LanguagesKnown-4">
                                </label>
                                <input type="text" name="LanguagesKnown" id="LanguagesKnown4"  placeholder="Other Language">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label" ></label>  
                        <div class="col-md-4">
                            <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Submit</a>
                            <a href="#" class="btn btn-danger" ><span class="glyphicon glyphicon-remove-sign"></span> Clear</a>

                        </div>
                    </div>

                </fieldset>
            </form>
        </div>
        <div class="col-md-2 hidden-xs" style="margin-top:100px">
            <img src="img/portfolio/avatar.jpg" class="img-responsive img-thumbnail ">
        </div>

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>

</html>
