<?php

$connection = mysqli_connect("localhost","root","");

$db = mysqli_select_db($connection,"tutorial");
$delete = $_GET['del'];


$sql = "delete from transaction where id = '$delete'";


if(mysqli_query($connection,$sql))
           {

            echo '<script> location.replace("table.php")</script>';  
           }
           else
           {
           echo "Some thing Error" . $connection->error;

           }

?>