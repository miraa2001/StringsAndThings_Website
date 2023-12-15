<?php

session_start();
$connection = mysqli_connect('localhost', 'root', '');
$db = mysqli_select_db($connection, 'ohs');// database name

if (isset($_POST['SignIn']))
    {
        $user_email = $_POST['emailIn'];
        $user_pw = $_POST['passwordIn'];

        $_SESSION['user_email_s'] = $user_email;


        if ((empty($user_email)) || (empty($user_pw)) ){
            echo '<script type="text/javascript"> alert("Please fill all required fields!") </script>';

        } else {

            $query = "SELECT * FROM user WHERE user_email= '$user_email' && user_pw = '$user_pw'";
            $query_run = mysqli_query($connection, $query);


            if(mysqli_num_rows($query_run) > 0){

                $query2 = "SELECT * FROM user WHERE user_email= '$user_email'";
                $query_run2 = mysqli_query($connection, $query2);
                $row2=mysqli_fetch_array($query_run2);
                $user_id=$row2['user_id'];

                $_SESSION['user_id_s'] = $user_id;

                if($user_email== 'miiraj@gmail.com' || $user_email== 'suhaman@gmail.com'){
                    header('location:AdminInfo.php');
                }
                else{
                    $query3 = "INSERT INTO `order` (`order_id`, `order_add`, `order_finaltotal`, `user_id`)
                    VALUES (NULL,NULL,NULL,'$user_id')";
                    $query_run3 = mysqli_query($connection, $query3);
                    header('location:home.php');
                }

            }
            else{
                echo '<script type="text/javascript"> alert("Password and Confirm Password does not match") </script>';

            }
        }

    }

