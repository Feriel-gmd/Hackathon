<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول - FAY</title>
    <link rel="stylesheet" href="css/part1.css" />
    <link rel="stylesheet" href="css/auth.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php include 'navbar.php'; ?>
    <!-- Login Form Section -->
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title"><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</h2>
                <?php if(isset($_SESSION['login_error'])): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php 
                    echo $_SESSION['login_error']; 
                    unset($_SESSION['login_error']);
                    ?>
                </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['register_success'])): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i>
                    <?php 
                    echo $_SESSION['register_success']; 
                    unset($_SESSION['register_success']);
                    ?>
                </div>
                <?php endif; ?>
                <form action="login_process.php" method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" required placeholder="أدخل كلمة المرور">
                        </div>
                    </div>
                    <div class="form-group remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">تذكرني</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="auth-button">تسجيل الدخول</button>
                    </div>
                    <div class="auth-links">
                        <a href="forgot_password.php">نسيت كلمة المرور؟</a>
                        <span>|</span>
                        <a href="register.php">ليس لديك حساب؟ سجل الآن</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="js/part1.js"></script>
</body>
</html> 