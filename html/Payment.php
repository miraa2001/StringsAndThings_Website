<?php


session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name
$user_email = $_SESSION['user_email_s'];
$finalprice= $_SESSION['finalprice_s'];



if (isset($_POST['PaymentSubmit']))
{

    $visaid =$_POST['visaid'];

    echo $visaid;

    $visaname=$_POST['visaname'];
    $month=$_POST['month'];
    $year=$_POST['year'];
    $cvv=$_POST['cvv'];
    $total=rand((int)4000,(int)6000);


    $query1 = "INSERT INTO `visa` (`visa_id`, `visa_name`, `visa_expm`, `visa_expy`,`visa_cvv`,`visa_totalmoney`)
                    VALUES ('$visaid','$visaname','$month','$year','$cvv','$total')";
    $query_run1 = mysqli_query($connection, $query1);


    $query2 = "UPDATE `user` SET visa_id='$visaid' where user_email='$user_email'";
    $query_run2 = mysqli_query($connection, $query2);

    $after=$total-$finalprice;

    $query3 = "UPDATE `visa` SET visa_totalmoney='$after' where visa_id='$visaid'";
    $query_run2 = mysqli_query($connection, $query2);




    $query4 = "SELECT * FROM user WHERE user_email= '$user_email'";
    $query_run4 = mysqli_query($connection, $query4);
    $row4=mysqli_fetch_array($query_run4);
    $user_id=$row4['user_id'];


    $query5 = "INSERT INTO `order` (`order_id`, `order_add`, `order_finaltotal`, `user_id`)
                    VALUES (NULL,NULL,NULL,'$user_id')";
    $query_run5 = mysqli_query($connection, $query5);


    header('location:PaymentConfirmation.php');


}
?>




<!DOCTYPE html>

    <html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>

            Complete Your Purchase

        </title>
        <link rel="shortcut icon" type="image/icon" href="../Images/logo/favicon.png"/>

        <!-- custom css file link  -->
        <link rel="stylesheet" href="../css/HomeCSS/Payment.css">

    </head>

    <body>

    <div class="container" style="background-color: rgb(34,34,34);">

        <div class="card-container">

            <div class="front">

                <div class="image">

                    <img src="https://i.imgur.com/iPjGMpM.png" alt = "chip">

                    <img src="https://i.imgur.com/HDMROff.png" alt = 'visa'>

                </div>

                <div class="card-number-box" >

                    #### ##### #####

                </div>

                <div class="flexbox" >

                    <div class="box">

                        <div class="card-holder-name">
                            
                            Name of card holder
                    
                        </div>

                    </div>

                    <div class="box">

                        <span>
                            
                            expiry
                        
                        </span>

                        <div class="expiration">

                            <span class="exp-month">
                                
                                mm / 
                            
                            </span>

                            <span class="exp-year">
                                
                                yyyy
                            
                            </span>

                        </div>

                    </div>

                </div>

            </div>
            

            <div class="back">

                <div class="stripe"> </div>

                <div class="box">

                    <span>
                        cvv
                    </span>

                    <div class="cvv-box"> <p>####</p></div>

                    <img src="https://i.imgur.com/HDMROff.png" alt = "Visa">

                </div>

            </div>

        </div>

            <form method="post" action="Payment.php" style="background-color: #858585;">

            <div class="inputBox">

                <span>
                    
                    card number
                
                </span>

                <input type="tel" maxlength="16" class="card-number-input form-control cleave-input-credit-card" placeholder="Your Credit Card No." name="visaid" required >

            </div>

            <div class="inputBox">

                <span>
                    
                    name on card
                
                </span>

                <input type="text" class="card-holder-input"  placeholder="Your Name." name="visaname" required>

            </div>

            <div class="flexbox">

                <div class="inputBox">

                    <span>
                        
                        expiry mm
                    
                    </span>

                    <select name="month" id="" class="month-input" required>

                        <option value="month" selected disabled>
                            
                            month
                        
                        </option>

                        <option value="01">
                            
                            01
                        
                        </option>

                        <option value="02">
                            
                            02
                        
                        </option>

                        <option value="03">
                            
                            03
                        
                        </option>

                        <option value="04">
                            
                            04
                        
                        </option>

                        <option value="05">
                            
                            05
                        
                        </option>

                        <option value="06">
                            
                            06
                        
                        </option>

                        <option value="07">
                            
                            07
                        
                        </option>

                        <option value="08">
                            
                            08
                        
                        </option>

                        <option value="09">
                            
                            09
                        
                        </option>

                        <option value="10">
                            
                            10
                        
                        </option>

                        <option value="11">
                            
                            11
                        
                        </option>

                        <option value="12">
                            
                            12
                        
                        </option>

                    </select>

                </div>

                <div class="inputBox">

                    <span>
                        
                        expiry yy
                    
                    </span>

                    <select name="year" id="" class="year-input" required>

                        <option value="year" selected disabled>
                            
                            year
                        
                        </option>

                        <option value="2022">
                            
                            2022
                        
                        </option>

                        <option value="2023">
                            
                            2023
                        
                        </option>

                        <option value="2024">
                            
                            2024
                        
                        </option>
                        
                        <option value="2025">
                            
                            2025
                        
                        </option>
                        
                        <option value="2026">
                            
                            2026
                        
                        </option>
                        
                        <option value="2027">
                            
                            2027
                        
                        </option>
                        
                        <option value="2028">
                            
                            2028
                        
                        </option>
                        
                        <option value="2029">
                            
                            2029
                        
                        </option>
                        
                        <option value="2030">
                            
                            2030
                        
                        </option>
                        
                        <option value="2031">
                            
                            2031
                        
                        </option>

                    </select>

                </div>

                <div class="inputBox">


                    <span>
                        
                        cvv
                    
                    </span>

                    <input type="text" name="cvv" maxlength="4" class="cvv-input" required>

                </div>

            </div>

            <input type="submit" class="submit-btn" value="Submit" name="PaymentSubmit" style="height: 50px;"/>
            
        </form>

    </div>
    
    <script src = "../js/HomeJS/Payment.js"> </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js" integrity="sha512-KaIyHb30iXTXfGyI9cyKFUIRSSuekJt6/vqXtyQKhQP6ozZEGY8nOtRS6fExqE4+RbYHus2yGyYg1BrqxzV6YA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
       var cleave = new Cleave('.cleave-input-credit-card', {
           creditCard: true,
           onCreditCardTypeChanged: function (type) {
           }
       });
   </script>


    </style>
    </body>

</html>