const usernameInput = document.querySelector('input[type="text"]');
const passwordInput = document.querySelector('input[type="password"]');
const submitButton = document.getElementById("submitButton");

usernameInput.addEventListener("input", validateForm);
passwordInput.addEventListener("input", validateForm);

function validateForm() {
  if (usernameInput.value !== "" && passwordInput.value !== "") {
    submitButton.removeAttribute("disabled");
  } else {
    submitButton.setAttribute("disabled", true);
  }
}