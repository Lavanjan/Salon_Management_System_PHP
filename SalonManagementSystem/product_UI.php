<!DOCTYPE html>
<html>
<head>
    <title>Northen Stylish | Products</title>
    <!--    --------------------------------------------->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    <!--    ------------------------------------------------------>





    <!--<link href="./gallery_css/bootstrap.css" rel='stylesheet' type='text/css' />-->
    <!-- jQuery (Bootstrap's JavaScript plugins) -->
    <script src="./gallery_js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <!--<link href="./gallery_css/style.css" rel="stylesheet" type="text/css" media="all" />-->

    <!--<link rel="stylesheet" href="stylesheets/navigation.css">-->


    <link rel="stylesheet" type="text/css" href="stylesheets/style1.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/style_common.css" />
    <!-- Stylesheets -->



    <link href="litebox-master/assets/css/litebox.css" rel="stylesheet" type="text/css" media="all" />


    <!-- The Menu -->
    <!--	<link href="stylesheets/styles.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="pe-icon-7-stroke/css/pe-icon-7-stroke.css">

    <!-- Optional - Adds useful class to manipulate icon font display -->
    <link rel="stylesheet" href="pe-icon-7-stroke/css/helper.css">
    <script src="libs/modernizr.js" type="text/javascript"></script>
    <link rel="stylesheet" href="./gallery_css/sass-compiled.css" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,300,600,800,700' rel='stylesheet' type='text/css'>

</head>
<body>
<!---->
<header class="site-navbar py-1" role="banner">

    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-6 col-xl-3" data-aos="fade-down">
                <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">Beauty Salon</h1>
            </div>
            <div class="col-10 col-md-7 d-none d-xl-block" data-aos="fade-down">
                <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                        <li class="active">
                            <a href="index.html">Home</a>
                            <ul class="dropdown">

                                <!--                                    <li class="has-children">-->
                                <!--                                        <a href="#">Sub Menu</a>-->
                                <!--                                        <ul class="dropdown">-->
                                <!--                                            <li><a href="#">Menu One</a></li>-->
                                <!--                                            <li><a href="#">Menu Two</a></li>-->
                                <!--                                            <li><a href="#">Menu Three</a></li>-->
                                <!--                                        </ul>-->
                                <!--                                    </li>-->
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="haircut.html">Haircut Styles</a>

                        </li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="booking.html">Book Online</a></li>
                        <li><a href="contact-us.php">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <div class="col-6 col-xl-2" data-aos="fade-down">
                <div class="d-none d-xl-inline-block">
                    <div class="d-none d-xl-inline-block">
                        <button style="border-radius: 10px;" type="button" name="login" id="login" class="btn btn-outline-primary btn-sm">Login</button>
                    </div>
                </div>
                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a
                            href="#" class="site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a></div>
            </div>
        </div>
    </div>
</header>
<div class="head01">
    <h1 class = head02>Header</h1>
</div>
<br>
<!--header-->
<!--<div class="gallery-head">-->
<!--	 <div class="gallery-info">-->
<!--		 <div class="container">-->
<!--			 <a href="gallery.php">Home/</a><h2>Gallery</h2>-->
<!--		 </div>-->
<!--	 </div>-->
<!--	 <div class="gallery-text">-->
<!---->
<!--	 </div>-->
<div class="container">

    <section class="wrapper cl" >
        <?php
        include 'connect.php';
        if (isset($_GET["page"])) { $page = $_GET["page"]; } else { $page=1; };
        $start_from = ($page-1) * 12;
        $sql = "SELECT * FROM tbl_album where status='process' ORDER BY albumid DESC LIMIT $start_from, 12";
        $rs_result = mysqli_query ($connection,$sql);




        ####### Fetch Results From Table ########

        while ($row = mysqli_fetch_assoc($rs_result))
        {
            $aimage=$row['image'];
            $aid=$row['albumid'];
            $aname=$row['name'];
            $astatus=$row['status'];

            ?>
            <div class="pic" style="margin-right:1px;margin-left:1px;margin-top:1px;margin-bottom:1px">
                <?php echo "<img src='admin/acatch/$aimage' class='pic-image' alt='Pic' alt='$aname'>"; ?>
                <?php echo"<a href='gallery.php?id=$aid'>
		    <span class='pic-caption left-to-right'>
            
		        <p style='color:#FFFFFF;font-size:24px'>$aname</p>
		    </span></a>"?>
            </div>
        <?php } ?>
    </section>



</div>


<div class="clearfix"></div>
</div>
</div>

<div class="seeall_div2">
    <!--   NAVIGATION FOR BLOG POST -->
    <div class="blog_navigation">
        <div style="margin-top:20px;margin-left:180px">

            <?php
            $sql = "SELECT COUNT(name) FROM tbl_album";
            $rs_result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];
            $total_pages = ceil($total_records / 12);
            for ($i=1; $i<=$total_pages; $i++) {
                echo "<span class='navigations_items_span'>";
                echo "<b>Page </b>";
                echo "<a href='index.php?page=".$i."' class='navigation_item selected_navigation_item'>".$i."</a>";
                echo "</span>";
            };
            ?>


        </div>
    </div>
</div>
<!----->

<!----->

<div class="footer">

</div>


<!------------------------------------->
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

<!------------------------------------------------->
</body>