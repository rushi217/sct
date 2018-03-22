
<?php

session_start();

if(isset($_POST["reg_user"]))
    {
        $db=mysqli_connect("localhost","root","");
        mysqli_select_db($db,"Ecommerce");

        $username=$_POST["username"];
        $password1=$_POST["password1"];
        $password2=$_POST["password2"];
        $email=$_POST["email"];
        $errors = array();
        
        if (empty($username)) { 
            array_push($errors, "Username is required"); 
            echo "Username is required";
        }
        if (empty($email)) { 
            array_push($errors, "Email is required"); 
            echo "Email is required";
        }
        if (empty($password1)) { 
            array_push($errors, "Password is required");
            echo "Password is required";
        }
        if ($password1 != $password2) {
              array_push($errors, "The passwords do not match");
              echo "The passwords do not match";
        }
        
        $user_check_query = "select * from user_table where username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
          if ($user['username'] === $username) {
            array_push($errors, "Username already exists"); ?>
			<script type="text/javascript">
			alert("Username already exists");
			window.location.replace("login1.php");</script><?php exit;
            
          }

          if ($user['email'] === $email) {
            array_push($errors, "email already exists");
            echo "Email already exists";
          }
        }
        
        if(count($errors) == 0){
            $password= md5($password1);
            mysqli_query($db,"insert into user_table (username, password, email) values ('$username', '$password', '$email')");
            
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: account.php');
            
            mysqli_close($db);
            //$msg="Profile Updated Successfully.";
        }
    }
    
else if(isset($_POST["login"]))
    {
        $db=mysqli_connect("localhost","root","");
        mysqli_select_db($db,"Ecommerce");
        
        $username=$_POST["username"];  
        $password=$_POST["password"];
        $errors = array();
        
        if (empty($username)) {
            array_push($errors, "Username is required");
            echo "Username is required";
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
            echo "Password is required";
        }

        $password= md5($password);
        
        if(count($errors) == 0){
            $query = "select * from user_table where username='$username' and password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                echo "You are now logged in";
                
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "You are now logged in";
                header('location: account.php');
          
            }
            else {
  		echo "Wrong username/password combination";
            }
        }
        mysqli_close($db);
    }
    
 
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login & Sign Up</title>
  <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
        <link rel="stylesheet" href="assets/fonts/stylesheet.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/fonticons.css">
		<link rel="stylesheet" href="assets/css/responsive.css" />
		<link rel="stylesheet" href="assets/css/plugins.css" />		
		<script src="../SCT/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
      <link rel="stylesheet" href="css/login.css"> 

</head>

<body data-spy="scroll" data-target=".navbar-collapse" class="color1">
        <header id="main_menu" class="header navbar-fixed-top">
            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <div class="nave_menu">
                            <nav class="navbar navbar-default" id="navmenu">
                                <div class="container-fluid">
                                    
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
										<ul class="nav navbar-nav navbar-left" style="padding-top:10px; font-size:36px; font-weight:700; font-family:Arial Rounded MT Bold">
											<li><font style="color:#0066FF">SMART<font style="color:#FFFFFF">CITY<font style="color:#669933">TRAVELLER</li>
										</ul>
                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="index.html"><b>HOME</b></a></li>
						<li><a href="learn.html"><b>About Us</b></a></li>
                                            <li><a href="index.html#contact"><b>Contact Us</b></a></li>
                                        </ul>
                                    </div>
                                  </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header> <!--End of header -->

  <section id="home" class="home">
            <div class="overlay">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="text-center">
                                    <div class="main_home">
									<center>
                                        <ul class="panel__menu" id="menu" style="list-style:none;">
						<li id="signIn"> <a href="#" style="font-size:18px; text-decoration:none;"><font color="#FFFFFF">Login</font></a></li>
						<li id="signUp"><a href="#" style="font-size:18px; text-decoration:none;" ><font color="#FFFFFF">Sign up</font></a></li><hr/>
					</ul>
                                        <div style="padding-top:150px">&nbsp;</div>
                                    <div class="panel__wrap">
    					<div class="panel__box active" id="signInBox">
                                            <form class="login-form" action="login1.php" method="post" style="height:300px">
                                                <label style="padding-top:50px">Username
                                                    <input type="text" required="required" name="username" id="username">
                                                </label>
                                                <label>Password 
                                                    <input type="password" name="password" id="password"/>
                                                 </label>
                                                     <input type="submit" value="LOGIN" name="login" id="login"/>
                                            </form>
    					</div>
   					 <div class="panel__box" id="signUpBox">
                                             <form class="signup-form" action="login1.php" method="post">
                                                 <label>Username
                                                     <input type="text" name="username" id="username"/>
                                                 </label>
                                                <label>Email
                                                    <input type="email" name="email" id="email"/>
                                                </label>
                                                <label>Password
                                                    <input type="password" name="password1" id="password1"/>
                                                </label>
                                                <label>Confirm password
                                                    <input type="password" name="password2" id="password2"/>
                                                </label>
                                                    <input type="submit" value="SIGN UP" name="reg_user" id="reg_user">
                                             </form>
                                        </div>
                                    </div></center>
<                               </div>
                            </div>
		        </div>
                </div>
            </div>
    </section>
		
		
  
  

    <script  src="js/login.js"></script>




</body>

</html>
