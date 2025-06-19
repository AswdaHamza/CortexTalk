const passwordInput = document.querySelector("input[type='password']");
const toggleBtn = document.querySelector(".toggle-password");

toggleBtn.addEventListener("click", () => {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    toggleBtn.classList.replace("fa-eye", "fa-eye-slash");
  } else {
    passwordInput.type = "password";
    toggleBtn.classList.replace("fa-eye-slash", "fa-eye");
  }
});
