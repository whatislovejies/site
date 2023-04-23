<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='WORK';
$port='';

$conn=mysqli_connect($hostname, $username, $password, $dbname);
if(isset($_POST['registr'])){
     $surname=$_POST['surname'];
     $name=$_POST['name'];
    $patronymic=$_POST['patronymic'];
    $Telephone=$_POST['Telephone'];
    $date_birth=$_POST['date_birth'];
    $city_residence=$_POST['city_residence'];
    $citizenship=$_POST['citizenship'];
    $Paul=$_POST['Paul'];
    $Email=$_POST['Email'];
    $password=$_POST['password'];
    $hashed_password = hash('sha256', $password);
    $sql = "INSERT INTO applicant(Surname, Name, patronymic, telephone,date_birth,city_residence,Paul ,Email ,password,citizenship,role) VALUES ('$surname', '$name', '$patronymic','$Telephone','$date_birth','$city_residence','$Paul','$Email','$hashed_password','$citizenship','applicant')";
    if($conn->query($sql)===TRUE){
        
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
   <input type="password" name="password" required>
   <label>Подтверждение пароля:</label>
   <input type="password" name="confirm_password" required><br>
   <input type="submit" class="sub" value="Зарегистрироваться" name="registr">
   <a href="Sautorization.php">Уже есть аккаунт? Войти!</a>
  </form>
 </div>
</body>
<footer>
 
 </footer>
</html>