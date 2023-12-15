<?php

session_start();

$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name

$user_email = $_SESSION['user_email_s'];


    if(isset($_POST['SaveProfile']))
    {

    $user_name_u = $_POST['SaveUserName'];
    $user_add_u = $_POST['SaveUserAddress'];
    $user_email_u = $_POST['SaveUserEmail'];
    $user_pw_u = $_POST['SaveUserPassword'];


    $query = "UPDATE `user` SET `user_name` = '$user_name_u', `user_add` = '$user_add_u', `user_email` = '$user_email_u',`user_pw` = '$user_pw_u'WHERE `user_email`='$user_email'";
    $query_run = mysqli_query($connection, $query);

    $query = "SELECT * FROM user WHERE user_email= '$user_email'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);
    }

     }
else{

    $query = "SELECT * FROM user WHERE user_email= '$user_email'";
    $query_run = mysqli_query($connection, $query);


    if (mysqli_num_rows($query_run) > 0) {
        $row = mysqli_fetch_assoc($query_run);
    }
}


if(isset($_POST['Search']))
{

    $dep_name=$_POST['Dep'];
    $department_name=trim($dep_name);
    $query = "SELECT * FROM department where dep_name ='$department_name'" ;
    $query_run = mysqli_query($connection, $query);
    $row=mysqli_fetch_array($query_run);

    if($row['dep_id']=='1'){
        header('location:Acoustic Guitars.php');

    }
    elseif($row['dep_id']=='2'){
        header('location:Electric Guitars.php');

    }
    elseif($row['dep_id']=='3'){
        header('location:Cellos.php');

    }
    elseif($row['dep_id']=='4'){
        header('location:Pianos.php');

    }
    elseif($row['dep_id']=='5'){
        header('location:Violins.php');

    }
    else{
        header('location:Accessories.php');
    }


}

?>





<!doctype html>
<html class="no-js" lang="en">

<head>
  <!-- meta data -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <script
          src="https://kit.fontawesome.com/64d58efce2.js"
          crossorigin="anonymous"
  ></script>

  <!--font-family-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!--title of site-->
  <title>My Account</title>

  <!--favicon png-->
  <link rel="shortcut icon" type="image/icon" href="../Images/logo/favicon.png"/>

  <!--font-awesome.min.css-->
  <link rel="stylesheet" href="../css/HomeCSS/font-awesome.min.css">

  <!--linear icon css-->
  <link rel="stylesheet" href="../css/HomeCSS/linearicons.css">


  <!--===ICONS===-->
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>


  <!--animate.css-->
  <link rel="stylesheet" href="../css/HomeCSS/animate.css">

  <!--owl.carousel.css-->
  <link rel="stylesheet" href="../css/HomeCSS/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/HomeCSS/owl.theme.default.min.css">

  <!--bootstrap.min.css-->
  <link rel="stylesheet" href="../css/HomeCSS/bootstrap.min.css">

  <!--bootsnav-->
  <link rel="stylesheet" href="../css/HomeCSS/bootsnav.css" >

  <!--style.css-->
  <link rel="stylesheet" href="../css/HomeCSS/style.css">

  <!--responsive.css-->
  <link rel="stylesheet" href="../css/HomeCSS/responsive.css">

  <link rel="stylesheet" href="../css/HomeCSS/Depstyle.css">


  <link rel="stylesheet" href="../css/AboutCSS/main.css">
  <link rel="stylesheet" href="../css/AboutCSS/util.css">
  <link rel="stylesheet" href="../css/HomeCSS/UserInfo.css">


  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body>

