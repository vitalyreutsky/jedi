export function formValidate(e) {
  e.preventDefault();

  let isValid = true;

  const form = e.target;
  const formResult = form.querySelector(".form__result");
  const formResultText = formResult.querySelector(".form__result-text");

  // name
  const nameInput = form.querySelector(".form__field--name input");
  const nameError = form.querySelector(".form__field--name .error");
  const nameValue = nameInput.value.trim();
  const nameRegex = /^[A-Za-zА-Яа-яЁё]+([A-Za-zА-Яа-яЁё\s]+[A-Za-zА-Яа-яЁё])?$/;

  if (nameValue === "" || !nameRegex.test(nameValue)) {
    nameError.classList.add("show");
    nameError.textContent =
      nameValue === ""
        ? "Name is required"
        : "The name must contain only letters";
    isValid = false;
  } else {
    nameError.classList.remove("show");
    nameError.textContent = "";
  }

  // mail
  const emailInput = form.querySelector(".form__field--mail input");
  const emailError = form.querySelector(".form__field--mail .error");
  const emailValue = emailInput.value.trim();
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (emailValue === "" || !emailRegex.test(emailValue)) {
    emailError.classList.add("show");
    emailError.textContent =
      emailValue === "" ? "Email is required" : "Enter a valid email address";
    isValid = false;
  } else {
    emailError.classList.remove("show");
    emailError.textContent = "";
  }

  if (isValid) {
    form.reset();
    formResult.classList.remove("is-hidden");
    formResultText.textContent = "Thank you! Your form has been sent";

    setTimeout(() => {
      formResult.classList.add("is-hidden");
    }, 2000);
  }
}
