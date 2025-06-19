<?php
while ($row = mysqli_fetch_assoc($sql)) {
    $output .= '
    <a href="chat.php?user_id=' . $row['unique_id'] . '">
        <div class="content">
            <img src="images/' . $row['img'] . '" alt="">
            <div class="details">
                <span>' . $row['fname'] . ' ' . $row['lname'] . '</span>
                <p>Tap to chat</p>
            </div>
        </div>
        <div class="status-dot ' . ($row['status'] == "Active now" ? 'online' : '') . '">
            <i class="fas fa-circle"></i>
        </div>
    </a>';
}
?>
