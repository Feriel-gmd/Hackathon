<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAY</title>
    <link rel="stylesheet" href="part1.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
            animation: fadeIn 0.5s, fadeOut 0.5s 4.5s;
            animation-fill-mode: forwards;
        }
        .notification i {
            margin-left: 10px;
        }
        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-20px);}
            to {opacity: 1; transform: translateY(0);}
        }
        @keyframes fadeOut {
            from {opacity: 1; transform: translateY(0);}
            to {opacity: 0; transform: translateY(-20px);}
        }
    </style>
</head>
<body>
    <?php if(isset($_SESSION['logout_success'])): ?>
    <div class="notification">
        <i class="fas fa-check-circle"></i>
        <?php 
        echo $_SESSION['logout_success']; 
        unset($_SESSION['logout_success']);
        ?>
    </div>
    <?php endif; ?>
    
    <!-- Navbar -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <span class="logo-text">FAY</span>
            </div>
            <ul class="nav-links">
                <li><a href="#food-security-slider">الامن الغذائي</a></li>
                <li><a href="#tips-section">نصائح</a></li>
                <li><a href="#">توجيه</a></li>
                <li><a href="#">الطقس</a></li>
                <li><a href="#">نقائص</a></li>
                <li><a href="#">تبرع</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle"><i class="fas fa-user"></i> حساب</a>
                    <ul class="dropdown-menu">
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <li><a href="#">مرحباً <?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> خروج</a></li>
                        <?php else: ?>
                            <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> تسجيل الدخول</a></li>
                            <li><a href="register.php"><i class="fas fa-user-plus"></i> انشاء حساب</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Image Slider Section with Text -->
    <section id="food-security-slider" class="slider-section">
        <div class="slider">
            <div class="slider-text">
                <h2><i class="fas fa-seedling"></i> الامن الغذائي</h2> <!-- Icon added here -->
                <p>
                    الأمن الغذائي هو حالة يتمكن فيها جميع الأشخاص، في جميع الأوقات، من الوصول إلى طعام كافٍ وآمن ومغذٍ لتلبية احتياجاتهم الغذائية وتفضيلاتهم من أجل حياة نشطة وصحية. يشمل ذلك ليس فقط توفر الطعام، ولكن أيضًا قدرة الأشخاص على تحمله والحصول عليه، واستخدامه بشكل صحيح من خلال التغذية الجيدة والنظافة، واستقرار هذه الظروف على مر الزمن. يعد الأمن الغذائي أمرًا أساسيًا لرفاهية الأفراد والتنمية المستدامة للمجتمعات، خاصة في المناطق المتأثرة بالفقر أو تغير المناخ أو الصراع.
                </p>
            </div>
            <div class="slider-images">
                <img src="images/img1.png" alt="Slide 1" class="slide active" />
                <img src="images/img2.png" alt="Slide 2" class="slide" />
                <img src="images/img3.jpeg" alt="Slide 3" class="slide" />
            </div>
        </div>
    </section>

    <!-- Tips Section Title -->
    <section class="tips-title-section">
        <h2 class="section-title"><i class="fas fa-lightbulb"></i> نصائح</h2> <!-- Icon added here -->
    </section>

    <!-- Tips Section (Cards) -->
    <section id="tips-section" class="card-section">
        <div class="card-container">
            <div class="card">
                <div class="card-image">
                    <img src="images/3.jpg" alt="Card 1" />
                </div>
                <div class="card-text">
                    <h3>الزراعة المستدامة</h3>
                    <p>تبني تقنيات مثل الزراعة العضوية يعزز إنتاج طعام آمن ويحافظ على الموارد الطبيعية، مما يضمن توفر الغذاء بشكل مستدام.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="images/2.jpg" alt="Card 2" />
                </div>
                <div class="card-text">
                    <h3>الزراعة الحضرية</h3>
                    <p>تشجيع الزراعة في المدن يوفر مصدرًا مباشرًا للغذاء الطازج ويقلل الاعتماد على الإمدادات المستوردة، مما يعزز الأمن الغذائي المحلي.</p>
                </div>
            </div>
            <div class="card">
                <div class="card-image">
                    <img src="images/1.jpg" alt="Card 3" />
                </div>
                <div class="card-text">
                    <h3>زيادة التنوع الزراعي</h3>
                    <p>تنويع المحاصيل يعزز توافر الغذاء ويقلل من خطر فشل المحاصيل. كيف يساهم في الأمن الغذائي؟ يضمن توافر الغذاء في جميع الظروف المناخية.</p>
                </div>
            </div>
        </div>
    </section>

    <script src="part1.js"></script>
</body>
</html>
