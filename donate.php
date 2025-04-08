<?php
session_start();
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $donation_type = $_POST['donation-type'];
    $weight = $_POST['weight'];
    $city = $_POST['algeria-cities'];
    $additional_info = $_POST['city-answer'];
    $user_id = $_SESSION['user_id'];
    $donation_date = date('Y-m-d H:i:s');

    try {
        $sql = "INSERT INTO donations (user_id, donation_type, weight, city, additional_info, donation_date) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id, $donation_type, $weight, $city, $additional_info, $donation_date]);

        // Redirect back to index with success message
        $_SESSION['success_message'] = "تم إرسال تبرعك بنجاح!";
        header("Location: index.php#donation-section");
        exit();
    } catch(PDOException $e) {
        $_SESSION['error_message'] = "حدث خطأ أثناء إرسال التبرع. يرجى المحاولة مرة أخرى.";
        header("Location: index.php#donation-section");
        exit();
    }
} else {
    // If someone tries to access this file directly
    header("Location: index.php");
    exit();
}
?>
