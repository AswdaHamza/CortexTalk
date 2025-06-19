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
    <section class="form login">
      <header>Login to CortexTalk</header>
      <form action="#" method="POST" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye toggle-password"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Login to Chat">
        </div>
      </form>
      <div class="link">Not signed up yet? <a href="index.php">Register now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script>
    const form = document.querySelector("form"),
          btn = form.querySelector(".button input"),
          errorText = form.querySelector(".error-text");

    form.onsubmit = (e) => e.preventDefault();

    btn.onclick = () => {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "php/login.php", true);
      xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
          if(xhr.response === "success"){
            location.href = "chat.php";
          }else{
            errorText.style.display = "block";
            errorText.textContent = xhr.response;
          }
        }
      };
      let formData = new FormData(form);
      xhr.send(formData);
    }
  </script>
</body>
</html>