if (isset($_POST['SignUp'])) {

    $user_name = $_POST['username'];
    $user_add = $_POST['address'];
    $user_email = $_POST['email'];
    $user_pw = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];



    $_SESSION['user_email_s'] = $user_email;

    $data = $_POST;
    if (empty($data['username']) ||
        empty($data['address']) ||
        empty($data['email']) ||
        empty($data['password']) ||
        empty($data['password_confirm'])) {
        echo '<script type="text/javascript"> alert("Please fill all required fields!") </script>';
    } else {

        if ($user_pw == $password_confirm) {
            $query = "SELECT * FROM user WHERE user_email= '$user_email'";
            $query_run = mysqli_query($connection, $query);

            if (mysqli_num_rows($query_run) > 0) {
                echo '<script type="text/javascript"> alert("Email is already exists... try another Email") </script>';
            } else {

                $query = "INSERT INTO `user` (`user_id`, `user_email`, `user_pw`, `user_name`, `user_add`, `user_type`, `visa_id`)
                          VALUES (NULL,'$user_email','$user_pw','$user_name', '$user_add','U',NULL)";
                $query_run = mysqli_query($connection, $query);



                if ($query_run) {
                    $query2 = "SELECT * FROM user WHERE user_email= '$user_email'";
                    $query_run2 = mysqli_query($connection, $query2);
                    $row2=mysqli_fetch_array($query_run2);
                    $user_id=$row2['user_id'];

                    $_SESSION['user_id_s'] = $user_id;


                    $query3 = "INSERT INTO `order` (`order_id`, `order_add`, `order_finaltotal`, `user_id`)
                    VALUES (NULL,NULL,NULL,'$user_id')";
                    $query_run3 = mysqli_query($connection, $query3);


                    echo '<script type="text/javascript"> alert("Your successfully SignUp") </script>';
                    header('location:home.php');
                } else {
                    echo '<script type="text/javascript"> alert("SignUp Failed") </script>';
                }
            }
        } else {
            echo '<script type="text/javascript"> alert("Password and Confirm Password does not match") </script>';
        }
    }
}
?>
<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!---->
<!--    <link rel="shortcut icon" type="image/icon" href="../Images/logo/favicon.png"/>-->
<!---->
<!--    <script-->
<!--            src="https://kit.fontawesome.com/64d58efce2.js"-->
<!--            crossorigin="anonymous"-->
<!--    ></script>-->
<!---->
<!--    <link rel="stylesheet" href="../css/SignCSS/SignIn&SignUp.css" />-->
<!--    <title>Sign in & Sign up Form</title>-->
<!--</head>-->
<!---->
<!--<body>-->
<!--<div class="container">-->
<!--    <div class="forms-container">-->
<!--        <div class="signin-signup">-->
<!--            <form action="SignIn&SignUp.php" class="sign-in-form" method="post">-->
<!--                <h2 class="title">Sign in</h2>-->
<!--                <div class="input-field">-->
<!--                    <i class="fas fa-user"></i>-->
<!--                    <input type="email" placeholder="Email" name="emailIn" />-->
<!--                </div>-->
<!--                <div class="input-field">-->
<!--                    <i class="fas fa-lock"></i>-->
<!--                    <input type="password" placeholder="Password" name="passwordIn" />-->
<!--                </div>-->
<!--                <input class="btn solid" type="submit" value="Login" name="SignIn" />-->
<!---->
<!--            </form>-->
<!---->
<!--            <form action="SignIn&SignUp.php" class="sign-up-form" method="post">-->
<!--                <h2 class="title">Sign up</h2>-->
<!---->
<!--                <div class="input-field">-->
<!--                    <i class="fas fa-user"></i>-->
<!--                    <input type="text" placeholder="Username" name="username" />-->
<!--                </div>-->
<!--                <div class="input-field">-->
<!--                    <i class="fas fa fa-map-marker"></i>-->
<!--                    <input type="text" placeholder="Address"  name="address"/>-->
<!--                </div>-->
<!---->
<!--                <div class="input-field">-->
<!--                    <i class="fas fa-envelope"></i>-->
<!--                    <input type="email" placeholder="Email" name="email" />-->
<!--                </div>-->
<!--                <div class="input-field">-->
<!--                    <i class="fas fa-unlock"></i>-->
<!--                    <input type="password" placeholder="Password" name="password"/>-->
<!--                </div>-->
<!---->
<!--                <div class="input-field">-->
<!--                    <i class="fas fa-lock"></i>-->
<!--                    <input type="password" placeholder="Confirm Password" name="password_confirm"/>-->
<!--                </div>-->
<!---->
<!--               <input type="submit" class="btn" value="Sign up" name="SignUp" />-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="panels-container">-->
<!--        <div class="panel left-panel">-->
<!--            <div class="content">-->
<!--                <h3>New here ?</h3>-->
<!--                <p>-->
<!--                    You are just one step away from being a member of our amazing Family... Ring the bill below.                </p>-->
<!--                <button class="btn transparent" id="sign-up-btn">Sign up</button>-->
<!--            </div>-->
<!--            <img src="../Images/SignIn-SignUp/SignUp.svg" class="image" alt="" />-->
<!--        </div>-->
<!--        <div class="panel right-panel">-->
<!--            <div class="content">-->
<!--                <h3>One of us ?</h3>-->
<!--                <p>-->
<!--                    Welcome back!you missed our updates, come in and check them out.-->
<!--                </p>-->
<!--                <button class="btn transparent" id="sign-in-btn">Sign in</button>-->
<!--            </div>-->
<!--            <img src="../Images/SignIn-SignUp/SignIn.svg" class="image" alt="" />-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--<script src="../js/SignJS/SignIn&SignUp.js"></script>-->
<!--</body>-->
<!--</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Strings and Things</title>
    <style>
        body{
            margin:0;
            padding:0;
            font-family: sans-serif;
            background: rgb(21,21,21);
            height:700px;
        }
        h1{
            color:rgb(176,162,149);
            text-align: center;

        }
        h3{
            color:rgb(176,162,149);
            text-align:center;
            padding-bottom:50px;
            font-size: 14px;
        }
        /* flip the pane when hovered */
        .card-container.rotate .card{
            transform: rotateY( 180deg );
        }
        /* flip speed goes here */
        .card {
            transition: transform .85s;
            transform-style: preserve-3d;
            position: relative;
        }

        /* hide back of pane during swap */
        .login-form, .signup-form {
            backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            background-color: rgb(176,162,149);
            box-shadow: 0 15px 25px rgba(0,0,0,.6);
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 420px;
            border-radius: 20px;
        }

        /* front pane, placed above back */
        .login-form {
            z-index: 2;
            height: 380px;
            border-radius: 20px;
        }

        /* back, initially hidden pane */
        .signup-form {
            transform: rotateY(180deg);
            z-index: 3;
            height: 590px;
            border-radius: 20px;
        }

        /*        Style       */
        .card-container{
            width: 300px;
            margin: 0px auto;
            margin-top:130px;
            margin-left:600px;

        }

        .card{
            background: rgb(207,212,228);
            color: #444444;
            left: 100%;
            padding: 40px;
            transform: translate(-50%, -50%);
            box-sizing: border-box;
            border-radius: 20px;
        }

        .card .content{
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0);
            box-shadow: none;
            flex: 1;
        }
        .card .footer {
            padding: 5px 0 5px 0;
            text-align: center;
            color: rgb(21, 21, 21);
        }
        h2{
            margin: 20px 0 30px;
            padding: 0;
            color: rgb(21, 21, 21);
            text-align: center;
        }
        .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: rgb(21,21,21);
            margin-bottom: 35px;
            border: none;
            border-bottom: 1px solid rgb(21,21,21);
            outline: none;
            background: transparent;

        }
        .user-box label.passwordLabel{
            position: absolute;
            top:80px;
            left: 30px;
            padding: 10px 0;
            font-size: 16px;
            color: #00000079;
            pointer-events: none;
            transition: .5s;
        }
        .user-box label.password_confirmLabel{
            position: absolute;
            top:150px;
            left: 30px;
            padding: 10px 0;
            font-size: 16px;
            color: #00000079;
            pointer-events: none;
            transition: .5s;
        }
        .user-box input:focus ~ label.password_confirmLabel,
        .user-box input:valid ~ label.password_confirmLabel {
            top: 130px;
            left: 30px;
            color: rgb(21, 21, 21);
            font-size: 12px;
        }
        .user-box input:focus ~ label.passwordLabel,
        .user-box input:valid ~ label.passwordLabel {
            top: 60px;
            left: 30px;
            color: rgb(21, 21, 21);
            font-size: 12px;
        }
        /*n*/
        .reg-box label.passwordLabel{
            position: absolute;
            top:295px;
            left: 30px;
            padding: 10px 0;
            font-size: 16px;
            color: #00000079;
            pointer-events: none;
            transition: .5s;
        }
        .reg-box label.password_confirmLabel{
            position: absolute;
            top:370px;
            left: 30px;
            padding: 10px 0;
            font-size: 16px;
            color: #00000079;
            pointer-events: none;
            transition: .5s;
        }
        .reg-box label.usernameLabel{
            position: absolute;
            top:80px;
            left: 30px;
            padding: 10px 0;
            font-size: 16px;
            color: #00000079;
            pointer-events: none;
            transition: .5s;
        }
        .reg-box label.addressLabel{
            position: absolute;
            top:150px;
            left: 30px;
            padding: 10px 0;
            font-size: 16px;
            color: #00000079;
            pointer-events: none;
            transition: .5s;
        }
        .reg-box label.emailLabel{
            position: absolute;
            top:220px;
            left: 30px;
            padding: 10px 0;
            font-size: 16px;
            color: #00000079;
            pointer-events: none;
            transition: .5s;
        }
        .reg-box input:focus ~ label.emailLabel,
        .reg-box input:valid ~ label.emailLabel {
            top: 210px;
            left: 30px;
            color: rgb(21, 21, 21);
            font-size: 12px;
        }
        .reg-box input:focus ~ label.password_confirmLabel,
        .reg-box input:valid ~ label.password_confirmLabel {
            top: 355px;
            left: 30px;
            color: rgb(21, 21, 21);
            font-size: 12px;
        }
        .reg-box input:focus ~ label.passwordLabel,
        .reg-box input:valid ~ label.passwordLabel {
            top: 280px;
            left: 30px;
            color: rgb(21, 21, 21);
            font-size: 12px;
        }
        .reg-box input:focus ~ label.usernameLabel,
        .reg-box input:valid ~ label.usernameLabel {
            top: 60px;
            left: 30px;
            color: rgb(21, 21, 21);
            font-size: 12px;
        }
        .reg-box input:focus ~ label.addressLabel,
        .reg-box input:valid ~ label.addressLabel {
            top: 130px;
            left: 30px;
            color: rgb(21, 21, 21);
            font-size: 12px;
        }
        /*n*/
        form input.submit {
            border:none;
            bottom:30px;
            left:55px;
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: rgb(21, 21, 21);
            background-color: rgb(176,162,149);
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            margin-top: 40px;
            letter-spacing: 4px;
            z-index: 0;
        }

        input.submit:hover {
            background: rgb(21, 21, 21);
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgb(21, 21, 21),
            0 0 25px rgb(21, 21, 21),
            0 0 50px rgb(21, 21, 21),
            0 0 100px rgb(21, 21, 21);
        }
        .btn {
            display: inline-block;
            height: 36px;
            line-height: 36px;
            padding-bottom:25px;
            font-family: inherit;
            font-weight: 100;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            outline: none;
            cursor: pointer;
            transition: .4s;
            color: rgb(21, 21, 21);
            border:none;
        }

        .btn-rotate {
            color: rgb(21, 21, 21);
            font-size:16px;
            padding-bottom:25px;
            font-weight: bold;
            background-color: rgb(176,162,149);
        }

        .btn-rotate:hover {
            color: #68187AFF;
            background-color: rgb(176,162,149);
        }

        .btn-rotate:focus{
            outline: none;
        }

        form{
            width: 80%;
        }

        @keyframes imgAnm{
            0%{
                left: 120px;
                top:80px;
            }
            50%{
                left:190px;
                top:120px;
            }
            100%{
                left:120px;
                top:120px;
            }
        }

        .guitarImg
        {
            position: absolute;
            left: 100px;
            animation-name: imgAnm;
            animation-duration: 4s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
        }
        #btn-login{
            margin-bottom:100px;
        }

    </style>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded',  (event) => {

            const rotateCard = () => {
                const cardContainer = document.querySelector('.card-container')
                cardContainer.classList.toggle('rotate')
            }

            const btnSignup = document.querySelector('#btn-signup') ,
                btnLogin = document.querySelector('#btn-login')

            btnSignup.addEventListener('click', rotateCard)
            btnLogin.addEventListener('click', rotateCard)

            /*See passwod*/
            const seePassword =  () => {
                const seePwdIcon = document.querySelector('.see-password'),
                    pwdInput = document.querySelector('.group input')

                seePwdIcon.addEventListener('mousedown', () => {
                    pwdInput.type = 'text'
                })

                seePwdIcon.addEventListener('mouseup', () => {
                    pwdInput.type = 'password'
                })

                seePwdIcon.addEventListener('mouseover', () => {
                    pwdInput.type = 'password'
                })
            }

            seePassword()
        })
    </script>
