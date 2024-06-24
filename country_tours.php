<?php

include ('connect.php');

// Получаем country_id из GET-параметров
$country_id = isset($_GET['country_id']) ? $_GET['country_id'] : null;

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос к базе данных для получения данных тура
$sql = "SELECT *, rating FROM tours WHERE country_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $country_id); // Передаем country_id в запрос
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Получение данных первого тура
    $row = $result->fetch_assoc();

    // Использование данных для заполнения HTML-шаблона
    // $name_hotel = htmlspecialchars($row['name_hotel']);
    // $location = htmlspecialchars($row['location']);
    // $description = htmlspecialchars($row['description']);
    // $beach_cover = htmlspecialchars($row['beach_cover']);
    // $price = htmlspecialchars($row['price']);
    // $adults = htmlspecialchars($row['adults']);
    // $start_date = htmlspecialchars($row['start_date']);
    // $duration = htmlspecialchars($row['duration']);
    // $rating = htmlspecialchars($row['rating']);
    // $image_1 = htmlspecialchars($row['image_1']);

    // Запрос к базе данных для получения названия страны
    $sql_country = "SELECT *, country_name FROM tours WHERE id =?";
    $stmt_country = $conn->prepare($sql_country);
    $stmt_country->bind_param("i", $country_id);
    $stmt_country->execute();
    $result_country = $stmt_country->get_result();
    $row_country = $result_country->fetch_assoc();
    $country_name = htmlspecialchars($row_country['country_name']); // Получаем название страны
} else {
    echo "Туры не найдены";
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/country_tours.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <title>Bounty</title>
</head>

<body>

    <?php include 'header.php' ?>

    <div class="container">
        <div class="tours_holder">
            <?php foreach ($result as $key => $res) { ?>
                <div class="single_tour">
                    <div class="image_holder">
                        <div class="swiper<?= $key ?>">
                            <div class="swiper-wrapper">
                                <?php
                                $images = ['image_1', 'image_2', 'image_3'];
                                foreach ($images as $imageKey) {
                                    if (isset($res[$imageKey])) {
                                        echo '<div class="swiper-slide">';
                                        echo '<img src="upload/' . $res[$imageKey] . '" alt="' . $res[$imageKey] . '" />';
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="pagination">
                            <div class="swiper-button-prev<?= $key ?> swiper_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path
                                        d="M18.464 2.114a.998.998 0 0 0-1.033.063l-13 9a1.003 1.003 0 0 0 0 1.645l13 9A1 1 0 0 0 19 21V3a1 1 0 0 0-.536-.886zM17 19.091 6.757 12 17 4.909v14.182z">
                                    </path>
                                </svg>
                            </div>
                            <div class="swiper-button-next<?= $key ?> swiper_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                    <path
                                        d="M5.536 21.886a1.004 1.004 0 0 0 1.033-.064l13-9a1 1 0 0 0 0-1.644l-13-9A.998.998 0 0 0 5 3v18a1 1 0 0 0 .536.886zM7 4.909 17.243 12 7 19.091V4.909z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <script>
                            var swiperServices<?= $key ?> = new Swiper(".tours_holder .swiper<?= $key ?>", {
                                direction: "horizontal",
                                loop: true,
                                slidesPerView: 1,
                                spaceBetween: 20,
                                // autoHeight: true,
                                pagination: {
                                    el: ".tours_holder .swiper-pagination",
                                },
                                navigation: {
                                    nextEl: ".swiper-button-next<?= $key ?>",
                                    prevEl: ".swiper-button-prev<?= $key ?>",
                                },
                                // autoplay: {
                                //   delay: 3000,
                                // },
                                speed: 1000,
                            });
                        </script>
                    </div>

                    <?= $res['stars'] = '';
                    for ($i = 0; $i < $res['rating']; $i++) {
                        $res['stars'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(223, 226, 55, 1);transform: ;msFilter:;"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>';
                    }
                    $empty_stars = 5 - $res['rating'];
                    for ($i = 0; $i < $empty_stars; $i++) {
                        $res['stars'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(223, 226, 55, 1);transform: ;msFilter:;"><path d="m6.516 14.323-1.49 6.452a.998.998 0 0 0 1.529 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822 0L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107zm2.853-4.326a.998.998 0 0 0 .832-.586L12 5.43l1.799 3.981a.998.998 0 0 0 .832.586l3.972.315-3.271 2.944c-.284.256-.397.65-.293 1.018l1.253 4.385-3.736-2.491a.995.995 0 0 0-1.109 0l-3.904 2.603 1.05-4.546a1 1 0 0 0-.276-.94l-3.038-2.962 4.09-.326z"></path></svg>';
                    } ?>
                    <div class="info_holder">
                        <div class="stars"><?= $res['stars'] ?></div>
                        <h3 class="name_hotel"><?= $res['name_hotel'] ?> </h3>
                        <div class="sity">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: rgba(43, 125, 207, 1);transform: ;msFilter:;">
                                <path
                                    d="M12 2C7.589 2 4 5.589 4 9.995 3.971 16.44 11.696 21.784 12 22c0 0 8.029-5.56 8-12 0-4.411-3.589-8-8-8zm0 12c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4z">
                                </path>
                            </svg>
                            <h6><?= $res['location'] ?></h6>
                        </div>
                        <div class="options">
                            <div class="option p2"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: rgba(43, 125, 207, 1);transform: ;msFilter:;">
                                    <path
                                        d="M5.996 9c1.413 0 2.16-.747 2.705-1.293.49-.49.731-.707 1.292-.707s.802.217 1.292.707C11.83 8.253 12.577 9 13.991 9c1.415 0 2.163-.747 2.71-1.293.491-.49.732-.707 1.295-.707s.804.217 1.295.707C19.837 8.253 20.585 9 22 9V7c-.563 0-.804-.217-1.295-.707C20.159 5.747 19.411 5 17.996 5s-2.162.747-2.709 1.292c-.491.491-.731.708-1.296.708-.562 0-.802-.217-1.292-.707C12.154 5.747 11.407 5 9.993 5s-2.161.747-2.706 1.293c-.49.49-.73.707-1.291.707s-.801-.217-1.291-.707C4.16 5.747 3.413 5 2 5v2c.561 0 .801.217 1.291.707C3.836 8.253 4.583 9 5.996 9zm0 5c1.413 0 2.16-.747 2.705-1.293.49-.49.731-.707 1.292-.707s.802.217 1.292.707c.545.546 1.292 1.293 2.706 1.293 1.415 0 2.163-.747 2.71-1.293.491-.49.732-.707 1.295-.707s.804.217 1.295.707C19.837 13.253 20.585 14 22 14v-2c-.563 0-.804-.217-1.295-.707-.546-.546-1.294-1.293-2.709-1.293s-2.162.747-2.709 1.292c-.491.491-.731.708-1.296.708-.562 0-.802-.217-1.292-.707C12.154 10.747 11.407 10 9.993 10s-2.161.747-2.706 1.293c-.49.49-.73.707-1.291.707s-.801-.217-1.291-.707C4.16 10.747 3.413 10 2 10v2c.561 0 .801.217 1.291.707C3.836 13.253 4.583 14 5.996 14zm0 5c1.413 0 2.16-.747 2.705-1.293.49-.49.731-.707 1.292-.707s.802.217 1.292.707c.545.546 1.292 1.293 2.706 1.293 1.415 0 2.163-.747 2.71-1.293.491-.49.732-.707 1.295-.707s.804.217 1.295.707C19.837 18.253 20.585 19 22 19v-2c-.563 0-.804-.217-1.295-.707-.546-.546-1.294-1.293-2.709-1.293s-2.162.747-2.709 1.292c-.491.491-.731.708-1.296.708-.562 0-.802-.217-1.292-.707C12.154 15.747 11.407 15 9.993 15s-2.161.747-2.706 1.293c-.49.49-.73.707-1.291.707s-.801-.217-1.291-.707C4.16 15.747 3.413 15 2 15v2c.561 0 .801.217 1.291.707C3.836 18.253 4.583 19 5.996 19z">
                                    </path>
                                </svg>
                                Близко к морю</div>
                            <div class="option p2"><img src="img/beach.png" alt="Иконка пляжа">Покрытие:
                                <?= $res['beach_cover'] ?>
                            </div>
                            <div class="option p2">
                                <img src="img/condicioner.png" alt="Иконка">
                                Кондиционер
                            </div>
                            <div class="option p2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" style="fill: rgba(43, 125, 207, 1);transform: ;msFilter:;">
                                    <path
                                        d="M12 6c3.537 0 6.837 1.353 9.293 3.809l1.414-1.414C19.874 5.561 16.071 4 12 4c-4.071.001-7.874 1.561-10.707 4.395l1.414 1.414C5.163 7.353 8.463 6 12 6zm5.671 8.307c-3.074-3.074-8.268-3.074-11.342 0l1.414 1.414c2.307-2.307 6.207-2.307 8.514 0l1.414-1.414z">
                                    </path>
                                    <path
                                        d="M20.437 11.293c-4.572-4.574-12.301-4.574-16.873 0l1.414 1.414c3.807-3.807 10.238-3.807 14.045 0l1.414-1.414z">
                                    </path>
                                    <circle cx="12" cy="18" r="2"></circle>
                                </svg>
                                Wi-Fi</div>
                        </div>
                    </div>
                    <div class="price_holder">
                        <h3 class="price">от <?= $res['price'] ?> ₽</h3>
                        <div class="person p2"><?= $res['adults'] ?> взрослых</div>
                        <div class="date p2">с <?= $res['start_date'] ?> на <?= $res['duration'] ?> ночей</div>
                        <a href="single_tour.php?id='<?=$res['id']?>'" class="btn">Показать тур</a>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <!-- Swiper JS -->
<?php include 'footer.php'?>

</body>

</html>