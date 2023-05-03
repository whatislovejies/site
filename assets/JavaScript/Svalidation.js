const form = document.querySelector('form');
const nameInput = document.querySelector('input[name="name"]');
const surnameInput = document.querySelector('input[name="surname"]');
const telephoneInput = document.querySelector('input[name="Telephone"]');
const cityResidenceInput = document.querySelector('input[name="city_residence"]');
const citizenshipInput = document.querySelector('input[name="citizenship"]');
const emailInput = document.querySelector('input[name="Email"]');
const passwordInput = document.querySelector('input[name="password"]');
const confirmPasswordInput = document.querySelector('input[name="confirm_password"]');

form.addEventListener('submit', (event) => {
  let errors = [];

  const nameRegex = /^[а-яА-ЯёЁa-zA-Z]+$/; // только буквы русского и латинского алфавита
  if (!nameRegex.test(nameInput.value.trim())) {
    errors.push('Имя должно содержать только буквы русского или латинского алфавита');
  }

  const surnameRegex = /^[а-яА-ЯёЁa-zA-Z]+$/; // только буквы русского и латинского алфавита
  if (!surnameRegex.test(surnameInput.value.trim())) {
    errors.push('Фамилия должна содержать только буквы русского или латинского алфавита');
  }

  const telephoneRegex = /^\+?[0-9]{1,3}\s?\(?\d{3}\)?\s?\d{3}[\s.-]?\d{2}[\s.-]?\d{2}$/; // формат телефона +7(999)999-99-99 или +7 999 999-99-99
  if (!telephoneRegex.test(telephoneInput.value.trim())) {
    errors.push('Неверный формат телефона');
  }

  const cityResidenceRegex = /^[а-яА-ЯёЁa-zA-Z\s]+$/; // только буквы русского и латинского алфавита и пробелы
  if (!cityResidenceRegex.test(cityResidenceInput.value.trim())) {
    errors.push('Место проживания должно содержать только буквы русского или латинского алфавита и пробелы');
  }

  const citizenshipRegex = /^[а-яА-ЯёЁa-zA-Z\s]+$/; // только буквы русского и латинского алфавита и пробелы
  if (!citizenshipRegex.test(citizenshipInput.value.trim())) {
    errors.push('Гражданство должно содержать только буквы русского или латинского алфавита и пробелы');
  }

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // формат email
  if (!emailRegex.test(emailInput.value.trim())) {
    errors.push('Неверный формат email');
  }

  if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*#?&]).{8,}/.test(passwordInput.value.trim())) { // минимальная длина пароля - 8 символов
    errors.push('Пароль должен содержать по крайней мере одно число, одну заглавную и строчную буквы, а также один из знаков @, $, !, %, *, #, ?, & и быть не менее 8 символов в длину');
  }

  if (confirmPasswordInput.value.trim() !== passwordInput.value.trim()) {
    errors.push('Пароли не совпадают');
  }

  if (errors.length > 0) {
    event.preventDefault();
    const errorList = document.querySelector('.error-list');
    errorList.innerHTML = '';
    errors.forEach((error) => {
      const li = document.createElement('li');
      li.textContent = error;
      errorList.appendChild(li);
    });
  }
});