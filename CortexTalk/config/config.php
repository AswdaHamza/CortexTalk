<?php
$conn = mysqli_connect("localhost", "root", "", "cortextalk");
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}
?>
