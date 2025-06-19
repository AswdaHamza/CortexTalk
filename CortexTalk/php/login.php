<?php
session_start();
include_once "../config/config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        if (password_verify($password, $row['password'])) {
            $status = "Active now";
            mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            $_SESSION['unique_id'] = $row['unique_id'];
            echo "success";
        } else {
            echo "Incorrect email or password!";
        }
    } else {
        echo "This email does not exist!";
    }
} else {
    echo "All fields are required!";
}
?>
