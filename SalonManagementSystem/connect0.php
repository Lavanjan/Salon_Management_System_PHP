
<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) die("<ERROR: Cannot connect to database>");
$database = mysqli_select_db($connection, "beauty");
if (!$database) die("<ERROR:Cannot select database>");


?>