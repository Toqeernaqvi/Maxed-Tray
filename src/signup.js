const signupForm = document.querySelector(".signup-form");
const email = document.querySelector('input[name="email"]');
const password = document.querySelector(".signup-pass");
const cpassword = document.querySelector(".signup-cpass");
const checkbox = document.querySelector('input[type="checkbox"]');
const passOpenedEye = document.querySelector(".pass-container>.open-eye");
const passClosedEye = document.querySelector(".pass-container>.close-eye");
const cpassOpenedEye = document.querySelector(".cpass-container>.open-eye");
const cpassClosedEye = document.querySelector(".cpass-container>.close-eye");
const errorMsg = document.querySelector(".error-msg");

// Sign up Validation
signupForm.addEventListener("submit", (e) => {
  if (password.value !== cpassword.value) {
    console.log("yes");
    password.classList.add("error");
    cpassword.classList.add("error");

    errorMsg.textContent = "Your password does not match";
    e.preventDefault();
  }

  if (!checkbox.checked) {
    errorMsg.textContent =
      "Please agree with our terms of conditions & Privacy Policy";

    e.preventDefault();
  }

  window.localStorage.setItem("email", JSON.stringify(email.value));
  window.localStorage.setItem("password", JSON.stringify(password.value));
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

// confirm password visibility
cpassOpenedEye.addEventListener("click", () => {
  cpassOpenedEye.classList.add("hidden");
  cpassClosedEye.classList.remove("hidden");

  cpassword.type = "text";
});

cpassClosedEye.addEventListener("click", () => {
  cpassClosedEye.classList.add("hidden");
  cpassOpenedEye.classList.remove("hidden");

  cpassword.type = "password";
});
