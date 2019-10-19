<?php
$ab=$_POST['gname'];

echo $ab;
header( "Location:prod_viewsgimages.php?ids=$ab" );
?>