<?php
ob_start(); // начало буферизации вывода
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'WORK';

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (isset($_POST['go'])) {
  $Email = $_POST['Email'];
  $password = $_POST['password'];
  $hashed_password = hash('sha256', $password); // хэширование пароля
  $sql = "SELECT * FROM applicant WHERE Email ='$Email' AND password = '$hashed_password';";
  $result = mysqli_query($conn, $sql); // выполнение запроса к базе данных
  if (mysqli_num_rows($result) > 0) { // проверка, если найдена хотя бы одна строка
    header("Location:index.html");
    ob_end_flush(); // конец буферизации вывода и отправка содержимого клиенту
    exit; // остановка выполнения скрипта
  } else {
    echo 'Ошибка авторизации';
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="assets/style/Sautorization.css">
</head>

<body>
  <header>
    <h1><a href="index.html">Авторизация</a></h1>
  </header>
  <div class="container">
    <form action="#" method="post">
      <label class="lg" for="Email">Email:</label>
      <input class="lg" type="Email" id="Email" name="Email">
      <label class="ps" for="password">Пароль:</label>
      <input class="ps" type="password" id="password" name="password"><br>
      <input class="sub" type="submit" value="Войти" name="go">
      <a href="Sregistration.php">Нет аккаунта? Зарегестрируйтесь!</a>
    </form>
  </div>
</body>

</html>