</head>
<body>
<div class="main-wrapper">
    <h1 clas="websiteTitle">Strings and Things</h1>
    <h3>Resonating Souls: Where Music Finds its Profound Expression</h3>
    <div class="card-container">
        <div class="card">
            <div class="login-form">
                <h2>Login</h2>
                <div class="content">
                    <form action="SignIn&SignUp.php" method="post">
                        <div class="user-box">
                            <input type="text" name="emailIn" required="">
                            <label class="passwordLabel">Email</label>
                        </div>
                        <div class="user-box">
                            <input type="password" name="passwordIn" required="">
                            <label class="password_confirmLabel">Password</label>
                        </div>
                        <input class="submit" type="submit" value="Sign In" name="SignIn"/>
                    </form>
                </div>
                <div class="footer" style="font-size: 15px">
                    Don't have an account ?
                    <button class="btn btn-rotate" id="btn-signup">Sign up</button>
                </div>
                <br>
            </div> <!-- end login-form panel -->
            <div class="signup-form">
                <h2>Sign Up</h2>
                <div class="content">
                    <form action="SignIn&SignUp.php" method="post">
                        <div class="user-box reg-box">
                            <input type="text" name="username" required="">
                            <label class="usernameLabel">Username</label>
                        </div>
                        <div class="user-box reg-box">
                            <input type="text" name="address" required="">
                            <label class="addressLabel">Address</label>
                        </div>
                        <div class="user-box reg-box">
                            <input type="email" name="email" required="">
                            <label class="emailLabel">Email</label>
                        </div>
                        <div class="user-box reg-box">
                            <input type="password" name="password" required="">
                            <label class="passwordLabel">Password</label>
                        </div>
                        <div class="user-box reg-box">
                            <input type="password" name="password_confirm" required="">
                            <label class="password_confirmLabel" name="password_confirm">Confirm Password</label>
                        </div>
                        <input class="submit" type="submit" value="Sign Up" name="SignUp"/>
                    </form>
                </div>
                <div class="footer">
                    <button class="btn btn-rotate" id="btn-login">I have an account</button>
                </div>
            </div> <!-- end signup-form panel -->
        </div> <!-- end card -->
    </div> <!-- end card-container -->
</div>
<img class="guitarImg" src="../Images/SignIn-SignUp/guitarPlaying.gif" width="300px">
</body>
</html>