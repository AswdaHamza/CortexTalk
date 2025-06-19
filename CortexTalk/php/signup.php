<?php
session_start();
include_once "../config/config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$email - already exists!";
        } else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_explode = explode('.', $img_name);
                $img_ext = strtolower(end($img_explode));

                $allowed_exts = ["jpeg", "png", "jpg"];
                if (in_array($img_ext, $allowed_exts)) {
                    $new_img_name = time() . "_" . $img_name;
                    move_uploaded_file($tmp_name, "../images/" . $new_img_name);

                    $status = "Active now";
                    $random_id = rand(time(), 100000000);
                    $secure_pass = password_hash($password, PASSWORD_BCRYPT);

                    $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                        VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$secure_pass}', '{$new_img_name}', '{$status}')");

                    if ($insert_query) {
                        $_SESSION['unique_id'] = $random_id;
                        echo "success";
                    } else {
                        echo "Registration failed.";
                    }
                } else {
                    echo "Only JPG, PNG, JPEG allowed!";
                }
            }
        }
    } else {
        echo "Invalid email format.";
    }
} else {
    echo "All fields are required!";
}
?>
