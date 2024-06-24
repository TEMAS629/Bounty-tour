<?php

include ('connect.php');

$query = $conn->query("SELECT * FROM `users`");
if (mysqli_num_rows($query) == 1) {

    $_SESSION['user_name'] = $row['name'];
    $row = mysqli_fetch_assoc($query);
}

// Начинаем сессию
session_start();

// Проверяем, был ли отправлен запрос на выход
if (isset($_POST['logout'])) {
    unset($_SESSION['phone']);
    unset($_SESSION['user_id']);
    // Перенаправляем пользователя на страницу входа
    header('refresh:0');
    header("Location: autorisation.php"); // Замените 'login.php' на URL вашей страницы входа
}


// Предполагается, что $userId уже установлен в сессии
$userId = $_SESSION['user_id']; // Убедитесь, что это поле действительно существует в сессии

// Запрос к базе данных для получения истории заказов пользователя
$sql = "SELECT * FROM orders WHERE user_id =?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId); // Передаем userId в запрос
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

} else {
    $message_orders = "<h3>У вас нет заказов.<h3>";
}
$stmt->close();

?>


<!DOCTYPE html>
<html lang="Ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/profile.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <title>Bounty</title>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="profile main_profile">
        <div class="container">
            <h1 class="name_user">Добро пожаловать <span><?php echo $_SESSION['user_name']; ?></span> !</h1>
            <form class="btn_exit" action="" method="post">
                <button class="btn" type="submit" name="logout">Выйти</button>
            </form>

            <h2 class="title_history">История заказов</h2>
            <div class="history_holder">
                <?php if (!empty($message_orders)) {
                    echo $message_orders;
                } ?>
                <?php while ($rows = $result->fetch_assoc()) { ?>
                    <div class="history_card">
                        <?php
                        $tour_id = $rows['tour_id'];
                        $sql = "SELECT * FROM tours WHERE id =?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $tour_id); // Передаем userId в запрос
                        $stmt->execute();
                        $finish = $stmt->get_result(); ?>

                        <p class="p2 info_history">Заказ №<span><?= $rows['id'] ?></span></p>
                        <p class="p2 info_history">Название отеля: <span><?= $rows['tour_name'] ?></span></p>
                        <div class="name_holder">
                            <p class="p1">Туристы:</p>
                            <div class="name_holder_main">
                                <p class="p2 info_history"><span><?= $rows['second_name'] ?></span></p>
                                <p class="p2 info_history"><span><?= $rows['name'] ?></span></p>
                            </div>
                        </div>

                        <?php while ($row = $finish->fetch_assoc()) { ?>
                            <?= $row['stars'] = '';
                            for ($i = 0; $i < $row['rating']; $i++) {
                                $_SESSION['rating'] = $row['stars'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(223, 226, 55, 1);transform: ;msFilter:;"><path d="M21.947 9.179a1.001 1.001 0 0 0-.868-.676l-5.701-.453-2.467-5.461a.998.998 0 0 0-1.822-.001L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.213 4.107-1.49 6.452a1 1 0 0 0 1.53 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082c.297-.268.406-.686.278-1.065z"></path></svg>';
                            }
                            $empty_stars = 5 - $row['rating'];
                            for ($i = 0; $i < $empty_stars; $i++) {
                                $_SESSION['rating'] = $row['stars'] .= '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(223, 226, 55, 1);transform: ;msFilter:;"><path d="m6.516 14.323-1.49 6.452a.998.998 0 0 0 1.529 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822 0L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107zm2.853-4.326a.998.998 0 0 0 .832-.586L12 5.43l1.799 3.981a.998.998 0 0 0 .832.586l3.972.315-3.271 2.944c-.284.256-.397.65-.293 1.018l1.253 4.385-3.736-2.491a.995.995 0 0 0-1.109 0l-3.904 2.603 1.05-4.546a1 1 0 0 0-.276-.94l-3.038-2.962 4.09-.326z"></path></svg>';
                            } ?>

                            <div class="info_tour">
                                <a href="upload/<?= $row['image_1']; ?>" data-fancybox="gallery" data-type="image">
                                    <img src="upload/<?= $row['image_1']; ?>" alt="<?= $row['image_1']; ?>">
                                </a>
                                <div class="info_holder">
                                    <p class="p2"><?= $row['stars']; ?></p>
                                    <div class="info_tour_history">
                                        <p class="p2"><?= $row['location']; ?></p>
                                        <h3 class="price"><?= $row['price']; ?> ₽</h3>
                                    </div>
                                    <p class="p2 adults">Количество человек: <?= $row['adults']; ?></p>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php include ('footer.php'); ?>
</body>


</html>