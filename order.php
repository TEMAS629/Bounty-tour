<?php
include ('connect.php');
session_start();

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Запрос к базе данных для получения данных тура
// $sql = "SELECT *, rating FROM tours WHERE country_id = ?";
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("i", $country_id); // Передаем country_id в запрос
// $stmt->execute();
// $result = $stmt->get_result();
// $id = isset($_GET['id']) ? $_GET['id'] : '';

$sql = "SELECT * FROM tours";
$result = $conn->query($sql);
while ($res = $result->fetch_assoc()) {
    $price = $res['price'];
    $image = $res['image_1'];
    $rating = $res['rating'];
    $location = $res['location'];
    break;
}

if ($result->num_rows > 0) {

} else {
    echo "0 results";
}
?>

<!DOCTYPE html>
<html lang="Ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/order.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <title>Оформление тура</title>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="order_main">
        <div class="container">
            <h1 class="title">Оформление тура</h1>
            <div class="info_tour">
                <a href="upload/<?= $_SESSION['image_1']; ?>" data-fancybox="gallery" data-type="image">
                    <img src="upload/<?= $_SESSION['image_1']; ?>" alt="<?= $_SESSION['image_1']; ?>">
                </a>
                <div class="info_holder">
                    <p class="p2"><?= $_SESSION['rating']; ?></p>

                    <p class="p2"><?= $_SESSION['location']; ?></p>
                    <p class="p2"><?= $_SESSION['hotel']; ?></p>
                    <h3 class="price"><?= $_SESSION['price']; ?> ₽</h3>
                </div>
            </div>

            <div class="order">
                <h3 class="form_title">Данные туристов</h3>
                <?php
                if (isset($_SESSION['bigboi'])) { ?>
                    <form method="POST">
                        <?php include ('tourists.php'); ?>
                        <div class="buttom_holder">
                            <input type="hidden" name = "user_id" value = "<?= $_SESSION['user_id'];?>">
                            <button type="submit" name="add_turist" class="btn">Отправить</button>
                        </div>
                    </form>
                <?php } 
                
                if (isset($_POST['add_turist'])) {
                    // Первый турист
                    $second_name1 = $_POST['second_name1'];
                    $name1 = $_POST['name1'];
                    $dad_name1 = $_POST['dad_name1'];
                    $gender1 = $_POST['gender1'];
                    $date_birth1 = $_POST['date_birth1'];
                    $document_series1 = $_POST['document_series1'];
                    $document_issue_date1 = $_POST['document_issue_date1'];
                    $hotel = $_SESSION['hotel'];
                    $tour_id = $_SESSION['tur_id'];
                    $user_id = $_POST['user_id'];
                    $sql = "INSERT INTO `orders`(`user_id`, `tour_name`, `tour_id`, `second_name`, `name`, `dad_name`, `gender`, `date_birth`, `document_series`, `document_issue_date`) VALUES ('$user_id', '$hotel','$tour_id','$second_name1','$name1','$dad_name1','$gender1','$date_birth1','$document_series1','$document_issue_date1')";
                    $result = $conn->query($sql);
                    $result1 = $result; ?>
                    <?php echo "<p class='p2'>Вы успешно записались на тур!</p>" ?>
                    <?php $conn->close();
                    if (isset($_POST['second_name2'])) {
                        // Второй турист
                        include ('connect.php');
                        $second_name2 = $_POST['second_name2'];
                        $name2 = $_POST['name2'];
                        $dad_name2 = $_POST['dad_name2'];
                        $gender2 = $_POST['gender2'];
                        $date_birth2 = $_POST['date_birth2'];
                        $document_series2 = $_POST['document_series2'];
                        $document_issue_date2 = $_POST['document_issue_date2'];
                        $hotel = $_SESSION['hotel'];
                        $tour_id = $_SESSION['tur_id'];

                        $sql = "INSERT INTO `orders`(`user_id`, `tour_name`, `tour_id`, `second_name`, `name`, `dad_name`, `gender`, `date_birth`, `document_series`, `document_issue_date`) VALUES ('$user_id', '$hotel','$tour_id','$second_name2','$name2','$dad_name2','$gender2','$date_birth2','$document_series2','$document_issue_date2')";
                        $result2 = $conn->query($sql);
                        $conn->close();
                        exit();
                    }
                    if (isset($_POST['second_name3'])) {
                        // Третий турист
                        include ('connect.php');
                        $second_name3 = $_POST['second_name3'];
                        $name3 = $_POST['name3'];
                        $dad_name3 = $_POST['dad_name3'];
                        $gender3 = $_POST['gender3'];
                        $date_birth3 = $_POST['date_birth3'];
                        $document_series3 = $_POST['document_series3'];
                        $document_issue_date3 = $_POST['document_issue_date3'];
                        $hotel = $_SESSION['hotel'];
                        $tour_id = $_SESSION['tur_id'];

                        $sql = "INSERT INTO `orders`(`user_id`, `tour_name`, `tour_id`, `second_name`, `name`, `dad_name`, `gender`, `date_birth`, `document_series`, `document_issue_date`) VALUES ('$user_id', '$hotel','$tour_id','$second_name3','$name3','$dad_name3','$gender3','$date_birth3','$document_series3','$document_issue_date3')";
                        $result3 = $conn->query($sql);
                        $conn->close();
                        exit();
                    }
                    if (isset($_POST['second_name4'])) {
                        // Четвёртый турист
                        include ('connect.php');
                        $second_name4 = $_POST['second_name4'];
                        $name4 = $_POST['name4'];
                        $dad_name4 = $_POST['dad_name4'];
                        $gender4 = $_POST['gender4'];
                        $date_birth4 = $_POST['date_birth4'];
                        $document_series4 = $_POST['document_series4'];
                        $document_issue_date4 = $_POST['document_issue_date4'];
                        $hotel = $_SESSION['hotel'];
                        $tour_id = $_SESSION['tur_id'];

                        $sql = "INSERT INTO `orders`(`user_id`, `tour_name`, `tour_id`, `second_name`, `name`, `dad_name`, `gender`, `date_birth`, `document_series`, `document_issue_date`) VALUES ('$user_id', '$hotel','$tour_id','$second_name4','$name4','$dad_name4','$gender4','$date_birth4','$document_series4','$document_issue_date4')";
                        $result4 = $conn->query($sql);
                        $conn->close();

                        exit();
                    }
                    if (isset($_POST['second_name5'])) {
                        // Пятый турист
                        include ('connect.php');
                        $second_name5 = $_POST['second_name5'];
                        $name5 = $_POST['name5'];
                        $dad_name5 = $_POST['dad_name5'];
                        $gender5 = $_POST['gender5'];
                        $date_birth5 = $_POST['date_birth5'];
                        $document_series5 = $_POST['document_series5'];
                        $document_issue_date5 = $_POST['document_issue_date5'];
                        $hotel = $_SESSION['hotel'];
                        $tour_id = $_SESSION['tur_id'];

                        $sql = "INSERT INTO `orders`(`user_id`, `tour_name`, `tour_id`, `second_name`, `name`, `dad_name`, `gender`, `date_birth`, `document_series`, `document_issue_date`) VALUES ('$user_id', '$hotel','$tour_id','$second_name5','$name5','$dad_name5','$gender5','$date_birth5','$document_series5','$document_issue_date5')";
                        $result5 = $conn->query($sql);
                        exit();
                        if ($result5) {
                            $conn->close();
                            exit();
                        } else {
                            echo "Ошибка";
                            exit();
                        }
                    }

                }

                ?>
            </div>
        </div>
    </div>

    <?php include ('footer.php') ?>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="slider.js"></script>
</body>

</html>