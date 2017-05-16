<!DOCTYPE html>
<?php
require_once "koneksi.php";
if(!isset($_SESSION)) {
    session_start();
}
if (!empty($_SESSION['username'])){
    header('Location: input.php');
}else{
    session_destroy();
}
?>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link href="css/stylelogin.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Prediksi Curah Hujan Menggunakan Logika Fuzzy</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <!--<?php //include "header.php"; ?>-->
    <!-- #header end -->

    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>My Account</h1>
            <ol class="breadcrumb">
                <li><a href="/fuzzymaxvar/">Home</a></li>
                <li class="active">Login</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            

                       <!--signin-form-->
                <div class="w3">
                    <div class="signin-form profile">
                        <h3>Login</h3>
                        
                        <div class="login-form">
                            <form id="login-form" name="login-form" class="nobottommargin" action="proses_login.php?action=login" method="post">
                                <input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" placeholder="Username" required="">
                                <input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" placeholder="Password" required="">
                                <div class="tp">
                                    <input type="submit" id="login-form-submit" name="login-form-submit" value="LOGIN NOW">
                                </div>
                            </form>
                        </div>
                       
                        <p><a href="#"> Don't have an account?</a></p>
                    </div>
                </div>
                <div class="agile">
                    <div class="signin-form profile">
                        <h3>Register</h3>
                        
                        <div class="login-form">
                            <form id="register-form" name="register-form" class="nobottommargin" action="proses_login.php?action=register" method="post">
                                <input type="text" id="register-form-username" name="register-form-username" placeholder="Username" required="">
                                <input type="text" id="register-form-name" name="register-form-name" value="" placeholder="Full Name" required="">
                                <input type="text" id="register-form-email" name="register-form-email" value="" placeholder="Email" required="">
                                <input type="password" id="register-form-password" name="register-form-password" value="" placeholder="Password" required="">
                                <input type="submit" id="register-form-submit" name="register-form-submit" value="REGISTER">
                            </form>
                        </div>
                        <p><a href="#"> By clicking register, I agree to your terms</a></p>
                    </div>
                </div>
                <div class="clear"></div>
                <!--//signin-form-->    

            

        </div>

    </section><!-- #content end -->

    <!-- Footer
    ============================================= -->
    <?php include "footer.php"; ?>
    <!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>