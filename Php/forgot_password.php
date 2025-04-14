<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>نسيت كلمة المرور - FAY</title>
    <link rel="stylesheet" href="css/forgot_password.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
   <?php include 'navbar.php'; ?>

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

    <script src="js/part1.js"></script>
</body>
</html> 