const form = document.querySelector('form');
const errorList = document.querySelector('.error-list');

form.addEventListener('submit', function(e) {
  const errors = [];

  // проверка поля "организация" на заполненность
  const organizationInput = form.querySelector('input[name="organization"]');
  if (organizationInput.value.trim() === '') {
    errors.push('Поле "организация" не заполнено');
  }

  // проверка поля "Телефон" на заполненность и соответствие формату
  const numberInput = form.querySelector('input[name="number"]');
  const numberRegExp = /^\+?[0-9]{1,3}\s?\(?\d{3}\)?\s?\d{3}[\s.-]?\d{2}[\s.-]?\d{2}$/;
  if (numberInput.value.trim() === '') {
    errors.push('Поле "Телефон" не заполнено');
  } else if (!numberRegExp.test(numberInput.value.trim())) {
    errors.push('Поле "Телефон" должно содержать 10 цифр без пробелов и разделителей');
  }

  // проверка поля "Email" на заполненность и соответствие формату
  const emailInput = form.querySelector('input[name="Email"]');
  const emailRegExp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (emailInput.value.trim() === '') {
    errors.push('Поле "Email" не заполнено');
  } else if (!emailRegExp.test(emailInput.value.trim())) {
    errors.push('Поле "Email" должно содержать корректный email-адрес');
  }

  // проверка поля "Пароль" на заполненность и длину
  const passwordInput = form.querySelector('input[name="password"]');
  if (passwordInput.value.trim() === '') {
    errors.push('Поле "Пароль" не заполнено');
  } else if (passwordInput.value.trim().length < 6) {
    errors.push('Поле "Пароль" должно содержать не менее 6 символов');
  }

  // проверка поля "Подтверждение пароля" на заполненность и соответствие значению поля "Пароль"
  const confirmPasswordInput = form.querySelector('input[name="confirm_password"]');
  if (confirmPasswordInput.value.trim() === '') {
    errors.push('Поле "Подтверждение пароля" не заполнено');
  } else if (confirmPasswordInput.value.trim() !== passwordInput.value.trim()) {
    errors.push('Поле "Подтверждение пароля" должно совпадать со значением поля "Пароль"');
  }

  // вывод сообщений об ошибках
  if (errors.length > 0) {
    e.preventDefault();
    errorList.innerHTML = '';
    errors.forEach(function(error) {
      const li = document.createElement('li');
      li.textContent = error;
      errorList.appendChild(li);
    });
  } else {
    errorList.innerHTML = '';
  }
});
