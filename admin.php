<?php
session_start();
include "connect.php";
if (isset($_POST['adminout'])) {
  session_destroy();
  // unset($_SESSION['login']);
  header('refresh: 0');
}
if (isset($_POST['send3'])) {
  if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
      $_SESSION['login'] = $_POST['login'];
      echo "<script>alert('Вы вошли как админ')</script>";
    } else
      echo "<script>alert('Пользователь не найден')</script>";
  }
}

if (isset($_POST['add_usluga'])) {
  $price = $_POST['price'];
  $country_id = $_POST['department'];
  $rating = $_POST['rating'];
  $name_hotel = $_POST['name_hotel'];
  $location = $_POST['location'];
  $description = $_POST['description'];
  $place = $_POST['place'];
  $type_place = $_POST['type_place'];
  $in_rooms = $_POST['in_rooms'];
  $infrastructure = $_POST['infrastructure'];
  $beach_cover = $_POST['beach_cover'];
  $price = $_POST['price'];
  $adults = $_POST['adults'];
  $start_date = $_POST['start_date'];
  $duration = $_POST['duration'];
  $sqlsel = "SELECT * FROM `country`";
  $result = $conn->query($sqlsel);
  $false = false;
  foreach ($result as $row) {
    if ($country_id == $row['id']) {
      $country_name = $row['country'];
      $uploaddir = './upload/';

      $uploadfile_1 = $uploaddir . basename($_FILES['image_1']['name']);
      move_uploaded_file($_FILES['image_1']['tmp_name'], $uploadfile_1);
      $image_1 = basename($_FILES['image_1']['name']);

      $uploadfile_2 = $uploaddir . basename($_FILES['image_2']['name']);
      move_uploaded_file($_FILES['image_2']['tmp_name'], $uploadfile_2);
      $image_2 = basename($_FILES['image_2']['name']);

      $uploadfile_3 = $uploaddir . basename($_FILES['image_3']['name']);
      move_uploaded_file($_FILES['image_3']['tmp_name'], $uploadfile_3);
      $image_3 = basename($_FILES['image_3']['name']);

      $uploadfile_4 = $uploaddir . basename($_FILES['image_4']['name']);
      move_uploaded_file($_FILES['image_4']['tmp_name'], $uploadfile_4);
      $image_4 = basename($_FILES['image_4']['name']);

      $uploadfile_5 = $uploaddir . basename($_FILES['image_5']['name']);
      move_uploaded_file($_FILES['image_5']['tmp_name'], $uploadfile_5);
      $image_5 = basename($_FILES['image_5']['name']);

      $uploadfile_6 = $uploaddir . basename($_FILES['image_6']['name']);
      move_uploaded_file($_FILES['image_6']['tmp_name'], $uploadfile_6);
      $image_6 = basename($_FILES['image_6']['name']);

      $mysqli = "INSERT INTO `tours`(`rating`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `name_hotel`, `location`, `description`, `place`, `type_place`, `in_rooms`, `infrastructure`, `beach_cover`, `price`, `adults`, `start_date`, `duration`, `country_id`, `country_name`) VALUES ('$rating','$image_1','$image_2','$image_3','$image_4','$image_5','$image_6','$name_hotel','$location','$description','$place','$type_place','$in_rooms','$infrastructure','$beach_cover','$price','$adults','$start_date','$duration','$country_id','$country_name')";
      $res = $conn->query($mysqli);
      if ($res) {
        $false = true;
        header('refresh: 0');
        echo "<script>alert('Тур добавлен')</script>";
        exit();
      } else {
        echo "Ошибка!";
      }

    }
  }
  exit();
}

