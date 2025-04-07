<?php
// Start the session
session_start();

// Clear remember me cookie if it exists
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/');
}

// Clear remember token from database if user was logged in
if (isset($_SESSION['user_id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fay_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if (!$conn->connect_error) {
        $stmt = $conn->prepare("UPDATE users SET remember_token = NULL, token_expiry = NULL WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Set a success message
$_SESSION['logout_success'] = "تم تسجيل الخروج بنجاح";

// Redirect to the home page
header("Location: part1.php");
exit();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الخروج - FAY</title>
    <link rel="stylesheet" href="part1.css" />
    <link rel="stylesheet" href="auth.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <span class="logo-text">FAY</span>
            </div>
            <ul class="nav-links">
                <li><a href="part1.php#food-security-slider">الامن الغذائي</a></li>
                <li><a href="part1.php#tips-section">نصائح</a></li>
                <li><a href="#">توجيه</a></li>
                <li><a href="#">الطقس</a></li>
                <li><a href="#">نقائص</a></li>
                <li><a href="#">تبرع</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><i class="fas fa-user"></i> حساب</a>
                    <ul class="dropdown-menu">
                        <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</a></li>
                        <li><a href="register.php"><i class="fas fa-user-plus"></i> انشاء حساب</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Logout Message Section -->
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title"><i class="fas fa-sign-out-alt"></i> تسجيل الخروج</h2>
                <div class="logout-message">
                    <i class="fas fa-check-circle"></i>
                    <p>تم تسجيل الخروج بنجاح</p>
                    <div class="auth-buttons">
                        <a href="javascript:history.back()" class="auth-button"><i class="fas fa-arrow-right"></i> رجوع</a>
                        <a href="part1.php" class="auth-button"><i class="fas fa-home"></i> الصفحة الرئيسية</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="part1.js"></script>
</body>
</html> 