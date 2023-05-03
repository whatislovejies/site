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
 <link rel="stylesheet" type="text/css" href="assets/style/Rregistr.css">
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
<script src="assets/JavaScript/Rvalidation.js"></script>
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