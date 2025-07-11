<?php
session_start();
if(!isset($_SESSION['unique_id'])){
  header("location: login.php");
  exit();
}
include_once "header.php";
include_once "config/config.php";

$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
if(mysqli_num_rows($sql) > 0){
  $row = mysqli_fetch_assoc($sql);
}else{
  header("location: users.php");
}
?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname'] . " " . $row['lname']; ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <div class="chat-box"></div>
      <form action="#" class="typing-area" autocomplete="off">
        <input type="hidden" name="incoming_id" class="incoming_id" value="<?php echo $user_id; ?>">
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." required>
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script src="javascript/chat.js"></script>
</body>
</html>
