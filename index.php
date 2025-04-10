<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAY - الأمن الغذائي</title>
    <link rel="stylesheet" href="css/part1.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/auth.css" />
    <link rel="stylesheet" href="css/formm.css">
    <link rel="stylesheet" href="css/fix-overlap.css">
    <link rel="stylesheet" href="css/weather.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php
        include 'Php/navbar.php';
        include 'Php/foodSec.php';
        include 'Php/advice.php';
        include 'Php/agriculture.php';
        include 'Php/weather.php';
        include 'Php/challenges.php';
        include 'Php/donation.php';
        include 'Php/footer.php';
    ?>
    <script src="js/form.js"></script>
    <script src="js/part1.js"></script>
    <script src="js/script.js"></script>
</body>
</html> 