<!--welcome-hero start -->
<header id="home" class="welcome-hero" style="background-color: rgb(34,34,34);">

    <!-- top-area Start -->
    <div class="top-area" tyle="background-color: rgb(34,34,34);">
        <div class="header-area" style="background-color: rgb(34,34,34);">
            <!-- Start Navigation -->
            <nav style="background-color: rgb(34,34,34);" class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000" style="background-color: rgb(34,34,34);">

                <form method="post" style="background-color: rgb(34,34,34);">
                    <!-- Start Top Search -->
                    <div class="top-search" style="background-color: rgb(34,34,34);">
                        <div class="container">
                            <div class="input-group">
                                <span class="input-group-addon"><input type="submit"  value="Search" name="Search" style="background-color: transparent; "/> </span>
                                <input type="text" class="form-control" placeholder="By Department" name="Dep">
                                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <!-- End Top Search -->
                </form>

                <div class="container" style="background-color: rgb(34,34,34); height:90px;" >
                    <!-- Start Atribute Navigation -->
                    <div class="attr-nav" style="background-color: rgb(34,34,34);">
                        <ul>
                            <li class="search">
                                <a href="#"><span class="lnr lnr-magnifier"></span></a>
                            </li><!--/.search-->
                            <li class="nav-user">
                                <a href="UserInfo.php"><span class="lnr lnr-user"></span></a>
                            </li><!--/.search-->
                            <li class="dropdown">
                                <a href="ShoppingCart.php" class="dropdown-toggle" data-toggle="dropdown" >
                                    <span class="lnr lnr-cart"></span>

                                </a>

                            </li><!--/.dropdown-->
                        </ul>
                    </div><!--/.attr-nav-->
                    <!-- End Atribute Navigation -->

                    <!-- Start Header Navigation -->
                    <div class="navbar-header" style="background-color: rgb(34,34,34);">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu" style="background-color: rgb(34,34,34);>
                            <i class="fa fa-bars"></i>
                        </button>
                        <a  href="#" class="header-logo" style="background-color: rgb(34,34,34); height:10px;">
                            <img src="../Images/logo/logo.png" alt="Strings and Things' logo" width="200" height="30">
                        </a>

                    </div><!--/.navbar-header-->
                    <!-- End Header Navigation -->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu" style="background-color: rgb(34,34,34);">
                        <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp" style="background-color: rgb(34,34,34); color:rgb(254 203 102)">
                            <li><a href="Home.php" style="color:rgb(254 203 102)">Home</a></li>
                            <li><a href="#populer-products" style="color:rgb(254 203 102)">Shop</a></li>
                            <li><a href="About.php" style="color:rgb(254 203 102)">About</a></li>
                            <li><a href="Contact.php" style="color:rgb(254 203 102)">Contact</a></li>
                            <li><a href="SignIn&SignUp.php" style="color:rgb(254 203 102)">Log Out</a></li>
                        </ul><!--/.nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!--/.container-->
            </nav><!--/nav-->
            <!-- End Navigation -->
        </div><!--/.header-area-->
        <div class="clearfix" style="background-color: rgb(34,34,34);"></div>

    </div><!-- /.top-area-->
    <!-- top-area End -->

  <!-- For YourInformation  page content-->
    <form action="UserInfo.php" method="post">
  <section class="bg0 p-t-75 p-b-75" style="background-color: rgb(34,34,34);">
    <div class="container">
      <div class="row p-t-100 p-b-1">
            <div class="container bg-rounded bg-color mt-5">
              <div class="row">
                <div class="col-md-4 border-right p-t-40">
                  <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img src="../Images/Icons/user.png" width="90"><span style="color:RGB(254,203,102);"> Your Information: </span></div>
                </div>
                <div class="col-md-8">
                  <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">

                      <h6 class="text-left p-b-20 p-t-20" style="color:RGB(254,203,102);">Edit Profile:</h6>
                    </div>

                    <div class="row mt-2" >
                      <div class="col-md-6 m-b-10"><input type="text" class="form-control" placeholder="Username" value="<?php echo $row['user_name']; ?>" name="SaveUserName"></div>
                      <div class="col-md-6 m-b-10"><input type="text" class="form-control" placeholder="Address" value="<?php echo $row['user_add']; ?>" name="SaveUserAddress"></div>
                    </div>
                    <div class="row mt-3 ">
                      <div class="col-md-6 m-b-10"><input type="text" class="form-control" placeholder="Email" readonly value="<?php echo $row['user_email']; ?>" name="SaveUserEmail"></div>
                      <div class="col-md-6 m-b-10"><input type="password" class="form-control" placeholder="Password" value="<?php echo $row['user_pw']; ?>"  name="SaveUserPassword" ></div>
                    </div>
                    <style>
                        #saveProfile{
                            color:RGB(34,34,34);
                            background-color: #FFA900;
                        }
                        #saveProfile:hover
                        {
                            color:#FFA900;
                            background-color: rgb(255,255,255);
                        }
                    </style>
                    <input id="saveProfile" class="mt-5 text-left btn btn-primary profile-button" type="submit" name="SaveProfile" value="Save Profile"/>
                      </form>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </section>

</header><!--/.welcome-hero-->
<!--welcome-hero end -->
<!--container-footer -->
<!--container-footer -->
<section id="container-footer"  class="container-footer">
    <div class="container">
        <div class="hm-footer-details">
            <div class="row">

                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>COLLECTIONS</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="Acoustic Guitars.php">Acoustic Guitars</a></li><!--/li-->
                                <li><a href="Electric Guitars.php">Electric Guitars</a></li><!--/li-->
                                <li><a href="Violins.php">Violins</a></li><!--/li-->
                                <li><a href="Pianos.php">Pianos</a></li><!--/li-->
                                <li><a href="Cellos.php">Cellos</a></li><!--/li-->
                                <li><a href="Accessories.php">Accessories </a></li><!--/li-->

                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->

                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>MY ACCOUNT</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="#">My Account</a></li><!--/li-->
                                <li><a href="../html/ShoppingCart.php">My Cart</a></li><!--/li-->
                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->

                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>INFORMATION</h4>
                        </div><!--/.hm-foot-title-->
                        <div class="hm-foot-menu">
                            <ul>
                                <li><a href="../html/About.php">About us</a></li><!--/li-->
                                <li><a href="../html/Contact.php">Contact us</a></li><!--/li-->

                            </ul><!--/ul-->
                        </div><!--/.hm-foot-menu-->
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->

                <div class=" col-md-3 col-sm-6 col-xs-12">
                    <div class="hm-footer-widget">
                        <div class="hm-foot-title">
                            <h4>FOLLOW US</h4>
                        </div><!--/.hm-foot-title-->
                        <a href="https://www.facebook.com/tala.hamad.99" target="_blank"class="footer__social"><i class="bx bxl-facebook-square"></i></a>
                        <a href="https://www.instagram.com/" class="footer__social" target="_blank"><i class="bx bxl-instagram-alt"></i></a>
                        <a href="https://twitter.com/talahamad21" class="footer__social" target="_blank"><i class="bx bxl-twitter"></i></a>
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.hm-footer-details-->

    </div><!--/.container-->
</section><!--/container-footer-->
<!--container-footer end -->

<style>
    *{
        background-color: rgb(34,34,34);
    }
</style>

<!-- Include all js compiled plugins (below), or include individual files as needed -->

<script src="../js/HomeJS/jquery.js"></script>

<!--modernizr.min.js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

<!--bootstrap.min.js-->
<script src="../js/HomeJS/bootstrap.min.js"></script>

<!-- bootsnav js -->
<script src="../js/HomeJS/bootsnav.js"></script>

<!--owl.carousel.js-->
<script src="../js/HomeJS/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src= url="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"> </script>
<!--Custom JS-->
<script src="../js/HomeJS/custom.js"></script>

<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src=''></script>
<script type='text/Javascript'></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>


</body>
</html>
<?php


?>