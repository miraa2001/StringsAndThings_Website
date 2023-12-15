<?php

session_start();

$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name
$order_id_c= $_SESSION['order_id_s'];

if (isset($_POST['UpdateCart'])) {

    $product_id_cart = $_POST['product_id_cart'];
    $product_price_cart = $_POST['product_price_cart'];
    $num_product1 = $_POST['num_product1'];
    $qprice = $product_price_cart * $num_product1;

    $query0 = "UPDATE `orderitems` SET orderitem_quantity='$num_product1', orderitemq_price='$qprice'  WHERE order_id='$order_id_c'
                                                                                and product_id='$product_id_cart' ";
    $query_run0 = mysqli_query($connection, $query0);

}

if(isset($_POST['GoToPayment'])){

    $orderaddress=$_POST['SaveOrderAddress'];
    $finalprice=$_POST['finalprice'];
    $finalprice=$_POST['finalprice'];

    $_SESSION['finalprice_s'] =  $finalprice;


    $query11 = "UPDATE `order` SET order_add='$orderaddress', order_finaltotal=' $finalprice'  WHERE order_id='$order_id_c'";
    $query_run11 = mysqli_query($connection, $query11);
    header('location:Payment.php');

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

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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
    <title>ShoppingCart</title>


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
    <link rel="stylesheet" href="../css/HomeCSS/styleCart.css">


    <!--responsive.css-->
    <link rel="stylesheet" href="../css/HomeCSS/responsive.css">



    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/AboutCSS/util.css">
    <link rel="stylesheet" type="text/css" href="../css/AboutCSS/main.css">
    <!--===============================================================================================-->
    <style>
        div,nav,ul,ol,h1,h2,h3,h4,h5,h6,p,img,a,span,,li,header,section,footer{
                                                          background-color: rgb(34,34,34);
                                                      }
    </style>
    <link rel="stylesheet" href="../css/HomeCSS/style.css">

</head>
<body>

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



    <!-- breadcrumb -->
    <section class="sec-product-detail bg0" style="background-color: rgb(34,34,34);">
        <div class="container">
            <div class=" p-l-10 p-r-15 p-t-120 ">
                <style>
                    #cl8{
                        color:#FFA900;
                    }
                </style>
                <a href="../html/Home.php" id="cl8" class="cl8 hov-cl1 " style="color:#FFA900">
                    Home
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <a href="../html/ShoppingCart.php" id="cl8" class="cl8 hov-cl1 ">
                    ShoppingCart
                    <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                </a>

                <span class="stext-109 cl4" id="cl8">
				MyCart
			 </span>
            </div>
        </div>
    </section>

    <form method="post" action="ShoppingCart.php" style="background-color: rgb(34,34,34);">
        <form class="bg0 p-t-75 p-b-85">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                    </tr>

                                    <tbody>
                                    <?php
                                    $query0 = "SELECT * FROM `orderitems` WHERE order_id='$order_id_c'";
                                    $query_run0 = mysqli_query($connection, $query0);

                                    while($row0=mysqli_fetch_array($query_run0)){
                                    $query2 = "SELECT * FROM product WHERE product_id= '$row0[product_id]'";
                                    $query_run2 = mysqli_query($connection, $query2);
                                    $row2=mysqli_fetch_array($query_run2);

                                    ?>
                                    <tr class="table_row">
                                        <td class="column-1">
                                            <div class="how-itemcart1">
                                                <img src="<?php echo $row2['product_img'] ?>" alt="IMG">
                                            </div>
                                        </td>
                                        <td class="column-2"><?php echo $row2['product_name'] ?> </td>
                                        <td class="column-3"><?php echo $row2['product_price'] ?> </td>
                                        <td class="column-4">


                                            <div> <input type="hidden" name="product_id_cart" value="<?php echo $row0['product_id']; ?>"> </div>
                                            <div> <input type="hidden" name="product_price_cart" value="<?php echo $row2['product_price']; ?>"> </div>

                                            <input class="txt-center num-product" type="number" name="num_product1" value="<?php echo $row0['orderitem_quantity'] ?>">
                            </div>
                            </td>
                            <td class="column-5"> <?php echo $row0['orderitemq_price'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </table>
                        </div>
                        <div>
                            <style>
                                #UpdateCart{
                                    background-color: #FFA900;
                                    color:#000000;
                                }
                            </style>
                            <input type="submit" value="Update Cart" id="UpdateCart" name="UpdateCart" style=" width: 100%; height: 50px"   class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10" />
                        </div>
        </form>
    </form>

    </div>
    </div>

    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
        <div class="bor10 p-lr-30 p-t-20 p-b-20 m-l-80 m-r-20 m-lr-0-xl p-lr-15-sm">


            <form method="post">
            <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                <div class="size-208 w-full-ssm">
                    <style>
                        #ship{
                            color:#FFA900;
                        }
                    </style>
								<span id="ship" class="stext-110 cl2">
									Shipping:
								</span>
                </div>

                <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                    <p class="stext-111 cl6 p-t-2">
                        There are no shipping methods available. Please double check your address, or contact us if you need any help.
                    </p>

                    <div class="p-t-15">


                        <div class="col-md-6 m-b-10"><input type="text" class="form-control" placeholder="Address"  name="SaveOrderAddress"></div>



                    </div>
                </div>
            </div>

            <div class="flex-w flex-t p-t-27 p-b-33">
                <div class="size-208">
                    <style>
                        #total{
                            color:#FFA900;
                        }
                    </style>
								<span id="total" class="mtext-101 cl2">
									Total:
								</span>
                </div>


                <div class="size-209 p-t-1">
                    <style>
                        #total{
                            color:#FFA900;
                        }
                    </style>
								<span id="total" class="mtext-110 cl2">
									<?php
                                    $query0 = "SELECT * FROM `orderitems` WHERE order_id='$order_id_c'";
                                    $query_run0 = mysqli_query($connection, $query0);
                                    $sum=0;
                                    while($row0=mysqli_fetch_array($query_run0)){
                                        $sum=$sum+ $row0['orderitemq_price'];
                                    }
                                    echo $sum;
                                    ?>$</span>
                    <input type="hidden" name="finalprice" value="<?php echo$sum ?> " />


                </div>
            </div>
                <style>
                    #Proceed{
                        background-color: #FFA900;
                        color:#000000;
                    }
                    *{
                        background-color:rgb(34,34,34);
                    }
                </style>
            <input type="submit"  name="GoToPayment" id="Proceed" value="Proceed to Checkout" class="btn flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"/>
            </form>

        </div>
    </div>
    </div>
    </div>
    </form>


    <!-- Shopping Cart Detail -->
</header><!--/.welcome-hero-->
<!--welcome-hero end -->




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


<!--===============================================================================================-->
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/bootstrap/js/popper.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script>
    $('.js-pscroll').each(function(){
        $(this).css('position','relative');
        $(this).css('overflow','hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function(){
            ps.update();
        })
    });
</script>
<!--===============================================================================================-->
<script src="../js/HomeJS/main.js"></script>
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

