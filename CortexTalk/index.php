<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: chat.php");
    exit();
  }
  include_once "header.php";
?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>CortexTalk – Connect Minds</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>

        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>

        <div class="field input">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Create a password" required>
          <i class="fas fa-eye toggle-password"></i>
        </div>

        <div class="field image">
          <label>Upload Profile Image</label>
          <input type="file" name="image" accept="image/*" required>
        </div>

        <div class="field button">
          <input type="submit" name="submit" value="Join CortexTalk">
        </div>
      </form>
      <div class="link">Already a member? <a href="login.php">Login</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>
</body>
</html>
