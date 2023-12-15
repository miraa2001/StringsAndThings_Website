<?php
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name

if(isset($_POST['ADD_Prod']))
{

    $product_name= $_POST['product_name'];
    $product_price= $_POST['product_price'];
    $product_desc= $_POST['product_desc'];
    $image_file=$_POST['image_file'];
    $department=$_POST['department'];
    $product_img="../Images/Products/".$image_file;



    $query = "SELECT * FROM department WHERE dep_name= '$department'";
    $query_run = mysqli_query($connection, $query);
    $row=mysqli_fetch_array($query_run);
    $dep_id=$row['dep_id'];


    $query = "INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img`, `product_desc`, `product_bestseller`, `product_arrival`,`product_featured`,`dep_id`)
        VALUES (NULL,'$product_name','$product_price','$product_img', '$product_desc','0','0','0','$dep_id')";
    $query_run = mysqli_query($connection, $query);



}


if(isset($_POST['delete']))
{
    $product_id= $_POST['id'];
    echo $product_id;


    $query2 = "DELETE FROM orderitems WHERE product_id= '$product_id'";
    $query_run2 = mysqli_query($connection, $query2);

    $query3 = "DELETE FROM product WHERE product_id= '$product_id'";
    $query_run2 = mysqli_query($connection, $query3);

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
        header('location:Violins.php');

    }
    elseif($row['dep_id']=='4'){
        header('location:Pianos.php');

    }
    elseif($row['dep_id']=='5'){
        header('location:Cellos.php');

    }
    else{
        header('location:Accessories.php');
    }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="../css/AboutCSS/main.css">
    <link rel="stylesheet" href="../css/AboutCSS/util.css">
    <link rel="stylesheet" href="../css/HomeCSS/UserInfo.css">
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title Page-->
    <title>All Products </title>

    <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous"
    ></script>

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">


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




    <!-- Fontfaces CSS-->
    <link href="../css/AdminCSS/font-face.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/AdminCSS/theme.css" rel="stylesheet" media="all">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/AdminCSS/CSS/admin.css" rel="stylesheet" type="text/css">
    <script src="../js/AdminJS/JS/Javascript.js"></script>
    <script src="../js/AdminJS/JS/Admin.js"></script>
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
                            <li><a href="AdminInfo.php" style="color:rgb(254 203 102)">Home</a></li>
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

    <!-- For AdminProd  page content-->
    <div id="maincontent" class="p-t-100" style="background-color: rgb(34,34,34);">

        <div id="content" style="background-color: rgb(34,34,34);">
            <section id="rightsection" style="background-color: rgb(34,34,34);">
                <div class="subsection" style="background-color: rgb(34,34,34);">
                    <div class="container row p-b-30 p-l-200 " style="background-color: rgb(34,34,34);">
                        <div class="stext-102 m-l-150">   <h2 style="color:#FFA900">ADD PRODUCT</h2> </div>
                        <div class="col-md-6 col-lg-7 p-b-30 p-l-200">

                            <form method="post" action="AdminProd.php" style="background-color: rgb(34,34,34);">

                                <div>
                                    <label for="productname" style="color:#FFA900">NAME PRODUCT</label>
                                    <input type="text" id="productname" , name="product_name">
                                </div>

                                <label for="productprice" style="color:#FFA900">PRICE</label>
                                <input type="text" id="productprice" , name="product_price">

                                <label for="productdesc" style="color:#FFA900">DESCRIPTION</label>
                                <input type="text" id="productdesc" , name="product_desc">

                                <label style="color:#FFA900">IMAGE</label>
                                <img id="imgadd" src="">
                                <input name="image_file" type="file" onchange="changeimgadd(this)"><br>



                                <label for="brand" style="color:#FFA900">DEPARTMENT</label>
                                <select id="brand"  , name="department">
                                    <option value="Acoustic Guitars" style="background-color:#FFA900">Acoustic Guitars</option>
                                    <option value="Electric Guitars" style="background-color:#FFA900">Electric Guitars</option>
                                    <option value="Violins" style="background-color:#FFA900">Violins</option>
                                    <option value="Pianos" style="background-color:#FFA900">Pianos</option>
                                    <option value="Cellos" style="background-color:#FFA900">Cellos</option>
                                    <option value="Accessories" style="background-color:#FFA900">Accessories </option>
                                </select><br>

                                <button type="submit" name="ADD_Prod" onClick="addProduct()" class="m-l-80" >ADD</button>
                            </form>
                        </div>

                        <div class="col-md-6 col-lg-4 m-l-30 p-t-100">
                            <img src="../Images/Image/addproduct.svg" class="image" alt=""  />
                        </div>
                    </div>
                </div>
            </section>

            <div class="container">

                <section class="bg-img1 txt-center p-lr-15 " >
                    <h2 class="ltext-105 cl0 txt-center">
                        All Products
                    </h2>
                </section>

                <section class="bg0 p-t-10 p-b-20" style="background-color: rgb(34,34,34);">
                    <div class="container" style="background-color: rgb(34,34,34);">
                        <div class="row p-b-148">
                            <div class="table-responsive table--no-card m-b-40">
                                    <div class="table-responsive table-data" style="background-color: rgb(34,34,34);">
                                        <table class="table" style="background-color: rgb(34,34,34);">
                                            <thead>
                                            <tr>
                                                <form method="post" style="background-color: rgb(34,34,34);">
                                                <td style="color:#000000;background-color:#FFA900">Product ID</td>
                                                <td style="color:#000000;background-color:#FFA900">Product Name</td>
                                                <td style="color:#000000;background-color:#FFA900">Product Price</td>
                                                <td style="color:#000000;background-color:#FFA900">Product Image</td>
                                                <td style="color:#000000;background-color:#FFA900">Action (Delete)</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $query = "SELECT * FROM product";
                                            $query_run = mysqli_query($connection, $query);
                                            while($row=mysqli_fetch_array($query_run)){

                                            ?>
                                            <tr>

                                                <td>
                                                    <div class="table-data__info">
                                                        <h6 style="color:#FFA900"> <?php echo $row['product_id'] ?> </h6>
                                                        <input type="hidden" name="id" value="<?php echo$row['product_id']?>" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data__info">
                                                        <h6 style="color:#FFA900"> <?php echo $row['product_name'] ?> </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data__info">
                                                        <h6 style="color:#FFA900"> <?php echo $row['product_price'] ?>$ </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data__info">
                                                        <h6> <img width="90px" , height="90px" src="<?php echo $row['product_img'] ?>"> </h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data__info">
                                                        <style>
                                                            #fas-trash:hover{
                                                                color: #FFA900;
                                                            }
                                                        </style>
                                                        <h6> <button type="submit" id="fas-trash" class="fas fa-trash" name="delete"> </button> </h6>
                                                    </div>
                                                </td>

                                                <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

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

<!-- Main JS-->
<script src="../js/AdminJS/main.js"></script>

</body>

</html>

