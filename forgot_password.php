<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>نسيت كلمة المرور - FAY</title>
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
                        <li><a href="login.php">تسجيل الدخول</a></li>
                        <li><a href="register.php">انشاء حساب</a></li>
                        <li><a href="logout.php">خروج</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Forgot Password Form Section -->
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title"><i class="fas fa-key"></i> استعادة كلمة المرور</h2>
                <p class="auth-description">أدخل بريدك الإلكتروني وسنرسل لك رابطًا لإعادة تعيين كلمة المرور الخاصة بك.</p>
                
                <?php
                session_start();
                if (isset($_SESSION['reset_error'])) {
                    echo '<div class="alert alert-error">' . $_SESSION['reset_error'] . '</div>';
                    unset($_SESSION['reset_error']);
                }
                if (isset($_SESSION['reset_success'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['reset_success'] . '</div>';
                    unset($_SESSION['reset_success']);
                }
                ?>
                
                <form action="reset_password_process.php" method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="auth-button">إرسال رابط إعادة التعيين</button>
                    </div>
                    <div class="auth-links">
                        <a href="login.php">العودة لتسجيل الدخول</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="part1.js"></script>
</body>
</html> 