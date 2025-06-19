const form = document.querySelector("form");
const continueBtn = form.querySelector(".button input");
const errorText = form.querySelector(".error-text");

form.onsubmit = (e) => {
  e.preventDefault();
};

continueBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if (xhr.response === "success") {
          location.href = "chat.php";
        } else {
          errorText.style.display = "block";
          errorText.textContent = xhr.response;
        }
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};
