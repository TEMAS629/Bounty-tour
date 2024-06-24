<?php
include 'connect.php';
session_start();
$errors_message = "";

if (isset($_POST["send"])) {

  if (!empty($_POST["phone"]) && !empty($_POST["pass"])) {
    $phone = $_POST["phone"];
    $query = $conn->query("SELECT * FROM `users` WHERE `phone` = '$phone'");
    if (mysqli_num_rows($query) == 1) {
      $password = $_POST["pass"];
      $_SESSION["phone"] = $_POST["phone"];
      $row = mysqli_fetch_assoc($query);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['name'];
      if ($password == $row["pass"]) {
        header("location: profile.php");
        
      } else
        $errors_message = "Не правильный пароль";

    } else
      $errors_message = "Телефона нет в базе";

  } else
    $errors_message = "Не все поля заполнены";
}
?>
<!DOCTYPE html>
<html lang="Ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/autorisation.css" />
  <title>Bounty</title>
</head>

<body>
  <?php include 'header.php' ?>
  <div class="autorisation">
    <div class="container">
      <h2 class="title">АВТОРИЗАЦИЯ</h2>
      <fieldset class="form_main">
        <form class="form_input" action="" method="POST">
          <input class="form" type="text" name="phone" placeholder="Телефон">
          <input class="form" type="password" name="pass" placeholder="Пароль">
          <?= "<p class='p2 error'>$errors_message</p>" ?>
          <p class="p2">У меня нет аккаунта. <a href="register.php">Зарегестрироваться</a></p>
          <input class="btn" type="submit" name="send" value="Войти">
        </form>
      </fieldset>
    </div>

  </div>



  <?php include 'footer.php' ?>

</body>

</html>