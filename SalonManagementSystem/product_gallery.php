<?php $aid=$_REQUEST['id']; ?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <title>Beauty Salon | Gallery</title>
    <link href="./gallery_css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (Bootstrap's JavaScript plugins) -->
    <script src="./gallery_js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="./gallery_css/style.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="stylesheets/navigation.css">


    <link rel="stylesheet" type="text/css" href="stylesheets/style1.css" />
    <link rel="stylesheet" type="text/css" href="stylesheets/style_common.css" />
    <!-- Stylesheets -->



    <link href="litebox-master/assets/css/litebox.css" rel="stylesheet" type="text/css" media="all" />


    <!-- The Menu -->
    <link href="stylesheets/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="pe-icon-7-stroke/css/pe-icon-7-stroke.css">

    <!-- Optional - Adds useful class to manipulate icon font display -->
    <link rel="stylesheet" href="pe-icon-7-stroke/css/helper.css">
    <script src="libs/modernizr.js" type="text/javascript"></script>
    <!--    <link rel="stylesheet" href="./gallery_css/sass-compiled.css" />-->
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--webfont-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,300,600,800,700' rel='stylesheet' type='text/css'>



</head>
<body>



<div class="header">
    <div class="container">
        <div class="logo">
            <h2>Beauty Salon</h2>
        </div>
        <div class="top-menu">
            <span class="menu"> </span>
            <ul>
                <li><a href="#.html">HOME</a></li>

                <li class="active"><a href="GalleryUI.php">GALLERY</a></li>
                <li><a href="slider-UI.php">PROMOTIONS</a></li>
                <li><a href="contact-us.php">CONTACT</a></li>
                <li><a href="#.html">ABOUT US</a></li>
                <li class="glyphicon glyphicon-user"></li>
                <li><a href="admin/login.php">Admin panel</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
        <!--script-nav-->
        <script>
            $("span.menu").click(function(){
                $(".top-menu ul").slideToggle("slow" , function(){
                });
            });
        </script>
    </div>
</div>		<!-- Blog Section
	================================================== -->
<div class="gallery-head">
    <div class="gallery-info">
        <div class="container">
            <a href="gallery.php">Home/</a>
            <?php
            include 'connect.php';
            $sql = "SELECT * FROM tbl_album where albumid='$aid'";
            $rs_result = mysqli_query ($connection,$sql);




            ####### Fetch Results From Table ########

            while ($row = mysqli_fetch_assoc($rs_result))
            {
            $aimage=$row['image'];
            $aname=$row['name'];
            $adesc=$row['adesc'];
            $astatus=$row['status'];

            ?>
            <h2>
                <?php echo "$aname"; ?>
            </h2>



        </div>
    </div>
    <div class="gallery-text">

    </div>

    <div class="container">
        <div class="one-whole text-center">

            <p><?php echo "$adesc"; ?></p>
            <?php } ?>
            <hr style="border:solid 1px;margin-top:0px;">
            <p style="margin-left:75px">
                <?php
                include "connect.php";

                $sql = "SELECT * FROM tbl_gallery where aid=$aid and status='process'";
                $num_rows = mysqli_num_rows(mysqli_query($connection,$sql));
                ####### Fetch Results From Table ########

                $result = mysqli_query($connection,$sql);
                while($row = mysqli_fetch_array($result))
                {
                    $gimage=$row['gimages'];

                    ?>

                    <?php	echo "<a href='admin/gupload/$gimage' target='_self' class='inline-block litebox' data-litebox-group='group-1'><img src='admin/gcatch/$gimage' class='inline-block' /></a> ";?>
                <?php } ?>
            </p>

        </div>
    </div>
    <div class="clearfix"></div>
</div>
</div>






<!-- Bottom Footer Section
================================================== -->
<div class="bottom_footer_section">
    <div class="container">
        <div class="sixteen columns bottom_line_dev">

            <br/><br/>
            <hr style="border:solid 1px;margin-top:0px">
            <br/>
            <br/>
            <br/>
        </div>

    </div>
</div>


<!-- Primary Page Layout
================================================== -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="litebox-master/assets/js/smoothscroll.min.js" type="text/javascript"></script>
<script src="litebox-master/assets/js/images-loaded.min.js" type="text/javascript"></script>
<script src="litebox-master/assets/js/tipsy.min.js" type="text/javascript"></script>
<script src="litebox-master/assets/js/backbone.js" type="text/javascript"></script>
<script src="litebox-master/assets/js/litebox.min.js" type="text/javascript"></script>

<script type="text/javascript">
    $('.litebox').liteBox();
</script>

<!-- JavaScript
	================================================== -->
<script src="js/jquery-main.js" type="text/javascript"></script>
<script type='text/javascript' src="js/jquery-latest.min.js"></script>
<script type='text/javascript' src='js/menu_jquery.js'></script>
<script src="js/car/jquery-1.7.2.min.js" type="text/javascript"></script> <!-- jQuery -->
<script src="js/car/jquery.easing.1.3.js" type="text/javascript"></script> <!-- jQuery easing -->
<script src="js/car/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->
<script src="js/ticker.js" type="text/javascript"></script>
<script type='text/javascript' src='js/jquery.common.min.js'></script>


<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">
    (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = '../../apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
    })();
</script>



<!-- End Document
================================================== -->
</body>

</html>