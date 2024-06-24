<?php
include 'connect.php';
session_start();
$errors_message = "";

if (isset($_POST["send"])) {

  if (!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["email"]) && !empty($_POST["phone"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"])) {

    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

      if ($_POST["pass"] == $_POST["pass2"]) {

        $phone = $_POST['phone'];
        $query = $conn->query("SELECT * FROM `users` WHERE `phone` = '$phone'");
        if (mysqli_num_rows($query) == 0) {

          $name = $_POST['name'];
          $surname = $_POST['surname'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $pass = $_POST['pass'];
          $conn->query("INSERT INTO `users` (`name`, `surname`, `email`, `phone`, `pass`) VALUES ('$name', '$surname', '$email', '$phone', '$pass')");
          header("location:autorisation.php");

        } else
          $errors_message = "Данный логин зарегестрирован";

      } else
        $errors_message = "Пароли не одинаковы";

    } else
      $errors_message = "Формат электронной почты указан не верно";

  } else
    $errors_message = "Не все поля заполнены";

}

$conn->close();
?>

<!DOCTYPE html>
<html lang="Ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/register.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Bounty</title>
</head>

<body>
  <?php include 'header.php' ?>

  <div class="registration">
    <div class="container">
      <h2 class="title">РЕГИСТРАЦИЯ</h2>
      <form action="" method="post">
        <input class="form" type="text" id="name" name="name" placeholder="Имя">

        <input class="form" type="text" id="surname" name="surname" placeholder="Фамилия">

        <input class="form" type="email" id="email" name="email" placeholder="Email">

        <input class="form" type="tel" id="phone" name="phone" placeholder="Телефон">

        <input class="form" type="password" id="pass" name="pass" placeholder="Пароль">

        <input class="form" type="password" id="pass2" name="pass2" placeholder="Подтвердите пароль">
        <?= "<p class='p2 error'>$errors_message</p>" ?>
        <p class="p2">У меня уже есть аккаунт. <a href="autorisation.php">Войти</a></p>
        <input class="btn" type="submit" name="send" value="Зарегистрироваться">
      </form>

    </div>

  </div>



  <?php include ('footer.php') ?>

</body>

</html>