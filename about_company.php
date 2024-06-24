<?php
include ('connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="Ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/about_company.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <title>Bounty</title>
</head>

<body>
  <?php include 'header.php' ?>

  <div class="about_company">
    <div class="container">

      <!-- Блок О КОМПАНИИ -->
      <h2 class="title">О КОМПАНИИ</h2>
      <div class="info_company">
        <div class="left_side">
          Добро пожаловать в турфирму Bounty Tours! Мы начали свою деятельность с 26 ноября 2011 года и готовы
          предложить вам уникальные и захватывающие туры по самым удивительным уголкам мира.
          <br><br>
          Наша компания специализируется на организации индивидуальных и групповых путешествий. Мы предлагаем широкий
          выбор программ, от экзотических пляжных отдыхов до
          культурных туров по историческим достопримечательностям.
          <br><br>
          Мы гордимся нашей командой профессионалов, которые всегда готовы помочь вам выбрать идеальный вариант отпуска,
          учитывая все ваши пожелания и предпочтения. Наши гиды и экскурсоводы обладают обширными знаниями и опытом,
          чтобы сделать ваше путешествие незабываемым.
          <br><br>
          Не откладывайте свои мечты о путешествиях на потом – обратитесь к нам уже сейчас и отправьтесь в захватывающее
          приключение с Bounty Tours!
        </div>
        <div class="right_side"></div>
      </div>

      <!-- Блок ПРЕИМУЩЕСТВ -->
      <div class="advant_block">
        <div class="progress-bar" data-max="2">
          <span class="blue_text">></span><span class="current-value">0</span><span class="info_advant"><span
              class="blue_text">000</span> успешных туров</span>
        </div>

        <div class="progress-bar space" data-max="13">
          <span class="current-value">0</span> <span class="info_advant"> лет работы</span>
        </div>

        <!-- Дополнительные блоки для анимации -->
        <div class="progress-bar" data-max="22">
          <span class="current-value">0</span><span class="info_advant"><span class="blue_text">000</span>
            клиентов</span>
        </div>

      </div>
      <script>
        // Задайте максимальное значение для анимации
        const progressBarElements = document.querySelectorAll('.progress-bar');

        // Функция для анимации увеличения значения
        function animateValue(element) {
          let current = parseInt(element.querySelector('.current-value').innerText);
          const max = element.getAttribute('data-max');
          if (current >= max) {
            clearInterval(element.intervalId);
            return;
          }
          current++;
          element.querySelector('.current-value').innerText = current;
        }

        // Запускаем анимацию для каждого блока прогресса
        progressBarElements.forEach((element) => {
          const intervalId = setInterval(() => animateValue(element), 100);
          element.intervalId = intervalId; // Сохраняем идентификатор интервала для остановки
        });
      </script>

      <div class="gallary">
        <h2 class="title_block">Галлерея</h2>
        <div class="gallary_holder">
          <a href="upload/photo_tour1.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour1.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour2.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour2.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour3.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour3.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour4.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour4.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour5.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour5.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour6.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour6.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour7.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour7.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour8.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour8.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour9.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour9.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour10.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour10.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour11.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour11.jpg" alt="Фото">
          </a>

          <a href="upload/photo_tour12.jpg" data-fancybox="gallery" data-type="image">
            <img src="upload/photo_tour12.jpg" alt="Фото">
          </a>

        </div>
      </div>

    </div>
    <!-- БЛОК ФОРМЫ -->
    <div id="form_podbor" class="form_podbor">
    <div class="container">
      <h2 class="title_form">Подберём для вас индивидуальный тур</h2>
      <div class="form_block">
        <p>
          <span>Заполните данные, мы свяжемся с вами и подберём вам лучшее
            предложение</span>
          <br /><br />
          Индивидуальный тур разрабатывается каждый раз с учётом конкретных
          пожеланий клиента с целью максимального удовлетворения его запросов
          и потребностей.
        </p>
        <form class="form_input" method="post">
          <?php
          $message_form = "";
          if (isset($_POST['form_btn'])) {
            if (!empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
              $name = $_POST['name'];
              $phone = $_POST['phone'];
              $email = $_POST['email'];

              $sql = "INSERT INTO form_order (`name`, `phone`, `email`) VALUES ('$name', '$phone', '$email')";
            } else
              $message_form = "<p class = 'p2'>Заполните все поля</p>";
            if ($conn->query($sql) === TRUE) {
              $message_form = "<p class = 'p2'>Заявку отправлена, наш администратор перезвонит вам в течении 15 мин.</p>";
            } else {
              echo "Ошибка: " . $sql . "<br>" . $conn->error;
            }
          }
          ?>
          <input class="form" name="name" placeholder="Имя" type="text" />
          <input class="form" name="phone" placeholder="+7 (900) 123 87-98" type="tel" />
          <input class="form" name="email" placeholder="E-mail" type="email" />
          <?= $message_form ?>
          <div class="button"><button type="submit" name="form_btn" class="btn">Отправить</button></div>
        </form>
      </div>

    </div>
  </div>

    <!-- БЛОК КОНТАКТЫ -->
    <div class="contact">
      <div class="container">
        <h2 class="title top_margin">КОНТАКТЫ</h2>
        <div class="main_contact">
          <div class="left_side">
            <div class="adres">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  style="fill: #ffffff;transform: ;msFilter:;">
                  <path
                    d="M2.002 9.63c-.023.411.207.794.581.966l7.504 3.442 3.442 7.503c.164.356.52.583.909.583l.057-.002a1 1 0 0 0 .894-.686l5.595-17.032c.117-.358.023-.753-.243-1.02s-.66-.358-1.02-.243L2.688 8.736a1 1 0 0 0-.686.894zm16.464-3.971-4.182 12.73-2.534-5.522a.998.998 0 0 0-.492-.492L5.734 9.841l12.732-4.182z">
                  </path>
                </svg>
              </div>
              <div class="text_adres">
                Россия, г. Вологда, Ленинградская улица, 136, 3-й этаж
              </div>
            </div>
            <div class="phone_mail">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  style="fill: #ffffff;transform: ;msFilter:;">
                  <path
                    d="M17.707 12.293a.999.999 0 0 0-1.414 0l-1.594 1.594c-.739-.22-2.118-.72-2.992-1.594s-1.374-2.253-1.594-2.992l1.594-1.594a.999.999 0 0 0 0-1.414l-4-4a.999.999 0 0 0-1.414 0L3.581 5.005c-.38.38-.594.902-.586 1.435.023 1.424.4 6.37 4.298 10.268s8.844 4.274 10.269 4.298h.028c.528 0 1.027-.208 1.405-.586l2.712-2.712a.999.999 0 0 0 0-1.414l-4-4.001zm-.127 6.712c-1.248-.021-5.518-.356-8.873-3.712-3.366-3.366-3.692-7.651-3.712-8.874L7 4.414 9.586 7 8.293 8.293a1 1 0 0 0-.272.912c.024.115.611 2.842 2.271 4.502s4.387 2.247 4.502 2.271a.991.991 0 0 0 .912-.271L17 14.414 19.586 17l-2.006 2.005z">
                  </path>
                </svg>
              </div>
              <a href="+79062989111" target="_blank">
                <div class="text_phone_mail">+7 (906) 298-91-11</div>
              </a>
            </div>
            <div class="phone_mail">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  style="fill: #ffffff;transform: ;msFilter:;">
                  <path
                    d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z">
                  </path>
                </svg>
              </div>
              <a href="https://bounty.travel@gmail.com" target="_blank">
                <div class="text_phone_mail">bounty.travel@gmail.com</div>
              </a>
            </div>
            <div class="photo_down">
              <svg width="456" height="168" viewBox="0 0 456 168" fill="none" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect x="85" y="118" width="28" height="41" fill="url(#pattern1)" />
                <path d="M455 1C451.703 118.333 150.96 160.556 1 167" stroke="white" stroke-dasharray="5 5" />
                <rect x="234" y="62.7314" width="70" height="70" transform="rotate(-20.6898 234 62.7314)"
                  fill="url(#pattern2)" />
                <defs>
                  <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_815_3" transform="scale(0.01)" />
                  </pattern>
                  <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_815_3" transform="matrix(0.0214286 0 0 0.0146341 -1.14286 -0.463415)" />
                  </pattern>
                  <pattern id="pattern2" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image1_815_3" transform="scale(0.01)" />
                  </pattern>
                  <image id="image0_815_3" width="100" height="100"
                    xlink:href="data:image/png;base64,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" />
                  <image id="image1_815_3" width="100" height="100"
                    xlink:href="data:image/png;base64,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" />
                </defs>
              </svg>
            </div>
          </div>
          <div class="right_side">
            <script type="text/javascript" charset="utf-8" async
              src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa63e36be233a154611c5d8031454b159e5083325b4d13a820300a5b74ad15f62&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footer.php' ?>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="slider.js"></script>

</body>

</html>