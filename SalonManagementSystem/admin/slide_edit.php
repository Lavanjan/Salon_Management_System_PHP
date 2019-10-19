<?php session_start();
if(isset($_SESSION['uname']))
{
    ?>
    <?php include "header1.php"; ?>
    <?php include "menu/smenu.php"; ?>
<!--    ------------------------------------------------------------>


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
<!--    <div class="container" style="width:950px;">-->

        <div class="col-lg-12">
            <h2 class="page-header">Promotion Slides Edit</h2>
        </div>
        <br/>
        <div align="left">
            <button type="button" name="add" id="add" class="btn btn-outline-success"><span>Upload</span></button>
        </div>
        <br/>
        <div id="image_data">

        </div>


    <!-- /#page-wrapper -->

        <div id="imageModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Image</h4>
                    </div>
                    <div class="modal-body">
                        <form id="image_form" method="post" enctype="multipart/form-data">
                            <p><label>Select Image</label>
                                <input type="file" name="image" id="image"/></p><br/>
                            <input type="hidden" name="action" id="action" value="insert"/>
                            <input type="hidden" name="image_id" id="image_id"/>
                            <input type="submit" name="insert" id="insert" value="insert" class="btn btn-info"/>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


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

<script>
    $(document).ready(function () {

        fetch_data();

        function fetch_data() {
            var action = "fetch";
            $.ajax({
                url: "Action_slider.php",
                method: "POST",
                data: {action: action},
                success: function (data) {
                    $('#image_data').html(data);
                }
            })
        }

        $('#add').click(function () {
            $('#imageModal').modal('show');
            $('#image_form')[0].reset();
            $('.modal-title').text("Add Image");
            $('#image_id').val('');
            $('#action').val('insert');
            $('#insert').val("Insert");
        });
        $('#image_form').submit(function (event) {
            event.preventDefault();
            var image_name = $('#image').val();
            if (image_name == '') {
                alert("Please Select Image");
                return false;
            } else {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                    alert("Invalid Image File");
                    $('#image').val('');
                    return false;
                } else {
                    $.ajax({
                        url: "Action_slider.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            // console.log(data);
                            alert(data);
                            fetch_data();
                            $('#image_form')[0].reset();
                            $('#imageModal').modal('hide');
                        }
                    });
                }
            }
        });
        $(document).on('click', '.update', function () {
            $('#image_id').val($(this).attr("id"));
            $('#action').val("update");
            $('.modal-title').text("Update Image");
            $('#insert').val("Update");
            $('#imageModal').modal("show");
        });
        $(document).on('click', '.delete', function () {
            var image_id = $(this).attr("id");
            var action = "delete";
            if (confirm("Are you sure you want to remove this image from database?")) {
                $.ajax({
                    url: "Action_slider.php",
                    method: "POST",
                    data: {image_id: image_id, action: action},
                    success: function (data) {
                        alert(data);
                        fetch_data();
                    }
                })
            } else {
                return false;
            }
        });
    });
</script>


</body>

</html>
