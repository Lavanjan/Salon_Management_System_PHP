<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home.php">Admin Panel</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> SignOut</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">


                <li>
                    <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram fa-fw"></i> Album<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php if (isset($_SESSION['uname'])) { ?>
                                <a href="addalbum.php">Add Album</a><?php } ?>                                </li>
                        <li><?php if (isset($_SESSION['uname'])) { ?>
                                <a href="viewallalbums.php">View Album</a><?php } ?>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-file-photo-o fa-fw"></i> Gallery<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php if (isset($_SESSION['uname'])) { ?>
                                <a href="addgallery.php">Add Gallery</a><?php } ?></li>
                        <li>
                            <?php if (isset($_SESSION['uname'])) { ?>  <a href="viewsgallery.php">View
                                Gallery</a><?php } ?>                                </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-instagram fa-fw"></i> Product Album<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php if (isset($_SESSION['uname'])) { ?>
                                <a class="active" href="prod_addalbum.php">Add Album</a><?php } ?>                                </li>
                        <li><?php if (isset($_SESSION['uname'])) { ?>
                                <a  href="prod_viewallalbums.php">View Album</a><?php } ?>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li>
                    <a href="#"><i class="fa fa-instagram fa-fw"></i> Product Gallery<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><?php if (isset($_SESSION['uname'])) { ?>
                                <a href="prod_addgallery.php">Add Gallery</a><?php } ?>                                </li>
                        <li><?php if (isset($_SESSION['uname'])) { ?>
                                <a href="prod_viewsgallery.php">View Gallery</a><?php } ?>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <!-- /.nav-second-level -->
                </li>
                <li><a href="view_message.php"><i class="fa fa-comment"></i> Customers Messages</a></li>
                <li><a href="slide_edit.php"><i class="fa fa-eye"></i> Promotion Slide</a></li>
                <li><a href="send_mail.php"><i class="fa fa-envelope"></i> Send Mail</a></li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
