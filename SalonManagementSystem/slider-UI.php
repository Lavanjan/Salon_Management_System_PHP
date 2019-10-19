<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "beauty");
function make_query($connect)
{
    $query = "SELECT * FROM promotion_slide ORDER BY id ASC";
    $result = mysqli_query($connect, $query);
    return $result;
}

function make_slide_indicators($connect)
{
    $output = '';
    $count = 0;
    $result = make_query($connect);
    while($row = mysqli_fetch_array($result))
    {
        if($count == 0)
        {
            $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
   ';
        }
        else
        {
            $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
   ';
        }
        $count = $count + 1;
    }
    return $output;
}

function make_slides($connect)
{
    $output = '';
    $count = 0;
    $result = make_query($connect);
    while($row = mysqli_fetch_array($result))
    {
        if($count == 0)
        {
            $output .= '<div class="item active">';
        }
        else
        {
            $output .= '<div class="item">';
        }
        $output .= '
   <img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"  class="img-thumbnail" />    
   <div class="carousel-caption">
   </div>
  </div>
  ';
        $count = $count + 1;
    }
    return $output;
}

?>
<!DOCTYPE html>
<html>
<head>
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
    <title>Northen Stylish | Promotions</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<header class="site-navbar py-1" role="banner">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-xl-3" data-aos="fade-down">
                <h1 class="mb-0"><a href="index.php" class="text-black h2 mb-0">Northern Stylish</a></h1>
            </div>
            <div class="col-10 col-md-7 d-none d-xl-block" data-aos="fade-down">
                <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li>
                            <a href="index.php">HOME</a>
                            <ul class="dropdown">
                                <!--                                <li><a href="#">Menu One</a></li>-->
                                <!--                                <li><a href="#">Menu Two</a></li>-->
                                <!--                                <li><a href="#">Menu Three</a></li>-->
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
                        <li class="active"><a href="slider-UI.php">PROMOTIONS</a></li>
                        <li><a href="about.html">ABOUT</a></li>
                        <li><a href="contact-us.php">PRODUCTS</a></li>
                        <li><a href="contact-us.php">CONTACT</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-6 col-xl-2" data-aos="fade-down">
                <div class="d-none d-xl-inline-block">
                    <div class="d-none d-xl-inline-block">
                        <button style="border-radius: 10px;" type="button" name="logout" id="logout" class="btn btn-outline-primary btn-sm"><a href = "admin/login.php">Logout</button></a>
                    </div>

                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                            href="#" class="site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a></div>

                </div>
            </div>
        </div>
</header>
<div class="slide-one-item home-slider owl-carousel">

    <div class="site-blocks-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h5 class="text-white font-weight-light text-uppercase">Welcome to Beauty Salon</h5>
                    <h2 class="text-white font-weight-light mb-2 display-1">Join With US</h2>

                    <p><a href="contact-us.php" class="btn btn-black py-3 px-5">Book Now!</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover" style="background-image: url(images/Cover.jpg);" data-aos="fade"
         data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="text-white font-weight-light mb-2 display-1">Beautiful Hair, Healthy You!</h2>

                    <p><a href="contact-us.php" class="btn btn-black py-3 px-5">Book Now!</a></p>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container" style="width:1700px;">
<br />
<div class = "slide">
    <br />
    <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel" align="center">
        <ol class="carousel-indicators">
            <?php echo make_slide_indicators($connect); ?>
        </ol>

        <div  class="carousel-inner">
            <?php echo make_slides($connect); ?>
        </div>
        <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
</div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7">
                <h2 class="site-section-heading font-weight-light text-black text-center">Featured Services</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
                <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                    <span class="icon flaticon-razor display-3 text-primary mb-4 d-block"></span>
                    <h3 class="text-black h4">Barber Razor</h3>
                    <p>The goal was to provide extended convenience to clients and bring a new level of hair salon.</p>
                    <p><strong class="font-weight-bold text-primary">LKR. 1200</strong></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
                <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                    <span class="icon flaticon-location-pin display-3 text-primary mb-4 d-block"></span>
                    <h3 class="text-black h4">Location Pin</h3>
                    <p>Offering full salon and day spa services, Northern Stylish and Day Spa is the
                        most stylish.</p>
                    <p><strong class="font-weight-bold text-primary">LKR. 950</strong></p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 text-center mb-5 mb-lg-5">
                <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                    <span class="icon flaticon-shave display-3 text-primary mb-4 d-block"></span>
                    <h3 class="text-black h4">Barber Shave</h3>
                    <p>There is no appointment<br> necessary and walk-ins are always welcome. If you are
                        looking for a great value.</p>
                    <p><strong class="font-weight-bold text-primary">LKR. 650</strong></p>
                </div>
            </div>

        </div>
    </div>
</div>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mb-5">
                        <h3 class="footer-heading mb-4">About</h3>
                        <p>We’re known around town for our sexy and inventive hairstyles.
                            Our team of professionals is always ready to provide you with an experience that will
                            leave you satisfied and projecting confidence with your new look.</p>
                    </div>


                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h3 class="footer-heading mb-4">Quick Menu</h3>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Barbers</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Team</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Membership</a></li>
                            </ul>
                        </div>
                    </div>


                </div>

                <div class="col-lg-4 mb-5 mb-lg-0">


                    <div class="mb-5">
                        <h3 class="footer-heading mb-2">Subscribe Newsletter</h3>
                        <p>Providing the ultimate beauty service, we will have you shine with brilliance and perfection.</p>

                        <form action="#" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control border-secondary text-white bg-transparent"
                                       placeholder="Enter Email" aria-label="Enter Email"
                                       aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Send
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <div class="mb-5">
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>

                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script data-cfasync="false"
                                                src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>document.write(new Date().getFullYear());</script>
                        All rights reserved

                    </p>
                </div>

            </div>
        </div>
    </footer>
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
</body>
</html>