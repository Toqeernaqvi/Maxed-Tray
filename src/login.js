const form = document.querySelector(".login-form");
const email = document.querySelector('input[name="email"]');
const password = document.querySelector('input[name="password"]');
const passOpenedEye = document.querySelector(".pass-container>.open-eye");
const passClosedEye = document.querySelector(".pass-container>.close-eye");
const errorMsg = document.querySelector(".error-msg");

const userEmail = window.localStorage.getItem("email");
const userPassword = window.localStorage.getItem("password");

if (userEmail) email.value = userEmail;

console.log(userEmail, userPassword);

// Login Validation
form.addEventListener("submit", (e) => {
  if (userEmail !== email.value || userPassword !== password.value) {
    errorMsg.textContent = userEmail;
    password.classList.add("error");
    email.classList.add("error");

    e.preventDefault();
  }
  console.log(email.value, password.value);
});

// Password visibility
passOpenedEye.addEventListener("click", () => {
  passOpenedEye.classList.add("hidden");
  passClosedEye.classList.remove("hidden");

  password.type = "text";
});

passClosedEye.addEventListener("click", () => {
  passClosedEye.classList.add("hidden");
  passOpenedEye.classList.remove("hidden");

  password.type = "password";
});
