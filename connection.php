<?php
session_start();
$con=mysqli_connect("certidb.mysql.database.azure.com","azureuser","sangeetha7519@","cert");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());}
?>
