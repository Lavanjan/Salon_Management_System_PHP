<!--Get Details and save to Database-->
<?php
include_once("connect.php");
session_start();

// initialize variable
$error = false;

if (isset($_POST['register'])) {
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $tpno = mysqli_real_escape_string($connection, $_POST['tpno']);
    $news = mysqli_real_escape_string($connection, $_POST['news']);

    if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
        $error = true;
        $uname_error = "Name must contain only alphabets";
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
        $error = true;
        $lastname_error = "Name must contain only alphabets";
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if (!preg_match("/^[0-9]{10}+$/",$tpno)) {
        $error = true;
        $tpno_error = "Please Enter Valid Mobile Number";
    }

    if (!preg_match("/^[a-zA-Z ]+$/",$news)) {
        $error = true;
        $news_error = "News must contain only alphabets";
    }

    if (!$error)
    {
        if(mysqli_query($connection, "INSERT INTO contact(firstname, lastname, email, tpno, news) VALUES('$firstname', '$lastname', '$email', '$tpno', '$news')"))
        {
            $success_message = "Successfully Registered!";
        } else {
            $error_message = "Error in registering...Please try again later!";
        }
    }
}
?>






<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Northern Stylish | Contact-US</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />-->
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="map_js/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>

<script src="js/main.js"></script>



<header class="site-navbar py-1" role="banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-xl-3" data-aos="fade-down">
                <h1 class="mb-0"><class="h2 mb-0">Northern Stylish</a></h1>
            </div>
            <div class="col-10 col-md-7 d-none d-xl-block" data-aos="fade-down">
                <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li>
                            <a href="index.php">Home</a>
                            <ul class="dropdown">
                                <!--                                <li class="has-children">-->
                                <!--                                    <a href="#">Sub Menu</a>-->
                                <!--                                    <ul class="dropdown">-->
                                <!--                                        <li><a href="#">Menu One</a></li>-->
                                <!--                                        <li><a href="#">Menu Two</a></li>-->
                                <!--                                        <li><a href="#">Menu Three</a></li>-->
                                <!--                                    </ul>-->
                                <!--                                </li>-->
                            </ul>
                        </li>
                        <li>
                            <a href="GalleryUI.php">GALLERY</a>

                        </li>
                        <li><a href="slider-UI.php">PROMOTION</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="booking.html">PRODUCTS</a></li>
                        <li class="active"><a href="contact.html">CONTACT</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-6 col-xl-2" data-aos="fade-down">
                <div class="d-none d-xl-inline-block">
                    <div class="d-none d-xl-inline-block">
                        <button style="border-radius: 10px;" type="button" name="logout" id="logout" class="btn btn-outline-primary btn-sm"><a href="admin/login.php"> Login</button></a>
                    </div>

                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                                href="#" class="site-menu-toggle js-menu-toggle text-black"><span
                                    class="icon-menu h3"></span></a></div>

                </div>
            </div>
        </div>
</header>
<div class="container" style="width:1700px;">
    <br></br>

    <div class="container">

        <div class="page-header">

        </div>

        <!-- Contact with Map - START -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well well-sm">
                        <form class="form-horizontal" method="post">
                            <fieldset>
                                <legend class="text-center header">Contact us</legend>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input type="text" name="firstname" placeholder="FirstName" class="form-control" required value="<?php if($error) echo $firstname; ?>">
                                        <span><?php if (isset($uname_error)) echo $uname_error; ?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input type="text" name="lastname" placeholder="LastName" class="form-control" required value="<?php if($error) echo $lastname; ?>">
                                        <span><?php if (isset($lastname_error)) echo $lastname_error; ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input type="text" name="email" placeholder="Email" class="form-control" required value="<?php if($error) echo $email; ?>">
                                        <span><?php if (isset($email_error)) echo $email_error; ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <input type="text" name="tpno" placeholder="Mobile Number" class="form-control" required value="<?php if($error) echo $tpno; ?>">
                                        <span><?php if (isset($tpno_error)) echo $tpno_error; ?></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <textarea class="form-control" name="news" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7" required value="<?php if($error) echo $news; ?>"></textarea>
                                        <span><?php if (isset($news_error)) echo $news_error; ?></span>
                                        <span><?php if (isset($success_message)) { echo $success_message; } ?></span>
                                        <span><?php if (isset($error_message)) { echo $error_message; } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" name="register" class="btn btn-outline-primary btn-lg">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="panel panel-default">
                            <div class="text-center header">Our Branch</div>
                            <div class="panel-body text-center">
                                <h4>Address</h4>
                                <div>
                                    No.23 Nelliady North<br />
                                    Nelliady<br />
                                    +94 7 555 1 777 1<br />
                                    beauty@gmail.com<br />
                                </div>
                                <hr />
                                <div id="map1" class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62905.31188543868!2d80.19129350731562!3d9.80139145471401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3aff03080c59e23d%3A0x8fce52cd4a9ef17a!2sPoint%20Pedro!5e0!3m2!1sen!2slk!4v1570368361690!5m2!1sen!2slk" width="530" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>-->

        <script type="text/javascript">
            jQuery(function ($) {
                function init_map1() {
                    var myLocation = new google.maps.LatLng(38.885516, -77.09327200000001);
                    var mapOptions = {
                        center: myLocation,
                        zoom: 16
                    };
                    var marker = new google.maps.Marker({
                        position: myLocation,
                        title: "Property Location"
                    });
                    var map = new google.maps.Map(document.getElementById("map1"),
                        mapOptions);
                    marker.setMap(map);
                }
                init_map1();
            });
        </script>

        <style>
            .map {
                min-width: 300px;
                min-height: 300px;
                width: 100%;
                height: 100%;
            }

            .header {
                background-color: #F5F5F5;
                color: #36A0FF;
                height: 70px;
                font-size: 27px;
                padding: 10px;
            }
        </style>

        <!-- Contact with Map - END -->

    </div>

</body>
</html>
