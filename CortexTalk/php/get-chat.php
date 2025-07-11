<?php
session_start();
include_once "../config/config.php";

$outgoing_id = $_SESSION['unique_id'];
$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
$output = "";

$sql = "SELECT * FROM messages 
        LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) 
           OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) 
        ORDER BY msg_id ASC";

$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['outgoing_msg_id'] === $outgoing_id) {
            $output .= '<div class="chat outgoing">
                          <div class="details">
                            <p>' . htmlspecialchars($row['msg']) . '</p>
                          </div>
                        </div>';
        } else {
            $output .= '<div class="chat incoming">
                          <img src="images/' . $row['img'] . '" alt="">
                          <div class="details">
                            <p>' . htmlspecialchars($row['msg']) . '</p>
                          </div>
                        </div>';
        }
    }
}

echo $output;
?>
