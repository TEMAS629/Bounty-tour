<?php

include ('connect.php');
session_start();
// Проверяем соединение
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
//     $target_dir = "upload/";
//     $target_file = $target_dir . basename($_FILES["image"]["name"]);
//     move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

//     // Сохраняем путь к изображению в базе данных
//     $image_path = $target_file;

//     // Подготовка SQL-запроса для добавления нового изображения в базу данных
//     $sql = "INSERT INTO country (image, country, price, days) VALUES (?,?,?,?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ssss", $image_path, $_POST['country'], $_POST['price'], $_POST['days']);

//     // Установка значений переменных
//     $stmt->execute();

//     // Закрытие подготовленного выражения
//     $stmt->close();
//   }
// }

$sql = "SELECT * FROM country";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="Ru">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <title>Bounty</title>
</head>

<body>
  <?php include 'header.php' ?>

  <!-- ГЛАВНЫЙ БЛОК -->
  <div class="mainbanner-block">
    <div class="container">
      <h1 data-aos="fade-right">BOUNTY TRAVEL</h1>
      <div class="main">
        <p class="subtitle">ВАШ НЕЗАМЕНИМЫЙ ПОМОЩНИК В ВЫБОРЕ НЕЗАБЫВАЕМОГО ПУТЕШЕСТВИЯ</p>
        <a href="#form_podbor" class="btn">Подобрать тур</a>
      </div>
    </div>
    <div class="main_image"><img src="img/mainphoto.png" alt="Баннер"></div>
  </div>
  <!-- БЛОК СТРАН -->
  <div class="service-block">
    <div class="container">
      <h2 class="element-animation title">
        ЛУЧШИЕ ПРЕДЛОЖЕНИЯ
      </h2>
      <div class="main_service element-animation" data-aos="fade-top">
        <div class="swiper">
          <div class="swiper-wrapper">
            <?php if ($result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <div class="swiper-slide">
                  <a href="country_tours.php?country_id=<?= $row['id']; ?>">
                    <div class="service">
                      <div class="icon">
                        <?= isset($row['image']) ? '<img src="upload/' . $row['image'] . '" alt="' . $row['country'] . '">' : '' ?>
                      </div>
                      <div class="text_holder">
                        <h6><?= $row['country']; ?></h6>
                        <div class="main_info_holder">
                          <p class="price"><?= $row['price']; ?> ₽</p>
                          <p class="days"><?= $row['days']; ?> ночей</p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              <?php endwhile; ?>
            <?php else: ?>
              <p>No results found.</p>
            <?php endif; ?>
          </div>
        </div>
        <div class="pagination">
          <div class="btn_swipe">
            <div class="swiper-button-service-prev swipe">
              <svg width="33" height="16" viewBox="0 0 33 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M0.292892 7.29289C-0.0976295 7.68342 -0.0976295 8.31658 0.292892 8.70711L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6569L2.41421 8L8.07107 2.34315C8.46159 1.95262 8.46159 1.31946 8.07107 0.928932C7.68054 0.538408 7.04738 0.538408 6.65685 0.928932L0.292892 7.29289ZM33 7L1 7V9L33 9V7Z"
                  fill="var(--primary)" />
              </svg>
            </div>
            <div class="swiper-button-service-next swipe">
              <svg width="33" height="16" viewBox="0 0 33 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M32.7071 8.70711C33.0976 8.31658 33.0976 7.68342 32.7071 7.29289L26.3431 0.928932C25.9526 0.538408 25.3195 0.538408 24.9289 0.928932C24.5384 1.31946 24.5384 1.95262 24.9289 2.34315L30.5858 8L24.9289 13.6569C24.5384 14.0474 24.5384 14.6805 24.9289 15.0711C25.3195 15.4616 25.9526 15.4616 26.3431 15.0711L32.7071 8.70711ZM0 9H32V7H0V9Z"
                  fill="var(--primary)" />
              </svg>
            </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <a href="tours.php" class="p2">
        <div class="btn btn_service">Все туры</div>
      </a>
    </div>
  </div>
  </div>
  <!-- БЛОК ПРЕИМУЩЕСТВ -->
  <div class="advantages-block">
    <div class="container">
      <h2 class="element-animation title">ПРЕИМУЩЕСТВА</h2>
      <div class="up_image">
        <div class="big"><img src="img/main_image.png" alt="Пальма"></div>
        <div class="small"><img src="img/little_image.png" alt="Пальма"></div>
      </div>
      <div class="main_advant element-animation">
        <div class="right_text">
          <div class="adv_right">
            <p class="p2">Никаких поездок в офис и ожиданий в очередях: онлайн бронирование
              доступно в любое время и занимает считаные минуты</p>
          </div>
          <div class="adv_right">
            <p class="p2">
              Вы можете самостоятельно сравнить цены, отели и условия, почитать
              отзывы туристов и выбрать оптимальное для вас предложение
            </p>
          </div>
        </div>
        <div class="left_text">
          <div class="adv_left">
            <p class="p2">BOUNTY TRAVEL - надежный туроператор с безупречной репутацией, а
              все банковские операции и онлайн платежи на сайте абсолютно
              защищены</p>
          </div>
          <div class="adv_left">
            <p class="p2">Все спецпредложения, акции и горящие туры отображаются на сайте в
              реальном времени, их можно отслеживать и сразу выкупать по
              выгодной цене</p>
          </div>
        </div>
      </div>
      <svg class="svg_advant" width="50" height="1037" viewBox="0 0 50 1037" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <circle cx="25" cy="25" r="25" fill="#1F538F" />
        <circle cx="25" cy="683" r="25" fill="#1F538F" />
        <circle cx="25" cy="354" r="25" fill="#1F538F" />
        <circle cx="25" cy="1012" r="25" fill="#1F538F" />
        <g filter="url(#filter0_f_784_4)">
          <line x1="25.5" y1="49" x2="25.5" y2="329" stroke="#1F538F" />
        </g>
        <g filter="url(#filter1_f_784_4)">
          <line x1="25.5" y1="707" x2="25.5" y2="987" stroke="#1F538F" />
        </g>
        <g filter="url(#filter2_f_784_4)">
          <line x1="25.5" y1="378" x2="25.5" y2="658" stroke="#1F538F" />
        </g>
        <defs>
          <filter id="filter0_f_784_4" x="23" y="47" width="5" height="284" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="1" result="effect1_foregroundBlur_784_4" />
          </filter>
          <filter id="filter1_f_784_4" x="23" y="705" width="5" height="284" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="1" result="effect1_foregroundBlur_784_4" />
          </filter>
          <filter id="filter2_f_784_4" x="23" y="376" width="5" height="284" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
            <feGaussianBlur stdDeviation="1" result="effect1_foregroundBlur_784_4" />
          </filter>
        </defs>
      </svg>
      <div class="down_image">
        <div class="big"><img src="img/main_down_img.png" alt=""></div>
        <div class="small"><img src="img/little_down_img.png" alt=""></div>
      </div>
    </div>
    <div class="left"><img src="img/fon_advant_left.png" alt=""></div>
    <div class="right"><img src="img/fon_advant.png" alt=""></div>
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

  <!-- БЛОК НОВОСТЕЙ -->
  <div class="news">
    <div class="container">
      <h2 class="title">НОВОСТИ</h2>
      <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="border"></div>
            <div class="text_slide">
              <div class="title_slide">16.06.2024</div>
              <ul>
                <li>ОАЭ стали самым популярным направлением дальнего зарубежья в январе.</li>
                <li>Гуанчжоу признали городом с самыми недорогими ночными развлечениями.</li>
                <li>Здание краеведческого музея в Кирове отреставрируют к 650-летию города.</li>
                <li>В Сеуле (Южная Корея) к 2028 году планируют построить самое высокое в мире колесо обозрения без
                  спиц.</li>
              </ul>
            </div>
            <img src="img/news_one.png" />
          </div>
          <div class="swiper-slide">
            <div class="border"></div>
            <div class="text_slide">
              <div class="title_slide">15.05.2024</div>
              <ul>
                <li> Через пандемию COVID-19 многие страны открывают границы для туристов. Турфирмы уже готовятся к
                  возобновлению международных путешествий и разрабатывают новые туры по популярным направлениям.</li>
              </ul>
            </div>
            <img src="img/news_two.png" />
          </div>
          <div class="swiper-slide">
            <div class="border"></div>
            <div class="text_slide">
              <div class="title_slide">29.01.2024</div>
              <ul>
                <li>В связи с повышенным спросом на экологически чистые туры, турфирмы начинают активно предлагать
                  экотуры и экоретриты в заповедниках, национальных парках и экологически чистых регионах.</li>
              </ul>
            </div>
            <img src="img/news_three.png" />
          </div>
          <div class="swiper-slide">
            <div class="border"></div>
            <div class="text_slide">
              <div class="title_slide">29.01.2024</div>
              <ul>
                <li>Встреча со светской жизнью! Турфирмы объявляют о создании новых VIP-туров, включающих посещение
                  престижных мероприятий, экскурсий по роскошным отелям и ресторанам, а также возможностью встречаться с
                  знаменитостями и деятелями искусства.
                </li>

              </ul>
            </div>
            <img src="img/news_four.png" />
          </div>
        </div>
      </div>
      <div thumbsSlider="" class="swiper mySwiper">
        <div class="swiper-wrapper swiper_width">
          <div class="swiper-slide">
            <img class="slider_img" src="img/news_one.png" />
          </div>
          <div class="swiper-slide">
            <img class="slider_img" src="img/news_two.png" />
          </div>
          <div class="swiper-slide">
            <img class="slider_img" src="img/news_three.png" />
          </div>
          <div class="swiper-slide">
            <img class="slider_img" src="img/news_four.png" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var swiper = new Swiper(".news .mySwiper", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".news .mySwiper2", {
      spaceBetween: 10,
      navigation: {
        nextEl: ".news .swiper-button-next",
        prevEl: ".news .swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>


  <!-- БЛОК ВОПРОСОВ -->
  <div class="faq">
    <div class="container">
      <h2 class="title">ВОПРОСЫ И ОТВЕТЫ</h2>
      <div class="block_accordion">
        <div class="accordion">
          <details>
            <summary class="text_title_faq">Что включено в стоимость тура?</summary>
            <p class="text_faq">
              В стоимость тура обычно включены:
              <br>
              ► Проживание в отеле,
              <br>
              ► Перелёт (ЖД-поездка) в страну пребывания и обратно,
              <br>
              ► Трансфер из аэропорта до отеля и обратно,
              <br>
              ► Медицинская страховка.
            </p>
          </details>
          <details open>
            <summary class="text_title_faq">Какие документы необходимо иметь при оформлении тура?</summary>
            <p class="text_faq">Для оформления тура чаще всего требуется заграничный паспорт с действительным сроком
              действия на момент поездки, виза (если необходима для страны назначения), медицинская страховка, билеты на
              транспорт и ваучер от турфирмы.</p>
          </details>
          <details>
            <summary class="text_title_faq">Каковы условия отмены бронирования и возврата денег?</summary>
            <p class="text_faq">Условия отмены бронирования и возможности возврата денег зависят от тарифных правил и
              политики конкретного туроператора. Обычно при отмене бронирования до определенного срока возможно получить
              частичное возмещение или перенос даты поездки на другой срок.</p>
          </details>
        </div>
        <div class="form_faq">
          <h3>Узнайте</h3>
          <p>Задайте нам вопрос и мы вам ответим</p>
          <div class="main_form_holder">
            <form class="main_form" method="post">
              <?php
              $message_form = "";
              if (isset($_POST['form_btn'])) {
                if (!empty($_POST['name_quest']) && !empty($_POST['question'])) {
                  $name_quest = $_POST['name_quest'];
                  $question = $_POST['question'];

                  $sql = "INSERT INTO form_order (`name_quest`, `question`) VALUES ('$name_quest', '$question')";
                } else
                  $message_form = "<p class = 'p2'>Заполните все поля</p>";
                if ($conn->query($sql) === TRUE) {
                  $message_form = "<p class = 'p2'>Вопрос будет рассмотрен</p>";
                }
              }
              ?>
              <input class="form" name="name_quest" type="text" placeholder="Ваше имя">
              <textarea class="form" name="question" type="text" placeholder="Ваш вопрос"></textarea>
              <div class="button_faq"><button type="submit" name="form_btn" class="btn">Отправить</button></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- БЛОК КОНТАКТЫ -->
  <div class="contact">
    <div class="container">
      <h2 class="title">КОНТАКТЫ</h2>
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

  <!-- ПОДВАЛ -->
  <?php include 'footer.php' ?>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="slider.js"></script>
</body>

</html>