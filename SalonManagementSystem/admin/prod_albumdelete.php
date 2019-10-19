<?php

$mykey1=$_REQUEST['key1'];
$status='delete';

include 'connect.php';
mysqli_query($connection,"update prod_album set status='$status' where albumid = '$mykey1'");
echo "<script>location.href='prod_viewallalbums.php'</script>"

?> 