if (isset($_POST['add_dep'])) {
          
  $uploaddir = './upload/';

  $uploadfile = $uploaddir . basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
  $image = basename($_FILES['image']['name']);
  $country = $_POST['country'];
  $price = $_POST['price'];
  $days = $_POST['days'];
  $mysqli = "INSERT INTO `country`(`image`, `country`, `price`, `days`) VALUES ('$image', '$country', '$price', '$days')";
  $res = $conn->query($mysqli);
  if ($res) {
    header('refresh: 0');
    echo "<script>alert('Страна добавлена')</script>";
    exit();
  } else
    echo "Ошибка!";
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bounty tour панель администратора</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</head>

<body>

  <?php include 'header.php' ?>
  <div class="container">
    <?php


    if (!isset($_SESSION['login'])) { ?>
      <?php

      ?>

      <main class="form_reg">
        <form method="POST" class="main_form_reg">
          <h1 class="">Войти в панель администратора</h1>

          <div class="flex_input">
            <label for="floatingInput">Логин</label>
            <input type="text" name="login" class="form_input_search" id="floatingInput" placeholder="Логин">
          </div>

          <div class="flex_input">
            <label for="floatingPassword">Пароль</label>
            <input type="password" name="password" class="form_input_search" placeholder="Пароль">
          </div>
          <div class="center_btn">
            <input class="btn add" type="submit" name="send3" value="Войти">
          </div>


        </form>
      </main>

    <?php }
    if (isset($_SESSION['login'])) {
      ?>
      <!-- Меню -->
      <div class="center_btn upp">
            <form method="POST" class=""><input class="btn add" type="submit" name="adminout" value="Выйти">
            </form>
      </div>
      <!-- Меню -->


      <!-- Услуги -->

      <?php
    }

    if (isset($_SESSION['login'])) {
      ?>
      <div class="form_holder_main">
        <form class="main_form" method="POST" enctype="multipart/form-data">
          <h3 class="">Добавить тур</h3>
          <div class="form_holder">
            <label class="">Рейтинг отеля</label>
            <input type="number" name="rating" class="form_input_search" placeholder="Рейтинг отеля" required>
            <input class="form_input_search" type="file" name="image_1">
            <input class="form_input_search" type="file" name="image_2">
            <input class="form_input_search" type="file" name="image_3">
            <input class="form_input_search" type="file" name="image_4">
            <input class="form_input_search" type="file" name="image_5">
            <input class="form_input_search" type="file" name="image_6">
            <label class="">Название отеля</label>
            <input type="text" name="name_hotel" class="form_input_search" placeholder="Название отеля" required>
            <label class="">Страна и город тура</label>
            <input type="text" name="location" class="form_input_search" placeholder="Введите место тура" required>
            <label class="">Описание</label>
            <textarea type="text" name="description" class="form_input_search" placeholder="Добавьте описание"
              required> </textarea>
            <label class="">Какие места находятся недалеко от отеля</label>
            <input type="text" name="place" class="form_input_search" placeholder="Введите ближайшие места" required>
            <label class="">Сколько метров от пляжа</label>
            <input type="text" name="type_place" class="form_input_search" placeholder="Введите расстояние до пляжа"
              required>
            <label class="">Что включает в себя номера в отеле</label>
            <input type="text" name="in_rooms" class="form_input_search" placeholder="Введите что включает в себя номер"
              required>
            <label class="">Что находится на территории отеля</label>
            <input type="text" name="infrastructure" class="form_input_search" placeholder="Территория отеля" required>
            <label class="">Тип пляжа</label>
            <input type="text" name="beach_cover" class="form_input_search" placeholder="Песок/галька" required>
            <label class="">Стоимость тура</label>
            <input type="text" name="price" class="form_input_search" placeholder="Введите стоимость тура" required>
            <label class="">Количество взрослых</label>
            <input type="text" name="adults" class="form_input_search" placeholder="Введите кол-во взрослых" required>
            <label class="">Дата выезда</label>
            <input type="date" name="start_date" class="form_input_search" placeholder="Введите дату тура" required>
            <label class="">Кол-во ночей</label>
            <input type="number" name="duration" class="form_input_search" placeholder="Введите количество ночей"
              required>
            <label class="">Укажите страну</label>
            <select class="form_input_search" name="department" aria-label=".form-select-sm example">
              <?php
              $sql = "SELECT * FROM `country`";
              $result = $conn->query($sql);
              if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $depId = $row['id']; // Используем другое имя переменной для ID отделения
                  $depName = $row['country'];
                  echo "<option value='$depId'>$depName</option>";
                }
              }
              ?>
            </select>
            <div class="center_btn">
              <button class="btn add" type="submit" name="add_usluga" id="inputGroupFileAddon04">Добавить
                тур</button>
            </div>
          </div>
        </form>
        <form method="POST" enctype="multipart/form-data" class='main_form'>
          <h3 class="">Добавить Страну</h3>
          <div class="form_holder">
            <label class="">Изображение категории</label>
            <input type="file" name="image" class="form_input_search" placeholder="Добавьте изображение" required>
            <label class="">Название страны</label>
            <input type="text" name="country" class="form_input_search" placeholder="Добавьте название страны" required>
            <label class="">Средняя стоимость</label>
            <input type="number" name="price" class="form_input_search" placeholder="Введите среднюю стоимость тура"
              required>
            <label class="">Среднее количество ночей</label>
            <input type="text" name="days" class="form_input_search" placeholder="Введите среднее количество ночей"
              required>
            <div class="center_btn">
              <button class="btn add" type="submit" name="add_dep" id="inputGroupFileAddon04">Добавить
                отделение</button>
            </div>
          </div>
        </form>
        <?php
        
        
    }
    ?>
    </div>
  </div>

</body>

</html>