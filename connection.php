<?php
session_start();
$con=mysqli_connect("localhost","root","","cert");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());}
?>
