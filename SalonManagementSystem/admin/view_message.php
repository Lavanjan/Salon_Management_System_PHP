<?php session_start();
if(isset($_SESSION['uname']))
{
    ?>
    <?php include "header1.php"; ?>
    <?php include "menu/mmenu.php"; ?>
<!--    ------------------------------------------------------------>
    <?php
    include 'connect.php';
    $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 10;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start = ($page - 1) * $limit;
    $result = $connection->query("SELECT * FROM contact LIMIT $start, $limit");
    $customers = $result->fetch_all(MYSQLI_ASSOC);

    $result1 = $connection->query("SELECT count(id) AS id FROM contact");
    $custCount = $result1->fetch_all(MYSQLI_ASSOC);
    $total = $custCount[0]['id'];
    $pages = ceil( $total / $limit );

    $Previous = $page - 1;
    $Next = $page + 1;

    ?>

<head>




</head>


    <style>.navigation_item{
            padding: 0px 5px;
            background: #fff;
            text-decoration: none;

            color: #e3e3e3 !important;
            font-size: 12px;
            border: 2px solid #e3e3e3;
            border-radius: 1px;
            -webkit-transition: all 0.2s linear;
            -moz-transition: all 0.2s linear;
            -ms-transition: all 0.2s linear;
            -o-transition: all 0.2s linear;
        }
        .navigation_item:hover,.selected_navigation_item{
            border: 2px solid #2A6496;
            border-radius: 2px;
            color: #2A6496 !important;
            background: #fff;
        }
    </style>
    <div id="page-wrapper">
        <div class="col-lg-12">
            <h2 class="page-header">Customer Details</h2>
        </div>
        <div class="row">

            <div class="col-md-10">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">

                        <?php for($i = 1; $i<= $pages; $i++) : ?>
                            <li class="page-item"><a class="page-link" href="view_message.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item">
                            <a class="page-link" href="view_message.php?page=<?= $Next; ?>" aria-label="Next">
                                <span aria-hidden="true">Next &raquo;</span>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <div style="height: 600px; overflow-y: auto;">
            <table id="" class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($customers as $customer) :  ?>
                    <tr>
                        <td><?= $customer['id']; ?></td>
                        <td><?= $customer['firstname']; ?></td>
                        <td><?= $customer['lastname']; ?></td>
                        <td><?= $customer['email']; ?></td>
                        <td><?= $customer['tpno']; ?></td>
                        <td><?= $customer['news']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <!-- -------------------------------------Pagination Number--------------------------------------->
        <br>
        <div class="col-md-10">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">

                    <?php for($i = 1; $i<= $pages; $i++) : ?>
                        <li class="page-item"><a class="page-link" href="view_message.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endfor; ?>
                    <li class="page-item">
                        <a class="page-link" href="view_message.php?page=<?= $Next; ?>" aria-label="Next">
                            <span aria-hidden="true">Next &raquo;</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <?php
}
else
{
    header("location:login.php");
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $("#limit-records").change(function(){
            $('form').submit();
        })
    })
</script>
<!--<script src="js/jquery-3.3.1.min.js"></script>-->
<!--<script src="js/jquery-migrate-3.0.1.min.js"></script>-->
<!--<script src="js/jquery-ui.js"></script>-->
<!--<script src="js/popper.min.js"></script>-->
<!--<script src="js/bootstrap.min.js"></script>-->
<!--<script src="js/owl.carousel.min.js"></script>-->
<!--<script src="js/jquery.stellar.min.js"></script>-->
<!--<script src="js/jquery.countdown.min.js"></script>-->
<!--<script src="js/jquery.magnific-popup.min.js"></script>-->
<!--<script src="js/bootstrap-datepicker.min.js"></script>-->
<!--<script src="js/aos.js"></script>-->
<!---->
<!--<script src="js/main.js"></script>-->
</body>

</html>
