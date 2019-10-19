<?php
$ab=$_POST['gname'];

echo $ab;
header( "Location:prod_addgimages.php?id=$ab" );
?>