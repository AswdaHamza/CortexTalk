<?php
session_start();
include_once "../config/config.php";

$outgoing_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC");

$output = "";
if (mysqli_num_rows($sql) > 0) {
    include "data.php";
} else {
    $output .= "No users available.";
}
echo $output;
?>
