const password = document.querySelector('input[name="password"]');
const passOpenedEye = document.querySelector(".pass-container>.open-eye");
const passClosedEye = document.querySelector(".pass-container>.close-eye");

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
