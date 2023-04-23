<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='WORK';
$port='';

$conn=mysqli_connect($hostname, $username, $password, $dbname);
if(isset($_POST['registr'])){
     $organization=$_POST['organization'];
    $number=$_POST['number'];
    $Email=$_POST['Email'];
    $password=$_POST['password'];
    $hashed_password = hash('sha256', $password);
    $sql = "INSERT INTO employer(organization, number ,Email ,password,role) VALUES ('$organization', '$number','$Email','$hashed_password','employer')";
    if($conn->query($sql)===TRUE){
        
        header("Location:Rindex.html");
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
   <label>организация:</label>
   <input type="text" name="organization" required>
   <label>Телефон:</label>
   <input type="number" name="number" required>
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