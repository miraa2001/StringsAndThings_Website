
<?php
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name


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

    <link rel="stylesheet" href="../css/AboutCSS/main.css">
    <link rel="stylesheet" href="../css/AboutCSS/util.css">
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
    <title>Contact</title>

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

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style>
        html{
            background-color: rgb(34,34,34);
        }
    </style>
</head>
<body>

<!--welcome-hero start -->
<header id="home" class="welcome-hero">

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
    <!-- For Contact page content-->

    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../Images/Contact/Contact0.PNG');">
        <h2 class="ltext-105 cl0 txt-center">
            Contact
        </h2>
    </section>


    <!-- Content page -->
    <section class="bg0 p-t-104 p-b-116" style="background-color: rgb(34,34,34);">
        <div class="container">
            <div class="flex-w flex-tr">
                <style>
                    span{
                        color:#FFA900;
                    }
                </style>
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="background-color: rgb(34,34,34);">

                       <img src="../Images/Contact/Contact1.svg"/>

                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md" style="background-color: rgb(34,34,34);">
                    <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2" style="color: #FFA900;">
								Address
							</span>

                            <p class="stext-115 cl6 size-213 p-t-18" style="color: #FFA900;">
                                Online Home Store Center 8th floor - Rafidia Tower , Rafidia St, Nablus, Palestine
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2" style="color: #FFA900;">
								Lets Talk
							</span>

                            <p class="stext-115 cl6 size-213 p-t-18" style="color: #FFA900;">
                                +972 592145276<br>
                                +970 594190168
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

                        <div class="size-212 p-t-2">
							<span class="mtext-110 cl2" style="color: #FFA900;">
								Sale Support
							</span>

                            <p class="stext-115 cl6 size-213 p-t-18" style="color: #FFA900;">
                                miirajamous@gmail.com
                                suhamansour@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</header><!--/.welcome-hero-->
<!--welcome-hero end -->
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
                        <a href="https://www.facebook.com/miiiiraj" target="_blank"class="footer__social"><i class="bx bxl-facebook-square"></i></a>
                        <a href="https://www.instagram.com/imwhoiis" class="footer__social" target="_blank"><i class="bx bxl-instagram-alt"></i></a>
                        <a href="https://twitter.com/" class="footer__social" target="_blank"><i class="bx bxl-twitter"></i></a>
                    </div><!--/.hm-footer-widget-->
                </div><!--/.col-->
            </div><!--/.row-->
        </div><!--/.hm-footer-details-->

    </div><!--/.container-->
</section><!--/container-footer-->
<!--container-footer end -->

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

</body>
</html>


