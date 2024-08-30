import { formValidate } from "../functions/form-validate.js";

const form = document.querySelector(".form");

if (form) {
  form.addEventListener("submit", formValidate);
}
