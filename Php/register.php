<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>انشاء حساب - FAY</title>
    <link rel="stylesheet" href="css/part1.css" />
    <link rel="stylesheet" href="css/auth.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <?php include 'navbar.php'; ?>

    <!-- Register Form Section -->
    <section class="auth-section">
        <div class="auth-container">
            <div class="auth-card">
                <h2 class="auth-title"><i class="fas fa-user-plus"></i> انشاء حساب جديد</h2>
                <?php if(isset($_SESSION['register_errors'])): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <ul>
                        <?php 
                        foreach($_SESSION['register_errors'] as $error) {
                            echo "<li>" . $error . "</li>";
                        }
                        unset($_SESSION['register_errors']);
                        ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if(isset($_SESSION['register_error'])): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php 
                    echo $_SESSION['register_error']; 
                    unset($_SESSION['register_error']);
                    ?>
                </div>
                <?php endif; ?>
                <form action="register_process.php" method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="name">الاسم الكامل</label>
                        <div class="input-group">
                            <i class="fas fa-user"></i>
                            <input type="text" id="name" name="name" required placeholder="أدخل اسمك الكامل">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <div class="input-group">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone">رقم الهاتف</label>
                        <div class="input-group">
                            <i class="fas fa-phone"></i>
                            <input type="tel" id="phone" name="phone" required placeholder="أدخل رقم هاتفك" pattern="^(05|06|07)[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}$" title="الرجاء إدخال رقم هاتف جزائري صالح">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" required 
                                placeholder="أدخل كلمة المرور"
                                pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$"
                                title="يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل، وحرف كبير، ورقم، ورمز خاص">
                        </div>
                        <small class="form-text">يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل، وحرف كبير، ورقم، ورمز خاص</small>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">تأكيد كلمة المرور</label>
                        <div class="input-group">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="confirm_password" name="confirm_password" required 
                                placeholder="أدخل كلمة المرور مرة أخرى">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="auth-button">انشاء حساب</button>
                    </div>
                    <div class="auth-links">
                        <a href="login.php">لديك حساب بالفعل؟ سجل دخولك</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="js/part1.js"></script>
</body>
</html> 