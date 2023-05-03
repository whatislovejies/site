<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'WORK';
$port = '';

$conn = mysqli_connect($hostname, $username, $password, $dbname);
if (isset($_POST['registr'])) {
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    $Telephone = $_POST['Telephone'];
    $date_birth = $_POST['date_birth'];
    $city_residence = $_POST['city_residence'];
    $citizenship = $_POST['citizenship'];
    $Paul = $_POST['Paul'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $hashed_password = hash('sha256', $password);
    $sql = "INSERT INTO applicant(Surname, Name, patronymic, telephone,date_birth,city_residence,Paul ,Email ,password,citizenship,role) VALUES ('$surname', '$name', '$patronymic','$Telephone','$date_birth','$city_residence','$Paul','$Email','$hashed_password','$citizenship','applicant')";
    if ($conn->query($sql) === TRUE) {

        header("Location:index.html");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="assets/style/Sregistr.css">
</head>

<body>
    <header>
    </header>
    <div class="container">
        <form action="" method="POST">
            <h2>Регистрация</h2>
            <label>Имя:</label>
            <input type="text" name="name" required>
            <label>Фамилия:</label>
            <input type="text" name="surname" required>
            <label>Отчество:</label>
            <input type="text" name="patronymic">
            <label>Телефон:</label>
            <input type="tel" name="Telephone" required>
            <label>Дата рождения:</label>
            <input type="date" name="date_birth" required>
            <label>Проживание:</label>
            <input type="text" name="city_residence" required>
            <label>Гражданство:</label>
            <input type="text" name="citizenship" required>
            <label>Пол:</label>
            <select name="Paul" id="">
                <option value="Мужской">Мужской</option>
                <option value="Женский">Женский</option>
            </select>
            <label>Email:</label>
            <input type="email" name="Email" required>
            <label>Пароль:</label>
            <input type="password" name="password" id="password-input" required>
            <a href="#" class="password-control"></a>

            <label>Подтверждение пароля:</label>
            <input type="password" name="confirm_password" id="password-inputt" required><br>
            <a href="#" class="password-controll"></a>

            <ul class="error-list"></ul>
            <input type="submit" class="sub" value="Зарегистрироваться" name="registr">
            <a href="Sautorization.php">Уже есть аккаунт? Войти!</a>
        </form>
    </div>
</body>
<script src="assets/JavaScript/Svalidation.js"></script>
<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('body').on('click', '.password-control', function () {
        if ($('#password-input').attr('type') == 'password') {
            $(this).addClass('view');
            $('#password-input').attr('type', 'text');
        } else {
            $(this).removeClass('view');
            $('#password-input').attr('type', 'password');
        }
        return false;
    });
    $('body').on('click', '.password-controll', function () {
        if ($('#password-inputt').attr('type') == 'password') {
            $(this).addClass('view');
            $('#password-inputt').attr('type', 'text');
        } else {
            $(this).removeClass('view');
            $('#password-inputt').attr('type', 'password');
        }
        return false;
    });
</script>

</html>