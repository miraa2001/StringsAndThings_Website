<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name
$query = "SELECT * FROM product ";


if(isset($_POST['QuickView']))
{
    $product_id= $_POST['id'];
    $_SESSION['product_id_s']=$product_id;
    header('location:Product-detail.php');
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
    <title>Strings and Things</title>

    <!--favicon png-->
    <link rel="shortcut icon" type="image/icon" href="../Images/logo/favicon1.PNG"/>

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

</head>
<body style="background-color: rgb(34,34,34);color:rgb(254 203 102);">

<!--welcome-hero start -->
<header id="home" class="welcome-hero" style="background-color: rgb(34,34,34);">
    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel" style="background-color: rgb(34,34,34);">
        <!--/.carousel-indicator -->
        <ol class="carousel-indicators" style="background-color: rgb(34,34,34);">
            <li data-target="#header-carousel" data-slide-to="0" class="active" ><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
        </ol><!-- /ol-->
        <!--/.carousel-indicator -->

        <!--/.carousel-inner -->
        <div class="carousel-inner" role="listbox">
            <!-- .item -->
            <div class="item active">
                <div class="single-slide-item slide1">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt" >
                                            <h4>Yamaha C40II Full-scale Classical - Natural
                                            </h4>
                                            <h2 style="font-size: 22px;">Nylon-string Acoustic Guitar with Spruce Top, Meranti Back and Sides, Nato Neck, and Rosewood Fingerboard and Bridge - Natural
                                            </h2>
                                            <p>
                                                Introducing the mesmerizing Yamaha C40II, a captivating full-sized nylon-string guitar that transcends the boundaries of affordability. Prepare to embark on a journey into a world of enchanting melodies, whether you are transcending from a 3/4-size model or embarking on a symphony of strings for the first time..
                                            </p>
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="../Images/Home/Slider/sld1.png" alt="slider image">
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->
            </div><!-- /.item .active-->

            <div class="item">
                <div class="single-slide-item slide2">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h4>4-string Acoustic-electric Violin</h4>
                                            <h2 style="font-size:22px;">Realist RV-4e 4-string Acoustic-electric Violin with Case</h2>
                                            <p>
                                                Experience the uncompromising excellence of the Realist RV-4e acoustic-electric violin. Crafted from carved Carpathian spruce, its clear, open tone and subdued projection ensure amplified performances free from unwanted feedback. Immerse yourself in its captivating plugged-in sound, balanced across all strings, and let its rich, attention-grabbing timbre mesmerize your audience. </p>
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="../Images/Home/Slider/sld2.png" alt="slider image">
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->
            </div><!-- /.item .active-->

            <div class="item">
                <div class="single-slide-item slide3">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h4>Yamaha FG830 Dreadnought Acoustic Guitar</h4>
                                            <h2 style="font-size: 22px;">Yamaha FG830 Dreadnought Acoustic Guitar - Tobacco Brown Sunburst
                                            </h2>
                                            <p>
                                                Introducing the FG830, the latest gem in Yamaha's esteemed FG series of acoustic guitars. This remarkable instrument combines the beloved elements of its predecessor, the FG730, with impressive enhancements. Boasting a comfortable dreadnought body style and a solid spruce top, the FG830 produces a rich and captivating sound</p>
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="../Images/Home/Slider/sld3.png" alt="slider image">
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->
            </div><!-- /.item .active-->
        </div><!-- /.carousel-inner-->
    </div><!--/#header-carousel-->


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
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu" style="background-color: rgb(254 203 102);>
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

</header><!--/.welcome-hero-->
<!--welcome-hero end -->

<!--Shop by Department start -->
<section id="populer-products" class="populer-products">
    <div class="container">

        <div class="containerDep">

            <h3 class="title" style="color:rgb(254 203 102)"> Shop by Department </h3>
            <div class="products-container">
                <?php
                $query = "SELECT * FROM department";
                $query_run = mysqli_query($connection, $query);
                while($row=mysqli_fetch_array($query_run))
                {
                    ?>

                    <a href="../html/<?php echo trim($row['dep_name']);?>.php">
                    <div class="product" data-name="p-1">
                    <img src="<?php  echo $row['dep_img']; ?> " />
                        <h3>   <?php  echo $row['dep_name']; ?> </h3>
                    </div>
                    </a>
                <?php
                }
                ?>
            </div>
       </div><!--containerDep-->
    </div><!--/.container-->
</section><!--/.populer-products-->
<!--Shop by Department-->

<!--new-arrivals start -->
<section id="new-arrivals" class="new-arrivals">
    <div class="container" >
        <div class="section-header">
            <h2 style="color:RGB(254 203 102);">New Arrivals</h2>
        </div><!--/.section-header-->
        <div class="new-arrivals-content">
            <div class="row">
                <?php
                $query = "SELECT * FROM product WHERE product_arrival='1'";
                $query_run = mysqli_query($connection, $query);
                while($row=mysqli_fetch_array($query_run))
                {
                ?>
                <form method="post">

                <div class="col-md-3 col-sm-4">
                    <div class="single-new-arrival hov-img0">
                        <div class="single-new-arrival-bg ">

                            <img src="<?php  echo $row['product_img']; ?> " />
                            <div class="single-new-arrival-bg-overlay"></div>

                            <div> <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>"> </div>

                            <div class="sale bg-1">
                                <p>Sale</p>
                            </div>

                                    <input type="submit"  value="Quick View" name="QuickView" class="block2-btn flex-c-m text-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">

                </form>


                        </div>
                        <h4><a><?php  echo $row['product_name'] ?> </a></h4>
                        <br>
                        <p class="arrival-product-price"> <?php  echo $row['product_price'] ?>$</p>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div><!--/.container-->
</section><!--/.new-arrivals-->
<!--new-arrivals end -->

<!--feature start -->
<section id="feature" class="feature">
    <div class="container">
        <div class="section-header">
            <h2 style="color:RGB(254 203 102);">Featured Products</h2>
        </div><!--/.section-header-->
        <div class="new-container bd-grid">
            <?php
            $query = "SELECT * FROM product WHERE product_featured='1'";
            $query_run = mysqli_query($connection, $query);
            while($row=mysqli_fetch_array($query_run))
            {
            ?>

            <form method="post">

            <div class="new__box" style="height:300px; width:auto">

                <div> <input type="hidden" name="id" value="<?php echo $row['product_id']; ?>"> </div>
                <img src="<?php  echo $row['product_img']; ?> " class="new__img" width="325px" height="250px" />

                <div class="new__link">
                    <input type="submit"  value="Quick View" name="QuickView" class="febutton" id="myBtntala">
                </div>
            </div>


            </form>

                <?php
            }
            ?>
        </div>
    </div>
</section><!--/.feature-->
<!--feature end -->


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

<!-- Main JS -->
<script src="../js/HomeJS/main.js"></script>
<style>
    div,nav,ul,ol,h1,h2,h3,h4,h5,h6,p,img,a,span,,li{
        background-color: rgb(34,34,34);
        color:rgb(254 203 102);
                                                  }
</style>

</body>
</html>


